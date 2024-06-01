<?php

namespace SlimSlider\MetaView;

use SlimSlider\CtpMeta\Settings;

class Sliders extends Settings
{
    /**
     * Lets build out the metabox settings.
     *
     * @param array $get_meta .
     */
    public function settings( $get_meta ): void
    {
        echo self::the_id();

        $slides = self::meta( 'slides', $get_meta );

        echo self::slide_images( $slides );

        echo self::form()->input( 'Slides', self::meta( 'slides', $get_meta ) );
        echo self::form()->input( 'Height', self::meta( 'height', $get_meta ) );
        echo self::form()->input( 'Width', self::meta( 'width', $get_meta ) );
        echo self::form()->input( 'Navigation', self::meta( 'nav', $get_meta ) );
        echo self::form()->input( 'Swipe Aimation Duration', self::meta( 'swipe_animation_duration', $get_meta ) );
        echo self::form()->input( 'Image Fill Mode', self::meta( 'image_fill_mode', $get_meta ) );
        echo self::form()->input( 'Transition Speed', self::meta( 'transition_speed', $get_meta ) );
        echo self::form()->input( 'Transition Opacity', self::meta( 'transition_opacity', $get_meta ) );
        echo self::form()->input( 'Speed', self::meta( 'speed', $get_meta ) );
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
            'slides'                   => sanitize_textarea_field( $post_data['slides'] ),
            'height'                   => sanitize_textarea_field( $post_data['height'] ),
            'width'                    => sanitize_textarea_field( $post_data['width'] ),
            'nav'                      => sanitize_textarea_field( $post_data['nav'] ),
            'swipe_animation_duration' => sanitize_textarea_field( $post_data['swipe_animation_duration'] ),
            'image_fill_mode'          => sanitize_textarea_field( $post_data['image_fill_mode'] ),
            'transition_speed'         => sanitize_textarea_field( $post_data['transition_speed'] ),
            'transition_opacity'       => sanitize_textarea_field( $post_data['transition_opacity'] ),
            'speed'                    => sanitize_textarea_field( $post_data['speed'] ),
        ];
    }

    /**
     * Get the images.
     */
    protected static function slide_images( string $images ): ?string
    {
        if ( empty( $images ) ) {
            return null;
        }

        $images = explode( ',', $images );

        if ( 1 === \count( $images ) ) {
            $images[] = 0;
        }

        $imagelist = '';

        foreach ( $images as $ky => $post_id ) {
            $img        = (int) get_post_meta( $post_id, '_thumbnail_id', true );
            $imagelist .= self::image_list( $img );
        }

        if ( empty( $imagelist ) ) {
            return null;
        }

        return '<tr><th></th><td> ' . $imagelist . '</td></tr>';
    }

    /**
     * Create Image.
     *
     * @param int $img_id
     *
     * @return null|string
     */
    private static function image_list( int $img_id ): ?string
    {
        if ( ! $img_id ) {
            return null;
        }

        return '<img style="padding-right: 4px;" width="190" src="' . wp_get_attachment_url( $img_id ) . '" loading="lazy">';
    }
}
