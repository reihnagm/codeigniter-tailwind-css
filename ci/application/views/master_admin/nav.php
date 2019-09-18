 <!-- text-base SAME AS font-size -->
<!-- sticky?lg:h-screen SAME AS height: 100vh !important -->
<!-- h-6 SAME AS height: num rem -->
<!-- w-6 SAME AS width: num rem -->
<!-- pt-0 SAME AS padding-top: 0 !important -->
<!-- overflow-y-auto SAME AS overflow-y: auto -->
<!-- mx-auto SAME AS margin-left: auto !important AND margin-right: auto !important-->
<!-- overflow-y-visible SAME AS overflow-y: visible !important -->
<!-- z-90 SAME AS z-index: 90 !important -->

<div class="h-16 flex items-center">
    <div class="w-full max-w-screen-xl relative mx-auto px-6">
        <div class="flex items-center -mx-6">

            <div class="lg:w-1/4 xl:w-1/5 pl-6 pr-6 lg:pr-8">
                <div class="flex items-center">
                    <a class="block lg:mr-4" href="javascript:void(0)">Your Logo</a>
                </div>
            </div>

            <div class="flex flex-grow items-center justify-end lg:w-3/4 xl:w-4/5">
                <div class="hidden lg:block lg:w-1/4 px-6">
                    <div class="flex justify-start items-center text-grey">
                        <a href="javascript:void(0)" class="block flex items-center hover:text-grey-darker mr-6">
                            <i class="fas fa-bell"></i>
                        </a>
                        <a href="javascript:void(0)" class="block flex items-center hover:text-grey-darker mr-6">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="w-full max-w-screen-xl mx-auto px-6">
    <div class="lg:flex -mx-6">

        <div id="sidebar" class="hidden absolute z-90 top-28 bg-white w-full lg:static lg:bg-pink-500 lg:w-1/4 lg:block xl:w-1/5">
            <div class="lg:block lg:relative lg:sticky lg:top-28">
                <nav id="nav-admin" class="px-6 pt-6 overflow-y-auto text-base sticky?lg:h-screen">
                    <div class="mb-10">
                        <a href="javascript:void(0)" class="flex items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                        <i class="fas fa-key w-8"></i>Permission</a>
                        <a href="javascript:void(0)" class="flex items-center px-2 -mx-2 py-1 hover:text-pink-300 font-medium text-white">
                        <i class="fas fa-sliders-h w-8"></i>Settings</a>
                    </div>
                </nav>
            </div>
        </div>

        <div id="content-wrapper" class="min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible lg:w-3/4 xl:w-4-5">
            <div id="content">
                <div id="app" class="flex">
                    <div class="pt-24 pb-16 lg:pt-28 w-full">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
