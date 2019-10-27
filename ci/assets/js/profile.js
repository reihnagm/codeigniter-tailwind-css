(function ($) {
    'use strict';
    $(function() {

        $(document).on("click", "#banner-trigger", function() {
            $("banner").trigger("click");
        });

        $(document).on("click", "#avatar-trigger", function() {
            $("#avatar").trigger("click");
        });

        $(document).on("change", "#provinces", function() {
            $.get($(["name=site_url"]).val() + "get-regencies", function(data){
                console.log(data)
            });
        })

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
                const avatar = $("#avatar")[0].files[0];
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
