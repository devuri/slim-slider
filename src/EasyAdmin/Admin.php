<?php

namespace SlimSlider\EasyAdmin;

final class Admin {

	/**
	 * Page title.
	 *
	 * @var object.
	 */
	protected $admin_page;

	/**
	 * Parent slug.
	 *
	 * @var string .
	 */
	protected $parent_slug;

	/**
	 * The main __construct.
	 *
	 * @param AdminPage $page the page object.
	 */
	public function __construct( AdminPage $page ) {
		if ( ! is_admin() ) return false;
		$this->admin_page  = $page;
		$this->parent_slug = $page->get_parent_slug();

		if ( is_null( $this->parent_slug ) ) {
			add_menu_page( 'admin_menu', [ $this, 'menu_page' ], 99 );
		} else {
			add_action( 'admin_menu', [ $this, 'submenu_page' ], 99 );
		}

	}

	/**
	 * Getting Started.
	 */
	public function submenu_page() {
		add_submenu_page(
			$this->parent_slug,
			'Slim Slider Setup',
			'Get Started',
			$this->admin_page->capability,
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
