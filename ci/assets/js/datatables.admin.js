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
            columns: [{
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
                }
            ]
        }).on('processing.dt', function(e, settings, processing) {
            $(".wrapper-loader").css('display', processing ? 'block' : 'none');
            $(".loader").css('display', processing ? 'block' : 'none');
        });
});
