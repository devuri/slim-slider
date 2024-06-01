<?php

namespace SlimSlider\EasyAdmin;

trait StylesTrait
{
    /**
     * Styles.
     */
    public function page_styles(): void
    {
        ?>
		<style media="screen">
		#slsl-important-notice {
			padding: 4px;
			background-color: blanchedalmond;
			margin-left: -20px;
			text-align: center;
		}
		.slsl-container ul li {
			background-color: #eef1f3;
			color: #82807e;
		}
		.slsl-container code {
			color: #f44336;
			margin: 8px;
			padding: 8px;
			background-color: #f3f3f3;
		}
		.slsl-av-options span{
			color: #f44336;
			margin: 8px;
		}
		.slsl-container {
			background-color: #fff;
			box-shadow: 0 0 10px -5px rgba(0,0,0,0.5);
			padding: 20px;
			margin-top: 20px;
			margin-right: 20px;
			margin-bottom: 20px;
			font-size: initial;
			line-height: 2em;
		}
		.slsl-admin-wrap p {
			font-size: inherit;
			line-height: 1.5;
			margin: 1em 0;
		}
		.slsl-admin-wrap h2, h3 {
			font-weight: 400;
			font-size: 2em;
		}
		.slsl-header {
			background-color: #fff;
			z-index: 10;
			margin-left: -20px;
			margin-bottom: 10px;
			padding: 20px;
		}
		h2.slsl-admin .nav-tab-wrapper .wp-clearfix{
			border-bottom: 0px solid #ccc;
			margin: 0;
			padding-top: 9px;
			padding-bottom: 0;
			line-height: inherit;
		}
		.slsl-admin-tab,
		.slsl-admin-tab:focus,
		.slsl-admin-tab:focus:active,
		.slsl-admin-tab:hover{
			color: #007cba;
			border-bottom: none;
		}
		.slsl-admin-wrap a {
			text-decoration: none;
		}
		.slsl-admin-title{
			font-size: 20px;
			font-weight: 400;
			line-height: normal;
		}
		</style>
		<?php
    }
}
