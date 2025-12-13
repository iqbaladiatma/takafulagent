<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#1D76BB] mr-3">
                        <i class="fas fa-th-large text-white"></i>
                    </div>
                    {{ __('Dashboard Agen Takaful') }}
                </h2>
                <p class="text-gray-600 mt-1 text-sm">Temukan agen terbaik untuk kebutuhan asuransi syariah Anda</p>
            </div>
            @if(auth()->user()->isAdmin())
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <a href="{{ url('/admin') }}" class="bg-[#1D76BB] hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                        <i class="fas fa-shield-halved mr-2"></i>Panel Admin
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-6 md:py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="relative bg-[#1D76BB] rounded-xl shadow-lg p-6 sm:p-8 mb-6 sm:mb-8 text-white overflow-hidden">
                <!-- Decorative Pattern -->
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-3">
                            <h3 class="text-2xl sm:text-3xl font-bold">
                                Selamat Datang, {{ auth()->user()->name }}! 👋
                            </h3>
                            @if(auth()->user()->isAdmin())
                                <span class="inline-flex items-center bg-[#8BC53F] text-white px-3 py-1.5 rounded-full text-xs sm:text-sm font-bold w-fit">
                                    <i class="fas fa-crown mr-1"></i>ADMIN
                                </span>
                            @endif
                        </div>
                        <p class="text-blue-100 text-sm sm:text-base">Temukan agen Takaful terbaik untuk kebutuhan asuransi syariah Anda</p>
                    </div>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" 
                           class="bg-white text-[#1D76BB] px-6 py-3 rounded-lg hover:shadow-lg transition-all duration-300 font-semibold whitespace-nowrap">
                            <i class="fas fa-shield-halved mr-2"></i>Kelola Agen
                        </a>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-[#1D76BB] p-4 rounded-lg">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm font-medium">Total Agen</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $agens->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-[#8BC53F] p-4 rounded-lg">
                                <i class="fas fa-shield-halved text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm font-medium">Asuransi Syariah</p>
                                <p class="text-3xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden sm:col-span-2 lg:col-span-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-[#1D76BB] p-4 rounded-lg">
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
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
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
                                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1D76BB] focus:border-[#1D76BB] transition-all"
                                    >
                                </div>
                                <button 
                                    type="submit"
                                    class="bg-[#1D76BB] hover:bg-blue-700 text-white px-6 py-3 rounded-lg hover:shadow-md transition-all duration-300 whitespace-nowrap font-medium">
                                    <i class="fas fa-search mr-2"></i><span class="hidden sm:inline">Cari</span>
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('dashboard') }}" 
                                       class="bg-gray-200 text-gray-700 px-4 py-3 rounded-lg hover:bg-gray-300 transition-all">
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
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
                            @foreach($agens as $agen)
                                <div class="bg-white rounded-lg overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300 shadow-sm">
                                    <!-- Header -->
                                    <div class="bg-[#1D76BB] h-20 sm:h-24 relative">
                                        <div class="absolute -bottom-8 sm:-bottom-10 left-1/2 transform -translate-x-1/2">
                                            <div class="relative">
                                                @if($agen->foto)
                                                    <img 
                                                        src="{{ asset('storage/' . $agen->foto) }}" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-16 h-16 sm:w-20 sm:h-20 rounded-full border-3 border-white shadow-lg object-cover bg-white"
                                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=1D76BB&color=fff&bold=true'"
                                                    >
                                                @else
                                                    <img 
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=1D76BB&color=fff&bold=true" 
                                                        alt="{{ $agen->nama }}"
                                                        class="w-16 h-16 sm:w-20 sm:h-20 rounded-full border-3 border-white shadow-lg object-cover bg-white"
                                                    >
                                                @endif
                                                <div class="absolute bottom-0 right-0 bg-[#8BC53F] w-4 h-4 sm:w-5 sm:h-5 rounded-full border-2 border-white"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="pt-10 sm:pt-12 px-3 sm:px-4 pb-4 sm:pb-5">
                                        <div class="text-center mb-3 sm:mb-4">
                                            <h4 class="text-sm sm:text-base font-bold text-gray-800 mb-1 line-clamp-1" title="{{ $agen->nama }}">
                                                {{ $agen->nama }}
                                            </h4>
                                            <p class="text-[#1D76BB] font-semibold text-xs sm:text-sm mb-2 line-clamp-1" title="{{ $agen->role }}">
                                                {{ $agen->role }}
                                            </p>
                                            <span class="inline-flex items-center bg-green-50 text-[#8BC53F] px-2 sm:px-3 py-1 rounded-full text-xs font-bold">
                                                <i class="fas fa-id-badge mr-1"></i>{{ $agen->kode_agen }}
                                            </span>
                                        </div>

                                        @if($agen->deskripsi)
                                            <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4 line-clamp-2 min-h-[32px] sm:min-h-[40px]" title="{{ $agen->deskripsi }}">
                                                {{ $agen->deskripsi }}
                                            </p>
                                        @else
                                            <p class="text-gray-400 text-xs sm:text-sm mb-3 sm:mb-4 italic min-h-[32px] sm:min-h-[40px]">
                                                Belum ada deskripsi
                                            </p>
                                        @endif

                                        <!-- Contact Info -->
                                        <div class="mb-3 sm:mb-4 p-2 sm:p-3 bg-gray-50 rounded-lg">
                                            <div class="flex items-center text-xs sm:text-sm text-gray-600">
                                                <i class="fas fa-phone text-[#1D76BB] mr-2"></i>
                                                <span class="truncate">{{ $agen->telepon }}</span>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex flex-col gap-2">
                                            <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                               class="w-full bg-[#1D76BB] hover:bg-blue-700 text-white px-3 py-2 sm:py-2.5 rounded-lg transition text-xs sm:text-sm text-center font-medium">
                                                <i class="fas fa-eye mr-1"></i>Lihat Profil
                                            </a>
                                            <a href="{{ $agen->wa_link }}" 
                                               target="_blank"
                                               class="w-full bg-[#8BC53F] hover:bg-green-600 text-white px-3 py-2 sm:py-2.5 rounded-lg transition text-xs sm:text-sm text-center font-medium">
                                                <i class="fab fa-whatsapp mr-1"></i>Chat WhatsApp
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
