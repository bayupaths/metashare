<nav
    class="hidden xl:flex relative w-full flex-wrap items-center justify-between py-4 text-slate-500 hover:text-slate-700 focus:text-slate-700 navbar navbar-expand-lg navbar-light px-20">
    <div class="container-fluid w-full flex flex-wrap items-center justify-between">
        <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
            <a class=" flex flex-col pl-0 list-style-none mr-auto items-center text-slate-900 hover:text-slate-900 focus:text-slate-900 mt-2 lg:mt-0"
                href="#">
                <img src="{{ url('icons/logo-metashare.png') }}" style="height: 20px" alt="" loading="lazy" />
            </a>
        </div>
        <!-- Right elements -->
        <div class="flex items-center relative">
            <!-- Icon -->
            <ul class="navbar-nav flex">
                <li class="nav-item p-2">
                    <a class="nav-link p-0 text-slate-500 hover:text-primary-blue-cyan/90 {{ request()->is('/*') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        href="{{ route('home') }}">Home
                    </a>
                </li>
                <li class="nav-item p-2">
                    <button
                        class="nav-link text-slate-500 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 {{ request()->is('categories') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        id="multiLevelDropdownButtonNav" data-dropdown-toggle="dropdownNav">Kategori
                        <span><i class="fa fa-chevron-down fa-xs"></i></span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNav"
                        class="hidden z-10 w-48 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700 text-sm">
                        <ul class="py-1 text-sm text-slate-400 dark:text-slate-200">
                            @foreach (App\Models\Category::all() as $category)
                                <li>
                                    <a href="{{ route('categories-detail', $category->slug) }}" type="button"
                                        class="flex items-center py-2 px-4 w-full hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">{{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link text-slate-500 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 {{ request()->is('testimony') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        href="{{ route('testimony') }}">Testimoni
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link text-slate-500 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 {{ request()->is('/about*') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        href="{{ route('about') }}">Tentang
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link text-slate-500 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0 {{ request()->is('profile') ? 'text-primary-blue-cyan font-semibold' : '' }}"
                        href="{{ route('profile') }}">Profile</a>
                </li>

                <li class="nav-item p-2">
                    <a class="logout-button nav-link text-slate-500 focus:text-primary-blue-cyan/90 hover:text-primary-blue-cyan/90 p-0"
                        id="" href="#">Logout</a>
                </li>

                <li class="nav-item p-2">
                    <a class="nav-link border bg-slate-50 rounded-3xl border-slate-600 text-slate-600 hover:bg-primary-blue-cyan hover:text-white hover:border-white focus:border-white  focus:bg-primary-blue-cyan focus:text-white py-1"
                        href=""><span class="px-1">Sign Up</span></a>
                </li>
                <!-- *** Button Profile dan logout aktif menggantikan sign up ketika user telah daftar dan login *** -->
            </ul>
        </div>
        <!-- Right elements -->
    </div>
</nav>
<!-- Nav Top -->

<!-- Nav Bottom-->
<nav class="xl:hidden">
    <div id="bottom-navigation" class="fixed inset-x-0 bottom-0 z-30 border-t-2">
        <div id="tabs" class="tabs bg-[#F7FDF4] flex w-full mx-auto  text-[#666666]">
            <a href="{{ route('home') }}" class="w-full justify-center inline-block text-center pt-3 pb-3">
                <div class="flex">
                    <img class="mx-auto my-auto w-[22px] h-[20px]"
                        src="{{ request()->is('home') ? url('icons/navbottom-home-active.svg') : url('icons/navbottom-home.svg') }}">
                </div>
                <p
                    class="text-base-2xs tracking-wide mt-1 {{ request()->is('home') ? 'text-primary-blue-cyan' : '' }}">
                    Home
                </p>
            </a>
            <a href="{{ route('categories') }}" class="w-full justify-center inline-block text-center pt-3 pb-3">
                <div class="flex">
                    <img class="mx-auto my-auto w-[22px] h-[20px]"
                        src="{{ request()->is('categories') ? url('icons/navbottom-categories-active.svg') : url('icons/navbottom-categories.svg') }}">
                </div>
                <p
                    class="text-base-2xs tracking-wide mt-1 {{ request()->is('categories') ? 'text-primary-blue-cyan' : '' }}">
                    Kategori
                </p>
            </a>
            <a href="{{ route('testimony') }}" class="w-full justify-center inline-block text-center pt-3 pb-3">
                <div class="flex">
                    <img class="mx-auto my-auto w-[22px] h-[20px]"
                        src="{{ request()->is('testimony') ? url('icons/navbottom-testimony-active.svg') : url('icons/navbottom-testimony.svg') }}">
                </div>
                <p
                    class="text-base-2xs tracking-wide mt-1 {{ request()->is('testimony') ? 'text-primary-blue-cyan' : '' }}">
                    Testimoni
                </p>
            </a>
            <a href="{{ route('about') }}" class="w-full justify-center inline-block text-center pt-3 pb-3">
                <div class="flex">
                    <img class="mx-auto my-auto w-[22px] h-[20px]"
                        src="{{ request()->is('about') ? url('icons/navbottom-about-active.svg') : url('icons/navbottom-about.svg') }}">
                </div>
                <p
                    class="text-base-2xs tracking-wide mt-1 {{ request()->is('about') ? 'text-primary-blue-cyan' : '' }}">
                    Tentang
                </p>
            </a>

            <!-- TRUE -->
            <a href="{{ route('profile') }}" class="w-full justify-center inline-block text-center pt-3 pb-3">
                <div class="flex">
                    <img class="mx-auto my-auto w-[22px] h-[20px]"
                        src="{{ request()->is('profile') ? url('icons/navbottom-profile-active.svg') : url('icons/navbottom-profile.svg') }}">
                </div>
                <p
                    class="text-base-2xs tracking-wide mt-1 {{ request()->is('profile') ? 'text-primary-blue-cyan' : '' }}">
                    Profile
                </p>
            </a>
        </div>
    </div>
</nav>
<!-- Nav Bottom End -->
