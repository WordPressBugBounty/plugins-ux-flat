(function($) {
    var initialSize = parseFloat($(".single-page").css("font-size"));
    var currentPercentage = 100;
    function adjustTextSize(change) {
        currentPercentage += change;
        var newSize = (initialSize * currentPercentage) / 100;
        $(".single-page *").not(".font-resize, .font-resize *, .blog-share, .blog-share *").css({
            "font-size": newSize + "px",
        });
    }
    window.IncreaseTextSize = function() { adjustTextSize(5); };
    window.DecreaseTextSize = function() { adjustTextSize(-5); };
})(jQuery);
