// GETTING BASE URL
// const site_url = $("[name=site_url]").val();

// CHECKING BROWSER
// const url = $("[name=user_agent]").val() == "Firefox" ? "all-user-datatables" : "admin/all-user-datatables";

// $(document)
// .on('turbolinks:click', function() {
//     NProgress.start();
// })
// .on('turbolinks:render', function() {
//     NProgress.done();
//     NProgress.remove(); 
// });

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

            $("#form-edit-user-datatables").parsley({
                classHandler: function (el) {
                    return el.$element.closest('.form-group');
                },
                errorsWrapper: '<div class="border form-field invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>',
                errorTemplate: '<p></p>'
            }).on('field:success', function() {
                const el = this.$element[0].id
                $('#'+el).addClass("border-green-500");
                $('#'+el).parent().find(".form-field").hide(250);
                $('#'+el).parent().find(".form-field").addClass("opacity-0");
                $('#'+el).parent().find(".form-field").addClass("invisible");
            }).on('field:error', function() {
                const el = this.$element[0].id
                $('#'+el).parent().find(".form-field").removeClass("invisible");
                $('#'+el).parent().find(".form-field").addClass("visible");
                $('#'+el).parent().find(".form-field").show(250);
                $('#'+el).parent().find(".form-field").animate({opacity: 1.0}, 250);
                $('#'+el).removeClass("border-green-500");
            });   
            
            $("#first_name").inputmask({
                mask: "aaaaaaaaaaaa",
                casing: "lower",
                placeholder: "" // __ REMOVE UNDERLINE
            });

            $("#last_name").inputmask({
                mask: "aaaaaaaaaaaa",
                casing: "lower",
                placeholder: "" // __ REMOVE UNDERLINE
            });

            // NOT ALLOWED SPACE BAR
            $("#first_name").keydown(function(e) {
                if (e.keyCode == 32) {
                    return false;
                }
            });
            $("#last_name").keydown(function(e) {
                if (e.keyCode == 32) {
                    return false;
                }
            });
         
        }
    });
})(jQuery);

function edit_user_datatables(id)
{
    // const url = user_agent == "Firefox" ? "edit-user-datatables" : "admin/edit-user-datatables";
    $.get($("[name=site_url]").val() + "admin/edit-user-datatables", { id: id })
        .done(function(data) {
            $("[name=id").val(data.id);
            $("[name=avatar_trigger]").attr("src", data.avatar);
            $("[name=first_name]").val(data.first_name);
            $("[name=last_name]").val(data.last_name);
            $("[name=username]").html('<option value="'+data.username+'">'+data.username+'</option>');
            $("[name=email]").val(data.email);
            $("[name=gender]").val(data.gender);
            $("[name=age]").val(data.age);
            $("[name=created_at]").val(data.created_at);
            $("[name=updated_at]").val(data.updated_at);
            
            show_user_datatables();
            global_func();
    })
}
function edit_user_privilege_datatables(id)
{
    // const url = user_agent == "Firefox" ? "edit-user-datatables" : "admin/edit-user-datatables";
    $.get($("[name=site_url]").val() + "admin/edit-user-privilege-datatables", { id: id })
        .done(function(data) {
            global_func();
    })
}
function show_user_datatables()
{
    $(".modal-user-datatables").toggleClass("opacity-0");
    $(".modal-user-datatables").toggleClass("pointer-events-none");
    $("body").toggleClass("modal-active");

    // DEFAULT JAVASCRIPT
    // const body = document.querySelector('body');
    // const modal = document.querySelector('.modal');
    // modal.classList.toggle('opacity-0');
    // modal.classList.toggle('pointer-events-none');
    // body.classList.toggle('modal-active');
}
function close_show_user_datatables()
{
    $(".modal-user-datatables").toggleClass("opacity-0");
    $(".modal-user-datatables").toggleClass("pointer-events-none");
    $("body").toggleClass("modal-active");
}
$(document).keydown(function(event){
    var key = (event.keyCode ? event.keyCode : event.which);
    if (key == 27)
    {
        close_show_user_datatables();
    }
});
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
            }
            else
            {
                Swal.fire(
                    data.title,
                    data.desc,
                    data.type
                )
            }
            })
        }
    });
}
function destroy_user_privilege_datatables(id)
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
            $.post($("[name=site_url]").val() + "admin/destroy-user-privilege-datatables", { id : id })
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
$("#submit-edit-user-datatables").click(function() {
    if ($(this).attr('id') === "submit-edit-user-datatables") 
    { 
        $("#form-edit-user-datatables").submit();
    }
})
$("#form-edit-user-datatables").submit(function(e) {
    e.preventDefault();

    NProgress.start();
    $("#submit-edit-user-datatables").text('');
    $("#submit-edit-user-datatables").append('<img src="'+$("[name=site_url]").val()+'assets/loader/loader.gif" style="width: 25px; display: block; margin: 0 auto;">');
    $("#submit-edit-user-datatables").addClass("cursor-not-allowed");
    $("#submit-edit-user-datatables").addClass("opacity-50");
    $("#submit-edit-user-datatables").removeClass("hover:bg-pink-600");
    $("#submit-edit-user-datatables").prop("disabled", true);

    if($(this).parsley().isValid())
    {
        $.post($("[name=site_url]").val() + "admin/update-user-datatables", $("#form-edit-user-datatables").serialize() , function(data) {
            if(data.valid)
            {
                Swal.fire(
                    data.title,
                    data.description,
                    data.type
                )
                NProgress.done();
                $("#submit-edit-user-datatables").text('Submit');
                $("#submit-edit-user-datatables").removeClass("cursor-not-allowed");
                $("#submit-edit-user-datatables").removeClass("opacity-50");
                $("#submit-edit-user-datatables").addClass("hover:bg-pink-600");
                $("#submit-edit-user-datatables").prop("disabled", false);

                location.reload();
            }
        });      
    }  
})
$("#first_name").keyup(function() {

    $(this).val().replace(/ /g, "");

    $.ajax({
        url: $("[name=site_url]").val() + 'admin/get-suggestion-username',
        type: "GET",
        data: 
        {
            first_name: $("#first_name").val().trim(),
            last_name: $("#last_name").val().trim()
        }, 
        success: function(data) {
           $("#username").html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
});
$("#last_name").keyup(function() {
    
    $(this).val().replace(/ /g, "");

    $.ajax({
        url: $("[name=site_url]").val() + 'admin/get-suggestion-username',
        type: "GET",
        data: 
        {
            first_name: $("#first_name").val().trim(),
            last_name: $("#last_name").val().trim()
        }, 
        success: function(data) {
           $("#username").html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
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
