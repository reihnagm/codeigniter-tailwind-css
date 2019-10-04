<input type="hidden" name="count_admin_group_menu" value="<?php echo get_menus_admin_count(); ?>">

<div id="sidebar" class="bg-pink-500 w-1/4">
    <nav id="nav-admin" class="px-6 pt-6 overflow-y-auto text-base">
        <div class="mb-10">

            <div class="block">
                <a href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-tachometer-alt w-8"></i>Dashboard
                </a>
            </div>

            <?php echo $data["get_menus_admin"]; ?>

            <!-- <div class="block">
                <a id="btn-admin-trigger-dropdown-1" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-database w-8"></i>Object Data
                    <i id="chevron-right-permissions" class="ml-5 fas fa-chevron-right"></i>
                </a>
            </div> -->

            <!-- <div id="content-admin-trigger-2" class="overflow-hidden bg-pink-600">
                <div class="block">
                    <a href="<?php echo site_url('admin/permissions/user') ?>" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4" target="_blank"><i class="fas fa-user w-5"></i>User</a>
                </div>

                <div class="block">
                    <a href="<?php echo site_url('admin/settings/change-password') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                    <i class="fas fa-sticky-note w-5"></i> Post
                    </a>
                </div>
            </div> -->

            <!-- <div class="block">
                <a id="btn-admin-trigger-dropdown-2" href="javascript:void(0)" class="inline-block px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-sliders-h w-8"></i>Settings
                    <i id="chevron-right-settings" class="ml-5 fas fa-chevron-right"></i>
                </a>
            </div> -->

            <!-- <div id="child-settings-admin" class="overflow-hidden bg-pink-600">
                <div class="block">
                    <a href="<?php echo site_url('admin/settings/privileges') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                        <i class="fas fa-user-secret w-5"></i>Privileges
                    </a>
                </div>
                <div class="block">
                    <a href="<?php echo site_url('admin/settings/change-password') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                        <i class="fas fa-lock w-5"></i>Change Password
                    </a>
                </div>
            </div> -->



            <a href="<?php echo site_url('/') ?>" target="_blank" class="inline-block items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                <i class="fas fa-home w-8"></i>Back to Front Page
            </a>

    </nav>
</div>
