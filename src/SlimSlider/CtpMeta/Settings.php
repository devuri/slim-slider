<?php

namespace SlimSlider\CtpMeta;

use Exception;
use SlimSlider\CtpMeta\Contracts\SettingsInterface;
use SlimSlider\CtpMeta\Traits\Form;
use SlimSlider\CtpMeta\Traits\MetaTrait;

abstract class Settings implements SettingsInterface
{
    use Form;
    use MetaTrait;

    /**
     * Get the Post Types.
     *
     * @var string
     */
    public $post_type;

    /**
     * List of input fields.
     *
     * @var array .
     */
    protected $fields = [];

    /**
     * Setup.
     *
     * @param null|string $post_type .
     *
     * @throws Exception
     */
    public function __construct( string $post_type )
    {
        if ( \is_null( $post_type ) || empty( $post_type ) ) {
            throw new Exception( 'Please check post type param: ' . $post_type );
        }
        $this->post_type = $post_type;
    }

    /**
     * Lets build out the metabox settings.
     *
     * @param $get_meta
     */
    abstract public function settings( $get_meta );

    /**
     * Lets get the build data.
     *
     * @param $post_data
     */
    abstract public function data( $post_data );
}
