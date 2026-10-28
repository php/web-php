<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\Releases;

use PHPUnit\Framework\Attributes\CoversClass;
use phpweb\Releases\Releases;
use PHPUnit\Framework\TestCase;

#[CoversClass(Releases::class)]
final class ReleasesTest extends TestCase
{
    public function testGetLatestWithoutReleasesGlobal(): void
    {
        $GLOBALS['RELEASES'] = [];

        self::assertSame(['0.0.0', null], new Releases()->getLatest());
    }

    public function testGetLatest(): void
    {
        $GLOBALS['RELEASES'] = $this->getReleasesGlobal();

        $expected = [
            '8.5.11',
            [
                'announcement' => true,
                'tags' => ['security'],
                'date' => '24 Sep 2026',
                'source' => [
                    [
                        'filename' => 'php-8.5.11.tar.gz',
                        'name' => 'PHP 8.5.11 (tar.gz)',
                        'sha256' => '338630ba9450f0b938bef8d740162c61c33bf64a1b421c6333c01df8a9fdb0ab',
                        'date' => '24 Sep 2026',
                    ],
                    [
                        'filename' => 'php-8.5.11.tar.bz2',
                        'name' => 'PHP 8.5.11 (tar.bz2)',
                        'sha256' => 'dc940716a8c73e531c0078eecb955d595d321ec2cc9d47149cf0089ea6e18f64',
                        'date' => '24 Sep 2026',
                    ],
                    [
                        'filename' => 'php-8.5.11.tar.xz',
                        'name' => 'PHP 8.5.11 (tar.xz)',
                        'sha256' => 'd9be75c08e8c316f4c8f4194d8fbe1750a15f6a6d9d4e3fe72082abeeb800360',
                        'date' => '24 Sep 2026',
                    ],
                ],
            ],
        ];
        self::assertSame($expected, new Releases()->getLatest());
    }

    public function testShowSource(): void
    {
        $_SERVER['REQUEST_URI'] = '/downloads.php?os=linux&osvariant=linux-debian&version=default&source=Y';
        $MYSITE = 'https://www.php.net/';

        require_once __DIR__ . '/../../../include/layout.inc';

        $GLOBALS['RELEASES'] = $this->getReleasesGlobal();

        new Releases()->showSource();

        $expected = <<<"HTML"
        <a id="v8"></a>
                            \n          <h3 id="v8.5.11" class="title">
            <span class="release-state">Current Stable</span>
            PHP 8.5.11            (<a href="/ChangeLog-8.php#8.5.11" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
                              <li>
                  <a href="/distributions/php-8.5.11.tar.gz">php-8.5.11.tar.gz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">338630ba9450f0b938bef8d740162c61c33bf64a1b421c6333c01df8a9fdb0ab</span><button type="button" class="sha256-copy" data-copy-text="338630ba9450f0b938bef8d740162c61c33bf64a1b421c6333c01df8a9fdb0ab" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.5.11.tar.bz2">php-8.5.11.tar.bz2</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">dc940716a8c73e531c0078eecb955d595d321ec2cc9d47149cf0089ea6e18f64</span><button type="button" class="sha256-copy" data-copy-text="dc940716a8c73e531c0078eecb955d595d321ec2cc9d47149cf0089ea6e18f64" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.5.11.tar.xz">php-8.5.11.tar.xz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">d9be75c08e8c316f4c8f4194d8fbe1750a15f6a6d9d4e3fe72082abeeb800360</span><button type="button" class="sha256-copy" data-copy-text="d9be75c08e8c316f4c8f4194d8fbe1750a15f6a6d9d4e3fe72082abeeb800360" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                            <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=8.5">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="/downloads.php?os=linux&amp;osvariant=linux-debian&amp;version=default&amp;source=Y#gpg-8.5">GPG Keys for PHP 8.5</a>
          </div>
                    \n          <h3 id="v8.4.26" class="title">
            <span class="release-state">Old Stable</span>
            PHP 8.4.26            (<a href="/ChangeLog-8.php#8.4.26" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
                              <li>
                  <a href="/distributions/php-8.4.26.tar.gz">php-8.4.26.tar.gz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">c248abaebc4bb777b80968f0760da0da8e989836e896c9ff637b6775d7d37662</span><button type="button" class="sha256-copy" data-copy-text="c248abaebc4bb777b80968f0760da0da8e989836e896c9ff637b6775d7d37662" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.4.26.tar.bz2">php-8.4.26.tar.bz2</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">4209694d7b0f63c45a3773e07cdc2bbfc71249265a5d951b1ff53e1147edc5ca</span><button type="button" class="sha256-copy" data-copy-text="4209694d7b0f63c45a3773e07cdc2bbfc71249265a5d951b1ff53e1147edc5ca" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.4.26.tar.xz">php-8.4.26.tar.xz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">32a2de53862ad44ed4a5005244ce4f1b50c271e74dced215449a4443b40569f1</span><button type="button" class="sha256-copy" data-copy-text="32a2de53862ad44ed4a5005244ce4f1b50c271e74dced215449a4443b40569f1" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                            <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=8.4">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="/downloads.php?os=linux&amp;osvariant=linux-debian&amp;version=default&amp;source=Y#gpg-8.4">GPG Keys for PHP 8.4</a>
          </div>
                    \n          <h3 id="v8.3.35" class="title">
            <span class="release-state">Old Stable</span>
            PHP 8.3.35            (<a href="/ChangeLog-8.php#8.3.35" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
                              <li>
                  <a href="/distributions/php-8.3.35.tar.gz">php-8.3.35.tar.gz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">e60396276fd57e8210f88919d9acd4aab98d65fbb7f431c13285ca1fb04ff205</span><button type="button" class="sha256-copy" data-copy-text="e60396276fd57e8210f88919d9acd4aab98d65fbb7f431c13285ca1fb04ff205" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.3.35.tar.bz2">php-8.3.35.tar.bz2</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">e279d9ec90d9bcab900d146816e5b11d3e8924b80e2ba36c7d7dae7d71dcbf2d</span><button type="button" class="sha256-copy" data-copy-text="e279d9ec90d9bcab900d146816e5b11d3e8924b80e2ba36c7d7dae7d71dcbf2d" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.3.35.tar.xz">php-8.3.35.tar.xz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">ff4630fbbbd94359134b7d3c223db59329905bdc4f5a9ef93d257b48e358619a</span><button type="button" class="sha256-copy" data-copy-text="ff4630fbbbd94359134b7d3c223db59329905bdc4f5a9ef93d257b48e358619a" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                            <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=8.3">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="/downloads.php?os=linux&amp;osvariant=linux-debian&amp;version=default&amp;source=Y#gpg-8.3">GPG Keys for PHP 8.3</a>
          </div>
                    \n          <h3 id="v8.2.34" class="title">
            <span class="release-state">Old Stable</span>
            PHP 8.2.34            (<a href="/ChangeLog-8.php#8.2.34" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
                              <li>
                  <a href="/distributions/php-8.2.34.tar.gz">php-8.2.34.tar.gz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">b42a58817acdf3e672d497a8f5314c1ee801b4ca94ebae41878bd29cf7764105</span><button type="button" class="sha256-copy" data-copy-text="b42a58817acdf3e672d497a8f5314c1ee801b4ca94ebae41878bd29cf7764105" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.2.34.tar.bz2">php-8.2.34.tar.bz2</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">0467d63a819016811d35fd14f734764813ab149750379790634294c723cd7562</span><button type="button" class="sha256-copy" data-copy-text="0467d63a819016811d35fd14f734764813ab149750379790634294c723cd7562" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                              <li>
                  <a href="/distributions/php-8.2.34.tar.xz">php-8.2.34.tar.xz</a>                  <span class="releasedate">24 Sep 2026</span>
                  <span class="sha256-row"><span class="sha256">5351330c54de240f54f7527c26ef292e239749e6fe11db0330acb5317e02bb39</span><button type="button" class="sha256-copy" data-copy-text="5351330c54de240f54f7527c26ef292e239749e6fe11db0330acb5317e02bb39" aria-label="Copy sha256 checksum">Copy</button></span>                                  </li>
                            <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=8.2">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="/downloads.php?os=linux&amp;osvariant=linux-debian&amp;version=default&amp;source=Y#gpg-8.2">GPG Keys for PHP 8.2</a>
          </div>

HTML;

        self::assertSame($expected, $this->getActualOutputForAssertion());
    }

    /** @return array<int, array<string, array<mixed>>> */
    private function getReleasesGlobal(): array
    {
        return [
            8 => [
                '8.5.11' => [
                    'announcement' => true,
                    'tags' => ['security'],
                    'date' => '24 Sep 2026',
                    'source' => [
                        [
                            'filename' => 'php-8.5.11.tar.gz',
                            'name' => 'PHP 8.5.11 (tar.gz)',
                            'sha256' => '338630ba9450f0b938bef8d740162c61c33bf64a1b421c6333c01df8a9fdb0ab',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.5.11.tar.bz2',
                            'name' => 'PHP 8.5.11 (tar.bz2)',
                            'sha256' => 'dc940716a8c73e531c0078eecb955d595d321ec2cc9d47149cf0089ea6e18f64',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.5.11.tar.xz',
                            'name' => 'PHP 8.5.11 (tar.xz)',
                            'sha256' => 'd9be75c08e8c316f4c8f4194d8fbe1750a15f6a6d9d4e3fe72082abeeb800360',
                            'date' => '24 Sep 2026',
                        ],
                    ],
                ],
                '8.4.26' => [
                    'announcement' => true,
                    'tags' => ['security'],
                    'date' => '24 Sep 2026',
                    'source' => [
                        [
                            'filename' => 'php-8.4.26.tar.gz',
                            'name' => 'PHP 8.4.26 (tar.gz)',
                            'sha256' => 'c248abaebc4bb777b80968f0760da0da8e989836e896c9ff637b6775d7d37662',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.4.26.tar.bz2',
                            'name' => 'PHP 8.4.26 (tar.bz2)',
                            'sha256' => '4209694d7b0f63c45a3773e07cdc2bbfc71249265a5d951b1ff53e1147edc5ca',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.4.26.tar.xz',
                            'name' => 'PHP 8.4.26 (tar.xz)',
                            'sha256' => '32a2de53862ad44ed4a5005244ce4f1b50c271e74dced215449a4443b40569f1',
                            'date' => '24 Sep 2026',
                        ],
                    ],
                ],
                '8.3.35' => [
                    'announcement' => true,
                    'tags' => ['security'],
                    'date' => '24 Sep 2026',
                    'source' => [
                        [
                            'filename' => 'php-8.3.35.tar.gz',
                            'name' => 'PHP 8.3.35 (tar.gz)',
                            'sha256' => 'e60396276fd57e8210f88919d9acd4aab98d65fbb7f431c13285ca1fb04ff205',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.3.35.tar.bz2',
                            'name' => 'PHP 8.3.35 (tar.bz2)',
                            'sha256' => 'e279d9ec90d9bcab900d146816e5b11d3e8924b80e2ba36c7d7dae7d71dcbf2d',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.3.35.tar.xz',
                            'name' => 'PHP 8.3.35 (tar.xz)',
                            'sha256' => 'ff4630fbbbd94359134b7d3c223db59329905bdc4f5a9ef93d257b48e358619a',
                            'date' => '24 Sep 2026',
                        ],
                    ],
                ],
                '8.2.34' => [
                    'announcement' => true,
                    'tags' => ['security'],
                    'date' => '24 Sep 2026',
                    'source' => [
                        [
                            'filename' => 'php-8.2.34.tar.gz',
                            'name' => 'PHP 8.2.34 (tar.gz)',
                            'sha256' => 'b42a58817acdf3e672d497a8f5314c1ee801b4ca94ebae41878bd29cf7764105',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.2.34.tar.bz2',
                            'name' => 'PHP 8.2.34 (tar.bz2)',
                            'sha256' => '0467d63a819016811d35fd14f734764813ab149750379790634294c723cd7562',
                            'date' => '24 Sep 2026',
                        ],
                        [
                            'filename' => 'php-8.2.34.tar.xz',
                            'name' => 'PHP 8.2.34 (tar.xz)',
                            'sha256' => '5351330c54de240f54f7527c26ef292e239749e6fe11db0330acb5317e02bb39',
                            'date' => '24 Sep 2026',
                        ],
                    ],
                ],
            ],
        ];
    }
}
