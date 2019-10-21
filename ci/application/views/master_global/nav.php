<nav class="flex overflow-hidden items-center justify-between p-6" style="background-image: url(<?php echo base_url('assets/nav.png'); ?>); background-repeat: no-repeat;">
    <div class="flex overflow-hidden items-center flex-shrink-0 text-white mr-6">
        <a id="logo" href="javascript:void(0);" class="block font-semibold text-xl tracking-tight bg-pink-400 p-2 rounded-full  hover:bg-pink-500">Codeigniter - Tailwind CSS</a>
    </div>

    <div class="w-full flex overflow-hidden flex-grow justify-end items-center w-auto">
        <?php if(isset($_SESSION['logged_in'])): ?>
            <input type="hidden" name="session_username" value="<?php echo $_SESSION['logged_in']['username'] ?>">
            <input type="hidden" name="session_id" value="<?php echo $_SESSION['logged_in']['id'] ?>">
            <a id="profile" href="javascript:void(0);" class="block bg-pink-400 rounded-full p-2 text-white hover:bg-pink-500 mr-4">
                Profile
            </a>
        <?php else: ?>
            <a href="<?php echo site_url() ?>" class="block bg-pink-400 rounded-full p-2 text-white hover:bg-pink-500 mr-4">
                Sign In
            </a>
            <a href="<?php echo site_url() ?>sign-up-page" class="block bg-pink-400 rounded-full p-2 text-white hover:bg-pink-500 mr-4">
                Sign Up
            </a>
        <?php endif; ?>
        <?php if(isset($_SESSION['logged_in'])): ?>
            <a id="sign-out" href="javascript:void(0);" class="block bg-pink-400 rounded-full p-2 text-white hover:bg-pink-500 text-white  mr-4">
                Sign Out
            </a>
        <?php endif; ?>
    </div>
</nav>

<!-- SIGN OUT -->
<script src="<?php echo base_url('assets/js/sign_out.js') ?>"></script>
