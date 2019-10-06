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
    let svg = $(".svg-privilege-create-"+id);
    let c = $("[name=c"+id+"]");

    if(svg.hasClass("hidden"))
    {
        c.prop("checked", true)
        c.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        c.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_read(id)
{
    let svg = $(".svg-privilege-read-"+id);
    let r = $("[name=r"+id+"]");

    if(svg.hasClass("hidden"))
    {
        r.prop("checked", true)
        r.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        svg.removeClass("block");
        r.val(0);
        svg.addClass("hidden");
    }
}
function checkbox_privilege_update(id)
{
    let svg = $(".svg-privilege-update-"+id);
    let u = $("[name=u"+id+"]");

    if(svg.hasClass("hidden"))
    {
        u.prop("checked", true)
        u.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        u.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}
function checkbox_privilege_destroy(id)
{
    let svg = $(".svg-privilege-destroy-"+id);
    let d = $("[name=d"+id+"]");

    if(svg.hasClass("hidden"))
    {
        d.prop("checked", true)
        d.val(1);
        svg.removeClass("hidden");
        svg.addClass("block");
    }
    else
    {
        d.val(0);
        svg.removeClass("block");
        svg.addClass("hidden");
    }
}

$("#form-privilege").submit(function(e){
    e.preventDefault();

    let unindexed_array = $(this).serializeArray();
    let indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    // OUTPUT
    // (8) [{....}, {....}, {....}, {....}]
    // 0: {name: "", value: ""}
    // 1: {name: "", value: ""}
    // 2: {name: "", value: ""}

    $.post(base_url + "admin/save-privilege",
    {
        data: unindexed_array
    }
    ,   (data) => {
            console.log(data);
        });
})
