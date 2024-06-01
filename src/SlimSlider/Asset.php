<?php

namespace SlimSlider;

/**
 * The sim Asset class.
 */
trait Asset
{
    /**
     * Asset uri.
     *
     * @psalm-suppress
     *
     * @return string
     */
    public static function uri(): string
    {
        // @phpstan-ignore-next-line.
        return SLIMSLIDER_URL . 'assets';
    }
}
