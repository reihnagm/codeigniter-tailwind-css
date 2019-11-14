<div class="min-h-screen w-3/4">
    <!-- WRAPPER MODAL -->
    <!-- <div id="wrapper-modal"></div> -->

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
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Join Date</th>
                    <!-- <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Update Date</th>  -->
                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Option</th>
                </tr>
            </thead>
            <tbody class="align-baseline"></tbody>
        </table>
    </div>

    <div class="modal-user-datatables opacity-0 pointer-events-none z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">
        
		<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div onclick="close_modal();" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <div class="modal-content py-4 text-left px-6 w-full">
                <div class="flex justify-end items-center pb-3">
                    <div onclick="close_modal();" class="cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <form id="form-edit-user-datatables" class="flex -mx-5" data-parsley-validate data-parsley-focus="first">
                    <div class="w-1/3 overflow-hidden my-5 px-5">
                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="id">
                                ID
                            </label>
                            <input id="id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="id" type="text" readonly>
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                                First Name
                            </label>
                            <input id="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="First Name" name="first_name" data-parsley-required>
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                                Last Name
                            </label>
                            <input id="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Last Name" name="last_name" data-parsley-required>
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Username
                            </label>
                            <div class="relative">
                                <select id="username" name="username" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required>

                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/3 overflow-hidden my-5 px-5">
                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                E-mail
                            </label>
                            <input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Email" name="email">
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                            Gender
                            </label>
                            <div class="relative">
                                <select id="gender" name="gender" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
                                Age
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="age" type="text" name="age">
                        </div>

                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="created_at">
                                Created
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="created_at" type="text" name="created_at">
                        </div>
                    </div>

                    <div class="w-1/3 overflow-hidden my-5 px-5">
                        <div class="block mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="updated_at">
                                Updated
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="updated_at" type="text" name="updated_at" readonly>
                        </div>
                        <div class="block my-5 mx-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="avatar">
                                Avatar
                            </label>
                            <div class="bg-gray-400 hover:bg-gray-500 cursor-pointer">
                                <form id="form-avatar" enctype="mulitpart/form-data">
                                    <input id="avatar" type="file" class="hidden" name="avatar">
                                    <img id="avatar-trigger" name="avatar_trigger" class="h-40 w-full object-contain">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap overflow-hidden w-full justify-end my-6">
                        <div class="flex justify-end w-1/2">
                            <button id="submit-edit-user-datatables" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:bg-pink-600 mr-2">Submit</button>
                            <button onclick="close_show_user_datatables();" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300">Close</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
	</div>

</div>





