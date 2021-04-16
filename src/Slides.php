<?php

namespace SlimSlider;

class Slides
{

	public static function slide_data( $id ){
		return ( new Slider())->get_slide($id);
	}

	public static function slider_main( $args ){
		return sprintf(
			'<div id="slim_slider_main" style="position:relative;margin:0 auto;top:0px;left:0px;width:%1$spx;height:%2$spx;overflow:hidden;visibility:hidden;">
		        <div data-u="loading" class="slimslrl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
		            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="%2$s/svg/loading/static-svg/spin.svg" />
		    </div> %4$s %5$s',
			$args['width'],
			$args['height'],
			Asset::uri(),
			self::image_slides( $args ),
			Navigation::get( $args )
		);
	}

	public static function images( $args ){
		foreach ( self::get_slides( $args ) as $slide ) {

			$slide = intval($slide);
			$slide_data = self::slide_data($slide);

		    if ( is_null( $slide_data['url'] ) || empty( $slide_data['url'] ) ) {
		        $slider_image .= '<div><img data-u="image" src="'.wp_get_attachment_url( $slide_data['thumbnail'] ).'" /></div>';
		    } else {
				$slider_image .= '<div><a href="'.$slide_data['url'].'"><img data-u="image" src="'.wp_get_attachment_url( $slide_data['thumbnail'] ).'" /></a></div>';

		    }
	    }
		return $slider_image;
	}

	public static function image_slides( $args ){
		return sprintf(
			'<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:%1$spx;height:%1$spx;overflow:hidden;">
				%3$s
			</div>',
			$args['width'],
			$args['height'],
			self::images($args)
		);
	}

	public static function get_slides( $args ) {
		return explode( ",", $args['slides'] );
	}

	/*
	* Slider Function
	*  $w     string    1920  : slider width
	*  $h     string    600   : slider height
	*  $ntype string    b     : slider navigation a=arrows and b=bullets
	*  $nav   boolean   1     : show slider navigation 0 for no 1 for yes
	*/
	public static function get( $args = array() ){

		$defaults = array(
			'id'      => '904562',
			'width'   => '1920',
			'height'  => '740',
			'navtype' => 'b',
			'nav'     => 1,
			'slides'  => array(),
		  );
		$args = wp_parse_args( $args, $defaults );

	    return self::slider_main( $args );

	}

}
