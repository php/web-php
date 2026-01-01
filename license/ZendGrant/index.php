<?php
$_SERVER['BASE_PAGE'] = 'license/ZendGrant/index.php';
include_once __DIR__ . '/../../include/prepend.inc';

$SIDEBAR_DATA = <<<EOF
<aside>
    <h3>Exhibit 1</h3>

    <ul>
        <li><a href="/license/ZendGrant/ZendGrant3.png">Page 1</a></li>
        <li><a href="/license/ZendGrant/ZendGrant4.png">Page 2</a></li>
    </ul>

    <h3>Exhibit 2</h3>

    <ul>
        <li><a href="/license/ZendGrant/ZendGrant5.png">Page 1</a></li>
    </ul>

    <h3>Exhibit 3</h3>

    <ul>
        <li><a href="/license/ZendGrant/ZendGrant6.png">Page 1</a></li>
        <li><a href="/license/ZendGrant/ZendGrant7.png">Page 2</a></li>
    </ul>

    <h3>Resources</h3>

    <ul>
        <li><a href="/license/ZendGrant/ZendGrant.pdf">Zend Grant (PDF)</a></li>
        <li><a href="/license/ZendGrant/PHPAssociation.pdf">PHP Association Articles (PDF)</a></li>
    </ul>
</aside>
EOF;

site_header("Zend Grant", ["current" => "help"]);
?>

<h1>Zend Grant</h1>

<p>
    Zend Technologies, Ltd.<br>
    Jabotinski 35, Ramat Gan<br>
    Israel
</p>

<p>May 22, 2000</p>

<p>
    PHP Association<br>
    Nebraska
</p>

<p>Re: <u>Zend Engine</u></p>

<p>
    As you know, Zend Technologies, Ltd. ("Zend") remains deeply committed to the advancement and
    proliferation of PHP as an open source web scripting language. Zend currently makes its Zend Engine
    software available, as a standalone product, under the open-source agreement that may be found at
    https://www.zend.com/license/ZendLicense.txt (the "Zend Open Source License", a copy of which is
    attached as Exhibit 1). Since Zend Engine is a crucial component of PHP, Zend hereby makes the following
    commitments and assurances to The PHP Association (the "Association"):
</p>

<ul>
    <li>
        <p>
            Zend will continue to make Zend Engine available as an open source product under the Zend
            Open Source License. If Zend changes the terms of the Zend Open Source License, the new
            license will be consistent with the Open Source Definition of the Open Source Initiative (see
            https://opensource.org/osd.html, a copy of which is attached as Exhibit 2).
        </p>
    </li>
    <li>
        <p>
            Without limitation of the license to Zend Engine granted to all users under the Zend Open
            Source License, the PHP Association is hereby authorized to market, distribute and sublicense
            Zend Engine, in source and object code forms, as an integrated component of PHP, to end users
            who agree to be bound by the PHP open-source license, version 2.02, in the form attached
            hereto as Exhibit 3 (the "PHP Open Source License"). However, if Zend Engine is either
            modified or separated from the rest of PHP, the use of the modified or separated Zend Engine
            shall not be governed by the PHP Open Source License, but instead shall be governed by the
            Zend Open Source License.
        </p>
    </li>
</ul>

<p>The following additional terms shall apply:</p>

<p>
    1. <u>Ownership</u>. As between Zend and the Association, Zend shall retain all rights, title and interest in
    and to the Zend Engine, including but not limited to, all patents, copyrights, trade secret rights, and any
    other intellectual property rights inherent therein or appurtenant thereto. The Association will not delete or
    alter any intellectual property rights or license notices appearing on the Zend Engine and will reproduce and
    display such notices on each copy it makes of the Zend Engine. The Association's rights in and to the Zend
    Engine are limited to those expressly granted in this Letter. All other rights are reserved by Zend.
</p>

<p>
    2. <u>Trademarks</u>. The Association may display Zend's trademarks and trade names in connection with
    the marketing and distribution of PHP (as integrated with the Zend Engine), subject to Zend's then-current
    trademark policies. Without limitation of the foregoing, the advertisement or other marketing material used
    by the Association shall not misrepresent any of the technical features or capabilities of the Zend Engine.
</p>

<p>
    3. <u>DISCLAIMER OF WARRANTY</u>. THE ASSOCIATION ACKNOWLEDGES THAT THE ZEND ENGINE IS BEING LICENSED HEREUNDER ON
    AN "AS-IS" BASIS WITH NO WARRANTY WHATSOEVER. THE ASSOCIATION ACKNOWLEDGES THAT ITS USE AND DISTRIBUTION OF THE ZEND
    ENGINE AND THE INTEGRATED PRODUCT IS AT ITS OWN RISK. ZEND AND ITS LICENSORS MAKE, AND THE ASSOCIATION RECEIVES, NO
    WARRANTIES, EXPRESS, IMPLIED, OR OTHERWISE. ZEND EXPRESSLY DISCLAIMS ANY IMPLIED WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT: ZEND DOES NOT WARRANT THAT THE OPERATION OF THE ZEND ENGINE
    OR THE INTEGRATED PRODUCT SHALL BE OPERABLE, UNINTERRUPTED OR ERROR FREE OR THAT IT WILL FUNCTION OR OPERATE IN
    CONJUNCTION WITH ANY OTHER PRODUCT, INCLUDING, WITHOUT LIMITATION, PHP OR ANY VERSION THEREOF.
</p>

<p>
    4. <u>LIMITATIONS OF LIABILITY</u>. IN NO EVENT WILL ZEND BE LIABLE TO THE ASSOCIATION, END USERS OF PHP OR ANY
    OTHER PARTY FOR ANY SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING TO THIS LETTER, WHETHER
    BASED ON BREACH OF CONTRACT, TORT (INCLUDING NEGLIGENCE), PRODUCT LIABILITY, OR OTHERWISE, AND WHETHER OR NOT ZEND
    HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. WITHOUT LIMITATION OF THE FOREGOING, UNDER NO CIRCUMSTANCES
    SHALL ZEND'S TOTAL AGGREGATE LIABILITY UNDER THIS LETTER TO ALL PARTIES, IN THE AGGREGATE, EXCEED ONE HUNDRED
    DOLLARS ($100). The parties have agreed that the limitations specified in this Section will survive and apply even
    if any limited remedy specified in this Letter is found to have failed of its essential purpose.
</p>

<p>
    5. <u>GENERAL</u>. The Association may not assign this Letter, by operation of law or otherwise in whole
    or in part, without Zend's written consent. Any attempt to assign this Letter without such consent will be
    null and void. This Letter will bind and inure to the benefit of each party's permitted successors and assigns.
    This Letter will be governed by and construed in accordance with the laws of the State of New York. Any
    suit hereunder will be brought solely in the federal or state courts in New York State, New York County and
    both parties hereby submit to the personal jurisdiction thereof. If any provision of this Letter is found
    invalid or unenforceable, that provision will be enforced to the maximum extent permissible, and the other
    provisions of this Letter will remain in force. All notices under this Letter will be deemed given when
    delivered personally, sent by confirmed facsimile transmission, or sent by certified or registered U.S. mail or
    nationally-recognized express courier, return receipt requested, to the address shown above or as may
    otherwise be specified by either party to the other in accordance with this section. The parties to this Letter
    are independent contractors. There is no relationship of partnership, joint venture, employment, franchise,
    or agency between the parties. Neither party will have the power to bind the other or incur obligations on
    the other's behalf without the other's prior written consent. No failure of either party to exercise or enforce
    any of its rights under this Letter will act as a waiver of such rights. This Letter and its attachment are the
    complete and exclusive agreement between the parties with respect to the subject matter hereof, superseding
    and replacing any and all prior agreements, communications, and understandings (both written and oral)
    regarding such subject matter. This Letter may only be modified, or any rights under it waived, by a written
    document executed by both parties.
</p>

<p>
    If the foregoing is acceptable to you, please sign this and the duplicate original of this Letter where
    indicated below and return it to me at the above address.
</p>

<p>
    Sincerely,<br>
    ZEND TECHNOLOGIES, LTD.
</p>

<?php site_footer(['sidebar' => $SIDEBAR_DATA]);
