(function ($) {
    'use strict';
    $(function() {
        // DISABLED WHEN NOT TRIGGERED
        $("#regencies").prop("disabled", true);
        $("#districts").prop("disabled", true);
        $("#villages").prop("disabled", true);

        $("#regencies").addClass("opacity-50");
        $("#regencies").addClass("cursor-not-allowed");
        $("#districts").addClass("opacity-50");
        $("#districts").addClass("cursor-not-allowed");
        $("#villages").addClass("opacity-50");
        $("#villages").addClass("cursor-not-allowed");

        $("#save-address").click(function() {
            $.ajax({
                url: $("[name=site_url]").val() + 'save-address',
                method: "POST",
                data:
                {
                    villages_id: $("#villages").val()
                },
                success: function(data)
                {
                    console.log(data);
                    Swal.fire(
                        data.title,
                        data.description,
                        data.type
                    )
                },
                error: function(data)
                {
                    console.log(data);
                    Swal.fire(
                        data.title,
                        data.description,
                        data.type
                    )
                }
            });
        });

        $(document).on("click", "#banner-trigger", function() {
            $("#banner").trigger("click");
        });

        $(document).on("click", "#avatar-trigger", function() {
            $("#avatar").trigger("click");
        });

        $(document).on("change", "#provinces", function() {
            regencies($(this).val());
            $("#regencies").prop("disabled", false);
            $("#regencies").removeClass("opacity-50");
            $("#regencies").removeClass("cursor-not-allowed");

            $("#regencies").val("");
            $("#districts").val("");
            $("#villages").val("");
        });

        $(document).on("change", "#regencies", function() {
            districts($(this).val());
            $("#districts").prop("disabled", false);
            $("#districts").removeClass("opacity-50");
            $("#districts").removeClass("cursor-not-allowed");
        })

        $(document).on("change", "#districts", function() {
            villages($(this).val());
            $("#villages").prop("disabled", true);
            $("#villages").removeClass("opacity-50");
            $("#villages").removeClass("cursor-not-allowed");
        })

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

                // OPTION
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

function regencies(province_id)
{
    $.get($("[name=site_url]").val() + "get-regencies", { province_id : province_id },function(data){
        $("#container-regencies").html(data);
    });
}
function districts(regency_id)
{
    $.get($("[name=site_url]").val() + "get-districts", { regency_id : regency_id },function(data){
        $("#container-districts").html(data);
    });
}
function villages(district_id)
{
    $.get($("[name=site_url]").val() + "get-villages", { district_id : district_id },function(data){
        $("#container-villages").html(data);
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
