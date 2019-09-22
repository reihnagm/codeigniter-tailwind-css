$(function() {
    let svg1 = $("#svg-1");
    let svg2 = $("#svg-2");
    let svg3 = $("#svg-3");
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

    $(document).on("click", ".trigger-checkbox-1", function() {
        if(svg1.hasClass("hidden"))
        {
            svg1.removeClass("hidden");
            svg1.addClass("block");
        }
        else
        {
            svg1.removeClass("block");
            svg1.addClass("hidden");
        }
    });
    $(document).on("click", ".trigger-checkbox-2", function() {
        if(svg2.hasClass("hidden"))
        {
            svg2.removeClass("hidden");
            svg2.addClass("block");
        }
        else
        {
            svg2.removeClass("block");
            svg2.addClass("hidden");
        }
    });
    $(document).on("click", ".trigger-checkbox-3", function() {
        if(svg3.hasClass("hidden"))
        {
            svg3.removeClass("hidden");
            svg3.addClass("block");
        }
        else
        {
            svg3.removeClass("block");
            svg3.addClass("hidden");
        }
    });
});
