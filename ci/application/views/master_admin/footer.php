    <!-- JQUERY JS -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <!-- DATATABLES JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- DATATABLES RESPONSIVE JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        let all_users_permission_table = $('#all-users-permission-table').DataTable({
            dom: '"<"flex items-center"<"flex-grow items-center w-2/4"l><"flex flex-grow items-center w-2/4 justify-end"f>><"w-full"rt><"flex items-center"<"flex-grow items-center w-2/4"i><"flex flex-grow items-center w-2/4 justify-end"p>>',
            responsive: true
        })
        .columns.adjust()
        .responsive.recalc();

        $(document).on("click", "", function() {
            
        })
    </script>

    </body>
</html>
