<#
.SYNOPSIS
Downloads and sets up a specified PHP version on Windows.

.PARAMETER Version
Major.minor or full version (e.g., 8.4 or 8.4.15).

.PARAMETER Arch
x64 or x86 (default: x64).

.PARAMETER ThreadSafe
Download Thread Safe build (default: $False).

.PARAMETER Timezone
date.timezone string for php.ini (default: 'UTC').

.PARAMETER Scope
Auto (default), CurrentUser, AllUsers, or Custom.
- Auto: AllUsers if elevated, otherwise CurrentUser.
- AllUsers: Requires elevation, installs under Program Files (or Program Files (x86) for x86 arch).
- CurrentUser: Installs under $env:LOCALAPPDATA.
- Custom: Installs under -CustomPath (or prompts), adds to User PATH.

.PARAMETER CustomPath
Directory for Scope=Custom. Versions are installed under this directory and a "current" link is created here.

#>

[CmdletBinding()]
param(
    [Parameter(Mandatory = $true, Position=0)]
    [ValidatePattern('^\d+(\.\d+)?(\.\d+)?((alpha|beta|RC)\d*)?$')]
    [string]$Version,

    [Parameter(Mandatory = $false, Position=1)]
    [ValidateSet("x64", "x86")]
    [string]$Arch = "x64",

    [Parameter(Mandatory = $false, Position=2)]
    [bool]$ThreadSafe = $False,

    [Parameter(Mandatory = $false, Position=3)]
    [string]$Timezone = 'UTC',

    [Parameter(Mandatory = $false)]
    [ValidateSet('Auto', 'CurrentUser', 'AllUsers', 'Custom')]
    [string]$Scope = 'Auto',

    [Parameter(Mandatory = $false)]
    [string]$CustomPath
)

Function Get-File {
    param (
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNullOrEmpty()]
        [string] $Url,
        [Parameter(Mandatory = $false, Position=1)]
        [string] $FallbackUrl,
        [Parameter(Mandatory = $false, Position=2)]
        [string] $OutFile = '',
        [Parameter(Mandatory = $false, Position=3)]
        [int] $Retries = 3,
        [Parameter(Mandatory = $false, Position=4)]
        [int] $TimeoutSec = 0
    )

    for ($i = 0; $i -lt $Retries; $i++) {
        try {
            if($OutFile -ne '') {
                Invoke-WebRequest -Uri $Url -OutFile $OutFile -TimeoutSec $TimeoutSec -UseBasicParsing -ErrorAction Stop
                return
            } else {
                return Invoke-WebRequest -Uri $Url -TimeoutSec $TimeoutSec -UseBasicParsing -ErrorAction Stop
            }
        } catch {
            if ($i -eq ($Retries - 1)) {
                if($FallbackUrl) {
                    try {
                        if($OutFile -ne '') {
                            Invoke-WebRequest -Uri $FallbackUrl -OutFile $OutFile -TimeoutSec $TimeoutSec -UseBasicParsing -ErrorAction Stop
                            return
                        } else {
                            return Invoke-WebRequest -Uri $FallbackUrl -TimeoutSec $TimeoutSec -UseBasicParsing -ErrorAction Stop
                        }
                    } catch {
                        throw "Failed to download the file from $Url and $FallbackUrl"
                    }
                } else {
                    throw "Failed to download the file from $Url"
                }
            }
        }
    }
}

Function Test-IsAdmin {
    $p = New-Object Security.Principal.WindowsPrincipal([Security.Principal.WindowsIdentity]::GetCurrent())
    return $p.IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)
}

Function ConvertTo-BoolOrDefault {
    param([string]$UserInput, [bool]$Default)
    if ([string]::IsNullOrWhiteSpace($UserInput)) { return $Default }
    switch -Regex ($UserInput.Trim().ToLowerInvariant()) {
        '^(1|true|t|y|yes)$' { return $true }
        '^(0|false|f|n|no)$' { return $false }
        default { return $Default }
    }
}

Function Edit-PathForCompare([string]$p) {
    if ([string]::IsNullOrWhiteSpace($p)) { return '' }
    return ($p.Trim().Trim('"').TrimEnd('\')).ToLowerInvariant()
}

Function Set-PathEntryFirst {
    param(
        [Parameter(Mandatory = $true)][ValidateSet('User','Machine')] [string]$Target,
        [Parameter(Mandatory = $true)][string]$Entry
    )

    $entryNorm = Edit-PathForCompare $Entry

    $existing = [Environment]::GetEnvironmentVariable('Path', $Target)
    if ($null -eq $existing) { $existing = '' }

    $parts = @()
    foreach ($p in ($existing -split ';')) {
        if (-not [string]::IsNullOrWhiteSpace($p)) {
            if ((Edit-PathForCompare $p) -ne $entryNorm) { $parts += $p }
        }
    }
    $newParts = @($Entry) + $parts
    [Environment]::SetEnvironmentVariable('Path', ($newParts -join ';'), $Target)

    $procParts = @()
    foreach ($p in ($env:Path -split ';')) {
        if (-not [string]::IsNullOrWhiteSpace($p)) {
            if ((Edit-PathForCompare $p) -ne $entryNorm) { $procParts += $p }
        }
    }
    $env:Path = ((@($Entry) + $procParts) -join ';')
}

function Send-EnvironmentChangeBroadcast {
    try {
        $sig = @'
using System;
using System.Runtime.InteropServices;
public static class NativeMethods {
  [DllImport("user32.dll", SetLastError=true, CharSet=CharSet.Auto)]
  public static extern IntPtr SendMessageTimeout(
    IntPtr hWnd, uint Msg, UIntPtr wParam, string lParam,
    uint fuFlags, uint uTimeout, out UIntPtr lpdwResult);
}
'@
        Add-Type -TypeDefinition $sig -ErrorAction SilentlyContinue | Out-Null
        $HWND_BROADCAST = [IntPtr]0xffff
        $WM_SETTINGCHANGE = 0x001A
        $SMTO_ABORTIFHUNG = 0x0002
        [UIntPtr]$result = [UIntPtr]::Zero
        [NativeMethods]::SendMessageTimeout($HWND_BROADCAST, $WM_SETTINGCHANGE, [UIntPtr]::Zero, "Environment", $SMTO_ABORTIFHUNG, 5000, [ref]$result) | Out-Null
    } catch { }
}

Function Test-EmptyDir([string]$Dir) {
    if (-not (Test-Path -LiteralPath $Dir)) {
        New-Item -ItemType Directory -Path $Dir -Force | Out-Null
        return
    }
    $items = Get-ChildItem -LiteralPath $Dir -Force -ErrorAction SilentlyContinue
    if ($items -and $items.Count -gt 0) {
        throw "The directory '$Dir' is not empty. Please choose another location."
    }
}

Function Get-Semver {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+\.\d+$')]
        [string]$Version
    )

    $jsonUrl = "https://downloads.php.net/~windows/releases/releases.json"
    $releases = ((Get-File -Url $jsonUrl).Content | ConvertFrom-Json)

    $semver = $releases.$Version.version
    if ($null -ne $semver) { return [string]$semver }

    $html = (Get-File -Url "https://downloads.php.net/~windows/releases/archives/").Content
    $rx = [regex]"php-($([regex]::Escape($Version))\.[0-9]+)"
    $found = $rx.Matches($html) | ForEach-Object { $_.Groups[1].Value } |
        Sort-Object { [version]$_ } -Descending |
        Select-Object -First 1

    if ($null -ne $found) { return [string]$found }

    throw "Unsupported PHP version series: $Version"
}

Function Get-VSVersion {
    param(
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+\.\d+$')]
        [string]$Version
    )
    $map = @{
        '5.2' = 'VC6'
        '5.3' = 'VC9'; '5.4' = 'VC9'
        '5.5' = 'VC11'; '5.6' = 'VC11'
        '7.0' = 'VC14'; '7.1' = 'VC14'
        '7.2' = 'VC15'; '7.3' = 'VC15'; '7.4' = 'vc15'
        '8.0' = 'vs16'; '8.1' = 'vs16'; '8.2' = 'vs16'; '8.3' = 'vs16'
        '8.4' = 'vs17'; '8.5' = 'vs17'
    }

    if ($map.ContainsKey($Version)) {
        return $map[$Version]
    }
    throw "Unsupported PHP version: $Version"
}

Function Get-ReleaseType {
    param(
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+(\.\d+)?(\.\d+)?((alpha|beta|RC)\d*)?$')]
        [string]$Version
    )
    if ($Version -match "[a-zA-Z]") {
        return "qa"
    } else {
        return "releases"
    }
}

Function Get-PhpFromUrl {
    param(
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+\.\d+$')]
        [string]$Version,
        [Parameter(Mandatory = $true, Position=1)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+(\.\d+)?(\.\d+)?((alpha|beta|RC)\d*)?$')]
        [string]$Semver,
        [Parameter(Mandatory = $false, Position=2)]
        [ValidateSet("x64", "x86")]
        [string]$Arch = "x64",
        [Parameter(Mandatory = $false, Position=3)]
        [bool]$ThreadSafe = $false,
        [Parameter(Mandatory = $true, Position=4)]
        [ValidateNotNull()]
        [ValidateLength(1, [int]::MaxValue)]
        [string]$OutFile
    )
    $vs = Get-VSVersion $Version
    $ts = if ($ThreadSafe) { "ts" } else { "nts" }
    $zipName = if ($ThreadSafe) { "php-$Semver-Win32-$vs-$Arch.zip" } else { "php-$Semver-$ts-Win32-$vs-$Arch.zip" }
    $type = Get-ReleaseType $Semver

    $base = "https://downloads.php.net/~windows/$type"
    try {
        Get-File -Url "$base/$zipName" -OutFile $OutFile
    } catch {
        try {
            Get-File -Url "$base/archives/$zipName" -OutFile $OutFile
        } catch {
            throw "Failed to download PHP $Semver."
        }
    }
}

$tempFile = [IO.Path]::ChangeExtension([IO.Path]::GetTempFileName(), '.zip')

try {
    $isAdmin = Test-IsAdmin

    if (-not $PSBoundParameters.ContainsKey('Arch')) {
        Write-Host ""
        Write-Host "What architecture would you like to install?"
        Write-Host "Enter x64 for 64-bit"
        Write-Host "Enter x86 for 32-bit"
        Write-Host "Press Enter to use default ($Arch)"
        $archSel = Read-Host "Please enter [x64/x86]"
        if (-not [string]::IsNullOrWhiteSpace($archSel) -and @('x64','x86') -contains $archSel.Trim()) {
            $Arch = $archSel.Trim()
        }
    }

    if (-not $PSBoundParameters.ContainsKey('ThreadSafe')) {
        Write-Host ""
        Write-Host "What ThreadSafe option would you like to use?"
        Write-Host "Enter true for ThreadSafe"
        Write-Host "Enter false for Non-ThreadSafe"
        Write-Host "Press Enter to use default ($ThreadSafe)"
        $tsSel = Read-Host "Please enter [true/false]"
        $ThreadSafe = ConvertTo-BoolOrDefault -UserInput $tsSel -Default $ThreadSafe
    }

    if (-not $PSBoundParameters.ContainsKey('Timezone')) {
        Write-Host ""
        Write-Host "What timezone would you like to set in php.ini?"
        Write-Host "Press Enter to use default ($Timezone)"
        $tzSel = Read-Host "Please enter timezone"
        if (-not [string]::IsNullOrWhiteSpace($tzSel)) {
            $Timezone = $tzSel.Trim()
        }
    }

    if (-not $PSBoundParameters.ContainsKey('Scope')) {
        Write-Host ""
        Write-Host "Would you like to install PHP for:"
        Write-Host "Enter 1 for Current user"
        Write-Host "Enter 2 for All users (requires admin elevation)"
        Write-Host "Enter 3 to install PHP at a custom path"
        Write-Host "Press Enter to choose automatically"
        $sel = Read-Host "Please enter [1-3]"
        switch ($sel) {
            '1' { $Scope = 'CurrentUser' }
            '2' { $Scope = 'AllUsers' }
            '3' { $Scope = 'Custom' }
            default { $Scope = 'Auto' }
        }
    }

    if ($Scope -eq 'Custom' -and -not $PSBoundParameters.ContainsKey('CustomPath')) {
        $defaultCustom = if ($CustomPath) { $CustomPath } else { (Join-Path $env:LOCALAPPDATA 'Programs\PHP') }
        Write-Host ""
        Write-Host "Please enter the custom installation path."
        Write-Host "Press Enter to use default ($defaultCustom)"
        $cr = Read-Host "Please enter"
        $CustomPath = if ([string]::IsNullOrWhiteSpace($cr)) { $defaultCustom } else { $cr.Trim() }
    }

    if ($Version -match "^\d+\.\d+$") {
        $Semver = Get-Semver $Version
        $MajorMinor = $Version
    } else {
        $Semver = $Version
        if ($Semver -notmatch '^(\d+\.\d+)') { throw "Could not derive major.minor from Version '$Version'." }
        $MajorMinor = $Matches[1]
    }

    if ([version]$MajorMinor -lt [version]'5.5' -and $Arch -eq 'x64') {
        $Arch = 'x86'
        Write-Host "PHP series $MajorMinor does not support x64 on Windows. Using x86."
    }

    $EffectiveScope = $Scope
    if ($Scope -eq 'Auto') {
        $EffectiveScope = if ($isAdmin) { 'AllUsers' } else { 'CurrentUser' }
    }

    if ($EffectiveScope -eq 'AllUsers' -and -not $isAdmin) {
        throw "AllUsers install selected but this session is not elevated. Re-run as Administrator or choose CurrentUser/Custom."
    }

    $installRootDirectory = switch ($EffectiveScope) {
        'CurrentUser' { Join-Path $env:LOCALAPPDATA 'Programs\PHP' }
        'AllUsers' {
            $pf = $env:ProgramFiles
            if ($Arch -eq 'x86' -and ${env:ProgramFiles(x86)}) { $pf = ${env:ProgramFiles(x86)} }
            Join-Path $pf 'PHP'
        }
        'Custom' {
            if ([string]::IsNullOrWhiteSpace($CustomPath)) { throw "Scope=Custom requires -CustomPath (or interactive input)." }
            [Environment]::ExpandEnvironmentVariables($CustomPath)
        }
        default { throw "Unexpected scope: $EffectiveScope" }
    }

    if (-not (Test-Path -LiteralPath $installRootDirectory)) {
        New-Item -ItemType Directory -Path $installRootDirectory | Out-Null
    }

    $tsTag = if ($ThreadSafe) { 'ts' } else { 'nts' }
    $installDirectory = Join-Path (Join-Path (Join-Path $installRootDirectory $Semver) $tsTag) $Arch
    $currentLink = Join-Path $installRootDirectory 'current'

    Test-EmptyDir $installDirectory

    Write-Host "Downloading PHP $Semver ($Arch, $tsTag) -> $installDirectory"
    Get-PhpFromUrl $MajorMinor $Semver $Arch $ThreadSafe $tempFile

    Expand-Archive -Path $tempFile -DestinationPath $installDirectory -Force -ErrorAction Stop

    $phpIniProd = Join-Path $installDirectory "php.ini-production"
    if(-not(Test-Path $phpIniProd)) {
        $phpIniProd = Join-Path $installDirectory "php.ini-recommended"
    }
    $phpIni = Join-Path $installDirectory "php.ini"
    if (Test-Path $phpIniProd) {
        Copy-Item $phpIniProd $phpIni -Force

        $extensionDir = Join-Path $installDirectory "ext"
        (Get-Content $phpIni) -replace '^extension_dir = "./"', "extension_dir = `"$extensionDir`"" | Set-Content $phpIni
        (Get-Content $phpIni) -replace ';\s?extension_dir = "ext"', "extension_dir = `"$extensionDir`"" | Set-Content $phpIni
        (Get-Content $phpIni) -replace ';\s?date.timezone =', "date.timezone = `"$Timezone`"" | Set-Content $phpIni
    }

    if (Test-Path -LiteralPath $currentLink) {
        Remove-Item -LiteralPath $currentLink -Force -Recurse
    }
    New-Item -ItemType Junction -Path $currentLink -Target $installDirectory | Out-Null

    $pathTarget = if ($EffectiveScope -eq 'AllUsers') { 'Machine' } else { 'User' }
    Set-PathEntryFirst -Target $pathTarget -Entry $currentLink
    Send-EnvironmentChangeBroadcast

    Write-Host ""
    Write-Host "Installed PHP ${Semver}: $installDirectory"
    Write-Host "It has been linked to $currentLink and added to PATH."
    Write-Host "Please restart any open Command Prompt/PowerShell windows or IDEs to pick up the new PATH."
    Write-Host "You can run 'php -v' to verify the installation in the new window."
} catch {
    Write-Error $_
    Exit 1
} finally {
    if (Test-Path $tempFile) {
        Remove-Item $tempFile -Force -ErrorAction SilentlyContinue
    }
}
