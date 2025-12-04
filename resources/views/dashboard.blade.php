<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Daftar Agen Takaful') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-lg shadow-lg p-6 mb-6 text-white">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">
                            Selamat Datang, {{ auth()->user()->name }}! 👋
                            @if(auth()->user()->isAdmin())
                                <span class="inline-flex items-center bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-bold ml-2">
                                    <i class="fas fa-crown mr-1"></i>ADMIN
                                </span>
                            @endif
                        </h3>
                        <p class="opacity-90">Temukan agen Takaful terbaik untuk kebutuhan asuransi syariah Anda</p>
                    </div>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" 
                           class="bg-white text-blue-600 px-6 py-3 rounded-lg hover:bg-gray-100 transition font-semibold shadow-md whitespace-nowrap">
                            <i class="fas fa-shield-halved mr-2"></i>Kelola Agen
                        </a>
                    @endif
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Total Agen</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $agens->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-shield-halved text-green-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Asuransi Syariah</p>
                                <p class="text-2xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i class="fas fa-award text-purple-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Terpercaya</p>
                                <p class="text-2xl font-bold text-gray-800">15+ Tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agen List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Agen Profesional</h3>
                        
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('dashboard') }}" class="w-full md:w-auto">
                            <div class="flex gap-2">
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    placeholder="Cari agen, kode, atau role..." 
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-80"
                                >
                                <button 
                                    type="submit"
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition whitespace-nowrap">
                                    <i class="fas fa-search mr-1"></i>Cari
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('dashboard') }}" 
                                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
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
                                                <img 
                                                    src="{{ $agen->foto ? asset('storage/' . $agen->foto) : asset('images/default-avatar.svg') }}" 
                                                    alt="{{ $agen->nama }}"
                                                    class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover bg-white"
                                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=3b82f6&color=fff'"
                                                >
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
