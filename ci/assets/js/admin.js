$(function() {
    let child_settings_admin = $("#child-settings-admin");

    $(document).on("click", "#btn-settings-admin", function() {
        if(child_settings_admin.hasClass('hidden'))
        {
            cchild_settings_admin.addClass('block');
            child_settings_admin.removeClass('hidden');
        }
        else if(child_settings_admin.hasClass('block'))
        {
            child_settings_admin.addClass('hidden');
            child_settings_admin.removeClass('block');
        }
    });
});
