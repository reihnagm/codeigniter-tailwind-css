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

        $("#form-sign-up").parsley({
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<div class="form-field invisible opacity-0 border mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>',
        }).on('field:success', function() {
            let el = this.$element[0].id
            $('#'+el).addClass("border-green-500");
            $('#'+el).parent().find(".form-field").hide(250);
            $('#'+el).parent().find(".form-field").addClass("opacity-0");
            $('#'+el).parent().find(".form-field").addClass("invisible");
        }).on('field:error', function() {
            let el = this.$element[0].id
            $('#'+el).parent().find(".form-field").removeClass("invisible");
            $('#'+el).parent().find(".form-field").addClass("visible");
            $('#'+el).parent().find(".form-field").show(250);
            $('#'+el).parent().find(".form-field").animate({opacity: 1.0}, 250);
            $('#'+el).removeClass("border-green-500");

            // $(".parsley-usernameRegex").hide().show(250);
            // $(".parsley-emailRegex").hide().show(250);
            // $(".parsley-passwordRegex").hide().show(250);
        })

        $(document).on("keyup", "#username", function() {
            $.post(site_url + 'check-reserved-username', {"username" : $(this).val() }, function(data) {
                const data_parse = JSON.parse(data)
                if(data_parse.status)
                {
                    Swal.fire(
                        data_parse.title,
                        data_parse.desc,
                        data_parse.type
                    )
                    $("#username").val("");
                }
            });
        });

        $(document).on("keyup", "#email", function() {
            $.post(site_url + 'check-reserved-email', {"email" : $(this).val() }, function(data) {
                const data_parse = JSON.parse(data)
                if(data_parse.status)
                {
                    Swal.fire(
                        data_parse.title,
                        data_parse.desc,
                        data_parse.type
                    )
                    $("#email").val("");
                }
            });
        });

        $("#form-sign-up").on('submit', function(e){
            e.preventDefault();

            // $(this).parsley().validate();

            if ($(this).parsley().isValid())
            {
                $("#form-submit-sign-up").text('');
                $("#form-submit-sign-up").append('<img src="'+site_url+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
                $("#form-submit-sign-up").addClass("cursor-not-allowed");
                $("#form-submit-sign-up").addClass("opacity-50");
                $("#form-submit-sign-up").removeClass("hover:bg-blue-700");
                $("#form-submit-sign-up").prop("disabled", true);

                $.post(site_url + "sign-up", $("#form-sign-up").serialize(), function(data) {

                });
            }
       });


    });
})(jQuery);
