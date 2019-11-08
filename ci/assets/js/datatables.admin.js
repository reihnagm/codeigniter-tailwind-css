// CHECKING BROWSER
const user_agent = $("[name=user_agent]").val();

// // GETTING BASE URL
// const site_url = $("[name=site_url]").val();

// const url = user_agent == "Firefox" ? "all-user-datatables" : "admin/all-user-datatables";

$(document)
.on('turbolinks:click', function() {
    NProgress.start();
})
.on('turbolinks:render', function() {
    NProgress.done();
    NProgress.remove(); 
});

var global_func;

(function ($) {
    'use strict';
    $(function() {

    const user_datatables = $('#all-user-datatables').DataTable({
        dom: '"<"flex items-center"<"flex-grow items-center w-2/4"l><"flex flex-grow items-center w-2/4 justify-end"f>><"w-full"rt><"flex items-center"<"flex-grow items-center w-2/4"i><"flex flex-grow items-center w-2/4 justify-end"p>>',
        responsive: true,
        serverSide: true,
        ajax:
        {
            url: $("[name=site_url]").val() + "admin/all-user-datatables",
            dataType: "JSON",
            type: "GET"
        },
        columnDefs: [
            {
                targets: "_all",
                createdCell: function (td, cellData, rowData, row, col)
                {
                    $(td).css("color", "#2b6cb0")
                    $(td).css("whitespace", "pre")
                    $(td).css("font-size", ".75rem")
                    $(td).css("padding", ".5rem")
                    $(td).css("border-color", "#edf2f7")
                    $(td).css("border-top-width", "1px")
                    $(td).css("font-family", "Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace")
                }
            }
        ],
        columns: [
            {
                data: "no",
                searchable: false,
                orderable: false,
            },
            {
                data: "first_name"
            },
            {
                data: "last_name"
            },
            {
                data: "username"
            },
            {
                data: "email"
            },
            {
                data: "created_at"
            },
            {
                data: "option"
            }
        ]
    }).on('processing.dt', function(e, settings, processing) {
        $(".wrapper-loader").css('display', processing ? 'block' : 'none');
        $(".loader").css('display', processing ? 'block' : 'none');
    })

    user_datatables.on('order.dt search.dt', function() {
        user_datatables.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw()

    const user_privilege_datatables = $("#all-user-privilege-datatables").DataTable({
        dom: '"<"flex items-center"<"flex-grow items-center w-2/4"l><"flex flex-grow items-center w-2/4 justify-end"f>><"w-full"rt><"flex items-center"<"flex-grow items-center w-2/4"i><"flex flex-grow items-center w-2/4 justify-end"p>>',
        responsive: true,
        serverSide: true,
        ajax: {
            url: $("[name=site_url]").val() + "admin/all-user-privilege-datatables",
            dataType: "JSON",
            type: "GET"
        },
        columnDefs: [
            {
                targets: "_all",
                createdCell: function (td, cellData, rowData, row, col)
                {
                    $(td).css("color", "#2b6cb0")
                    $(td).css("whitespace", "pre")
                    $(td).css("font-size", ".75rem")
                    $(td).css("padding", ".5rem")
                    $(td).css("border-color", "#edf2f7")
                    $(td).css("border-top-width", "1px")
                    $(td).css("font-family", "Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace")
                }
            }
        ],
        columns: [
            {
                data: "no",
                searchable: false,
                orderable: false,
            },
            {
                data: "username"
            },
            {
                data: "email"
            },
            {
                data: "name"
            },
            {
                data: "option"
            }
        ]
    }).on('processing.dt', function(e, settings, processing) {
        $(".wrapper-loader").css('display', processing ? 'block' : 'none');
        $(".loader").css("display", processing ? 'block' : 'none');
    })

    user_privilege_datatables.on('order.dt search.dt', function() {
        user_privilege_datatables.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw()

    global_func = function()
    {
        const created_at = $("#created_at").val();

        $("#created_at").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate: moment(created_at, 'YYYY/MM/DD'),
            locale:
            {
                format: 'YYYY/MM/DD'
            }
        });

        $(".daterangepicker").addClass("custom-movement");
    }

    

    });
})(jQuery);

function edit_user_datatables(id)
{
    // const url = user_agent == "Firefox" ? "edit-user-datatables" : "admin/edit-user-datatables";

    $.get($("[name=site_url]").val() + "admin/edit-user-datatables", { id: id })
        .done(function(data) {
            $("#wrapper-modal").html(data.temp);
            global_func();
            toggleModal();
        })
}

function edit_user_privilege_datatables(id)
{
    // const url = user_agent == "Firefox" ? "edit-user-datatables" : "admin/edit-user-datatables";

    $.get($("[name=site_url]").val() + "admin/edit-user-privilege-datatables", { id: id })
        .done(function(data) {
            $("#wrapper-modal").html(data.temp);
            global_func();
            toggleModal();
        })
}

function destroy_user_datatables(id)
{
    Swal.fire({
        title: 'Delete User ?',
        inputAttributes: {
          autocapitalize: 'off'
        },
        icon: 'question',
        confirmButtonColor: '#d53f8c',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true,
        showCancelButton: true
    }).then((result) => {
        if(result.value)
        {
            $.post($("[name=site_url]").val() + "admin/destroy-user-datatables", { id : id })
            .done(function(data) {

            if(data.valid)
            {
                Swal.fire(
                    data.title,
                    data.desc,
                    data.type,
                )
                location.reload();
                close_modal();
            }
            else
            {
                Swal.fire(
                    data.title,
                    data.desc,
                    data.type
                )
            }

                toggleModal();
            })
        }
    });
    
}

function validate_update_user_datatables()
{
    if(!$("#form-edit-user-datatables").parsley().isValid())
    {   
        $('.errors').html("<p>This value is required.</p>");
        $('.errors').parent().find(".form-field").removeClass("invisible");
        $('.errors').parent().find(".form-field").addClass("visible");
        $('.errors').parent().find(".form-field").show(250);
        $('.errors').parent().find(".form-field").animate({opacity: 1.0}, 250);

        return false;
    }

    $('.errors').parent().find(".form-field").hide(250);
    $('.errors').parent().find(".form-field").addClass("opacity-0");
    $('.errors').parent().find(".form-field").addClass("invisible");

    $("#submit_update_user_datatables").text('');
    $("#submit_update_user_datatables").append('<img src="'+$("[name=site_url]").val()+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
    $("#submit_update_user_datatables").addClass("cursor-not-allowed");
    $("#submit_update_user_datatables").addClass("opacity-50");
    $("#submit_update_user_datatables").removeClass("hover:text-pink-300");
    $("#submit_update_user_datatables").prop("disabled",true);

    return true;
}

function submit_update_user_datatables()
{
    if(validate_update_user_datatables())
    {
        setTimeout(() => {
            $.post($("[name=site_url]").val() + "admin/update-user-datatables", $("#form-edit-user-datatables").serialize(), (data) => {
                if(data.valid)
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                    location.reload();
                    close_modal();
                }
                else
                {
                    Swal.fire(
                        data.title,
                        data.desc,
                        data.type
                    )
                }
            });
        }, 400);
    }
}

function close_modal()
{
    toggleModal();
}

$(document).keydown(function(event){
    var key = (event.keyCode ? event.keyCode : event.which);
    if (key == 27)
    {
        toggleModal();
    }
});

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
function show_user_privilege_datatables(user_id)
{
}
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
function toggleModal ()
{
    // const body = document.querySelector('body');
    // const modal = document.querySelector('.modal');
    const body = $("body");
    const modal = $(".modal");

    modal.toggleClass("opacity-0");
    modal.toggleClass("pointer-events-none");
    body.toggleClass("modal-active");
    // modal.classList.toggle('opacity-0');
    // modal.classList.toggle('pointer-events-none');
    // body.classList.toggle('modal-active');
}
