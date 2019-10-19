<?php if(isset($_SESSION['logged_in'])):  ?>
<?php else: ?>
    <div class="flex flex-wrap overflow-hidden justify-center mt-20">
        <div class="w-1/3 overflow-hidden">

            <form id="form-sign-in" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" data-parsley-validate data-parsley-focus="first">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email-sign-in" id="email-sign-in" placeholder="E-mail" data-parsley-required data-parsley-email-regex>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password-sign-in" id="password-sign-in" type="password" placeholder="******************" data-parsley-required>
                </div>

                <div class="flex items-center justify-between">
                    <button id="form-submit-sign-in" class="bg-blue-500 hover:bg-blue-700  w-1/3 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>

            <p class="text-center text-gray-500 text-xs">
                &copy; 2019 Codeigniter - Tailwind CSS. All rights reserved.
            </p>

        </div>
    </div>
<?php endif; ?>


<!-- SIGN IN JS -->
<script src="<?php echo base_url('assets/js/sign_in.js') ?>"></script>

<!-- <div class="w-2/4">
    <div id="map" style="height: 600px;"></div>
</div> -->
