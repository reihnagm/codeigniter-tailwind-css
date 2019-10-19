<nav class="flex overflow-hidden items-center justify-between bg-teal-500 p-6">
    <div class="flex overflow-hidden items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">Codeigniter - Tailwind CSS</span>
    </div>

    <div class="w-full flex overflow-hidden flex-grow justify-end items-center w-auto">
        <?php if(isset($_SESSION['logged_in'])): ?>
            <a href="<?php echo site_url() ?>user/<?php echo $_SESSION['logged_in']['username']. $_SESSION['logged_in']['id']; ?>/profile" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Profile
            </a>
        <?php else: ?>
            <a href="<?php echo site_url() ?>" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Sign In
            </a>
            <a href="<?php echo site_url() ?>sign-up-page" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Sign Up
            </a>
        <?php endif; ?>
        <?php if(isset($_SESSION['logged_in'])): ?>
            <a href="<?php echo site_url() ?>sign-out" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                Sign Out
            </a>
        <?php endif; ?>
    </div>
</nav>
