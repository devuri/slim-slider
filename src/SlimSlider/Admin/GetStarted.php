<?php

namespace SlimSlider\Admin;

use SlimSlider\EasyAdmin\AdminPage;

class GetStarted extends AdminPage
{
    /**
     * Page Content.
     */
    public function content(): void
    {
        ?>
		<h4 class="title">Slim Slider Shortcode Options and Usage</h4>
			<hr>
			The Slim Slider shortcode can be used as is like this: <code>[slim_slider]</code>.
			this will simply create the slideshow with all defined slides that have been published.
			<br>
			<strong>Create Slides:</strong>
			<br>
			To get started you will need to create the slides for the slider.
			This can be done in Add New under Slim Slides Menu.
			<br>
			Here you can add the new slide with the following information.
				<ul class="slsl-av-options">
					<li><span>Slide Title</span> the title of your slide.</li>
					<li><span>Slide ID</span> the ID for the slide can be used in the shortcode see options section.</li>
					<li><span>Slide Heading</span> can be the same as slide title.</li>
					<li><span>Alt Text</span> used to define image alt attribute.</li>
					<li><span>Description</span> the slide description.</li>
					<li><span>Slide Url</span> use to link the current slide to any valid http or https url ( other protocols are not supported).</li>
				</ul>
			<hr>
			<strong>Slide IDs:</strong><br>
			The slider shortcode can also be used with the slide IDs, Like this:<br>
			<code>[slim_slider slides="135,654,168,201"]</code>
			<br>
			In this case only the slide IDs that have been defined in the shortcode will be included in the slideshow.
			<hr>
			<strong>Shortcodes Options: </strong>
			<br>
			Slim Slider includes several options that can be specified in the shortcode:
			<code>[slim_slider height="740" fill="stretch" speed="3000"]</code>
			<br>
			<strong>Available Options:</strong><br>
			<ul class="slsl-av-options">
				<li><span>id="904562"</span>	   - The slider ID.</li>
				<li><span>height="740"</span>   - Height of every slide in pixels.</li>
				<li><span>nav="ab"</span>	   - Navigation type. b: bullet navigator or a: arrow navigator</li>
				<li><span>swipe="800"</span>	   - Swipe animation duration (in milliseconds).</li>
				<li><span>fill="stretch"</span> - Type of image fill for the slide.</li>
				<li><span>duration="300"</span> - Transition speed (in milliseconds).</li>
				<li><span>opacity="2"</span>	   - Transition Opacity.</li>
				<li><span>speed="3000"</span>   - Slider speed (in milliseconds).</li>
				<li><span>slides="" </span>     - List of slide IDs.</li>
			</ul>
			<strong>Fill type options:</strong><br>
			<ul class="slsl-av-options">
				<li><span>stretch</span>	Stretch the image to fit slide.</li>
				<li><span>contain</span>	Keep aspect ratio and put all inside slide.</li>
				<li><span>cover</span>		Keep aspect ratio and cover whole slide.</li>
				<li><span>actual</span>	Keep the actual image size.</li>
				<li><span>contain</span>	Large image and actual size for small image.</li>
			</ul>

			<strong>Advanced: Add Element click event</strong><br>
			We can add click event by specified function in OnClick field.
			like: <code>my_js_click_event()</code>
			<br>
			This will add <code>my_js_click_event()</code> onclick to the html output of that elment.
			<br>
			<hr>
				Get started,
					<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=slimslide' ) ); ?>" >Create a Slide</a>.
			<hr>
		<?php
    }
}
