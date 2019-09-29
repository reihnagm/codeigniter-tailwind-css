$(function() {

    let svg1 = $("#svg-1");
    let svg2 = $("#svg-2");
    let svg3 = $("#svg-3");

    let count_admin_group_menu = $("[name='count_admin_group_menu']").val();

    for (var i = 0; i <= count_admin_group_menu; i++)
    {
        let content_admin_dropdown = document.getElementById("content-admin-dropdown-"+i);
        let chevron_right_admin_dropdown = $("#chevron-right-admin-dropdown-"+i);

        $(document).on("click", "#btn-admin-dropdown-"+i, function() {
            if(content_admin_dropdown.style.maxHeight)
            {
                chevron_right_admin_dropdown.removeClass("fa-chevron-down");
                chevron_right_admin_dropdown.addClass("fa-chevron-right");
                content_admin_dropdown.style.maxHeight = null;
            }
            else
            {
                chevron_right_admin_dropdown.removeClass("fa-chevron-right");
                chevron_right_admin_dropdown.addClass("fa-chevron-down");
                content_admin_dropdown.style.maxHeight =  content_admin_dropdown.scrollHeight + "px";
            }
        });
    }

    let child_nav_admin = document.getElementById("child-nav-admin");
    let chevron_right_nav = $("#chevron-right-nav");

    $(document).on("click", "#btn-nav-admin", function() {
        if(child_nav_admin.style.maxHeight)
        {
            chevron_right_nav.removeClass("fa-chevron-down");
            chevron_right_nav.addClass("fa-chevron-right");
            child_nav_admin.style.maxHeight = null;
        }
        else
        {
            chevron_right_nav.removeClass("fa-chevron-right");
            chevron_right_nav.addClass("fa-chevron-down");
            child_nav_admin.style.maxHeight =  child_nav_admin.scrollHeight + "px";
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
