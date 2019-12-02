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
            errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>'
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
        });

        $("#username-sign-up").parsley({
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>'
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

            $('#parsley-id-9').find('.parsley-required').hide().show(250);
            $('.parsley-usernameRegex').hide().show(250);
        });

        $("#email-sign-up").parsley({
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>'
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

            $('#parsley-id-11').find('.parsley-required').hide().show(250);
            $('.parsley-emailRegex').hide().show(250);
        });


        $("#password-sign-up").parsley({
            classHandler: function (el) {
                return el.$element.closest('.form-group');
            },
            errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
            errorTemplate: '<p></p>'
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

            $('#parsley-id-13').find('.parsley-required').hide().show(250);
            $('.parsley-passwordRegex').hide().show(250);
        });
    
        $(document).on("keyup", "#password-sign-up", function() {
           
            const passwordRegex = $("#password-sign-up").parsley();
            let _this = $(this);
            const val   = _this.val();

            if(/^(?=.*[a-z])/.test(val))
            { 
                window.ParsleyUI.updateError(passwordRegex, 'passwordRegex', 'character must contain at least 1 uppercase <br> character must contain at least 1 numeric <br> character must contain at least one special character <br> character must be eight or longer');
            }
            if(/^(?=.*[A-Z])/.test(val))
            {
                window.ParsleyUI.updateError(passwordRegex, 'passwordRegex', 'character must contain at least 1 numeric <br> character must contain at least one special character <br> character must be eight or longer');
            }
            if(/^(?=.*[0-9])/.test(val))
            {
                window.ParsleyUI.updateError(passwordRegex, 'passwordRegex', 'character must contain at least one special character <br> character must be eight or longer');
            }
            if(/^(?=.*[!@#\$%\^&\*])/.test(val))
            {
                window.ParsleyUI.updateError(passwordRegex, 'passwordRegex', 'character must be eight or longer');
            }
            if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(val))
            {   
                window.ParsleyUI.removeError(passwordRegex);
            }
       
        });


        $("#form-sign-up").on('submit', function()
        {
            // $(this).parsley().validate();

            if ($(this).parsley().isValid())
            {
                $("#form-submit-sign-up").text('');
                $("#form-submit-sign-up").append('<img src="'+$("[name=site_url]").val()+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
                $("#form-submit-sign-up").addClass("cursor-not-allowed");
                $("#form-submit-sign-up").addClass("opacity-50");
                $("#form-submit-sign-up").removeClass("hover:bg-blue-700");
                $("#form-submit-sign-up").prop("disabled", true);

                NProgress.configure({ showSpinner: false });
                NProgress.start();

                $.post($("[name=site_url]").val() + "sign-up", $("#form-sign-up").serialize(), function(data) {
                    NProgress.done();
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    $("#form-submit-sign-up").text('Sign Up');
                    $("#form-submit-sign-up").removeClass("cursor-not-allowed");
                    $("#form-submit-sign-up").removeClass("opacity-50");
                    $("#form-submit-sign-up").addClass("hover:bg-blue-700");
                    $("#form-submit-sign-up").prop("disabled", false);

                    $("#form-sign-up").trigger("reset");
                });
            }

              
            return false;
       });

        $(document).on("keyup", "#username-sign-up", function() {
            $.post($("[name=site_url]").val() + 'check-reserved-username', {"username" : $(this).val() }, function(data) {
                if(data.status)
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    $("#username-sign-up").val("");
                }
            });
        });
        $(document).on("input", "#username-sign-up", function() {
            $.post($("[name=site_url]").val() + 'check-reserved-username', {"username" : $(this).val() }, function(data) {
                if(data.status)
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    $("#username-sign-up").val("");
                }
            });
        });
        $(document).on("keyup", "#email-sign-up", function() {
            $.post($("[name=site_url]").val() + 'check-reserved-email', {"email" : $(this).val() }, function(data) {
                if(data.status)
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    $("#email-sign-up").val("");
                }
            });
        });
        $(document).on("input", "#email-sign-up", function() {
            $.post($("[name=site_url]").val() + 'check-reserved-email', {"email" : $(this).val() }, function(data) {
                if(data.status)
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    $("#email-sign-up").val("");
                }
            });
        });

    });
})(jQuery);
