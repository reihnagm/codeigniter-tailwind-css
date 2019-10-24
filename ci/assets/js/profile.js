$(document).on("click", "#avatar-trigger", function() {
    $("#avatar").trigger("click");
});

$(document).on("change","#avatar", function() {
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
    }
    else
    {

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
