(function ($, Drupal) {
  // Drupal.AjaxCommands.prototype.example = function (ajax, response, status) {
  //   alert(response.message);
  //      if (settings.url.includes('/flag/flag') || settings.url.includes('flag/unflag'))
  // }
  $(document).ajaxSuccess(function(event, xhr, settings) {
    if (settings.url.includes('/flag/flag') || settings.url.includes('flag/unflag')) {
      jQuery.ajax({
        url: Drupal.url('count'),
        success: function(result) {
          $("#favorites_count").html(result)
        }
      });
    }
  });
})(jQuery, Drupal);
