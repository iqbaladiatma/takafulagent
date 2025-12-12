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

    <div class="py-6 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Header -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="relative">
                    <!-- Background -->
                    <div class="h-32 md:h-40 bg-[#1D76BB]"></div>
                    
                    <!-- Profile Info -->
                    <div class="relative px-6 pb-6">
                        <div class="flex flex-col md:flex-row items-start md:items-end -mt-16">
                            <div class="flex-shrink-0">
                                @if($agen->foto)
                                    <img class="h-24 w-24 md:h-28 md:w-28 rounded-full object-cover border-4 border-white shadow-lg" src="{{ asset('storage/' . $agen->foto) }}" alt="{{ $agen->nama }}">
                                @else
                                    <div class="h-24 w-24 md:h-28 md:w-28 rounded-full bg-gray-200 border-4 border-white shadow-lg flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600 text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="md:ml-6 mt-4 md:mt-0 pb-2">
                                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $agen->nama }}</h1>
                                <div class="flex flex-wrap items-center gap-2 mt-2">
                                    <span class="px-3 py-1 bg-[#8BC53F]/10 text-[#8BC53F] text-sm font-medium rounded-full">
                                        {{ $agen->role }}
                                    </span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-full">
                                        Kode: {{ $agen->kode_agen }}
                                    </span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-full">
                                        Bergabung {{ $agen->created_at->format('M Y') }}
                                    </span>
                                </div>
                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-phone text-gray-500 mr-2"></i>
                                        {{ $agen->telepon }}
                                    </div>
                                    <a href="{{ $agen->wa_link }}" target="_blank" class="inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700">
                                        <i class="fab fa-whatsapp mr-1"></i>
                                        Test WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Profile Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-info-circle mr-3"></i>
                                Informasi Dasar
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <p class="text-gray-900 font-medium">{{ $agen->nama }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Agen</label>
                                    <p class="text-gray-900 font-medium">{{ $agen->kode_agen }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Role/Posisi</label>
                                    <p class="text-gray-900 font-medium">{{ $agen->role }}</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                                    <p class="text-gray-900 font-medium">{{ $agen->telepon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    @if($agen->deskripsi)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-user mr-3"></i>
                                Tentang Saya
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 leading-relaxed">{{ $agen->deskripsi }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Achievements -->
                    @if($agen->pencapaian)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-trophy mr-3"></i>
                                Pencapaian
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 leading-relaxed">{{ $agen->pencapaian }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Products -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h3 class="text-lg font-bold text-white flex items-center">
                                    <i class="fas fa-shopping-bag mr-3"></i>
                                    Produk yang Ditawarkan
                                </h3>
                                <a href="{{ route('agent.requests.create') }}?type=product_add" class="text-sm font-medium text-white bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Produk
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            @if($agen->products->count() > 0)
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach($agen->products as $product)
                                    <div class="bg-white rounded-lg overflow-hidden hover:shadow-md transition-all duration-200 shadow-sm">
                                        <!-- Product Image -->
                                        <div class="relative h-32 sm:h-40 bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                                            @if($product->gambar)
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->judul }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <i class="fas fa-box-open text-4xl text-blue-300"></i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Product Content -->
                                        <div class="p-3 sm:p-4">
                                            <h4 class="font-bold text-gray-900 mb-2 text-sm sm:text-base">{{ $product->judul }}</h4>
                                            <p class="text-xs sm:text-sm text-gray-600 mb-3 line-clamp-2">{{ $product->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
                                            
                                            <!-- Action Button -->
                                            <div class="space-y-2">
                                                <a href="{{ route('agent.requests.create') }}?type=product_edit&product_id={{ $product->id }}" 
                                                   class="block w-full bg-[#8BC53F] hover:bg-[#7AB42E] text-white text-xs font-semibold py-2 px-3 rounded text-center transition-colors">
                                                    <i class="fas fa-edit mr-1"></i>Request Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-shopping-bag text-gray-400 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-600 font-medium mb-2">Belum ada produk</p>
                                    <p class="text-gray-500 text-sm mb-4">Mulai dengan menambahkan produk pertama Anda</p>
                                    <a href="{{ route('agent.requests.create') }}?type=product_add" 
                                       class="inline-flex items-center text-sm font-medium text-[#8BC53F] hover:text-[#7AB42E] transition-colors duration-200">
                                        <i class="fas fa-plus mr-2"></i>
                                        Tambah Produk Pertama
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Informasi Tambahan -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#1D76BB]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-info-circle mr-3"></i>
                                Informasi Tambahan
                            </h3>
                        </div>
                        <div class="p-6">
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-[#1D76BB]">{{ $agen->tahun_pengalaman ?? '5+' }}</p>
                                    <p class="text-gray-600 text-xs">Tahun Pengalaman</p>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg text-center">
                                    <p class="text-2xl font-bold text-[#8BC53F]">{{ $agen->klien_terlayani ?? '100+' }}</p>
                                    <p class="text-gray-600 text-xs">Klien Terlayani</p>
                                </div>
                            </div>
                            
                            <!-- Layanan Unggulan -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-3 text-sm">Layanan Unggulan</h4>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    @if($agen->layanan_unggulan && is_array($agen->layanan_unggulan))
                                        @foreach($agen->layanan_unggulan as $layanan)
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-[#8BC53F] mr-2 mt-0.5 flex-shrink-0"></i>
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
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-[#8BC53F]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-bolt mr-3"></i>
                                Aksi Cepat
                            </h3>
                        </div>
                        <div class="p-6">
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
                                        <div class="w-10 h-10 rounded-lg bg-green-500 flex items-center justify-center mr-3">
                                            <i class="fab fa-whatsapp text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 group-hover:text-green-600">Test WhatsApp</p>
                                            <p class="text-xs text-gray-500">{{ $agen->telepon }}</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600"></i>
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

                    <!-- Website Takaful -->
                    <div class="bg-gradient-to-r from-[#1D76BB] to-blue-600 rounded-xl shadow-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <i class="fas fa-globe text-white text-3xl mb-4"></i>
                            <h3 class="font-bold text-lg text-white mb-3">Website Takaful</h3>
                            <p class="text-white/80 text-sm mb-4">
                                Kunjungi website resmi Takaful untuk informasi produk lengkap
                            </p>
                            <a href="https://www.takaful.co.id" 
                               target="_blank"
                               class="inline-flex items-center bg-white text-[#1D76BB] font-semibold py-2.5 px-5 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                                <span>Kunjungi Website</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>