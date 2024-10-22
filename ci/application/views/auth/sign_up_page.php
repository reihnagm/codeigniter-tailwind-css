<div class="flex flex-wrap overflow-hidden justify-center mt-10">
    <div class="w-1/3 overflow-hidden">

        <form id="form-sign-up" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" data-parsley-validate data-parsley-focus="first">

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name" type="text" placeholder="First Name" data-parsley-required>
            </div>

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name" type="text" placeholder="Last Name" data-parsley-required>
            </div>

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username-sign-up" type="text" placeholder="Username" data-parsley-required data-parsley-username-regex>
            </div>

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email-sign-up" placeholder="E-mail" data-parsley-required data-parsley-email-regex>
            </div>

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password-sign-up" type="password" name="password" placeholder="******************" data-parsley-required data-parsley-password-regex>
            </div>

            <div class="mb-4 form-group">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password Confirmation
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password-confirmation" type="password" data-parsley-required data-parsley-equalto="#password-sign-up"  placeholder="******************">
            </div>

            <div class="flex flex-wrap overflow-hidden items-center justify-between">
                <button id="form-submit-sign-up" class="bg-gray-700 hover:bg-gray-600 text-white font-bold w-1/3 py-2 px-2 rounded" type="submit">
                    Sign Up
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-600" href="<?php site_url(); ?>forgot-password-page">
                    Forgot Password?
                </a>
            </div>
        </form>


        <p class="text-center text-gray-500 text-xs">
            &copy; 2019 Codeigniter - Tailwind CSS. All rights reserved.
        </p>

    </div>
</div>


<!-- SIGN UP JS -->
<script src="<?php echo base_url('assets/js/sign_up.js') ?>"> </script>
