 <!-- text-base SAME AS font-size -->
<!-- sticky?lg:h-screen SAME AS height: 100vh !important -->
<!-- h-6 SAME AS height: num rem -->
<!-- w-6 SAME AS width: num rem -->
<!-- pt-0 SAME AS padding-top: 0 !important -->
<!-- overflow-y-auto SAME AS overflow-y: auto -->
<!-- mx-auto SAME AS margin-left: auto !important AND margin-right: auto !important-->
<!-- px SAME AS padding-left: num AND padding-right: num -->
<!-- mx SAME AS margin-left: num AND margin-right: num -->
<!-- min-h-screen SAME AS min-height: 100vh -->
<!-- max-h-full SAME AS min-height: 100% -->
<!-- overflow-y-visible SAME AS overflow-y: visible !important -->
<!-- z-90 SAME AS z-index: 90 !important -->
<!-- xl SAME AS min-width: 1280px -->
<!-- lg SAME AS min-width: 1024px -->
<!-- w-1/2 SAME AS width: 50% -->
<!-- w-1/3 SAME AS 	width: 33.333333% -->
<!-- w-2/3 SAME AS width: 66.666667% -->
<!-- w-1/4 SAME AS width: 25% -->
<!-- w-2/4 SAME AS width: 50% -->
<!-- w-3/4 SAME AS width: 75% -->
<!-- w-1/5 SAME AS width: 20% -->
<!-- w-2/5 SAME AS width: 40% -->
<!-- w-3/5 SAME AS width: 60% -->
<!-- w-4/5 SAME AS width: 80% -->
<!-- w-1/6 SAME AS width: 16.666667% -->


<div class="h-16 flex items-center relative">
    <div class="w-full mx-auto px-6">
        <div class="flex items-center -mx-6">

            <div class="w-1/4 pl-6 pr-6">
                <div class="flex items-center">
                    <a id="your-logo" class="block mr-4" href="javascript:void(0)">Your Logo</a>
                </div>
            </div>

            <div class="flex justify-end w-3/4 h-16 border-b-2 border-gray-300">
                <div class="flex justify-start items-center w-1/4 px-6">

                    <div class="p-2 bg-pink-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                        <span class="flex rounded-full bg-pink-300 uppercase px-2 py-1 text-xs font-bold mr-3">5</span>
                        <span class="font-semibold mr-2 text-left flex-auto">
                            <i class="fas fa-bell"></i>
                        </span>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                    </div>

                    <a id="btn-nav-admin" href="javascript:void(0)"
                        class="relative block text-pink-500 flex items-center hover:text-pink-300 ml-6">
                        <i id="chevron-right-nav" class="fas fa-chevron-right"></i>
                    </a>

                </div>
            </div>

        </div>
    </div>


    <div id="child-nav-admin" class="absolute overflow-hidden max-height-0 max-height-with-transition bg-pink-500">
        <div class="block">
            <a href="<?php echo site_url('admin/settings/privileges') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                <i class="fas fa-user w-5"></i> Profile
            </a>
        </div>
        <div class="block">
            <a href="<?php echo site_url('admin/logout') ?>" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-3 mx-4">
                <i class="fas fa-sign-out-alt w-5"></i> Logout
            </a>
        </div>
    </div>

</div>
