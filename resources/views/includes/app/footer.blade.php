<footer class="text-base-1xs xl:text-xs xl:text-base-xs">
    <div class="px-5 xl:px-20 pt-4 pb-2 xl:pt-5 xl:pb-5 bg-[#3B4B62] dark:bg-gray-900">
        <div class="">
            <div class="flex items-center justify-center">
                <img class="h-[14px] lg:h-[18px] xl:h-[20px] saturate-150" src="{{ url('icons/logo-metashare.png') }}"
                    alt="">
            </div>
            <div
                class="sm:mx-12 md:mx-40 lg:mx-52 xl:mx-72 md:text-center lg:text-base-xs xl:text-sm leading-4 lg:leading-5 mt-3 text-slate-300 text-center">
                Metashare adalah sebuah platfrom yang menyediakan berbagai macam model undangan Pernikahan digital
                berdasarkan Kategori kategori Special, Standard, dan Basic
            </div>
            <div class="flex items-center justify-center mt-1">
                <a href=""
                    class="p-2 mr-3 hover:saturate-150 hover:contrast-150 focus:saturate-200 focus:contrast-200"><img
                        class="h-[14px]  w-[14px] xl:h-[18px]  xl:w-[18px]" src="{{ url('icons/facebook-icons.svg') }}"
                        alt="Icon Facebook">
                </a>
                <a href=""
                    class="p-2 mr-3 hover:saturate-150 hover:contrast-150 focus:saturate-200 focus:contrast-200"><img
                        class="h-[14px]  w-[14px] xl:h-[18px]  xl:w-[18px]" src="{{ url('icons/instagram-icons.svg') }}"
                        alt="Icon Instagram">
                </a>
                <a href=""
                    class="p-2 mr-3 hover:saturate-150 hover:contrast-150 focus:saturate-200 focus:contrast-200"><img
                        class="h-[14px]  w-[14px] xl:h-[18px]  xl:w-[18px]" src="{{ url('icons/whatsapp-icons.svg') }}"
                        alt="Icon Whatsapp">
                </a>
            </div>
        </div>
    </div>
    <div
        class="text-base-2xs xl:text-base-xs text-center pb-16 pt-1 xl:px-12 xl:py-2 bg-[#1C2D46] xl:flex xl:items-center sm:justify-between">
        <span class="text-slate-400 xl:text-center dark:text-slate-400">© {{ date('Y') }}
            <a href="" class="hover:underline">Metashare</a> by Paralogy Team
        </span>
        <div class="hidden xl:flex mt-4 text-sm space-x-6 xl:justify-center xl:mt-0">
            <!-- Icon -->
            <ul class="navbar-nav flex">
                <li class="nav-item p-2">
                    <a class="nav-link text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 {{ request()->is('home') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        href="{{ route('home') }}">Home
                    </a>
                </li>
                <li class="nav-item p-2">
                    <button
                        class="nav-link text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0"
                        href="" id="multiLevelDropdownButtonFoot" data-dropdown-toggle="dropdownFoot">Kategori
                        <span>
                            <i class="fa fa-chevron-down fa-xs"></i></span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownFoot"
                        class="hidden z-10 w-48 text-base-xs bg-slate-300 rounded divide-y divide-slate-100 shadow dark:bg-slate-700">
                        <ul class="py-1 text-slate-600 dark:text-slate-200"
                            aria-labelledby="multiLevelDropdownButtonFoot">
                            <li>
                                <a href="" type="button"
                                    class="flex justify-between items-center py-2 px-4 w-full hover:bg-slate-200 focus:bg-slate-200 dark:hover:bg-slate-400 dark:hover:text-white">
                                    Special
                                </a>
                            </li>
                            <li>
                                <a href="" type="button"
                                    class="flex justify-between items-center py-2 px-4 w-full hover:bg-slate-200 focus:bg-slate-200 dark:hover:bg-slate-600 dark:hover:text-white">
                                    Standard
                                </a>
                            </li>
                            <li>
                                <a href="" type="button"
                                    class="flex justify-between items-center py-2 px-4 w-full hover:bg-slate-200 focus:bg-slate-200 dark:hover:bg-slate-600 dark:hover:text-white">
                                    Basic
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link  text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0"
                        href="">
                        Testimoni
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link  text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0"
                        href="">
                        Tentang
                    </a>
                </li>
                <!-- *** Button Profile dan logout aktif menggantikan sign up ketika user telah daftar dan login *** -->
                <li class="nav-item p-2">
                    <a class="nav-link  text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 "
                        href="">
                        Profile
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a
                        class="nav-link  text-slate-400 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0"href="#">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
