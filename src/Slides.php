<?php

namespace SlimSlider;

class Slides
{
	/**
	 * Shortcode $args
	 *
	 * @var array
	 */
	protected $args = [];

	/**
	 * Start here.
	 *
	 * @param array $args uses shortcode $atts.
	 */
	public function __construct( $args ) {
		/*
		 *  $id    string    90456  : uniqid for the current slider
		 *  $w     string    1920   : slider width
		 *  $h     string    600    : slider height
		 *  $nav   string    b      : slider nav a=arrows and b=bullets or "ab"
		 *  $nav   string    slides : list of slides "1,2,5,6"
		 */
		$this->args = $args;

		// pass on the args to slimslider.js.
		wp_localize_script( 'slim-slider', 'SlimSliderData', $this->args );

	}

	/**
	 * Init.
	 *
	 * @param array $args uses shortcode $atts.
	 *
	 * @return Slides
	 */
	public static function init( $args ) {
		return new self( $args );
	}

	/**
	 * Get Slide meta info.
	 *
	 * @param int $id slide item ID.
	 * @return array
	 */
	public function slide_data( $id ) {
		return ( new Slider() )->get_slide( $id );
	}

	/**
	 * Setup the main slider.
	 *
	 * @return string
	 */
	public function slider_main() {
		return sprintf(
			'<div id="slim_slider_main_%6$s" style="position:relative;margin:0 auto;top:0px;left:0px;width:%1$spx;height:%2$spx;overflow:hidden;visibility:hidden;">
		        <div data-u="loading" class="slimslrl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
		            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="%3$s/svg/loading/static-svg/spin.svg" />
		    </div> %4$s %5$s</div>',
			$this->args['width'],
			$this->args['height'],
			Asset::uri(),
			$this->image_slides(),
			Navigation::get( $this->args ),
			$this->args['id']
		);
	}

	/**
	 * Slides.
	 *
	 * Get slides by ID, if not just use the slides defined.
	 *
	 * @return array
	 */
	public function get_slides() {
		if ( empty( $this->args['slides'] ) ) {
			return array_keys( SlimSlide::slides() );
		}
		return explode( ',', $this->args['slides'] );
	}

	/**
	 * Slide Images.
	 *
	 * @return string
	 */
	public function images() {

		$slider_image = '';
		foreach ( $this->get_slides() as $slide ) {

			$slide = intval( $slide );
			$meta = $this->slide_data( $slide );

		    if ( is_null( $meta['url'] ) || empty( $meta['url'] ) ) {
		        $slider_image .= '<div><img data-u="image" alt="' . $meta['alt'] . '" src="' . wp_get_attachment_url( $meta['thumbnail'] ) . '" /></div>';
		    } else {
				$slider_image .= '<div><a href="' . $meta['url'] . '"><img data-u="image" alt="' . $meta['alt'] . '" src="' . wp_get_attachment_url( $meta['thumbnail'] ) . '" /></a></div>';
		    }
	    }
		return $slider_image;
	}

	/**
	 * Image container.
	 *
	 * @return string
	 */
	public function image_slides() {
		return sprintf(
			'<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:%1$spx;height:%2$spx;overflow:hidden;">
				%3$s
			</div>',
			$this->args['width'],
			$this->args['height'],
			$this->images()
		);
	}

	/**
	 * Get the Slider.
	 */
	public function get() {
        return $this->slider_main();
	}

}
