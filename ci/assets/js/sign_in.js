const site_url = $("[name=site_url]").val();

$(function($) {
    'use strict'

    $(function() {
        $("#form-sign-in").parsley({
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>'
        });

        $("#form-sign-in").on("submit", function(e) {
            e.preventDefault();

            if($(this).parsley().isValid())
            {
                $("#form-submit-sign-in").text('');
                $("#form-submit-sign-in").append('<img src="'+site_url+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
                $("#form-submit-sign-in").addClass("cursor-not-allowed");
                $("#form-submit-sign-in").addClass("opacity-50");
                $("#form-submit-sign-in").removeClass("hover:bg-blue-700");
                $("#form-submit-sign-in").prop("disabled", true);
            }
        });
    });
});
