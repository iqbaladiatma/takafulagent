<nav x-data="{ open: false }" class="bg-white shadow-lg sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 sm:h-18">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                        <img src="{{ asset('images/logo-takaful.png') }}" alt="Takaful Keluarga" class="h-10 sm:h-12">
                       
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="relative group px-4 py-2 rounded-lg hover:bg-gray-50 transition-all duration-200 flex items-center">
                        <i class="fas fa-th-large mr-2 text-gray-600"></i>
                        <span class="font-medium">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('home')" 
                                class="relative group px-4 py-2 rounded-lg hover:bg-gray-50 transition-all duration-200 flex items-center">
                        <i class="fas fa-home mr-2 text-gray-600"></i>
                        <span class="font-medium">{{ __('Beranda') }}</span>
                    </x-nav-link>
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ url('/admin') }}" 
                           class="inline-flex items-center px-4 py-2 bg-[#1D76BB] hover:bg-blue-700 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 font-medium text-sm ml-4">
                            <i class="fas fa-shield-halved mr-2"></i>{{ __('Panel Admin') }}
                        </a>
                    @elseif(Auth::user()->isAgent())
                        <a href="{{ route('agent.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-[#8BC53F] hover:bg-green-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 font-medium text-sm ml-4">
                            <i class="fas fa-user-tie mr-2"></i>{{ __('Dashboard Agen') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- User Info -->
                <div class="flex items-center space-x-3">
                    @if(Auth::user()->isAdmin())
                        <span class="inline-flex items-center bg-[#1D76BB] text-white px-3 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-crown mr-1"></i>ADMIN
                        </span>
                    @elseif(Auth::user()->isAgent())
                        <span class="inline-flex items-center bg-[#8BC53F] text-white px-3 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-user-tie mr-1"></i>AGEN
                        </span>
                    @endif
                </div>

                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-50 hover:bg-gray-100 shadow-sm hover:shadow-md rounded-lg text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#1D76BB] focus:ring-offset-2 transition-all duration-200">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-[#1D76BB] flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="text-left">
                                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                                </div>
                                <i class="fas fa-chevron-down text-xs ml-1"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info Header -->
                        <div class="px-4 py-3 bg-gray-50 shadow-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-[#1D76BB] flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Role-specific Links -->
                        @if(Auth::user()->isAdmin())
                            <x-dropdown-link :href="url('/admin')" class="flex items-center">
                                <i class="fas fa-shield-halved mr-3 text-[#1D76BB]"></i>{{ __('Panel Admin') }}
                            </x-dropdown-link>
                            <div class="my-2"></div>
                        @elseif(Auth::user()->isAgent())
                            <x-dropdown-link :href="route('agent.dashboard')" class="flex items-center">
                                <i class="fas fa-user-tie mr-3 text-[#8BC53F]"></i>{{ __('Dashboard Agen') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('agent.profile')" class="flex items-center">
                                <i class="fas fa-id-card mr-3 text-[#8BC53F]"></i>{{ __('Profil Saya') }}
                            </x-dropdown-link>
                            <div class="my-2"></div>
                        @endif

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <i class="fas fa-cog mr-3 text-gray-500"></i>{{ __('Pengaturan') }}
                        </x-dropdown-link>

                        <div class="my-2"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center text-red-600 hover:text-red-700 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <!-- Mobile Role Badge -->
                @if(Auth::user()->isAdmin())
                    <span class="inline-flex items-center bg-[#1D76BB] text-white px-2 py-1 rounded-full text-xs font-bold mr-3">
                        <i class="fas fa-crown mr-1"></i>ADMIN
                    </span>
                @elseif(Auth::user()->isAgent())
                    <span class="inline-flex items-center bg-[#8BC53F] text-white px-2 py-1 rounded-full text-xs font-bold mr-3">
                        <i class="fas fa-user-tie mr-1"></i>AGEN
                    </span>
                @endif

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700 transition duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white shadow-lg">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                   class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-th-large mr-3 text-gray-600"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('home')" 
                                   class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-home mr-3 text-gray-600"></i>{{ __('Beranda') }}
            </x-responsive-nav-link>
            
            @if(Auth::user()->isAdmin())
                <a href="{{ url('/admin') }}" 
                   class="flex items-center px-4 py-3 bg-[#1D76BB] text-white rounded-lg font-medium">
                    <i class="fas fa-shield-halved mr-3"></i>{{ __('Panel Admin') }}
                </a>
            @elseif(Auth::user()->isAgent())
                <a href="{{ route('agent.dashboard') }}" 
                   class="flex items-center px-4 py-3 bg-[#8BC53F] text-white rounded-lg font-medium">
                    <i class="fas fa-user-tie mr-3"></i>{{ __('Dashboard Agen') }}
                </a>
                <x-responsive-nav-link :href="route('agent.profile')" 
                                       class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="fas fa-id-card mr-3 text-[#8BC53F]"></i>{{ __('Profil Saya') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 bg-gray-50 shadow-inner">
            <div class="px-4 mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-[#1D76BB] flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" 
                                       class="flex items-center px-4 py-3 rounded-lg hover:bg-white transition-colors">
                    <i class="fas fa-cog mr-3 text-gray-500"></i>{{ __('Pengaturan') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="flex items-center px-4 py-3 rounded-lg hover:bg-red-50 text-red-600 transition-colors">
                        <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Keluar') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
