    $(function() {
            $('#all-users-datatables').DataTable({
                dom: '"<"flex items-center"<"flex-grow items-center w-2/4"l><"flex flex-grow items-center w-2/4 justify-end"f>><"w-full"rt><"flex items-center"<"flex-grow items-center w-2/4"i><"flex flex-grow items-center w-2/4 justify-end"p>>',
                responsive: true,
                serverSide: true,
                ajax:
                {
                    url: "admin/all-users-datatables",
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
                        data: "option"
                    }
                ]
            }).on('processing.dt', function(e, settings, processing) {
                $(".wrapper-loader").css('display', processing ? 'block' : 'none');
                $(".loader").css('display', processing ? 'block' : 'none');
            });
    });

    function edit_user_datatables(id)
    {
        $.get('admin/edit-user-datatables', { id: id })
        .done(function(data) {
            let data_parse = JSON.parse(data);
            $("#wrapper-modal").html(data_parse.temp);
            toggleModal();
        })
    }

    function submit_update_user_datatables(evt)
    {

        setTimeout(() => {
            $.post('admin/update-user-datatables', $("#form-edit-user-datatables").serialize(), (data) => {
                let data_parse = JSON.parse(data);
                if(data_parse.valid)
                {
                    Swal.fire(
                        data_parse.title,
                        data_parse.desc,
                        data_parse.type
                    )
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

        evt.innerHTML = '<img src="../ci/assets/loader/loader.gif" style="width: 25px;">';
        evt.classList.add("cursor-not-allowed");
        evt.classList.add("opacity-50");
        evt.classList.remove("hover:text-pink-300");
        evt.disabled = true;


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
