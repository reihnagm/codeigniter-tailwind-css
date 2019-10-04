<div class="min-h-screen w-3/4">

    <!-- WRAPPER MODAL -->
    <div id="wrapper-modal"></div>

    <!-- LOADER PAC-MAN ^_^ -->
    <div class="wrapper-loader fixed">
        <div class="loader"></div>
    </div>

    <!-- COUNT USER DATATABLES -->
    <input type="hidden" name="count_user_datatables" value="<?php echo get_user_datatables_count(); ?>">

    <div class="markdown mt-24 mb-6 px-6 max-w-3xl">
        <table id="all-user-datatables" class="w-full text-left table-collapse">
            <thead>
                <tr>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">No</th>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">First Name</th>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Last Name</th>
                    <!-- <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Age</th>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Gender</th> -->
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Username</th>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Email</th>
                    <!-- <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Join Date</th>
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Update Date</th> -->
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Option</th>
                </tr>
            </thead>
            <tbody class="align-baseline"></tbody>
        </table>
    </div>

</div>
