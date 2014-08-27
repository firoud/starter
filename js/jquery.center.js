(function() {
  (function($) {
    return $.fn.middleIt = function(option1, option2) {
      return $(this).each(function() {
        var left_spacing, top_spacing;
        if (option1 != null) {
          top_spacing = option1;
        } else if ($(this).parent() != null) {
          top_spacing = ($(this).parent().height() - $(this).height()) / 2;
        } else {
          top_spacing = ($(window).height() - $(this).height()) / 2;
        }
        left_spacing = ($(this).parent().width() - $(this).width()) / 2;
        if (option2 != null) {
          left_spacing = option2;
        } else if ($(this).parent() != null) {
          left_spacing = ($(this).parent().width() - $(this).width()) / 2;
        } else {
          left_spacing = ($(window).width() - $(this).width()) / 2;
        }
        return $(this).css({
          "position": "absolute",
          "top": "" + top_spacing + "px",
          "left": "" + left_spacing + "px"
        });
      });
    };
  })(jQuery);

}).call(this);
