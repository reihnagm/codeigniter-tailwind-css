(function ($) {
    'use strict';
    $(function() {

        $(document).on("click", "#sign-out", function() {
            NProgress.configure({ showSpinner: false });
            NProgress.start();

            $.post($("[name=site_url]").val() + "sign-out", function(data) {
                NProgress.done();
                location.href = $("[name=site_url]").val();
            })
        });

    });
})(jQuery);
