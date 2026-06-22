<?php

namespace phpweb\Themes;

use phpweb\Utils;

class ThemeRenderer
{
    /**
     * @param ClickableCard[] $cards
     */
    public function clickableCards(
        array $cards,
        int $width = 340,
        string $id = '',
        ?int $shuffleLimit = null,
        string $cssClass = 'gst-default-card',
        string $cssImage = 'gst-card-title-icon',
    ): string {
        return Utils::bufferOutput(function () use ($cards, $width, $id, $shuffleLimit, $cssClass, $cssImage): void { ?>
            <ul class="gst-cgrid" style="grid-template-columns: repeat(auto-fit, minmax(<?= $width ?>px, 1fr));)" id="<?= $id ?>">
                <?php foreach ($cards as $card) { ?>
                    <li class="gst-cgrid-card gst-card gst-navcard <?= $cssClass ?> gst-apply-theme">
                        <div style="position: absolute; top: 0; right: 0; padding-top: 0.25em; padding-right: 0.25em">
                            <svg class="gst-navcard-indicator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M480 96C515.3 96 544 124.7 544 160L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 160C96 124.7 124.7 96 160 96L480 96zM368 360C368 373.3 378.7 384 392 384C405.3 384 416 373.3 416 360L416 248C416 234.7 405.3 224 392 224L280 224C266.7 224 256 234.7 256 248C256 261.3 266.7 272 280 272L334.1 272L231.1 375C221.7 384.4 221.7 399.6 231.1 408.9C240.5 418.2 255.7 418.3 265 408.9L368 305.9L368 360z"/></svg>
                        </div>
                        <div class="gst-card-title">
                            <?php if ($card->image) { ?>
                                <img src="<?= $this->safe($card->image) ?>"
                                     class="<?= $cssImage ?>"
                                     aria-hidden="true" alt=""/>
                            <?php } ?>

                            <div role="heading" id="<?= $id ?>-title-text" class="gst-navcard-title-text" style="flex: 1 0 200px">
                                <a class="plaina gst-navcard-title-link" aria-describedby="<?= $id ?>-content-text" href="<?= $this->safe($card->href) ?>"><?= $this->safe($card->title) ?></a>
                            </div>
                        </div>
                        <div class="gst-card-content" id="<?= $id ?>-content-text">
                            <?= $this->safe($card->body) ?>
                        </div>

                        <?php if ($card->href_label) { ?>
                            <div class="gst-card-footer" style="text-align: right">
                                <span class="gst-accent"><?= $this->safe($card->href_label) ?></span>
                            </div>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const parent = document.querySelector('#<?= $id ?>');

                    <?php if ($shuffleLimit !== null) { ?>
                    GstCardHelpers.shuffleDOMChildrenWithLimit(parent, <?= $shuffleLimit ?>);
                    <?php } ?>

                    GstCardHelpers.dynamicAlignment(parent, <?= $width ?>);
                });
            </script>
            <?php
        });
    }

    public function sectionHeader(string $title, string $subtitle = ''): string
    {
        return Utils::bufferOutput(function () use ($title, $subtitle): void { ?>
            <hgroup class="gst-section-title">
                <h2><?= $this->safe($title) ?></h2>

                <?php if (!empty($subtitle)) { ?>
                    <p><?= $this->safe($subtitle) ?></p>
                <?php } ?>
            </hgroup>
            <?php
        });
    }

    private function safe(string|int|float $value): string
    {
        return htmlspecialchars((string)$value);
    }
}
