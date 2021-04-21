<?php

namespace SlimSlider\Admin;

final class SliderAdmin {

	use StylesTrait, ContentTrait;

	/**
	 * Page title.
	 *
	 * @var string .
	 */
	protected $admin_title;

	/**
	 * The main __construct.
	 *
	 * @param string $title the page title.
	 */
	public function __construct( $title ) {
		$this->admin_title = $title;
		add_action( 'admin_menu', [ $this, 'add_page' ], 99 );
	}

	/**
	 * Getting Started.
	 */
	public function add_page() {
		add_submenu_page(
			'edit.php?post_type=slimslide',
			'Slim Slider Setup',
			'Get Started',
			'manage_options',
			'slim-slider-shortcode',
			[ $this, 'settings_page' ]
		);
	}

	/**
	 * Page.
	 */
	public function settings_page() {
		$this->styles();
		$this->header();
		$this->content();
		$this->footer();
	}

	/**
	 * Page header.
	 */
	protected function header() {
		?>
		<div id="slsl-important-notice" style="background-color:#569769;">
			<span class="slsl-notice-message">
			    <!-- notes -->
			</span>
		</div>
		<header class="slsl-header">
			<h2>Slim Slider: Getting Started </h2>
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
	protected function footer() {
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
