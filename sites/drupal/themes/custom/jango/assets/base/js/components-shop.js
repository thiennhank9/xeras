/**
 Core Shop layout handlers and wrappers
 **/

// BEGIN: Layout Brand
var LayoutQtySpinner = function () {

	return {
		//main function to initiate the module
		init: function () {
			$('.c-spinner .btn:first-of-type').on('click', function () {
				var data_input = $(this).attr('data_input');
				$('.c-spinner input.' + data_input).val(parseInt($('.c-spinner input.' + data_input).val(), 10) + 1);
			});

			$('.c-spinner .btn:last-of-type').on('click', function () {
				var data_input = $(this).attr('data_input');
				if ($('.c-spinner input.' + data_input).val() != 0) {
					$('.c-spinner input.' + data_input).val(parseInt($('.c-spinner input.' + data_input).val(), 10) - 1);
				}
			});
		}

	};
}();
// END

// BEGIN: Layout Checkbox Visibility Toggle
var LayoutCheckboxVisibilityToggle = function () {

	return {
		//main function to initiate the module
		init: function () {
			$('.c-toggle-hide').each(function () {
				var $checkbox = $(this).find('input.c-check'),
					$speed = $(this).data('animation-speed'),
					$object = $('.' + $(this).data('object-selector'));

				$object.hide();

				if (typeof $speed === 'undefined') {
					$speed = 'slow';
				}

				$($checkbox).on('change', function () {
					if ($($object).is(':hidden')) {
						$($object).show($speed);
					} else {
						$($object).slideUp($speed);
					}
				});
			});
		}
	};

}();
// END

// BEGIN: Layout Shipping Calculator
var LayoutShippingCalculator = function () {

	return {
		//main function to initiate the module
		init: function () {
			var $shipping_calculator = $('.c-shipping-calculator'),
				$radio_name = $($shipping_calculator).data('name'),
				$total_placeholder = $($shipping_calculator).data('total-selector'),
				$subtotal_placeholder = $($shipping_calculator).data('subtotal-selector'),
				$subtotal = parseFloat($('.' + $subtotal_placeholder).text());

			$('input[name=' + $radio_name + ']', $shipping_calculator).on('change', function () {
				var $price = parseFloat($('input[name=' + $radio_name + ']:checked', $shipping_calculator).val()),
					$overall_total = $subtotal + $price;
				$('.' + $total_placeholder).text($overall_total.toFixed(2));
			});
		}
	};

}();
// END

// BEGIN: Price Slider
var PriceSlider = function () {

	return {
		//main function to initiate the module
		init: function () {
			$('.c-price-slider').slider();
		}

	};

}();
// END

 
var $ = jQuery;

// Main theme initialization
$(document).ready(function () {
  // init layout handlers
  LayoutQtySpinner.init();
  LayoutCheckboxVisibilityToggle.init();
  LayoutShippingCalculator.init();
  PriceSlider.init();
});