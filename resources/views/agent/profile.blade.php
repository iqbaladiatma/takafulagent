<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#1D76BB] mr-3">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    {{ __('Profil Saya') }}
                </h2>
                <p class="text-gray-600 mt-1 text-sm">Kelola informasi dan data profil Anda</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('agent.dashboard') }}" class="bg-white hover:bg-gray-50 text-gray-800 font-semibold py-3 px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <a href="{{ route('agent.requests.create') }}?type=profile" class="bg-[#8BC53F] hover:bg-[#7AB42E] text-white font-semibold py-3 px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-edit mr-2"></i>
                    Request Perubahan
                </a>
            </div>
        </div>
    </x-slot>

    <style>
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>

    <div class="py-6 md:py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Back Button -->
            <a href="{{ route('agent.dashboard') }}"
               class="inline-flex items-center mb-6 md:mb-8 bg-white shadow-sm px-4 py-2.5 rounded-lg text-gray-700 hover:shadow-md hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
            </a>

            <!-- MAIN CARD PROFILE -->
            <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden mb-6 md:mb-8">

                <!-- HEADER BACKGROUND BANNER -->
                <div class="relative h-32 sm:h-40 md:h-48 lg:h-56 overflow-hidden bg-gradient-to-r from-[#1D76BB] to-[#8BC53F]">
                    <div class="absolute inset-0 bg-black/10"></div>
                </div>

                <!-- PROFILE CONTENT FIXED - LINKEDIN LAYOUT -->
                <div class="px-4 sm:px-6 md:px-8 pb-6">

                    <!-- FOTO + DETAIL DALAM 1 ROW -->
                    <div class="flex items-start gap-4 sm:gap-6 -mt-12 sm:-mt-14 md:-mt-16">

                        <!-- FOTO PROFIL DI KIRI (LINKEDIN STYLE) -->
                        <div class="relative">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 rounded-full border-4 sm:border-5 border-white shadow-lg overflow-hidden bg-white ring-4 ring-gray-100">
                                <img
                                    src="{{ $agen->foto ? asset('storage/'.$agen->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($agen->nama) . '&background=1D76BB&color=fff&size=400' }}"
                                    alt="{{ $agen->nama }}"
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&background=1D76BB&color=fff&size=400'"
                                />
                            </div>

                            <!-- Online Indicator -->
                            <div class="absolute bottom-2 right-2 w-5 h-5 sm:w-6 sm:h-6 bg-[#8BC53F] rounded-full border-3 border-white shadow-lg"></div>
                        </div>

                        <!-- DETAIL DI KANAN FOTO -->
                        <div class="pt-4 sm:pt-6 md:pt-8 flex-1 relative z-10">
                            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-white mb-1 relative z-20">
                                {{ $agen->nama }}
                            </h1>

                            <p class="text-[#1D76BB] font-semibold text-base md:text-lg mb-2 relative z-20">
                                {{ $agen->role }}
                            </p>

                            <!-- BADGE KODE AGEN -->
                            <div class="inline-flex items-center bg-blue-50 text-[#1D76BB] px-4 py-2 rounded-full text-sm md:text-base font-bold border border-blue-200 relative z-20">
                                <i class="fas fa-id-badge mr-2"></i>
                                <span>{{ $agen->kode_agen }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT INFO -->
                    <div class="mt-6 sm:mt-8">

                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Telepon -->
                            <div class="flex-1 bg-gray-50 p-4 rounded-xl shadow-sm">
                                <div class="flex items-center">
                                    <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                        <i class="fas fa-phone text-[#1D76BB]"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-semibold text-gray-700 text-sm">Telepon</p>
                                        <p class="text-gray-800 font-medium">{{ $agen->telepon }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- WhatsApp (mobile only) -->
                            <div class="sm:hidden">
                                <a href="{{ $agen->wa_link }}" target="_blank"
                                   class="block bg-[#8BC53F] hover:bg-green-600 text-white py-3 px-4 rounded-xl font-semibold text-center transition-all shadow-md hover:shadow-lg">
                                    <i class="fab fa-whatsapp mr-2"></i>Chat via WhatsApp
                                </a>
                            </div>
                            
                            <!-- WhatsApp (desktop) -->
                            <div class="hidden sm:block">
                                <a href="{{ $agen->wa_link }}" target="_blank"
                                   class="block bg-[#8BC53F] hover:bg-green-600 text-white py-3 px-6 rounded-xl font-semibold text-center transition-all shadow-md hover:shadow-lg">
                                    <i class="fab fa-whatsapp mr-2"></i>Chat via WhatsApp
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- GRID LAYOUT -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">

                <!-- LEFT COLUMN -->
                <div class="lg:col-span-2 space-y-6 md:space-y-8">

                    <!-- ABOUT SECTION -->
                    @if($agen->deskripsi)
                    <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm">
                        <div class="flex items-center mb-4 md:mb-6">
                            <div class="bg-blue-50 p-3 rounded-lg mr-4">
                                <i class="fas fa-user text-[#1D76BB] text-lg"></i>
                            </div>
                            <h2 class="font-bold text-lg md:text-xl text-gray-800">Tentang Saya</h2>
                        </div>

                        <div class="relative">
                            <div class="text-gray-700 leading-relaxed text-sm md:text-base">
                                {{ $agen->deskripsi }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- ACHIEVEMENTS SECTION -->
                    @if($agen->pencapaian)
                    <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm">
                        <div class="flex items-center mb-4 md:mb-6">
                            <div class="bg-blue-50 p-3 rounded-lg mr-4">
                                <i class="fas fa-trophy text-[#1D76BB] text-lg"></i>
                            </div>
                            <h2 class="font-bold text-lg md:text-xl text-gray-800">Pencapaian</h2>
                        </div>
                        <div class="relative">
                            <div class="text-gray-700 leading-relaxed text-sm md:text-base">
                                {{ $agen->pencapaian }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- PRODUCTS SECTION -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold text-white flex items-center">
                                    <i class="fas fa-shopping-bag mr-3"></i>
                                    Produk yang Ditawarkan
                                </h3>
                                <a href="{{ route('agent.requests.create') }}?type=product_add" class="text-sm font-medium text-white bg-white/20 hover:bg-white/30 px-3 py-1 rounded transition-colors">
                                    + Tambah Produk
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            @if($agen->products && $agen->products->count() > 0)
                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5">
                                    @foreach($agen->products as $product)
                                    <div class="group bg-white rounded-lg overflow-hidden hover:border hover:border-[#1D76BB] hover:shadow-md transition-all duration-300 h-full flex flex-col">
                                        <!-- Product Image -->
                                        <div class="relative h-40 sm:h-48 bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                                            @if($product->gambar)
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" onerror="this.src='https://via.placeholder.com/400x300/1D76BB/FFFFFF?text={{ urlencode($product->judul) }}'">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <i class="fas fa-box-open text-4xl text-[#1D76BB]/30"></i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Product Content -->
                                        <div class="p-3 sm:p-4 flex-1 flex flex-col">
                                            <h3 class="font-bold text-sm sm:text-base text-gray-800 mb-2 line-clamp-2">{{ $product->judul }}</h3>
                                            
                                            @if($product->deskripsi)
                                                <div class="mb-4 relative">
                                                    <div class="text-gray-600 text-xs sm:text-sm line-clamp-3">{{ $product->deskripsi }}</div>
                                                </div>
                                            @endif

                                            <!-- Action Button -->
                                            <div class="mt-auto pt-2">
                                                <a href="{{ route('agent.requests.create') }}?type=product_edit&product_id={{ $product->id }}" 
                                                   class="block bg-[#8BC53F] hover:bg-[#7AB42E] text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full shadow-sm">
                                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <!-- Default Products -->
                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5">
                                    <div class="group bg-white rounded-lg overflow-hidden hover:border hover:border-[#1D76BB] hover:shadow-md transition-all duration-300 h-full flex flex-col">
                                        <div class="relative h-40 sm:h-48 bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="fas fa-shield-alt text-4xl text-[#1D76BB]/30"></i>
                                            </div>
                                        </div>
                                        <div class="p-3 sm:p-4 flex-1 flex flex-col">
                                            <h3 class="font-bold text-sm sm:text-base text-gray-800 mb-2 line-clamp-2">Asuransi Jiwa Syariah</h3>
                                            <div class="mb-4 relative">
                                                <div class="text-gray-600 text-xs sm:text-sm line-clamp-3">Perlindungan jiwa sesuai prinsip syariah dengan manfaat optimal.</div>
                                            </div>
                                            <div class="mt-auto pt-2">
                                                <a href="{{ route('agent.requests.create') }}?type=product_add" 
                                                   class="block bg-[#8BC53F] hover:bg-[#7AB42E] text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full shadow-sm">
                                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="group bg-white rounded-lg overflow-hidden hover:border hover:border-[#1D76BB] hover:shadow-md transition-all duration-300 h-full flex flex-col">
                                        <div class="relative h-40 sm:h-48 bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="fas fa-heart text-4xl text-[#1D76BB]/30"></i>
                                            </div>
                                        </div>
                                        <div class="p-3 sm:p-4 flex-1 flex flex-col">
                                            <h3 class="font-bold text-sm sm:text-base text-gray-800 mb-2 line-clamp-2">Takaful Kesehatan</h3>
                                            <div class="mb-4 relative">
                                                <div class="text-gray-600 text-xs sm:text-sm line-clamp-3">Perlindungan kesehatan keluarga dengan sistem gotong royong.</div>
                                            </div>
                                            <div class="mt-auto pt-2">
                                                <a href="{{ route('agent.requests.create') }}?type=product_add" 
                                                   class="block bg-[#8BC53F] hover:bg-[#7AB42E] text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full shadow-sm">
                                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="group bg-white rounded-lg overflow-hidden hover:border hover:border-[#1D76BB] hover:shadow-md transition-all duration-300 h-full flex flex-col">
                                        <div class="relative h-40 sm:h-48 bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="fas fa-chart-line text-4xl text-[#1D76BB]/30"></i>
                                            </div>
                                        </div>
                                        <div class="p-3 sm:p-4 flex-1 flex flex-col">
                                            <h3 class="font-bold text-sm sm:text-base text-gray-800 mb-2 line-clamp-2">Investasi Syariah</h3>
                                            <div class="mb-4 relative">
                                                <div class="text-gray-600 text-xs sm:text-sm line-clamp-3">Investasi halal dengan potensi keuntungan yang menarik.</div>
                                            </div>
                                            <div class="mt-auto pt-2">
                                                <a href="{{ route('agent.requests.create') }}?type=product_add" 
                                                   class="block bg-[#8BC53F] hover:bg-[#7AB42E] text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full shadow-sm">
                                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="lg:col-span-1">
                    <!-- ADDITIONAL INFO SECTION -->
                    <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm mb-6 md:mb-8">
                        <div class="flex items-center mb-4 md:mb-6">
                            <div class="bg-blue-50 p-3 rounded-lg mr-4">
                                <i class="fas fa-info-circle text-[#1D76BB] text-lg"></i>
                            </div>
                            <h2 class="font-bold text-lg md:text-xl text-gray-800">Informasi Tambahan</h2>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-[#1D76BB]">{{ $agen->tahun_pengalaman ?? '5+' }}</p>
                                    <p class="text-gray-600 text-xs sm:text-sm">Tahun Pengalaman</p>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-[#8BC53F]">{{ $agen->klien_terlayani ?? '100+' }}</p>
                                    <p class="text-gray-600 text-xs sm:text-sm">Klien Terlayani</p>
                                </div>
                            </div>
                            
                            <!-- Additional Info -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-gray-800 mb-2 text-sm">Layanan Unggulan</h3>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    @if($agen->layanan_unggulan && is_array($agen->layanan_unggulan))
                                        @foreach($agen->layanan_unggulan as $layanan)
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-[#8BC53F] mr-2 mt-0.5"></i>
                                            <span>{{ $layanan }}</span>
                                        </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-[#8BC53F] mr-2 mt-0.5"></i>
                                            <span>Konsultasi Asuransi Syariah Gratis</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-[#8BC53F] mr-2 mt-0.5"></i>
                                            <span>Proses Klaim Cepat & Mudah</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-[#8BC53F] mr-2 mt-0.5"></i>
                                            <span>Pelayanan 24/7 via WhatsApp</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm mb-6 md:mb-8">
                        <div class="flex items-center mb-4 md:mb-6">
                            <div class="bg-blue-50 p-3 rounded-lg mr-4">
                                <i class="fas fa-bolt text-[#1D76BB] text-lg"></i>
                            </div>
                            <h3 class="font-bold text-lg md:text-xl text-gray-800">Aksi Cepat</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <a href="{{ route('agen.show', $agen->kode_agen) }}" target="_blank" 
                               class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-[#1D76BB] flex items-center justify-center mr-3">
                                        <i class="fas fa-external-link-alt text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-[#1D76BB]">Halaman Publik</p>
                                        <p class="text-xs text-gray-500">Lihat halaman nasabah</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-[#1D76BB]"></i>
                            </a>
                            
                            <a href="{{ $agen->wa_link }}" target="_blank" 
                               class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-[#8BC53F] flex items-center justify-center mr-3">
                                        <i class="fab fa-whatsapp text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-[#8BC53F]">Test WhatsApp</p>
                                        <p class="text-xs text-gray-500">{{ $agen->telepon }}</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-[#8BC53F]"></i>
                            </a>
                            
                            <a href="{{ route('agent.requests') }}" 
                               class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all duration-200 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-gray-600 flex items-center justify-center mr-3">
                                        <i class="fas fa-history text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-gray-700">Riwayat Request</p>
                                        <p class="text-xs text-gray-500">Lihat semua permintaan</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-gray-700"></i>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>