$(document).on("click", "#avatar-trigger", function() {
    $("#avatar").trigger("click");
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
        const avatar = $("#avatar")[0].files[0];

        const form = new FormData();
        form.append("avatar", avatar);

        $.ajax({
            url: $("[name=site_url]").val() + "/update-user-avatar",
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                Swal.fire(
                    data.title,
                    data.description,
                    data.type
                )
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
});

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
