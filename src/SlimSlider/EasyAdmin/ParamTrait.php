<?php

namespace SlimSlider\EasyAdmin;

trait ParamTrait
{
    /**
     * $parent_slug.
     *
     * (string) (Required) The slug name for the parent menu
     * (or the file name of a standard WordPress admin page).
     *
     * if this is null we will do add_menu_page.
     *
     * @var string
     */
    public $parent_slug = null;

    /**
     * $page_title.
     *
     * (Required) The text to be displayed in the title
     * tags of the page when the menu is selected.
     *
     * @var string
     */
    public $page_title = 'Page Title';

    /**
     * $menu_title.
     *
     * (string) (Required) The text to be used for the menu.
     *
     * @var string
     *
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public $menu_title = 'Title';

    /**
     * $capability.
     *
     * (string) (Required) The capability required for this menu to be displayed to the user.
     *
     * @var string
     *
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public $capability = 'manage_options';

    /**
     * $menu_slug.
     *
     * (string) (Required) The slug name to refer to this menu by.
     * Should be unique for this menu page and only include lowercase alphanumeric,
     * dashes, and underscores characters to be compatible with sanitize_key().
     *
     * @var string
     *
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public $page_slug = null;

    /**
     * $icon_url.
     *
     * (string) (Optional) The URL to the icon to be used for this menu.
     * Pass a base64-encoded SVG using a data URI,
     * which will be colored to match the color scheme.
     * This should begin with 'data:image/svg+xml;base64,'.
     * Pass the name of a Dashicons helper class to use a font icon, e.g. 'dashicons-chart-pie'.
     * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
     * Default value: ''
     *
     * @var string
     *
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public $icon_url = null;

    /**
     * $position.
     *
     * (int) (Optional) The position in the menu order this item should appear.
     * Default value: null
     *
     * @var int
     *
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public $position = null;

    /**
     * $prefix.
     *
     * Main menu prefix used to add prefix for page=$prefix-menu-slug.
     *
     * @var string
     */
    public $prefix = null;

    /**
     * Menu color.
     *
     * @var string
     */
    public $mcolor = '#0071A1';
}
