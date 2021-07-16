<?php

namespace SlimSlider\EasyAdmin;

final class Admin
{
	/**
	 * Page title.
	 *
	 * @var object.
	 */
	protected $page;

	/**
	 * The main __construct.
	 *
	 * @param AdminPageInterface $page the page object.
	 * @param string|null        $parent the parent slug.
	 */
	public function __construct( AdminPageInterface $page, $parent = null ) {
		if ( ! is_admin() ) return false;
		$this->page = $page;
		$this->page->set_parent_slug( $parent );
		add_action( 'admin_menu', [ $this, 'submenu_page' ], 99 );
	}

	/**
	 * Getting Started.
	 */
	public function submenu_page() {
		add_submenu_page(
			$this->page->get_parent_slug(),
			'Slim Slider Setup',
			'Get Started',
			$this->page->capability,
			$this->page->page_slug,
			[ $this, 'settings_page' ]
		);
	}

	/**
	 * Page.
	 */
	public function settings_page() {
		$this->page->header();
		do_action( 'esa_before_content' );
		$this->page->content();
		do_action( 'esa_after_content' );
		$this->page->footer();
	}

}
