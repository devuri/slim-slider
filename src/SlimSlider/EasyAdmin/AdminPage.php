<?php

namespace SlimSlider\EasyAdmin;

abstract class AdminPage implements AdminPageInterface
{
    use ParamTrait;
    use StylesTrait;

    /**
     * The main __construct.
     *
     * @param string $title       the page title.
     * @param bool   $page_styles the page css styles.
     */
    public function __construct( $title, $page_styles = true )
    {
        $this->page_title = $title;
        $this->page_slug  = sanitize_title( $title );

        // load css styles.
        if ( $page_styles ) {
            add_action( 'esa_head', [ $this, 'page_styles' ] );
        }
    }

    /**
     * Set the parent slug.
     *
     * @param string $parent_slug the parent slug.
     *
     * @return void .
     */
    public function set_parent_slug( $parent_slug ): void
    {
        $this->parent_slug = $parent_slug;
    }

    /**
     * Get the parent slug.
     *
     * @return null|string the slug.
     */
    public function get_parent_slug(): ?string
    {
        return $this->parent_slug;
    }

    /**
     * Page Content.
     */
    abstract public function content();

    /**
     * Page header.
     */
    public function header(): void
    {
        do_action( 'esa_head' ); ?>
		<!-- <div id="slsl-important-notice" style="background-color:#569769;"> -->
		<div id="slsl-important-notice" style="background-color:<?php echo esc_attr( $this->mcolor ); ?>;">
			<span class="slsl-notice-message">
				<?php do_action( 'esa_header_message' ); ?>
			</span>
		</div>
		<header class="slsl-header">
			<h2><?php echo wp_kses_post( $this->page_title ); ?></h2>
			<?php do_action( 'esa_html_header' ); ?>
		</header>
		<div class="wrap">
		</div><!---admin notices -->
			<div class="slsl-container">
			  	<div class="slsl-child">
			<div class="slsl-grid-item">
			    <div class="slsl-padding">
			<p><!---innner paragraph -->
		<?php
    }

    /**
     * Page Footer.
     */
    public function footer(): void
    {
        ?>
		</p><!---innner paragraph -->
			</div><!---slsl-padding -->
				</div><!---slsl-grid-item -->
			</div><!---slsl-padding -->
		</div><!--slsl-container-->
		<div style="padding-left: 20px; padding-right: 40px;color: #b9b9b9;font-weight: 300;" class="">
			<hr/>
				<?php bloginfo( 'name' ); ?>
			<small> Admin GUI | Version</small>
		</div>
		<?php
    }
}
