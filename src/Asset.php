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
	 * asset uri.
	 *
	 * @return void
	 */
	public static function uri() {
		return SLIMSLIDER_URL . 'assets';
	}

}
