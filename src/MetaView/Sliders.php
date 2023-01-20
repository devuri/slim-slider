<?php

namespace SlimSlider\MetaView;

use DevUri\Meta\Settings;

class Sliders extends Settings
{
    /**
     * Lets build out the metabox settings
     *
     * @param array $get_meta .
     */
    public function settings($get_meta): void
    {
        echo self::the_id();

        $slides = self::meta('slides', $get_meta);

        echo self::slide_images($slides);

        echo self::form()->input('Slides', self::meta('slides', $get_meta));
    }

    /**
     * Lets build out the data settings
     *
     * @param array $post_data $_POST variable items should be cleaned.
     * @return array
     */
    public function data($post_data): array
    {
        return array(
            'slides' => sanitize_textarea_field($post_data['slides']),
        );
    }

    /**
     * Get the images.
     */
    protected static function slide_images(string $images): ?string
    {
        if (empty($images)) {
            return false;
        }

        $images = explode(',', $images);

        if (1 === count($images)) {
            $images[] = 0;
        }

        $imagelist = '';

        foreach ($images as $ky => $post_id) {
            $img = (int) get_post_meta($post_id, '_thumbnail_id', true);
            $imagelist .= self::image_list($img);
        }

        if (empty($imagelist)) {
            return null;
        }

        return '<tr><th></th><td> '.$imagelist.'</td></tr>';
    }

    /**
     * Create Image.
     *
     * @param  int    $img_id
     * @return null|string
     */
    private static function image_list(int $img_id): ?string
    {
        if (! $img_id) {
            return null;
        }
        return '<img style="padding-right: 4px;" width="190" src="' . wp_get_attachment_url($img_id) . '" loading="lazy">';
    }
}
