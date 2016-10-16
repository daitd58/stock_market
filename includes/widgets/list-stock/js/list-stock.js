/**
 * Created by Thaibm on 10/13/2016.
 */
(function ($) {
    $(document).ready(function() {
        $(".list-stock-row").click(function() {
            window.open($(this).data("href"), '_blank');
        });
    });
})(jQuery);
