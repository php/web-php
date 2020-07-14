<?php
// GPG keys used for signing releases.
$GPG_KEYS = array(
/*pub   2048R/22FE5A12 2015-07-07 [expires: 2020-07-05]
      Key fingerprint = D620 173D 6924 BA1C 2244  C7C4 1B6B 6676 22FE 5A12
uid                  Kalle Sommer Nielsen (PHP) &lt;kalle@php.net&gt;
*/
    "8.0" => <<< GPG
pub   4096R/70D12172 2017-04-14 [expires: 2024-04-21]
      Key fingerprint = 1729 F839 38DA 44E2 7BA0  F4D3 DBDB 3974 70D1 2172
uid                  Sara Golemon &lt;pollita@php.net&gt;

pub   rsa4096 2020-05-09 [SC] [expires: 2024-05-08]
      BFDD D286 4282 4F81 18EF  7790 9B67 A5C1 2229 118F
uid           [ultimate] Gabriel Caruso (Release Manager) &lt;carusogabriel@php.net&gt;
sub   rsa4096 2020-05-09 [E] [expires: 2024-05-08]
GPG
,

    "7.4" => <<< GPG
sec   rsa4096 2019-06-11 [SC] [expires: 2029-06-08]
      5A52880781F755608BF815FC910DEB46F53EA312
uid           [ultimate] Derick Rethans &lt;gpg@derickrethans.nl&gt;
uid           [ultimate] Derick Rethans &lt;derick@derickrethans.nl&gt;
uid           [ultimate] Derick Rethans (GitHub) &lt;github@derickrethans.nl&gt;
uid           [ultimate] Derick Rethans (PHP) &lt;derick@php.net&gt;
ssb   rsa4096 2019-06-11 [E] [expires: 2029-06-08]

pub   rsa4096 2019-05-29 [SC] [expires: 2021-05-28]
      4267 0A7F E4D0 441C 8E46  3234 9E4F DC07 4A4E F02D
uid           [ultimate] Peter Kokot &lt;petk@php.net&gt;
sub   rsa4096 2019-05-29 [E] [expires: 2021-05-28]
GPG
,
    "7.3" => <<< GPG
pub   rsa4096/118BCCB6 2018-06-05 [SC] [expires: 2022-06-04]
      Key fingerprint = CBAF 69F1 73A0 FEA4 B537  F470 D66C 9593 118B CCB6
uid                  Christoph M. Becker &lt;cmb@php.net&gt;

pub   2048D/5DA04B5D 2012-03-19
      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@gmail.com&gt;
uid                  Stanislav Malyshev (PHP key) &lt;stas@php.net&gt;
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@sugarcrm.com&gt;
GPG
,
    "7.2" => <<< GPG
pub   4096R/70D12172 2017-04-14 [expires: 2024-04-21]
      Key fingerprint = 1729 F839 38DA 44E2 7BA0  F4D3 DBDB 3974 70D1 2172
uid                  Sara Golemon &lt;pollita@php.net&gt;

pub   4096R/EE5AF27F 2017-05-24 [expires: 2024-05-22]
      Key fingerprint = B1B4 4D8F 021E 4E2D 6021  E995 DC9F F8D3 EE5A F27F
uid                  Remi Collet &lt;remi@php.net&gt;

pub   rsa4096/118BCCB6 2018-06-05 [SC] [expires: 2022-06-04]
      Key fingerprint = CBAF 69F1 73A0 FEA4 B537  F470 D66C 9593 118B CCB6
uid                  Christoph M. Becker &lt;cmb@php.net&gt;
GPG
,
    "7.1" => <<< GPG
pub   4096R/7BD5DCD0 2016-05-07
      Key fingerprint = A917 B1EC DA84 AEC2 B568 FED6 F50A BC80 7BD5 DCD0
uid                  Davey Shafik &lt;davey@php.net&gt;

pub   2048R/31CBD89E 2016-12-08
      Key fingerprint = 5289 95BF EDFB A719 1D46  839E F9BA 0ADA 31CB D89E
uid                  Joe Watkins &lt;krakjoe@php.net&gt;

pub   4096R/70D12172 2017-04-14 [expires: 2024-04-21]
      Key fingerprint = 1729 F839 38DA 44E2 7BA0  F4D3 DBDB 3974 70D1 2172
uid                  Sara Golemon &lt;pollita@php.net&gt;

GPG
,
    "7.0" => <<< GPG
pub   2048R/9C0D5763 2015-06-09 [expires: 2024-06-06]
      Key fingerprint = 1A4E 8B72 77C4 2E53 DBA9  C7B9 BCAA 30EA 9C0D 5763
uid                  Anatol Belski &lt;ab@php.net&gt;

pub   2048R/33CFC8B3 2014-01-14 [expires: 2020-01-13]
      Key fingerprint = 6E4F 6AB3 21FD C07F 2C33  2E3A C2BF 0BC4 33CF C8B3
uid                  Ferenc Kovacs &lt;tyrael@php.net&gt;

GPG
,
    "5.6" => <<< GPG
pub   2048R/33CFC8B3 2014-01-14 [expires: 2020-01-13]
      Key fingerprint = 6E4F 6AB3 21FD C07F 2C33  2E3A C2BF 0BC4 33CF C8B3
uid                  Ferenc Kovacs &lt;tyrael@php.net&gt;

pub   2048R/90D90EC1 2013-07-18 [expire : 2016-07-17]
      Key fingerprint = 0BD7 8B5F 9750 0D45 0838  F95D FE85 7D9A 90D9 0EC1
uid                  Julien Pauli &lt;jpauli@php.net&gt;

GPG
,
    "5.5" => <<< GPG
pub   2048R/90D90EC1 2013-07-18 [expire : 2016-07-17]
      Key fingerprint = 0BD7 8B5F 9750 0D45 0838  F95D FE85 7D9A 90D9 0EC1
uid                  Julien Pauli &lt;jpauli@php.net&gt;

pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]
      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D
uid                  David Soria Parra &lt;dsp@php.net&gt;

pub   2048D/5DA04B5D 2012-03-19
      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@gmail.com&gt;
uid                  Stanislav Malyshev (PHP key) &lt;stas@php.net&gt;
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@sugarcrm.com&gt;

GPG
,
    "5.4" => <<< GPG
pub   2048D/5DA04B5D 2012-03-19
      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@gmail.com&gt;
uid                  Stanislav Malyshev (PHP key) &lt;stas@php.net&gt;
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@sugarcrm.com&gt;
GPG
,
    "5.3" => <<< GPG
pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]
      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D
uid                  David Soria Parra &lt;dsp@php.net&gt;
pub   2048R/FC9C83D7 2012-03-18 [expires: 2017-03-17]
      Key fingerprint = 0A95 E9A0 2654 2D53 835E  3F3A 7DEC 4E69 FC9C 83D7
uid                  Johannes Schlüter &lt;johannes@schlueters.de&gt;
uid                  Johannes Schlüter &lt;johannes@php.net&gt;
GPG
);
