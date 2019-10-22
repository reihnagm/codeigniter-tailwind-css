(function ($) {
    'use strict';
    $(function() {

        $(document).on("click", "#logo", function(e) {
            e.preventDefault();
            NProgress.configure({ showSpinner: false });
            NProgress.start();
            setTimeout(function() {
                location.href = $("[name=site_url]").val();
                NProgress.done();
            }, 900)
        });

        $(document).on("click", "#profile", function(e) {
            e.preventDefault();
            NProgress.configure({ showSpinner: false });
            NProgress.start();
            setTimeout(function() {
                location.href = $("[name=site_url]").val() + "user/" + $("[name=session_username]").val() + $("[name=session_id]").val() + "/profile";
                NProgress.done();
            }, 900);
        });

        $(document).on("click", "#sign-in-btn", function(e) {
            e.preventDefault();
            NProgress.configure({ showSpinner: false });
            NProgress.start();
            setTimeout(function() {
                location.href = $("[name=site_url]").val();
                NProgress.done();
            }, 900);
        });

        $(document).on("click", "#sign-up-btn", function(e) {
            e.preventDefault();
            NProgress.configure({ showSpinner: false });
            NProgress.start();
            setTimeout(function() {
                location.href = $("[name=site_url]").val() + "sign-up-page";
                NProgress.done();
            }, 900);
        });

    });
})(jQuery);
