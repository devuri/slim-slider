<?php

namespace SlimSlider\CtpMeta;

use Exception;
use ReflectionClass;
use SlimSlider\CtpMeta\Traits\Form;
use SlimSlider\CtpMeta\Traits\StyleTrait;

class MetaBox
{
    use Form;
    use StyleTrait;

    /**
     * Get the Post Types.
     *
     * @var string
     */
    public $post_type;

    /**
     * Get the $settings.
     *
     * @var string
     */
    public $settings;

    // data.
    protected $data = [];

    // meta name.
    protected $meta;

    /**
     * @var array
     */
    private $args;

    /**
     * Setup.
     *
     * @param Settings $settings
     * @param bool     $args
     */
    public function __construct( Settings $settings, $args = true )
    {
        $this->args = $this->set_args( $args );

        $this->settings  = $settings;
        $this->post_type = sanitize_title( $settings->post_type );

        // build the metabox.
        add_action( 'add_meta_boxes', [ $this, 'create_metabox' ] );
        add_action( 'save_post', [ $this, 'save_data' ] );

        // define meta name.
        $this->meta = $this->meta_name();
    }

    /**
     * Metabox build.
     *
     * @return Settings settings
     */
    public function build(): Settings
    {
        return $this->settings;
    }

    /**
     * Retrieves a post type object by name.
     *
     * @return WP_Post_Type object if it exists, null otherwise.
     *
     * @see https://developer.wordpress.org/reference/functions/get_post_type_object/
     */
    public function post_type_data()
    {
        return get_post_type_object( $this->post_type );
    }

    /**
     * Register meta.
     *
     * @see https://developer.wordpress.org/reference/functions/add_meta_box/
     */
    public function create_metabox(): void
    {
        $meta_id    = $this->meta . '-meta-box';
        $meta_label = ucfirst( $this->meta );

        add_meta_box(
            $meta_id,
            $meta_label,
            [ $this, 'render_metabox' ],
            $this->post_type
        );
    }

    /**
     * Meta box display callback.
     *
     * @param WP_Post $post Current post object.
     */
    public function render_metabox( $post ): void
    {
        $this->table_style( $this->args );

        ?>
		<div id="post-meta-form" style="margin: -12px;">
			<?php
                echo self::form()->table( 'open' );

			/**
			 * Get meta data.
			 */
			$get_meta = get_post_meta( $post->ID, $this->meta . '_meta', true );
			if ( empty( $get_meta ) ) {
				$get_meta = [];
			}

			/**
			 * Settings.
			 */
			try {
				$this->build()->settings( $get_meta );
			} catch ( Exception $e ) {
				print 'Exception Message: ' . $e->getMessage();
			}

			echo self::form()->table( 'close' );
			self::form()->nonce();
			?>
	   </div>
		<?php
    }

    /**
     * Save Data.
     *
     * @param int $post_id .
     *
     * @return void
     */
    public function save_data( int $post_id ): void
    {
        if ( \defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        global $post;

        if ( ! \is_object( $post ) ) {
            return;
        }

        if ( $post->post_type != $this->post_type ) {
            return;
        }

        if ( ! self::form()->verify_nonce() ) {
            return;
        }

        // data to save.
        $this->data = $this->build()->data( $_POST );

        /**
         * Updates the post meta field.
         *
         * $data is saved as a single array of key val pairs.
         * example movies_meta[]
         *
         * @var
         */
        update_post_meta( $post_id, $this->meta . '_meta', $this->data );
    }

    /**
     * Set args.
     *
     * @param mixed $args
     *
     * @return array .
     */
    protected function set_args( $args ): array
    {
        if ( ! \is_array( $args ) ) {
            $args = [ 'striped' => $args ];
        }

        return $args;
    }

    /**
     * Set Meta Name based on class name.
     *
     * @return string the class name.
     */
    protected function meta_name(): ?string
    {
        try {
            $class = new ReflectionClass( $this->settings );
        } catch ( Exception $e ) {
            print $e;

            return null;
        }

        return sanitize_title( $class->getShortName() );
    }
}
