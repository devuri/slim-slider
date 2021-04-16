
var _SlideshowTransitions = [
	{
		$Duration: 400,
		$Opacity: 2
	}
];

var slimslider_options = {
	$AutoPlay: 4,
	$SlideDuration: 800,
	$SlideHeight: 740,
	$SlideEasing: $Jease$.$OutQuint,
	$SlideshowOptions: {
		$Class: $JssorSlideshowRunner$,
		$Transitions: _SlideshowTransitions,
		$TransitionsOrder: 1
	},
	$ArrowNavigatorOptions: {
		$Class: $JssorArrowNavigator$
	},
	$BulletNavigatorOptions: {
		$Class: $JssorBulletNavigator$
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
