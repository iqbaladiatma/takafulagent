<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $agen->nama }} - Agen Takaful</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        takaful: {
                            blue: '#0066CC',
                            green: '#8CC63F',
                            light: '#E8F5F1',
                            lightBlue: '#E3F2FD',
                            darkGreen: '#8CC63F',
                            darkBlue: '#0055AA'
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .container-padding {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        @media (min-width: 640px) {
            .container-padding {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }
        }
        @media (min-width: 768px) {
            .container-padding {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
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
        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<div class="max-w-6xl mx-auto px-4 sm:px-5 lg:px-6 py-6 md:py-8 container-padding">

    <!-- BACK BUTTON -->
    <a href="{{ route('home') }}"
       class="inline-flex items-center mb-6 md:mb-8 bg-white border border-gray-300 px-4 py-2.5 rounded-lg text-gray-700 hover:shadow-md hover:border-takaful-blue transition-all">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>

    <!-- MAIN CARD PROFILE -->
    <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden mb-6 md:mb-8">

        <!-- HEADER BACKGROUND BANNER -->
        <div class="relative h-32 sm:h-40 md:h-48 lg:h-56 overflow-hidden" style="{{ $agen->background_style }}">
            <div class="absolute inset-0 bg-black/10"></div>

            <!-- Decorative Pattern -->
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
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
                    <div class="absolute bottom-2 right-2 w-5 h-5 sm:w-6 sm:h-6 bg-green-500 rounded-full border-3 border-white shadow-lg"></div>
                </div>

                <!-- DETAIL DI KANAN FOTO -->
                <div class="pt-4 sm:pt-6 md:pt-8 flex-1 relative z-10">
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-white mb-1 relative z-20">
                        {{ $agen->nama }}
                    </h1>

                    <p class="text-takaful-blue font-semibold text-base md:text-lg mb-2 relative z-20">
                        {{ $agen->role }}
                    </p>

                    <!-- BADGE KODE AGEN -->
                    <div class="inline-flex items-center bg-takaful-lightBlue text-takaful-blue px-4 py-2 rounded-full text-sm md:text-base font-bold border border-takaful-blue/30 relative z-20">
                        <i class="fas fa-id-badge mr-2"></i>
                        <span>{{ $agen->kode_agen }}</span>
                    </div>
                </div>
            </div>

            <!-- CONTACT INFO -->
            <div class="mt-6 sm:mt-8">

                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Telepon -->
                    <div class="flex-1 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex items-center">
                            <div class="bg-takaful-lightBlue p-2 rounded-lg mr-3">
                                <i class="fas fa-phone text-takaful-blue"></i>
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
                           class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-3 px-4 rounded-xl font-semibold text-center transition-all shadow-md hover:shadow-lg">
                            <i class="fab fa-whatsapp mr-2"></i>Chat via WhatsApp
                        </a>
                    </div>
                    
                    <!-- WhatsApp (desktop) -->
                    <div class="hidden sm:block">
                        <a href="{{ $agen->wa_link }}" target="_blank"
                           class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-3 px-6 rounded-xl font-semibold text-center transition-all shadow-md hover:shadow-lg">
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
            <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center mb-4 md:mb-6">
                    <div class="bg-takaful-lightBlue p-3 rounded-lg mr-4">
                        <i class="fas fa-user text-takaful-blue text-lg"></i>
                    </div>
                    <h2 class="font-bold text-lg md:text-xl text-gray-800">Tentang Saya</h2>
                </div>

                <div class="relative">
                    <div id="about-text" class="text-gray-700 leading-relaxed text-sm md:text-base overflow-hidden max-h-24 transition-all duration-300">
                        {{ $agen->deskripsi }}
                    </div>

                    @if(strlen($agen->deskripsi) > 300)
                    <div class="mt-4">
                        <button onclick="toggleText('about')" 
                            id="about-toggle"
                            class="font-semibold text-sm inline-flex items-center transition-colors"
                            style="color: #8CC63F;">
                            Lihat Selengkapnya
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- ACHIEVEMENTS SECTION -->
            @if($agen->pencapaian)
            <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center mb-4 md:mb-6">
                    <div class="bg-takaful-lightBlue p-3 rounded-lg mr-4">
                        <i class="fas fa-trophy text-takaful-blue text-lg"></i>
                    </div>
                    <h2 class="font-bold text-lg md:text-xl text-gray-800">Pencapaian</h2>
                </div>
                <div class="relative">
                    <div id="achievement-text" class="text-gray-700 leading-relaxed text-sm md:text-base overflow-hidden max-h-24 transition-all duration-300">
                        {{ $agen->pencapaian }}
                    </div>
                    @if(strlen($agen->pencapaian) > 300)
                    <div class="mt-4">
                        <button onclick="toggleText('achievement')" 
                                id="achievement-toggle" 
                                class="font-semibold text-sm inline-flex items-center transition-colors"
                                style="color: #8CC63F;">
                            Lihat Selengkapnya
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- PRODUCTS SECTION -->
            @if($agen->products && $agen->products->count() > 0)
            <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="bg-takaful-lightBlue p-3 rounded-lg mr-4">
                        <i class="fas fa-box-open text-takaful-blue text-lg"></i>
                    </div>
                    <h2 class="font-bold text-lg md:text-xl text-gray-800">Produk yang Ditawarkan</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5">
                    @foreach($agen->products as $product)
                    <div class="group bg-white border border-gray-200 rounded-lg overflow-hidden hover:border-takaful-blue hover:shadow-md transition-all duration-300 h-full flex flex-col">
                        <!-- Product Image -->
                        <div class="relative h-40 sm:h-48 bg-gradient-to-br from-takaful-lightBlue to-blue-50 overflow-hidden">
                            @if($product->gambar)
                                <img 
                                    src="{{ asset('storage/' . $product->gambar) }}" 
                                    alt="{{ $product->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    onerror="this.src='https://via.placeholder.com/400x300/1D76BB/FFFFFF?text={{ urlencode($product->judul) }}'"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-box-open text-4xl text-takaful-blue/30"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Product Content -->
                        <div class="p-3 sm:p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-sm sm:text-base text-gray-800 mb-2 line-clamp-2">
                                {{ $product->judul }}
                            </h3>
                            
                            @if($product->deskripsi)
                                <div class="mb-4 relative">
                                    <!-- Teks pendek (truncated) -->
                                    <div id="product-desc-{{ $loop->index }}" class="text-gray-600 text-xs sm:text-sm line-clamp-3 product-description">
                                        {{ $product->deskripsi }}
                                    </div>
                                    
                                    <!-- Tombol "Lihat Selengkapnya" hanya muncul jika teks panjang -->
                                    @if(strlen($product->deskripsi) > 120)
                                    <div class="mt-2">
                                        <button type="button" 
                                                onclick="toggleProductDesc({{ $loop->index }})" 
                                                id="product-toggle-{{ $loop->index }}"
                                                class="font-medium text-xs inline-flex items-center focus:outline-none"
                                                style="color: #8CC63F;">
                                            Lihat Selengkapnya
                                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            @endif

                            <!-- WhatsApp Button -->
                            <div class="mt-auto pt-2">
                                @if(isset($product->wa_link) && $product->wa_link)
                                <a href="{{ $product->wa_link }}" 
                                   target="_blank"
                                   class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full border border-takaful-green/20">
                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                </a>
                                @else
                                <button class="block bg-gray-300 text-gray-500 py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center w-full border border-gray-300 cursor-not-allowed">
                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Tidak Tersedia
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        <!-- RIGHT COLUMN -->
        <div class="lg:col-span-1">
            <!-- ADDITIONAL INFO SECTION -->
            <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm border border-gray-100 mb-6 md:mb-8">
                <div class="flex items-center mb-4 md:mb-6">
                    <div class="bg-takaful-lightBlue p-3 rounded-lg mr-4">
                        <i class="fas fa-info-circle text-takaful-blue text-lg"></i>
                    </div>
                    <h2 class="font-bold text-lg md:text-xl text-gray-800">Informasi Tambahan</h2>
                </div>
                
                <div class="space-y-4">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-gradient-to-br from-takaful-lightBlue to-blue-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-takaful-blue">5+</p>
                            <p class="text-gray-600 text-xs sm:text-sm">Tahun Pengalaman</p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-takaful-green">100+</p>
                            <p class="text-gray-600 text-xs sm:text-sm">Klien Terlayani</p>
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm">Layanan Unggulan</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-takaful-green mr-2 mt-0.5"></i>
                                <span>Konsultasi Asuransi Syariah Gratis</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-takaful-green mr-2 mt-0.5"></i>
                                <span>Proses Klaim Cepat & Mudah</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-takaful-green mr-2 mt-0.5"></i>
                                <span>Pelayanan 24/7 via WhatsApp</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- VISIT WEBSITE -->
            <div class="bg-gradient-to-r from-takaful-blue to-takaful-darkBlue p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-sm border border-gray-100">
                <div class="text-center">
                    <i class="fas fa-globe text-white text-3xl mb-4"></i>
                    <h3 class="font-bold text-lg md:text-xl text-white mb-3">Website Takaful</h3>
                    <p class="text-white/80 text-sm mb-4">
                        Kunjungi website resmi Takaful untuk informasi produk lengkap
                    </p>
                    <a href="https://www.takaful.co.id" 
                       target="_blank"
                       class="inline-flex items-center bg-white text-takaful-blue font-semibold py-2.5 px-5 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                        <span>Kunjungi Website</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
        <p class="text-gray-600 text-sm">
            © {{ date('Y') }} Takaful Indonesia. Asuransi Syariah Terpercaya.
        </p>
    </div>

</div>

<script>
    // Fungsi untuk toggle teks about dan achievement
    function toggleText(section) {
        const text = document.getElementById(section + "-text");
        const toggleButton = document.getElementById(section + "-toggle");

        if (text.classList.contains("max-h-24")) {
            // Tampilkan semua teks
            text.classList.remove("max-h-24");
            toggleButton.innerHTML = `Tutup <i class="fas fa-chevron-up ml-1 text-xs"></i>`;
        } else {
            // Sembunyikan teks panjang
            text.classList.add("max-h-24");
            toggleButton.innerHTML = `Lihat Selengkapnya <i class="fas fa-chevron-down ml-1 text-xs"></i>`;
        }
    }

    // Fungsi untuk toggle teks deskripsi produk
    function toggleProductDesc(index) {
        const descElement = document.getElementById(`product-desc-${index}`);
        const toggleButton = document.getElementById(`product-toggle-${index}`);
        
        if (descElement.classList.contains('line-clamp-3')) {
            // Tampilkan semua teks
            descElement.classList.remove('line-clamp-3');
            toggleButton.innerHTML = 'Lihat Lebih Sedikit <i class="fas fa-chevron-up ml-1 text-xs"></i>';
        } else {
            // Sembunyikan teks panjang
            descElement.classList.add('line-clamp-3');
            toggleButton.innerHTML = 'Lihat Selengkapnya <i class="fas fa-chevron-down ml-1 text-xs"></i>';
        }
    }

    // Inisialisasi: tambahkan class line-clamp-3 untuk teks panjang produk
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.product-description').forEach((desc, index) => {
            if (desc.textContent.length > 120) {
                desc.classList.add('line-clamp-3');
            }
        });
    });
</script>

</body>
</html>