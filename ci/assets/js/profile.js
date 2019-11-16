(function ($) {
    'use strict';
    $(function() {
        // DISABLED WHEN NOT TRIGGERED
        // $("#regencies").prop("disabled", true);
        // $("#districts").prop("disabled", true);
        // $("#villages").prop("disabled", true);

        // $("#regencies").addClass("opacity-50");
        // $("#regencies").addClass("cursor-not-allowed");
        // $("#districts").addClass("opacity-50");
        // $("#districts").addClass("cursor-not-allowed");
        // $("#villages").addClass("opacity-50");
        // $("#villages").addClass("cursor-not-allowed");

        // $("#save-address").click(function() {
        //     $.ajax({
        //         url: $("[name=site_url]").val() + 'save-address',
        //         method: "POST",
        //         data:
        //         {
        //             villages_id: $("#villages").val()
        //         },
        //         success: function(data)
        //         {
        //             if(data.valid)
        //             {
        //                 Swal.fire(
        //                     data.title,
        //                     data.description,
        //                     data.type
        //                 )
        //             }
        //             else 
        //             {
        //                 Swal.fire(
        //                     data.title,
        //                     data.description,
        //                     data.type
        //                 )
        //             }
        //         },
        //         error: function(data)
        //         {
        //             console.log(data);
        //         }
        //     });
        // });

        $(document).on("click", "#edit-name", function(){

        });

        $(document).on("click", "#banner-trigger", function() {
            $("#banner").trigger("click");
        });

        $(document).on("click", "#avatar-trigger", function() {
            $("#avatar").trigger("click");
        });

        $(document).on("change", "#provinces", function() {
            regencies($(this).val());

            if($(this).val() == "")
            {
                $("#regencies").val('');
                $("#regencies").prop("disabled", true);
                $("#regencies").addClass("opacity-50");
                $("#regencies").addClass("cursor-not-allowed");

                $("#districts").val('');
                $("#districts").prop("disabled", true);
                $("#districts").addClass("opacity-50");
                $("#districts").addClass("cursor-not-allowed");

                $("#villages").val('');
                $("#villages").prop("disabled", true);
                $("#villages").addClass("opacity-50");
                $("#villages").addClass("cursor-not-allowed");
            }
            else 
            {
                $("#regencies").prop("disabled", false);
                $("#regencies").removeClass("opacity-50");
                $("#regencies").removeClass("cursor-not-allowed");
            }
        });

        $(document).on("change", "#regencies", function() {
            districts($(this).val());

            if($(this).val() == "")
            {
                $("#districts").prop("disabled", true);
                $("#districts").removeClass("opacity-50");
                $("#districts").removeClass("cursor-not-allowed");
            }
            else 
            {
                $("#districts").prop("disabled", false);
                $("#districts").removeClass("opacity-50");
                $("#districts").removeClass("cursor-not-allowed");
            }
        })

        $(document).on("change", "#districts", function() {
            villages($(this).val());
            if($(this).val() == "")
            {
                $("#villages").val('');
                $("#villages").prop("disabled", true);
                $("#villages").addClass("opacity-50");
                $("#villages").addClass("cursor-not-allowed");
            }
            else 
            {
                $("#villages").prop("disabled", false);
                $("#villages").removeClass("opacity-50");
                $("#villages").removeClass("cursor-not-allowed");
            }
        })

        // $(document).on("change", "#villages", function(){
        //     const districts = $("#districts").val(),
        //           provinces = $("#provinces").val(),
        //           regencies = $("#regencies").val();

        //     if(districts && provinces && regencies != '') 
        //     {   
        //         $("#save-address").attr("disabled", "disabled");
        //     }
        // });

        $(document).on("change","#banner", function() {
            const unique = new Date().getTime();
            // image.jpg-23123
            const file = $(this).val();
            // "C:/fakepath/file"
            const parts = file.split('.');
            // ["C:\\fakepath\\pp","jpg"]
            const ext = parts[parts.length - 1];
            // jpg, png
            if(is_allowed_ext(ext))
            {
                // const banner = $("#banner")[0].files[0];
                const unique_img = new Date().getTime()

                // OPTION
                const form_banner = $("#form-banner")[0];
                // const form = new FormData();
                // form.append("avatar", avatar);

                $.ajax({
                    xhr: function() {
                        var xhr = $.ajaxSettings.xhr();

                        xhr.addEventListener("progress", function(evt) {
                            var percent_complete = evt.loaded / evt.total;
                            percent_complete = parseInt(percent_complete * 100);
                            console.log(percent_complete);
                        }, false);

                        return xhr;
                    },
                    url: $("[name=site_url]").val() + "/update-user-banner",
                    type: "POST",
                    data: new FormData(form_banner),
                    processData: false,
                    contentType: false,
                    cache: false,
                    // async: false,
                    success: function(data) {
                        if(data.type)
                        {
                            Swal.fire(
                                data.title,
                                data.description,
                                data.type
                            )
                            $('#banner-trigger').attr('src', $("[name=site_url]").val() + 'assets/banner/' + data.BANNER + '?' + unique_img);
                        }
                        else
                        {
                            Swal.fire(
                                data.title,
                                data.description,
                                data.type
                            )
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
            else
            {
                Swal.fire(
                    "Extension not allowed !",
                    "Extension allowed : JPG, JPEG, PNG, GIF",
                    "warning"
                )
            }
        });

        $(document).on("change","#avatar", function() {
            const unique = new Date().getTime();
            // image.jpg-23123
            const file = $(this).val();
            // "C:/fakepath/file"
            const parts = file.split('.');
            // ["C:\\fakepath\\pp","jpg"]
            const ext = parts[parts.length - 1];
            // jpg, png
            if(is_allowed_ext(ext))
            {
                // const avatar = $("#avatar")[0].files[0];
                const unique_img = new Date().getTime()

                // option
                const form_avatar = $("#form-avatar")[0];
                // const form = new FormData();
                // form.append("avatar", avatar);

                $.ajax({
                    xhr: function() {
                        var xhr = $.ajaxSettings.xhr();

                        xhr.addEventListener("progress", function(evt) {
                            var percent_complete = evt.loaded / evt.total;
                            percent_complete = parseInt(percent_complete * 100);
                            console.log(percent_complete);
                        }, false);

                        return xhr;
                    },
                    url: $("[name=site_url]").val() + "/update-user-avatar",
                    type: "POST",
                    data: new FormData(form_avatar),
                    processData: false,
                    contentType: false,
                    cache: false,
                    // async: false,
                    success: function(data) {
                        if(data.type)
                        {
                            Swal.fire(
                                data.title,
                                data.description,
                                data.type
                            )
                            $('#avatar-trigger').attr('src', $("[name=site_url]").val() + 'assets/avatar/' + data.avatar + '?' + unique_img);
                        }
                        else
                        {
                            Swal.fire(
                                data.title,
                                data.description,
                                data.type
                            )
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
            else
            {
                Swal.fire(
                    "Extension not allowed !",
                    "Extension allowed : JPG, JPEG, PNG, GIF",
                    "warning"
                )
            }
        });

    });
})(jQuery);

$(document).ready(function() {

    // $("#form-save-address").submit(function(e) {
    //     e.preventDefault();

    //     NProgress.configure({ showSpinner: false });
    //     NProgress.start();
    //     $("#submit-save-address").text('');
    //     $("#submit-save-address").append('<img src="'+$("[name=site_url]").val()+'assets/loader/loader-2.gif" style="width: 25px; display: block; margin: 0 auto;">');
    //     $("#submit-save-address").addClass("cursor-not-allowed");
    //     $("#submit-save-address").addClass("opacity-50");
    //     $("#submit-save-address").removeClass("hover:bg-gray-600");
    //     $("#submit-save-address").prop("disabled", true); 
            
    //     if($(this).parsley().isValid())
    //     {
    //         NProgress.done();
    //         alert('test');
    //     }
    //     else 
    //     {
    //         NProgress.done();
    //         $("#submit-save-address").text('Save Address');
    //         $("#submit-save-address").removeClass("cursor-not-allowed");
    //         $("#submit-save-address").removeClass("opacity-50");
    //         $("#submit-save-address").addClass("hover:bg-gray-600");
    //         $("#submit-save-address").prop("disabled", false); 
    //     }
    // });

    // $("#submit-save-address").click(function() {
    //     if ($(this).attr('id') === "submit-save-address") 
    //     { 
    //         $("#form-save-address").submit();
    //     }
    // })

    // $("#form-save-address").parsley().on("field:validated",function() {
    //     const error = $('.parsley-error').length === 0;

    //     if(!error)
    //     {
    //         $('#container-validate').removeClass("border-green-500");
    //         $('#container-validate').find(".form-field").hide(250);
    //         $('#container-validate').find(".form-field").animate({opacity: 1.0}, 250);
    //         $('#container-validate').find(".form-field").addClass("visible");
    //     }
    //     else 
    //     {
    //         $('#container-validate').addClass("border-green-500");
    //         $('#container-validate').find(".form-field").hide(250);
    //         $('#container-validate').find(".form-field").addClass("opacity-0");
    //         $('#container-validate').find(".form-field").addClass("invisible");
    //     }
    // }).on("form:submit", function() {
    //     alert('test');
    // })

    $("#form-save-address").parsley({
        classHandler: function (el) {
            return el.$element.closest('.form-group');
        },
        errorsWrapper: '<div class="border form-field invisible  opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
        errorTemplate: '<p></p>'
    }).on('field:success', function() {
        const el = this.$element[0].id
        $('#'+el).addClass("border-green-500");
        $('#'+el).parent().find(".form-field").hide(250);
        $('#'+el).parent().find(".form-field").addClass("opacity-0");
        $('#'+el).parent().find(".form-field").addClass("invisible");
    }).on('field:error', function() {
        const el = this.$element[0].id
        $('#'+el).removeClass("border-green-500");
        $('#'+el).parent().find(".form-field").show(250);
        $('#'+el).parent().find(".form-field").removeClass("invisible");
        $('#'+el).parent().find(".form-field").animate({opacity: 1.0}, 250);
        $('#'+el).parent().find(".form-field").addClass("visible");
    }).on("form:submit", function() {
        alert('test')
    })   
  
    
    $("#first_name").inputmask({
        mask: "aaaaaaaaaaaa",
        casing: "lower",
        placeholder: "" // REMOVE UNDERLINE
    });

    $("#last_name").inputmask({
        mask: "aaaaaaaaaaaa",
        casing: "lower",
        placeholder: "" // REMOVE UNDERLINE
    });

    // NOT ALLOWED SPACE BAR
    $("#first_name").keydown(function(e) {
        if (e.keyCode == 32)
        {
            return false;
        }
    });
    $("#last_name").keydown(function(e) {
        if (e.keyCode == 32) 
        {
            return false;
        }
    });

})
function regencies(province_id)
{
    $.get($("[name=site_url]").val() + "get-regencies", { province_id : province_id }, function(data){
        
        let temp = '';
        // LOOPING ARRAY OF OBJECTS

        // OPTIONAL 1
        // data.forEach((regencies)=>console.log(regencies));

        // OPTIONAL 2
        for(let regencies of data)
        {
            temp += '<option value="'+regencies.id+'">'+regencies.name+'</option>'; 
        }

        $("#container-regencies").html(temp);
    });
}
function districts(regency_id)
{
    $.get($("[name=site_url]").val() + "get-districts", { regency_id : regency_id },function(data){
        let temp = "";

        for(let districts of data)
        {
            temp += '<option value="'+districts.id+'">'+districts.name+'</option>'; 
        }
      
        $("#container-districts").html(temp);
    });
}
function villages(district_id)
{
    $.get($("[name=site_url]").val() + "get-villages", { district_id : district_id }, function(data){
        let temp = "";

        for(let villages of data)
        {
            temp += '<option value="'+villages.id+'">'+villages.name+'</option>'; 
        }

        console.log(temp);
        
        $("#container-villages").html(temp);
    });
}
function is_allowed_ext(ext)
{
    switch (ext)
    {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
        return true;
    }
    return false;
}
function close_show_change_address()
{
    $(".modal-show-address").toggleClass("opacity-0");
    $(".modal-show-address").toggleClass("pointer-events-none");
    $("body").toggleClass("modal-active");
}
function show_change_address(village_id)
{
    $(".modal-show-address").toggleClass("opacity-0");
    $(".modal-show-address").toggleClass("pointer-events-none");
    $("body").toggleClass("modal-active");
}
$(document).keydown(function(event){
    var key = (event.keyCode ? event.keyCode : event.which);
    if (key == 27)
    {
        close_show_change_address();
    }
});


