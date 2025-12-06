<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl sm:text-2xl text-gray-800">
                <i class="fas fa-th-large mr-2 text-blue-600"></i>{{ __('Dashboard Agen Takaful') }}
            </h2>
            @if(auth()->user()->isAdmin())
                <a href="{{ url('/admin') }}" class="hidden sm:inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all duration-300 text-sm font-medium">
                    <i class="fas fa-shield-halved mr-2"></i>Panel Admin
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8 sm:py-12 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="relative bg-gradient-to-r from-blue-600 to-green-600 rounded-2xl shadow-xl p-6 sm:p-8 mb-6 sm:mb-8 text-white overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <h3 class="text-2xl sm:text-3xl font-bold">
                                Selamat Datang, {{ auth()->user()->name }}! 👋
                            </h3>
                            @if(auth()->user()->isAdmin())
                                <span class="inline-flex items-center bg-yellow-400 text-yellow-900 px-3 py-1.5 rounded-full text-xs sm:text-sm font-bold">
                                    <i class="fas fa-crown mr-1"></i>ADMIN
                                </span>
                            @endif
                        </div>
                        <p class="text-blue-50 text-sm sm:text-base">Temukan agen Takaful terbaik untuk kebutuhan asuransi syariah Anda</p>
                    </div>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" 
                           class="bg-white text-blue-600 px-6 py-3 rounded-xl hover:shadow-2xl transition-all duration-300 font-semibold whitespace-nowrap transform hover:scale-105">
                            <i class="fas fa-shield-halved mr-2"></i>Kelola Agen
                        </a>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm font-medium">Total Agen</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $agens->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-br from-green-500 to-green-600 p-4 rounded-xl shadow-lg">
                                <i class="fas fa-shield-halved text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm font-medium">Asuransi Syariah</p>
                                <p class="text-3xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 sm:col-span-2 lg:col-span-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-br from-yellow-500 to-orange-500 p-4 rounded-xl shadow-lg">
                                <i class="fas fa-award text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm font-medium">Terpercaya</p>
                                <p class="text-3xl font-bold text-gray-800">15+ Tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agen List -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-4 sm:p-6 lg:p-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 sm:mb-8 gap-4">
                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1">Daftar Agen Profesional</h3>
                            <p class="text-sm text-gray-500">Temukan agen terbaik untuk kebutuhan Anda</p>
                        </div>
                        
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('dashboard') }}" class="w-full lg:w-auto">
                            <div class="flex gap-2">
                                <div class="relative flex-1 lg:w-80">
                                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input 
                                        type="text" 
                                        name="search" 
                                        value="{{ request('search') }}"
                                        placeholder="Cari agen, kode, atau role..." 
                                        class="w-full pl-11 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    >
                                </div>
                                <button 
                                    type="submit"
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl hover:shadow-lg transition-all duration-300 whitespace-nowrap font-medium">
                                    <i class="fas fa-search mr-2"></i><span class="hidden sm:inline">Cari</span>
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('dashboard') }}" 
                                       class="bg-gray-200 text-gray-700 px-4 py-3 rounded-xl hover:bg-gray-300 transition-all">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    @if(request('search'))
                        <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <i class="fas fa-info-circle mr-1"></i>
                                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                                ({{ $agens->total() }} hasil)
                            </p>
                        </div>
                    @endif

                    @if($agens->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($agens as $agen)
                                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                    <!-- Header Gradient -->
                                    <div class="bg-gradient-to-r from-blue-600 to-green-600 h-24 relative">
                                        <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                            <div class="relative">
                                                @if($agen->foto)
                                                    <img 
                                                        src="{{ asset('storage/' . $agen->foto) }}" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover bg-white"
                                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=3b82f6&color=fff&bold=true'"
                                                    >
                                                @else
                                                    <img 
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=3b82f6&color=fff&bold=true" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover bg-white"
                                                    >
                                                @endif
                                                <div class="absolute bottom-0 right-0 bg-green-500 w-6 h-6 rounded-full border-2 border-white"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="pt-14 px-4 pb-5">
                                        <div class="text-center mb-4">
                                            <h4 class="text-lg font-bold text-gray-800 mb-1 line-clamp-1" title="{{ $agen->nama }}">
                                                {{ $agen->nama }}
                                            </h4>
                                            <p class="text-blue-600 font-semibold text-sm mb-2 line-clamp-1" title="{{ $agen->role }}">
                                                {{ $agen->role }}
                                            </p>
                                            <span class="inline-flex items-center bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                                <i class="fas fa-id-badge mr-1"></i>{{ $agen->kode_agen }}
                                            </span>
                                        </div>

                                        @if($agen->deskripsi)
                                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 min-h-[60px]" title="{{ $agen->deskripsi }}">
                                                {{ $agen->deskripsi }}
                                            </p>
                                        @else
                                            <p class="text-gray-400 text-sm mb-4 italic min-h-[60px]">
                                                Belum ada deskripsi
                                            </p>
                                        @endif

                                        <!-- Contact Info -->
                                        <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                                            <div class="flex items-center text-sm text-gray-600">
                                                <i class="fas fa-phone text-blue-600 mr-2"></i>
                                                <span class="truncate">{{ $agen->telepon }}</span>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-2">
                                            <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                               class="flex-1 bg-blue-600 text-white px-4 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm text-center font-medium shadow-sm hover:shadow-md">
                                                <i class="fas fa-eye mr-1"></i>Profil
                                            </a>
                                            <a href="{{ $agen->wa_link }}" 
                                               target="_blank"
                                               class="flex-1 bg-green-600 text-white px-4 py-2.5 rounded-lg hover:bg-green-700 transition text-sm text-center font-medium shadow-sm hover:shadow-md">
                                                <i class="fab fa-whatsapp mr-1"></i>Chat
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
                                   class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                                    <i class="fas fa-arrow-left mr-2"></i>Lihat Semua Agen
                                </a>
                            @elseif(auth()->user()->isAdmin())
                                <a href="{{ url('/admin/agens/create') }}" 
                                   class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
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
