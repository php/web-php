<?php

namespace phpweb\Themes;

readonly class SVG
{
    public function __construct(private string $content)
    {
    }

    public function format(?string $style = null, ?string $cssClass = null): string
    {
        $replacements = [];

        if ($style !== null) {
            $replacements['style=""'] = 'style="' . $style . '"';
        }

        if ($cssClass !== null) {
            $replacements['class=""'] = 'class="' . $cssClass . '"';
        }

        return str_replace(array_keys($replacements), array_values($replacements), $this->content);
    }
}
