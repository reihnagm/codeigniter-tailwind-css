var site_url = $("[name=site_url]").val();

(function ($) {
    'use strict';
    $(function() {

        window.Parsley.addValidator('usernameRegex', {
            validateString: function(value) {
                return /^(?=.*[a-z])(?!.*[\s-@!#\$%\^&\*])(?=.*[_])(?=.{8,12})/.test(value)
            },
            messages:
            {
                en: 'Invalid Username Format ! e.g johndoe_ <br> Maximum 12 Character'
            }
        });

        window.Parsley.addValidator('emailRegex', {
            validateString: function(value) {
                return /[a-zA-Z0-9_]+@[a-zA-Z]+\.(com|net|org)$/.test(value)
            },
            messages:
            {
                en: 'Invalid Email Format ! e.g johndoe@gmail.com'
            }
        });

        window.Parsley.addValidator('passwordRegex', {
            validateString: function(value) {
                return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(value)
            },
            messages:
            {
                en:'character must contain at least 1 lowercase alphabetical <br> character must contain at least 1 uppercase alphabetical <br> character must contain at least 1 numeric <br> character must contain at least one special character <br> character must be eight or longer'
            }
        });

        $("#form-sign-up").on('submit', function(e){
            e.preventDefault();

            $(this).parsley().validate();

            if ($(this).parsley().isValid())
            {
                $.post(site_url + "sign-up", $("#form-sign-up").serialize(), function(data) {
                    $("#form-submit-sign-up").text('');
                    $("#form-submit-sign-up").append('<img src="'+site_url+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
                    $("#form-submit-sign-up").addClass("cursor-not-allowed");
                    $("#form-submit-sign-up").addClass("opacity-50");
                    $("#form-submit-sign-up").removeClass("hover:bg-blue-700");
                    $("#form-submit-sign-up").prop("disabled", true);
                });
            }
       });


    });
})(jQuery);
