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
	 * @return string
     */
	public static function uri() {
		return SLIMSLIDER_URL . 'assets';
	}

}
