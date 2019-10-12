<div class="flex flex-wrap overflow-hidden justify-center mt-20">
    <div class="w-1/3 overflow-hidden">

        <form action="<?php echo base_url() ?>sign-in" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="E-mail">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>

            <a href="<?php echo base_url() ?>sign-up-page" class="mt-4 text-right text-sm block align-baseline font-bold text-blue-500 hover:text-blue-800">
                Register
            </a>

        </form>


        <p class="text-center text-gray-500 text-xs">
            &copy; 2019 Codeigniter - Tailwind CSS. All rights reserved.
        </p>

    </div>
</div>

<div class="w-2/4">
    <div id="map" style="height: 600px;"></div>
</div>
