<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="primary-container">
        <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ route('guestbook.index') }}" class="flex items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
            </a>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex">
                @auth
                    <x-nav-link :href="route('guestbook.create')" :active="request()->routeIs('guestbook.create')">
                        {{ __('Create') }}
                    </x-nav-link>
                @endauth
            </div>

            <!-- User Info and Logout -->
            <div class="flex items-center space-x-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="responsive-container">
        <div :class="navigation-responsive{'block': open, 'hidden': !open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('guestbook.create')"
                                           :active="request()->routeIs('guestbook.create')">
                        {{ __('Create') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                @endauth
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    @auth
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:underline">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
