<?php

namespace SlimSlider\EasyAdmin;

abstract class AdminPage
{
	use StylesTrait;

	/**
	 * Page title.
	 *
	 * @var string .
	 */
	public $page_title;

	/**
	 * Page slug.
	 *
	 * @var string .
	 */
	public $page_slug;

	/**
	 * The main __construct.
	 *
	 * @param string $title the page title.
	 */
	public function __construct( $title, $page_styles = true ) {
		$this->page_title = $title;
		$this->page_slug = sanitize_title( $title );

		// load css styles.
		if ( $page_styles ) {
			add_action( 'esa_head', [ $this, 'page_styles' ] );
		}

	}

	/**
	 * Page Content.
	 */
	abstract function content();

	/**
	 * Page header.
	 */
	public function header() {
		do_action( 'esa_head' );
		?>
		<div id="slsl-important-notice" style="background-color:#569769;">
			<span class="slsl-notice-message">
				<?php do_action( 'esa_header_message' ); ?>
			</span>
		</div>
		<header class="slsl-header">
			<h2><?php echo sanitize_text_field( $this->page_title ) ?></h2>
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
	public function footer() {
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
