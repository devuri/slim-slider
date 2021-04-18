
// get current slider data.
var slimsliderID = SlimSliderData;

// Transitions.
var _SlideshowTransitions = [
	{
		$Duration: parseInt( slimsliderID.duration ), // 400.
		$Opacity: parseInt( slimsliderID.opacity ), // 2.
	}
];

// @link https://www.jssor.com/development/api-options.html
var slimslider_options = {
	/**
	 * $AutoPlay options
	 * 0: no
	 * 1: continuously
	 * 2: stop at last slide
	 * 4: stop on click
	 * 8: stop on navigation,
	 * 12: stop on click or user navigation
	 */
	$AutoPlay: 4,
	$Idle: parseInt( slimsliderID.speed ), // Interval (in milliseconds) for next slide if the slider is auto playing
	$PauseOnHover: 1,
	$PlayOrientation: 1, // 1: horizental 2: vertical
	$SlideDuration: parseInt( slimsliderID.swipe ), // swipe animation duration (in milliseconds)
	$FillMode: parseInt( slimsliderID.fill ), // 0: stretch 1: contain 2: cover 4: actual size 5: contain
	$SlideWidth: parseInt( slimsliderID.width ),
	$SlideHeight: parseInt( slimsliderID.height ),
	$SlideEasing: $Jease$.$OutQuint,
	$SlideshowOptions: {
		$Class: $JssorSlideshowRunner$,
		$Transitions: _SlideshowTransitions,
		$TransitionsOrder: 1 // 0: Random 1: In Order
	},
	$ArrowNavigatorOptions: {
		$Class: $JssorArrowNavigator$,
		$ChanceToShow: 1, // 1: Mouse Over 2: Always
		$Steps: 1        // Steps to go for each navigation request, default value is 1
	},
	$BulletNavigatorOptions: {
		$Class: $JssorBulletNavigator$,
		$ChanceToShow: 2, // 0 Never, 1 Mouse Over, 2 Always
		$ActionMode: 1,   // 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
		$Steps: 1,        // Steps to go for each navigation request, default value is 1
		$Rows: 1,         // Specify lanes to arrange items, default value is 1
		$SpacingX: 10,    // Horizontal space between each item in pixel, default value is 0
		$SpacingY: 10,    // Vertical space between each item in pixel, default value is 0
		$Orientation: 1   // The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
	}
};

slim_slider_init = function() {

    var MAX_WIDTH = 3000;
    function ScaleSlider() {
        var containerElement = new_slimslider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;
        if (containerWidth) {
            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
            new_slimslider.$ScaleWidth(expectedWidth);
        } else {
            window.setTimeout(ScaleSlider, 30);
        }
    }
	ScaleSlider();
    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

};

/**
 * The slider.
 *
 * Creates the slider output.
 */
var new_slimslider = new $JssorSlider$( "slimslider_" + slimsliderID.id, slimslider_options );
slim_slider_init();
