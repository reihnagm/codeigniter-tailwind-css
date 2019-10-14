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



        $("#form-submit-sign-up").parsley().on('field:validated', function() {
        }).on('form:submit', function() {
            return false;
        });
        // $(document).on("click", "#form-submit-sign-up", function(evt) {
        //     evt.preventDefault();
        //
        //
        //     $.post(site_url + "sign-up", $("#form-sign-up").serialize(), function(data) {
        //         console.log(data);
        //     });
        // });
    });
})(jQuery);
