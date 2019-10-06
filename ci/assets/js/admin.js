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
function checkbox_privilege_create(subject, id)
{

    let svg = $(".svg-privilege-create-"+id);
    let checkbox_privilege_create = $("[name="+subject+"_privilege_create_"+id+"]");

    if(svg.hasClass("hidden"))
    {
        checkbox_privilege_create.prop("checked", true)
        checkbox_privilege_create.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        checkbox_privilege_create.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_read(subject, id)
{
    let svg = $(".svg-privilege-read-"+id);
    let checkbox_privilege_read = $("[name="+subject+"_privilege_read_"+id+"]");

    if(svg.hasClass("hidden"))
    {
        checkbox_privilege_read.prop("checked", true)
        checkbox_privilege_read.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        checkbox_privilege_read.val(0);
        svg.addClass("hidden");
    }
}
function checkbox_privilege_update(subject, id)
{
    let svg = $(".svg-privilege-update-"+id);
    let checkbox_privilege_update = $("[name="+subject+"_privilege_update_"+id+"]");

    if(svg.hasClass("hidden"))
    {
        checkbox_privilege_update.prop("checked", true)
        checkbox_privilege_update.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        checkbox_privilege_update.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_destroy(subject, id)
{
    let svg = $(".svg-privilege-destroy-"+id);
    let checkbox_privilege_destroy = $("[name="+subject+"_privilege_destroy_"+id+"]");

    if(svg.hasClass("hidden"))
    {
        checkbox_privilege_destroy.prop("checked", true)
        checkbox_privilege_destroy.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        checkbox_privilege_destroy.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}

$("#form-privilege").submit(function(e){
    e.preventDefault();
    $.post(base_url + "admin/save-privilege",
    {
        data: $(this).serializeArray()
    }
    ,   (data) => {
            console.log(data);
        });
})
