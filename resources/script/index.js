// it works the same with all jquery version from 1.x to 2.x

jQuery(document).ready(function ($) {
    var options = {
        $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $ChanceToShow: 2
        }
    };
    var jssor_slider1 = new $JssorSlider$('slider1_container', options);
});