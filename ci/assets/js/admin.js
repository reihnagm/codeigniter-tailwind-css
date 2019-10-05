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
});
function checkbox_privilege_create(id)
{
    let type = $("[name=subject_privilege_create_"+id+"]").val();

    let checkbox_privilege_create = $("[name="+type+"_privilege_create_"+id+"]")

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
    let type = $("[name=subject_privilege_read_"+id+"]").val();

    let checkbox_privilege_read = $("[name="+type+"_privilege_read_"+id+"]")

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
    let type = $("[name=subject_privilege_update_"+id+"]").val();

    let checkbox_privilege_update = $("[name="+type+"_privilege_update_"+id+"]")

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
    let type = $("[name=subject_privilege_destroy_"+id+"]").val();

    let checkbox_privilege_destroy = $("[name="+type+"_privilege_destroy_"+id+"]")

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
function save_privilege()
{
    // GETTING BASE URL
    const base_url = $("[name=base_url]").val();

    $.post(base_url + "admin/save-privilege",
    {
        create: $("[name=privilege_create]").val(),
        read: $("[name=privilege_read]").val(),
        update: $("[name=privilege_update]").val(),
        destroy: $("[name=privilege_destroy]").val()
    }
    ,   (data) => {
            console.log(data);
        });
}
