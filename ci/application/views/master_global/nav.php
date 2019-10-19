<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">Codeigniter - Tailwind CSS</span>
    </div>

    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
        </button>
    </div>

    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <?php if(isset($_SESSION['logged_in'])): ?>
                <a href="<?php echo site_url() ?>user/<?php echo $_SESSION['logged_in']['username']. $_SESSION['logged_in']['id']; ?>/profile" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Profile
                </a>
            <?php else: ?>
                <a href="<?php echo site_url() ?>" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Sign In
                </a>
            <?php endif; ?>
                <a href="<?php echo site_url() ?>sign-up-page" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Sign Up
                </a>
            <?php if(isset($_SESSION['logged_in'])): ?>
                <a href="<?php echo site_url() ?>sign-out" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Sign Out
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>
