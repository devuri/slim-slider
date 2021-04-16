<?php

namespace SlimSlider;

class Slides
{

	use Asset;

	/**
	 * Define Version
	 */
	const VERSION = '0.3.0';

	protected $args = [];

	/**
	 * start here.
	 * @param array $args uses shortcode $atts
	 */
	public function __construct( $args ) {

		/*
		 *  $id    string    90456 : uniqid for the current slider
		 *  $w     string    1920  : slider width
		 *  $h     string    600   : slider height
		 *  $ntype string    b     : slider navigation a=arrows and b=bullets
		 *  $nav   boolean   1     : show slider navigation 0 for no 1 for yes
		 */
		$defaults = array(
			'id'      => '904562',
			'width'   => '1920',
			'height'  => '740',
			'navtype' => 'b',
			'nav'     => 1,
			'slides'  => array(),
		);
		$this->args = wp_parse_args( $args, $defaults );

	}

	/**
	 * init.
	 *
	 * @param array $args uses shortcode $atts
	 *
	 * @return Slides
	 */
	public function init( $args ){
		return new self( $args );
	}

	public function slide_data( $id ){
		return ( new Slider())->get_slide($id);
	}


	public function slider_main(){
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

	public function images(){
		foreach ( $this->get_slides() as $slide ) {

			$slide = intval($slide);
			$slide_data = $this->slide_data($slide);

		    if ( is_null( $slide_data['url'] ) || empty( $slide_data['url'] ) ) {
		        $slider_image .= '<div><img data-u="image" src="'.wp_get_attachment_url( $slide_data['thumbnail'] ).'" /></div>';
		    } else {
				$slider_image .= '<div><a href="'.$slide_data['url'].'"><img data-u="image" src="'.wp_get_attachment_url( $slide_data['thumbnail'] ).'" /></a></div>';

		    }
	    }
		return $slider_image;
	}

	public function image_slides(){
		return sprintf(
			'<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:%1$spx;height:%1$spx;overflow:hidden;">
				%3$s
			</div>',
			$this->args['width'],
			$this->args['height'],
			$this->images()
		);
	}

	public function get_slides() {
		return explode( ",", $this->args['slides'] );
	}

	/*
	 * Get the Slider.
	 */
	public function get(){
		wp_enqueue_script( 'slim-slider-init', Asset::uri() . '/js/init.js', array( 'jquery' ), self::VERSION, true );
		wp_localize_script( 'slim-slider-init', 'SlimSliderData', $this->args );
	    return $this->slider_main();
	}


}
