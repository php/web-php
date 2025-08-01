<#
.SYNOPSIS
Downloads and sets up a specified PHP version on Windows.

.PARAMETER Version
Major.minor or full version (e.g., 7.4 or 7.4.30).

.PARAMETER Path
Destination directory (defaults to C:\php<Version>).

.PARAMETER Arch
Architecture: x64 or x86 (default: x64).

.PARAMETER ThreadSafe
ThreadSafe: download Thread Safe build (default: $False).

.PARAMETER Timezone
date.timezone string for php.ini (default: 'UTC').
#>

[CmdletBinding()]
param(
    [Parameter(Mandatory = $true, Position=0)]
    [ValidatePattern('^\d+(\.\d+)?(\.\d+)?((alpha|beta|RC)\d*)?$')]
    [string]$Version,
    [Parameter(Mandatory = $false, Position=1)]
    [string]$Path = "C:\php$Version",
    [Parameter(Mandatory = $false, Position=2)]
    [ValidateSet("x64", "x86")]
    [string]$Arch = "x64",
    [Parameter(Mandatory = $false, Position=3)]
    [bool]$ThreadSafe = $False,
    [Parameter(Mandatory = $false, Position=4)]
    [string]$Timezone = 'UTC'
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
                Invoke-WebRequest -Uri $Url -OutFile $OutFile -TimeoutSec $TimeoutSec
            } else {
                Invoke-WebRequest -Uri $Url -TimeoutSec $TimeoutSec
            }
            break;
        } catch {
            if ($i -eq ($Retries - 1)) {
                if($FallbackUrl) {
                    try {
                        if($OutFile -ne '') {
                            Invoke-WebRequest -Uri $FallbackUrl -OutFile $OutFile -TimeoutSec $TimeoutSec
                        } else {
                            Invoke-WebRequest -Uri $FallbackUrl -TimeoutSec $TimeoutSec
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

Function Get-Semver {
    [CmdletBinding()]
    param(
        [Parameter(Mandatory = $true, Position=0)]
        [ValidateNotNull()]
        [ValidatePattern('^\d+\.\d+$')]
        [string]$Version
    )
    $releases = Get-File -Url "https://downloads.php.net/~windows/releases/releases.json" | ConvertFrom-Json
    $semver = $releases.$Version.version
    if($null -eq $semver) {
        $semver = (Get-File -Url "https://downloads.php.net/~windows/releases/archives").Links |
                Where-Object { $_.href -match "php-($Version.[0-9]+).*" } |
                ForEach-Object { $matches[1] } |
                Sort-Object { [System.Version]$_ } -Descending |
                Select-Object -First 1
    }
    if($null -eq $semver) {
        throw "Unsupported PHP version: $Version"
    }
    return $semver
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
    $type = Get-ReleaseType $Version

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
    if ($Version -match "^\d+\.\d+$") {
        $Semver = Get-Semver $Version
    } else {
        $Semver = $Version
        $Semver -match '^(\d+\.\d+)' | Out-Null
        $Version = $Matches[1]
    }

    if (-not (Test-Path $Path)) {
        try {
            New-Item -ItemType Directory -Path $Path -ErrorAction Stop | Out-Null
        } catch {
            throw "Failed to create directory $Path. $_"
        }
    } else {
        $files = Get-ChildItem -Path $Path
        if ($files.Count -gt 0) {
            throw "The directory $Path is not empty. Please provide an empty directory."
        }
    }

    if($Version -lt '5.5' -and $Arch -eq 'x64') {
        $Arch = 'x86'
        Write-Host "PHP version $Version does not support x64 architecture on Windows. Using x86 instead."
    }

    Write-Host "Downloading PHP $Semver to $Path"
    Get-PhpFromUrl $Version $Semver $Arch $ThreadSafe $tempFile
    Expand-Archive -Path $tempFile -DestinationPath $Path -Force -ErrorAction Stop

    $phpIniProd = Join-Path $Path "php.ini-production"
    if(-not(Test-Path $phpIniProd)) {
        $phpIniProd = Join-Path $Path "php.ini-recommended"
    }
    $phpIni = Join-Path $Path "php.ini"
    Copy-Item $phpIniProd $phpIni -Force
    $extensionDir = Join-Path $Path "ext"
    (Get-Content $phpIni) -replace '^extension_dir = "./"', "extension_dir = `"$extensionDir`"" | Set-Content $phpIni
    (Get-Content $phpIni) -replace ';\s?extension_dir = "ext"', "extension_dir = `"$extensionDir`"" | Set-Content $phpIni
    (Get-Content $phpIni) -replace ';\s?date.timezone =', "date.timezone = `"$Timezone`"" | Set-Content $phpIni

    Write-Host "PHP $Semver downloaded to $Path"
} catch {
    Write-Error $_
    Exit 1
} finally {
    if (Test-Path $tempFile) {
        Remove-Item $tempFile -Force -ErrorAction SilentlyContinue
    }
}
