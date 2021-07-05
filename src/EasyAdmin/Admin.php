<?php

namespace SlimSlider\EasyAdmin;

final class Admin {

	/**
	 * Page title.
	 *
	 * @var string .
	 */
	protected $admin_page;

	/**
	 * The main __construct.
	 *
	 * @param AdminPage $page the page object.
	 */
	public function __construct( AdminPage $page ) {
		if ( ! is_admin() ) return false;
		$this->admin_page = $page;
		add_action( 'admin_menu', [ $this, 'submenu_page' ], 99 );
	}

	/**
	 * Getting Started.
	 */
	public function submenu_page() {
		add_submenu_page(
			'edit.php?post_type=slimslide',
			'Slim Slider Setup',
			'Get Started',
			'manage_options',
			$this->admin_page->page_slug,
			[ $this, 'settings_page' ]
		);
	}

	/**
	 * Page.
	 */
	public function settings_page() {
		$this->admin_page->header();
		do_action( 'esa_before_content' );
		$this->admin_page->content();
		do_action( 'esa_after_content' );
		$this->admin_page->footer();
	}

}
