<?php

namespace SlimSlider\MetaView;

use DevUri\Meta\Settings;

class Slide extends Settings
{
	/**
	 * List of protocols to allow in url.
	 *
	 * @var array
	 */
	public static $allowed_protocols = [ 'http', 'https' ];

    /**
     * Lets build out the metabox settings
     *
     * @param array $get_meta .
     */
	public function settings( $get_meta ): void
	{
		echo self::the_id(); // @codingStandardsIgnoreLine
		echo self::thumbnail(); // @codingStandardsIgnoreLine
		echo self::form()->input( 'Heading', self::meta( 'heading', $get_meta ) ); // @codingStandardsIgnoreLine
		echo self::form()->input( 'Alt Text', self::meta( 'alt', $get_meta ) ); // @codingStandardsIgnoreLine
		echo self::form()->textarea( 'Description', self::meta( 'description', $get_meta ) ); // @codingStandardsIgnoreLine
		echo self::form()->input( 'URL', self::meta( 'url', $get_meta ) ); // @codingStandardsIgnoreLine
	}

    /**
     * Lets build out the data settings
     *
     * @param array $post_data .
     * @return array
     */
	public function data( $post_data ): array
	{
		$data['heading']     = sanitize_textarea_field( $post_data['heading'] );
		$data['alt']         = sanitize_textarea_field( $post_data['alt_text'] );
		$data['description'] = sanitize_textarea_field( $post_data['description_textarea'] );
		$data['url']         = esc_url_raw( $post_data['url'], self::$allowed_protocols );
		return $data;
	}
}
