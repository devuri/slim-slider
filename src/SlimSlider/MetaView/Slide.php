<?php

namespace SlimSlider\MetaView;

use SlimSlider\CtpMeta\Settings;

class Slide extends Settings
{
    /**
     * List of protocols to allow in url.
     *
     * @var array
     */
    public static $allowed_protocols = [ 'http', 'https' ];

    /**
     * Lets build out the metabox settings.
     *
     * @param array $get_meta .
     */
    public function settings( $get_meta ): void
    {
        echo self::the_id();
        echo self::thumbnail();
        echo self::form()->input( 'Heading', self::meta( 'heading', $get_meta ) );
        echo self::form()->input( 'Alt Text', self::meta( 'alt', $get_meta ) );
        echo self::form()->textarea( 'Description', self::meta( 'description', $get_meta ) );
        echo self::form()->input( 'URL', self::meta( 'url', $get_meta ) );
        echo self::form()->input( 'OnClick', self::meta( 'onclick', $get_meta ) );
    }

    /**
     * Lets build out the data settings.
     *
     * @param array $post_data $_POST variable items should be cleaned.
     *
     * @return array
     */
    public function data( $post_data ): array
    {
        return [
            'heading'     => sanitize_textarea_field( $post_data['heading'] ),
            'alt'         => sanitize_textarea_field( $post_data['alt_text'] ),
            'description' => sanitize_textarea_field( $post_data['description_textarea'] ),
            'url'         => esc_url_raw( $post_data['url'], self::$allowed_protocols ),
            'onclick'     => sanitize_textarea_field( $post_data['onclick'] ),
        ];
    }
}
