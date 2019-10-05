$(function() {

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

    $(document).on("click", ".trigger-checkbox-3", function() {
        if(svg.hasClass("hidden"))
        {
            svg.removeClass("hidden");
            svg.addClass("block");
        }
        else
        {
            svg.removeClass("block");
            svg.addClass("hidden");
        }
    });

});


function checkbox_privilege_create(id)
{
    let svg = $(".svg-privilege-create-"+id);

    if(svg.hasClass("hidden"))
    {
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_read(id)
{
    let svg = $(".svg-privilege-read-"+id);

    if(svg.hasClass("hidden"))
    {
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_update(id)
{
    let svg = $(".svg-privilege-update-"+id);

    if(svg.hasClass("hidden"))
    {
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_destroy(id)
{
    let svg = $(".svg-privilege-destroy-"+id);

    if(svg.hasClass("hidden"))
    {
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
