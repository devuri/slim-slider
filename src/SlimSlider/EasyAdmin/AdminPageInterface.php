<?php

namespace SlimSlider\EasyAdmin;

interface AdminPageInterface
{
    /**
     * Set the parent slug.
     *
     * @param string $parent_slug the parent slug.
     *
     * @return object the slug.
     */
    public function set_parent_slug( string $parent_slug): void;

    /**
     * Get the parent slug.
     *
     * @return null|string the slug.
     */
    public function get_parent_slug(): ?string;

    /**
     * Page Content.
     */
    public function content();

    /**
     * Page header.
     */
    public function header();

    /**
     * Page Footer.
     */
    public function footer();
}
