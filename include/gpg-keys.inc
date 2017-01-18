<?php
// GPG keys used for signing releases.
$GPG_KEYS = array(
/*pub   2048R/22FE5A12 2015-07-07 [expires: 2020-07-05]
      Key fingerprint = D620 173D 6924 BA1C 2244  C7C4 1B6B 6676 22FE 5A12
uid                  Kalle Sommer Nielsen (PHP) &lt;kalle@php.net&gt;
*/
    "7.1" => <<< GPG
pub   4096R/7BD5DCD0 2016-05-07
      Key fingerprint = A917 B1EC DA84 AEC2 B568 FED6 F50A BC80 7BD5 DCD0
uid                  Davey Shafik &lt;davey@php.net&gt;

pub   2048R/31CBD89E 2016-12-08
      Key fingerprint = 5289 95BF EDFB A719 1D46  839E F9BA 0ADA 31CB D89E
uid                  Joe Watkins &lt;krakjoe@php.net&gt;

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
