@auth

    <nav x-data="{ open: false }" class="bg-gray-900 text-white w-full" style="position: fixed; top: 0">


        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex justify-between  items-center">
                    <!-- Navigation Links -->
                    <div class="flex justify-between items-center">
                        <x-application-logo />
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                                {{ __('User') }}
                            </x-nav-link>
                            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                                {{ __('Category') }}
                            </x-nav-link>
                            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                                {{ __('Product') }}
                            </x-nav-link>

                        </div>
                    </div>


                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form class="inline hidden lg:block" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('User') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                    {{ __('Category') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                    {{ __('Product') }}
                </x-responsive-nav-link>

            </div>
        </div>





    </nav>
@endauth
