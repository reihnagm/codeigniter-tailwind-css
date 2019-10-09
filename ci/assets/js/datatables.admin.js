    // CHECKING BROWSER
    const user_agent = $("[name=user_agent]").val();

    // GETTING BASE URL
    const base_url = $("[name=base_url]").val();

    let url = user_agent == "Firefox" ? "all-user-datatables" : "admin/all-user-datatables";

    var called_properties_global;

    $(function() {
        let all_user_datatables = $('#all-user-datatables').DataTable({
            dom: '"<"flex items-center"<"flex-grow items-center w-2/4"l><"flex flex-grow items-center w-2/4 justify-end"f>><"w-full"rt><"flex items-center"<"flex-grow items-center w-2/4"i><"flex flex-grow items-center w-2/4 justify-end"p>>',
            responsive: true,
            serverSide: true,
            ajax:
            {
                url: base_url + "admin/all-user-datatables",
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

        all_user_datatables.on('order.dt search.dt', function() {
            all_user_datatables.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw()

        called_properties_global = function()
        {
            const updated_at = $("#updated_at").val();

            $("#updated_at").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment(updated_at, 'YYYY/MM/DD'),
                locale: {
                    format: 'YYYY/MM/DD'
                }
            });
        }

    });

    function edit_user_datatables(id)
    {
        let url = user_agent == "Firefox" ? "edit-user-datatables" : "admin/edit-user-datatables";

        $.get(base_url + "admin/edit-user-datatables", { id: id })
        .done(function(data) {
            let data_parse = JSON.parse(data);
            $("#wrapper-modal").html(data_parse.temp);
            called_properties_global();
            toggleModal();
        })
    }

    function destroy_user_datatables(id)
    {
        $.post(base_url + "admin/destroy-user-datatables", { id : id})
        .done(function(data) {
            let data_parse = JSON.parse(data);
            if(data_parse.valid)
            {
                Swal.fire(
                    data_parse.title,
                    data_parse.desc,
                    data_parse.type
                )
                location.reload();
                close_modal();
            }
            else
            {
                Swal.fire(
                    data_parse.title,
                    data_parse.desc,
                    data_parse.type
                )
            }

            toggleModal();
        })
    }

    function validate_update_user_datatables()
    {
        if($("#first_name").val() === '' || $("#last_name").val() == '')
        {
            alert('test');
            return false;
        }
    }

    function submit_update_user_datatables(evt)
    {

        if(validate_update_user_datatables())
        {
            setTimeout(() => {
                $.post(base_url + "admin/update-user-datatables", $("#form-edit-user-datatables").serialize(), (data) => {
                    let data_parse = JSON.parse(data);
                    if(data_parse.valid)
                    {
                        Swal.fire(
                            data_parse.title,
                            data_parse.desc,
                            data_parse.type
                        )
                        location.reload();

                        evt.innerHTML = '<img src="'+base_url+'assets/loader/loader.gif" style="width: 25px;">';
                        evt.classList.add("cursor-not-allowed");
                        evt.classList.add("opacity-50");
                        evt.classList.remove("hover:text-pink-300");
                        evt.disabled = true;
                        
                        close_modal();
                    }
                    else
                    {
                        Swal.fire(
                            data_parse.title,
                            data_parse.desc,
                            data_parse.type
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

    function toggleModal ()
    {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }
