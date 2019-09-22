<div id="sidebar" class="bg-pink-500 w-1/4">
    <nav id="nav-admin" class="px-6 pt-6 overflow-y-auto text-base">
        <div class="mb-10">
            <a id="btn-permissions-admin" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                <i class="fas fa-key w-8"></i>Permissions
                <i id="chevron-right-permissions" class="ml-5 fas fa-chevron-right"></i>
            </a>
            <div id="child-permissions-admin" class="overflow-hidden my-3 bg-pink-600">
                <div class="block">
                    <a href="<?php echo site_url('admin/permissions/user') ?>" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4" target="_blank"><i class="fas fa-user w-5"></i>User</a>
                </div>

                <div class="block">
                    <a href="<?php echo site_url('admin/settings/change-password') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                    <i class="fas fa-sticky-note w-5"></i> Post
                    </a>
                </div>
            </div>
            <a id="btn-settings-admin" href="javascript:void(0)" class="inline-block px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                <i class="fas fa-sliders-h w-8"></i>Settings
                <i id="chevron-right-settings" class="ml-5 fas fa-chevron-right"></i>
            </a>
            <div id="child-settings-admin" class="overflow-hidden my-3 bg-pink-600">
                <div class="block">
                    <a href="<?php echo site_url('admin/settings/privileges') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                        <i class="fas fa-user-secret w-5"></i>Privileges
                    </a>
                </div>
                <div class="block">
                    <a href="<?php echo site_url('admin/settings/change-password') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                        <i class="fas fa-lock w-5"></i>Change Password
                    </a>
                </div>
            </div>
            <a href="<?php echo site_url('/') ?>" target="_blank" class="inline-block items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                <i class="fas fa-home w-8"></i>Back to Front Page
            </a>
    </nav>
</div>
