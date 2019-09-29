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
                    data: "age"
                },
                {
                    data: "gender"
                },
                {
                    data: "username"
                },
                {
                    data: "email"
                },
                {
                    data: "created_at",
                },
                {
                    data: "updated_at"
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
