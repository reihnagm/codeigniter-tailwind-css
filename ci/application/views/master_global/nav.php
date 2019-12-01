<nav class="flex overflow-hidden items-center justify-between p-6" style="background-image: url(<?php echo base_url('assets/nav.png'); ?>); background-repeat: no-repeat;">
    <div class="flex overflow-hidden items-center flex-shrink-0 text-white mr-6">
        <a id="logo" href="javascript:void(0);" class="text-gray-700 font-semibold text-xl tracking-tight">Codeigniter - Tailwind CSS</a>
    </div>

    <div class="w-full flex overflow-hidden flex-grow justify-end items-center w-auto">
        <?php if(isset($_SESSION['login'])): ?>
            <a id="profile" href="javascript:void(0);" class="text-white hover:text-gray-300 mr-4">
                Profile
            </a>
        <?php else: ?>
            <a id="sign-in-btn" class="cursor-pointer text-white hover:text-gray-300 mr-4">
                Sign In
            </a>
            <a id="sign-up-btn" class="cursor-pointer text-white hover:text-gray-300 mr-4">
                Sign Up
            </a>
        <?php endif; ?>
        <?php if(isset($_SESSION['login'])): ?>
            <a id="sign-out" href="javascript:void(0);" class="text-white hover:text-gray-300 mr-4">
                Sign Out
            </a>
        <?php endif; ?>
    </div>
</nav>

<!-- SIGN OUT -->
<script src="<?php echo base_url('assets/js/sign_out.js') ?>"></script>
