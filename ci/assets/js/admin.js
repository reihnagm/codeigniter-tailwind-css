$(function() {
    let child_settings_admin = document.getElementById("child-settings-admin");
    let chevron_right = $("#chevron-right");

    $(document).on("click", "#btn-settings-admin", function() {
        if(child_settings_admin.style.maxHeight)
        {
            chevron_right.removeClass("fa-chevron-down");
            chevron_right.addClass("fa-chevron-right");
            child_settings_admin.style.maxHeight = null;
        }
        else
        {
            chevron_right.removeClass("fa-chevron-right");
            chevron_right.addClass("fa-chevron-down");
            child_settings_admin.style.maxHeight =  child_settings_admin.scrollHeight + "px";
        }
    });
});
