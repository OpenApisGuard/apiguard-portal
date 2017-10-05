/**
 * @file
 * JavaScript behaviors for webform_image_select and jQuery Image Picker integration.
 */

(function ($, Drupal) {

  'use strict';

  // @see https://rvera.github.io/image-picker/
  Drupal.webform = Drupal.webform || {};
  Drupal.webform.imageSelect = Drupal.webform.imageSelect || {};
  Drupal.webform.imageSelect.options = Drupal.webform.imageSelect.options || {};

  /**
   * Initialize image select.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformImageSelect = {
    attach: function (context) {
      if (!$.fn.imagepicker) {
        return;
      }

      $('.js-webform-image-select', context).once('webform-image-select').each(function () {
        var $select = $(this);

        // Apply image data to options.
        var images = JSON.parse($select.attr('data-images'));
        for (var value in images) {
          if (images.hasOwnProperty(value)) {
            var image = images[value];
            // Escape double quotes in value
            value = value.toString().replace(/"/g, '\\"');
            $select.find('option[value="' + value + '"]').attr({
              'data-img-src': image.src,
              'data-img-label': image.text,
              'data-img-alt': image.text
            });
          }
        }

        var options = $.extend({
          hide_select: false
        }, Drupal.webform.imageSelect.options);

        if ($select.attr('data-show-label')) {
          options.show_label = true;
        }

        $select.imagepicker(options);
      });
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * JavaScript behaviors for jQuery UI buttons element integration.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Create jQuery UI buttons element.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformButtons = {
    attach: function (context) {
      $(context).find('.js-webform-buttons .form-radios, .js-webform-buttons.form-radios').once('webform-buttons').each(function () {
        var $input = $(this);
        // Remove all div and classes around radios and labels.
        $input.html($input.find('input[type="radio"], label').removeClass());
        // Create buttonset.
        $input.buttonset();
        // Disable buttonset.
        $input.buttonset('option', 'disabled', $input.find('input[type="radio"]:disabled').length);

        // Turn buttonset off/on when the input is disabled/enabled.
        // @see webform.states.js
        $input.on('webform:disabled', function () {
          $input.buttonset('option', 'disabled', $input.find('input[type="radio"]:disabled').length);
        });
      });
    }
  };

})(jQuery, Drupal);
;
