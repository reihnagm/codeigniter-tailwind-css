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
        const unique_img = new Date().getTime()

        // OPTION
        const wrapper = document.getElementById('wrapper');
        const form = new FormData();
        form.append("avatar", avatar);

        $.ajax({
            url: $("[name=site_url]").val() + "/update-user-avatar",
            type: "POST",
            data: new FormData(wrapper),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                $('#avatar-trigger').attr('src', $("[name=site_url]").val() + 'assets/avatar/' + data.avatar + "?" + unique_img);
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
