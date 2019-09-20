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


<div class="h-16 flex items-center">
    <div class="w-full max-w-screen-xl relative mx-auto px-6">
        <div class="flex items-center -mx-6">

            <div class="lg:w-1/4 xl:w-1/5 pl-6 pr-6 lg:pr-8">
                <div class="flex items-center">
                    <a class="block lg:mr-4" href="javascript:void(0)">Your Logo</a>
                </div>
            </div>

            <div class="flex flex-grow items-center justify-end w-3/4">
                <div class="hidden lg:block lg:w-1/4 px-6">
                    <div class="flex justify-start items-center text-grey">
                        <div class="p-2 bg-pink-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-pink-300 uppercase px-2 py-1 text-xs font-bold mr-3">5</span>
                            <span class="font-semibold mr-2 text-left flex-auto">
                                <i class="fas fa-bell"></i>
                            </span>
                            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                        </div>
                        <a href="javascript:void(0)" class="block text-pink-500 flex items-center hover:text-pink-300 ml-6">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="w-full mx-auto px-6">
    <div class="flex -mx-6">

        <div id="sidebar" class="bg-pink-500 w-1/4"> <!-- 25% -->
            <div class="lg:relative lg:sticky">
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

        <div id="content-wrapper" class="min-h-screen w-3/4"> <!-- 75% -->
            <div id="content">
                <div class="markdown mt-6 px-6 max-w-3xl">
                    <h1>All Users Permission</h1>
                    <hr class="my-8 border-b-2 border-gray-200">
                </div>
                <div id="app" class="flex">
                    <div class="markdown mb-6 px-6 max-w-3xl">
                        <table class="w-full text-left table-collapse">
                            <thead>
                                <tr>
                                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">No</th>
                                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Name</th>
                                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Email</th>
                                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Permission</th>
                                    <th class="text-sm font-semibold text-gray-700 p-2 bg-gray-100">Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-baseline">
                                <tr>
                                    <td class="p-2 border-t border-gray-300 font-mono text-xs text-purple-700 whitespace-pre">1</td>
                                    <td class="p-2 border-t border-gray-300 font-mono text-xs text-purple-700 whitespace-pre">Reihan Agam</td>
                                    <td class="p-2 border-t border-gray-300 font-mono text-xs text-purple-700 whitespace-pre">reihanagam7@gmail.com</td>
                                    <td class="p-2 border-t border-gray-300 font-mono text-xs text-purple-700 whitespace-pre">Super Admin</td>
                                    <td class="p-2 border-t border-gray-300 text-xs whitespace-nowrap">
                                        <a href="javascript:void(0)" class="hover:text-pink-300">
                                            <i class="fas fa-edit w-8"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="hover:text-pink-300">
                                            <i class="fa fa-plus w-8"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="hover:text-pink-300">
                                            <i class="fa fa-trash w-8"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
