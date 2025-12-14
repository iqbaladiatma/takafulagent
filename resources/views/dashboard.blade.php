<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 sm:gap-4">
            <div class="flex-1 min-w-0">
                <h2 class="font-bold text-lg sm:text-xl lg:text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-[#1D76BB] mr-2 sm:mr-3 flex-shrink-0">
                        <i class="fas fa-th-large text-white text-sm sm:text-base"></i>
                    </div>
                    <span class="truncate">{{ __('Dashboard Agen Takaful') }}</span>
                </h2>
                <p class="text-gray-600 mt-1 text-xs sm:text-sm">Temukan agen terbaik untuk kebutuhan asuransi syariah Anda</p>
            </div>
            @if(auth()->user()->isAdmin())
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                    <a href="{{ url('/admin') }}" class="bg-[#1D76BB] hover:bg-blue-700 text-white font-semibold py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center text-sm sm:text-base">
                        <i class="fas fa-shield-halved mr-2"></i>
                        <span class="hidden sm:inline">Panel Admin</span>
                        <span class="sm:hidden">Admin</span>
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-4 sm:py-6 lg:py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
            <!-- Welcome Card -->
            <div class="relative bg-[#1D76BB] rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 lg:p-8 mb-4 sm:mb-6 lg:mb-8 text-white overflow-hidden">
                <!-- Decorative Pattern -->
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-3 sm:gap-4">
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 mb-2 sm:mb-3">
                            <h3 class="text-lg sm:text-xl lg:text-2xl xl:text-3xl font-bold leading-tight">
                                <span class="block sm:inline">Selamat Datang,</span>
                                <span class="block sm:inline">{{ auth()->user()->name }}! 👋</span>
                            </h3>
                            @if(auth()->user()->isAdmin())
                                <span class="inline-flex items-center bg-[#8BC53F] text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs sm:text-sm font-bold w-fit">
                                    <i class="fas fa-crown mr-1"></i>ADMIN
                                </span>
                            @endif
                        </div>
                        <p class="text-blue-100 text-xs sm:text-sm lg:text-base">Temukan agen Takaful terbaik untuk kebutuhan asuransi syariah Anda</p>
                    </div>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" 
                           class="bg-white text-[#1D76BB] px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:shadow-lg transition-all duration-300 font-semibold whitespace-nowrap text-sm sm:text-base w-full sm:w-auto text-center">
                            <i class="fas fa-shield-halved mr-2"></i>
                            <span class="hidden sm:inline">Kelola Agen</span>
                            <span class="sm:hidden">Admin Panel</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">
                <div class="bg-white rounded-lg sm:rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="p-4 sm:p-5 lg:p-6">
                        <div class="flex items-center">
                            <div class="bg-[#1D76BB] p-2.5 sm:p-3 lg:p-4 rounded-lg flex-shrink-0">
                                <i class="fas fa-users text-white text-lg sm:text-xl lg:text-2xl"></i>
                            </div>
                            <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium">Total Agen</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">{{ $agens->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg sm:rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="p-4 sm:p-5 lg:p-6">
                        <div class="flex items-center">
                            <div class="bg-[#8BC53F] p-2.5 sm:p-3 lg:p-4 rounded-lg flex-shrink-0">
                                <i class="fas fa-shield-halved text-white text-lg sm:text-xl lg:text-2xl"></i>
                            </div>
                            <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium">Asuransi Syariah</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg sm:rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden sm:col-span-2 lg:col-span-1">
                    <div class="p-4 sm:p-5 lg:p-6">
                        <div class="flex items-center">
                            <div class="bg-[#1D76BB] p-2.5 sm:p-3 lg:p-4 rounded-lg flex-shrink-0">
                                <i class="fas fa-award text-white text-lg sm:text-xl lg:text-2xl"></i>
                            </div>
                            <div class="ml-3 sm:ml-4 min-w-0 flex-1">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium">Terpercaya</p>
                                <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">15+ Tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agen List -->
            <div class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden">
                <div class="p-3 sm:p-4 lg:p-6 xl:p-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-4 sm:mb-6 lg:mb-8 gap-3 sm:gap-4">
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800 mb-1">Daftar Agen Profesional</h3>
                            <p class="text-xs sm:text-sm text-gray-500">Temukan agen terbaik untuk kebutuhan Anda</p>
                        </div>
                        
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('dashboard') }}" class="w-full lg:w-auto lg:max-w-md">
                            <div class="flex gap-2">
                                <div class="relative flex-1">
                                    <i class="fas fa-search absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                                    <input 
                                        type="text" 
                                        name="search" 
                                        value="{{ request('search') }}"
                                        placeholder="Cari agen, kode, atau role..." 
                                        class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D76BB] focus:border-[#1D76BB] transition-all text-sm sm:text-base"
                                    >
                                </div>
                                <button 
                                    type="submit"
                                    class="bg-[#1D76BB] hover:bg-blue-700 text-white px-3 sm:px-4 lg:px-6 py-2.5 sm:py-3 rounded-lg hover:shadow-md transition-all duration-300 whitespace-nowrap font-medium text-sm sm:text-base flex-shrink-0">
                                    <i class="fas fa-search mr-0 sm:mr-2"></i>
                                    <span class="hidden sm:inline">Cari</span>
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('dashboard') }}" 
                                       class="bg-gray-200 text-gray-700 px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg hover:bg-gray-300 transition-all flex-shrink-0">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    @if(request('search'))
                        <div class="mb-4 p-3 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <i class="fas fa-info-circle mr-1"></i>
                                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                                ({{ $agens->total() }} hasil)
                            </p>
                        </div>
                    @endif

                    @if($agens->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-5 xl:gap-6">
                            @foreach($agens as $agen)
                                <div class="bg-white rounded-lg overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300 shadow-sm border border-gray-100">
                                    <!-- Header -->
                                    <div class="bg-[#1D76BB] h-16 sm:h-20 lg:h-24 relative">
                                        <div class="absolute -bottom-6 sm:-bottom-8 lg:-bottom-10 left-1/2 transform -translate-x-1/2">
                                            <div class="relative">
                                                @if($agen->foto)
                                                    <img 
                                                        src="{{ asset('storage/' . $agen->foto) }}" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-full border-2 sm:border-3 border-white shadow-lg object-cover bg-white"
                                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=1D76BB&color=fff&bold=true'"
                                                    >
                                                @else
                                                    <img 
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=1D76BB&color=fff&bold=true" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-full border-2 sm:border-3 border-white shadow-lg object-cover bg-white"
                                                    >
                                                @endif
                                                <div class="absolute bottom-0 right-0 bg-[#8BC53F] w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 rounded-full border-2 border-white"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="pt-8 sm:pt-10 lg:pt-12 px-2 sm:px-3 lg:px-4 pb-3 sm:pb-4 lg:pb-5">
                                        <div class="text-center mb-2 sm:mb-3 lg:mb-4">
                                            <h4 class="text-xs sm:text-sm lg:text-base font-bold text-gray-800 mb-1 line-clamp-1 leading-tight" title="{{ $agen->nama }}">
                                                {{ $agen->nama }}
                                            </h4>
                                            <p class="text-[#1D76BB] font-semibold text-xs sm:text-sm mb-1 sm:mb-2 line-clamp-1" title="{{ $agen->role }}">
                                                {{ $agen->role }}
                                            </p>
                                            <span class="inline-flex items-center bg-green-50 text-[#8BC53F] px-1.5 sm:px-2 lg:px-3 py-0.5 sm:py-1 rounded-full text-xs font-bold">
                                                <i class="fas fa-id-badge mr-1 text-xs"></i>
                                                <span class="text-xs">{{ $agen->kode_agen }}</span>
                                            </span>
                                        </div>

                                        @if($agen->deskripsi)
                                            <p class="text-gray-600 text-xs sm:text-sm mb-2 sm:mb-3 lg:mb-4 line-clamp-2 min-h-[28px] sm:min-h-[32px] lg:min-h-[40px] leading-tight" title="{{ $agen->deskripsi }}">
                                                {{ $agen->deskripsi }}
                                            </p>
                                        @else
                                            <p class="text-gray-400 text-xs sm:text-sm mb-2 sm:mb-3 lg:mb-4 italic min-h-[28px] sm:min-h-[32px] lg:min-h-[40px] leading-tight">
                                                Belum ada deskripsi
                                            </p>
                                        @endif

                                        <!-- Contact Info -->
                                        <div class="mb-2 sm:mb-3 lg:mb-4 p-1.5 sm:p-2 lg:p-3 bg-gray-50 rounded-lg">
                                            <div class="flex items-center text-xs text-gray-600">
                                                <i class="fas fa-phone text-[#1D76BB] mr-1.5 sm:mr-2 text-xs"></i>
                                                <span class="truncate">{{ $agen->telepon }}</span>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex flex-col gap-1.5 sm:gap-2">
                                            <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                               class="w-full bg-[#1D76BB] hover:bg-blue-700 text-white px-2 sm:px-3 py-1.5 sm:py-2 lg:py-2.5 rounded-lg transition text-xs font-medium text-center">
                                                <i class="fas fa-eye mr-1"></i>
                                                <span class="hidden sm:inline">Lihat Profil</span>
                                                <span class="sm:hidden">Profil</span>
                                            </a>
                                            <a href="{{ $agen->wa_link }}" 
                                               target="_blank"
                                               class="w-full bg-[#8BC53F] hover:bg-green-600 text-white px-2 sm:px-3 py-1.5 sm:py-2 lg:py-2.5 rounded-lg transition text-xs font-medium text-center">
                                                <i class="fab fa-whatsapp mr-1"></i>
                                                <span class="hidden sm:inline">Chat WhatsApp</span>
                                                <span class="sm:hidden">WhatsApp</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $agens->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                                <i class="fas fa-users text-5xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                @if(request('search'))
                                    Tidak Ada Hasil Ditemukan
                                @else
                                    Belum Ada Agen Tersedia
                                @endif
                            </h3>
                            <p class="text-gray-500 mb-6">
                                @if(request('search'))
                                    Coba gunakan kata kunci lain untuk pencarian Anda
                                @else
                                    Belum ada agen yang terdaftar di sistem
                                @endif
                            </p>
                            @if(request('search'))
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-flex items-center bg-[#1D76BB] hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>Lihat Semua Agen
                                </a>
                            @elseif(auth()->user()->isAdmin())
                                <a href="{{ url('/admin/agens/create') }}" 
                                   class="inline-flex items-center bg-[#1D76BB] hover:bg-blue-700 text-white px-6 py-3 rounded-lg transiton font-semibold">
                                    <i class="fas fa-plus mr-2"></i>Tambah Agen Pertama
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
