<div id="sidebar" class="bg-pink-500 w-1/4">
    <div class="lg:relative lg:sticky">
        <nav id="nav-admin" class="px-6 pt-6 overflow-y-auto text-base sticky?lg:h-screen">
            <div class="mb-10">
                <a id="btn-permissions-admin" href="javascript:void(0)" class="flex items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-key w-8"></i>Permissions
                    <i id="chevron-right-permissions" class="w-8 ml-5 fas fa-chevron-right"></i>
                </a>
                <div id="child-permissions-admin" class="overflow-hidden my-3 bg-pink-600">
                    <a href="#" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4" target="_blank"><i class="fas fa-user w-5"></i>User</a>
                </div>
                <a id="btn-settings-admin" href="javascript:void(0)" class="flex items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                    <i class="fas fa-sliders-h w-8"></i>Settings
                    <i id="chevron-right-settings" class="w-8 ml-5 fas fa-chevron-right"></i>
                </a>
                <div id="child-settings-admin" class="overflow-hidden my-3 bg-pink-600">
                    <a href="<?php echo site_url('admin/privileges') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                        <i class="fas fa-user-secret w-5"></i>Privileges
                    </a>
                    <a href="<?php echo site_url('admin/change-password') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                        <i class="fas fa-lock w-5"></i>Change Password
                    </a>
                </div>
        </nav>
    </div>
</div>
