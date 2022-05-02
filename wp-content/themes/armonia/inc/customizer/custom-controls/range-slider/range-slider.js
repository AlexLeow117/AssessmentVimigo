jQuery(document).ready( function($) {
    // Range JS
    $('.customize-control-armonia-range-slider').each(function () {
        var sliderValue = $(this).find('input').val();
        var newSlider = $(this).find('.armonia-range-slider');
        var sliderMinValue = parseFloat(newSlider.attr('slider-min-value'));
        var sliderMaxValue = parseFloat(newSlider.attr('slider-max-value'));
        var sliderStepValue = parseFloat(newSlider.attr('slider-step-value'));
        newSlider.slider({
            value: sliderValue,
            min: sliderMinValue,
            max: sliderMaxValue,
            step: sliderStepValue,
            range: 'min',
            slide: function (e, ui) {
                $(this).parent().find('input').trigger('change');
            },
            change: function (e, ui) {
                $(this).parent().find('input').trigger('change');
            }
        });
    });

    // Change the value of the input field as the slider is moved
    $('.customize-control-armonia-range-slider .armonia-range-slider').on('slide', function (event, ui) {
        $(this).parent().find('input').val(ui.value);
    });

    // Reset slider and input field back to the default value
    $('.customize-control-armonia-range-slider .armonia-slider-reset').on('click', function () {
        var resetValue = $(this).attr('slider-reset-value');
        $(this).parents('.customize-control-armonia-range-slider').find('input').val(resetValue);
        $(this).parents('.customize-control-armonia-range-slider').find('.armonia-range-slider').slider('value', resetValue);
    });

    // Update slider if the input field loses focus as it's most likely changed
    $('.customize-control-armonia-range-slider input').blur(function () {
        var resetValue = $(this).val();
        var slider = $(this).parents('.customize-control-armonia-range-slider').find('.armonia-range-slider');
        var sliderMinValue = parseInt(slider.attr('slider-min-value'));
        var sliderMaxValue = parseInt(slider.attr('slider-max-value'));
        // Make sure our manual input value doesn't exceed the minimum & maxmium values
        if (resetValue < sliderMinValue) {
            resetValue = sliderMinValue;
            $(this).val(resetValue);
        }
        if (resetValue > sliderMaxValue) {
            resetValue = sliderMaxValue;
            $(this).val(resetValue);
        }
        $(this).parents('.customize-control-armonia-range-slider').find('.armonia-range-slider').slider('value', resetValue);
    })
});