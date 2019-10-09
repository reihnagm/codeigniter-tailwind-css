<input type="hidden" name="count_admin_group_menu" value="<?php echo get_menus_admin_count(); ?>">

<div id="sidebar" class="bg-pink-500 w-1/4">
    <nav id="nav-admin" class="px-6 pt-6 overflow-y-auto text-base">
        <div class="mb-10">

            <div class="block">
                <a href="<?php echo base_url('admin'); ?>" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-tachometer-alt w-8"></i>Dashboard
                </a>
            </div>

            <?php echo $data["get_menus_admin"]; ?>

            <a  href="<?php echo base_url(); ?>" class="inline-block items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                <i class="fas fa-home w-8"></i>Back to Front Page
            </a>

        </div>
    </nav>
</div>
