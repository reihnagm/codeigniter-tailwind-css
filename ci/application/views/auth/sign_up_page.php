<div class="flex flex-wrap overflow-hidden justify-center mt-10">
    <div class="w-1/3 overflow-hidden">

        <form id="form-sign-up" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" data-parsley-validate data-parsley-focus="first">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name" type="text" placeholder="First Name" data-parsley-required data-parsley-group="block1">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name" type="text" placeholder="Last Name" data-parsley-required data-parsley-group="block2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Username" data-parsley-required data-parsley-username-regex data-parsley-group="block2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" placeholder="E-mail" data-parsley-required data-parsley-email-regex data-parsley-group="block1">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password-sign-up-first" type="password" name="password" placeholder="******************" data-parsley-required data-parsley-password-regex data-parsley-group="block1">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password Confirmation
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password-confirmation" type="password" data-parsley-required data-parsley-equalto="#password-sign-up-first" data-parsley-group="" placeholder="******************">
            </div>

            <div class="flex items-center justify-between">
                <button id="form-submit-sign-up" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Sign Up
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="<?php site_url(); ?>forgot-password-page">
                    Forgot Password?
                </a>
            </div>
        </form>


        <p class="text-center text-gray-500 text-xs">
            &copy; 2019 Codeigniter - Tailwind CSS. All rights reserved.
        </p>

    </div>
</div>
