<?php

namespace SlimSlider;

/**
 * Navigation
 */
class Navigation
{

	/**
	 * Navigator
	 */
	public static function get( $args ) {

		// Bullet Navigator.
		if ( $args['navtype'] === 'b' && $args['nav'] === 1 ) {
			return self::bullet_nav();
		}

		// Arrow Navigator.
		if ( $args['navtype'] === 'a'  && $args['nav'] === 1) {
			return self::arrow_nav();
		}

	}

	/**
	 * Bullet Navigator
	 *
	 * @return string
	 */
	public static function bullet_nav() {
		return '<div data-u="navigator" class="slimslb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
				<div data-u="prototype" class="i" style="width:16px;height:16px;">
					<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<circle class="b" cx="8000" cy="8000" r="5800"></circle>
					</svg>
				</div>
			</div>';
	}

	/**
	 * Arrow Navigator
	 *
	 * @return string
	 */
	public static function arrow_nav() {
		return '<div data-u="arrowleft" class="slimsla051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
					<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
					</svg>
				</div>
				<div data-u="arrowright" class="slimsla051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
					<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
						<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
					</svg>
			</div>';
	}
}
