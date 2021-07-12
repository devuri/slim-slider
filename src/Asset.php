<?php

namespace SlimSlider;

/**
 * The sim Asset class.
 *
 * @package sim
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
	public static function uri(): string {
		return SLIMSLIDER_URL . 'assets';
	}

}
