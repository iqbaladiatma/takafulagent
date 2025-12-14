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

    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo-takaful.png') }}" alt="Takaful Keluarga" class="h-10 sm:h-12">
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('agen.index') }}" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Daftar Agen
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('home') }}#layanan" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Layanan
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('home') }}#tentang" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Tentang
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('home') }}#kontak" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Kontak
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                </div>

                <!-- Auth Buttons - Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin" class="px-5 py-2.5 bg-takaful-blue text-white font-medium rounded-lg hover:bg-takaful-darkBlue transition-all duration-300">
                                <i class="fas fa-user-shield mr-2"></i>Admin
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300">
                                <i class="fas fa-th-large mr-2"></i>Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 border border-takaful-blue text-takaful-blue font-medium rounded-lg hover:bg-takaful-lightBlue transition-all duration-300">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300">
                            Daftar
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuButton" class="md:hidden text-gray-700 hover:text-takaful-blue">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="mobile-menu hidden md:hidden bg-white py-4 border-t border-gray-100">
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-home mr-3 text-takaful-blue"></i>Beranda
                    </a>
                    <a href="{{ route('agen.index') }}" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-users mr-3 text-takaful-blue"></i>Daftar Agen
                    </a>
                    <a href="{{ route('home') }}#layanan" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-concierge-bell mr-3 text-takaful-blue"></i>Layanan
                    </a>
                    <a href="{{ route('home') }}#tentang" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-info-circle mr-3 text-takaful-blue"></i>Tentang
                    </a>
                    <a href="{{ route('home') }}#kontak" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-phone-alt mr-3 text-takaful-blue"></i>Kontak
                    </a>
                    
                    <div class="pt-4 space-y-3">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="/admin" class="block text-center px-4 py-2.5 bg-takaful-blue text-white font-medium rounded-lg hover:bg-takaful-darkBlue transition-all duration-300">
                                    <i class="fas fa-user-shield mr-2"></i>Admin Panel
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="block text-center px-4 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300">
                                    <i class="fas fa-th-large mr-2"></i>Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block text-center px-4 py-2.5 border border-takaful-blue text-takaful-blue font-medium rounded-lg hover:bg-takaful-lightBlue transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                            </a>
                            <a href="{{ route('register') }}" class="block text-center px-4 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300">
                                <i class="fas fa-user-plus mr-2"></i>Daftar
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

<div class="max-w-6xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8 container-padding">

    <!-- BACK BUTTON -->
    <a href="{{ route('home') }}"
       class="inline-flex items-center mb-4 sm:mb-6 lg:mb-8 bg-white border border-gray-300 px-3 sm:px-4 py-2 sm:py-2.5 rounded-lg text-gray-700 hover:shadow-md hover:border-takaful-blue transition-all text-sm sm:text-base">
        <i class="fas fa-arrow-left mr-1 sm:mr-2"></i>Kembali
    </a>

    <!-- MAIN CARD PROFILE -->
    <div class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg overflow-hidden mb-4 sm:mb-6 lg:mb-8">

        <!-- HEADER BACKGROUND BANNER -->
        <div class="relative h-24 sm:h-32 lg:h-40 xl:h-48 overflow-hidden" style="{{ $agen->background_style }}">
            <div class="absolute inset-0 bg-black/10"></div>

            <!-- Decorative Pattern -->
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- PROFILE CONTENT FIXED - LINKEDIN LAYOUT -->
        <div class="px-3 sm:px-4 lg:px-6 xl:px-8 pb-4 sm:pb-6">

            <!-- FOTO + DETAIL DALAM 1 ROW -->
            <div class="flex items-start gap-3 sm:gap-4 lg:gap-6 -mt-8 sm:-mt-12 lg:-mt-14 xl:-mt-16">

                <!-- FOTO PROFIL DI KIRI (LINKEDIN STYLE) -->
                <div class="relative flex-shrink-0">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 rounded-full border-3 sm:border-4 lg:border-5 border-white shadow-lg overflow-hidden bg-white ring-2 sm:ring-4 ring-gray-100">
                        <img
                            src="{{ $agen->foto ? asset('storage/'.$agen->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($agen->nama) . '&background=1D76BB&color=fff&size=400' }}"
                            alt="{{ $agen->nama }}"
                            class="w-full h-full object-cover"
                            onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&background=1D76BB&color=fff&size=400'"
                        />
                    </div>

                    <!-- Online Indicator -->
                    <div class="absolute bottom-1 right-1 sm:bottom-2 sm:right-2 w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5 xl:w-6 xl:h-6 bg-green-500 rounded-full border-2 sm:border-3 border-white shadow-lg"></div>
                </div>

                <!-- DETAIL DI KANAN FOTO -->
                <div class="pt-2 sm:pt-4 lg:pt-6 xl:pt-8 flex-1 relative z-10 min-w-0">
                    <h1 class="text-base sm:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl font-bold text-white mb-1 relative z-20 leading-tight">
                        {{ $agen->nama }}
                    </h1>

                    <p class="text-takaful-blue font-semibold text-sm sm:text-base lg:text-lg mb-2 sm:mb-3 relative z-20">
                        {{ $agen->role }}
                    </p>

                    <!-- BADGE KODE AGEN -->
                    <div class="inline-flex items-center bg-takaful-lightBlue text-takaful-blue px-2 sm:px-3 lg:px-4 py-1 sm:py-1.5 lg:py-2 rounded-full text-xs sm:text-sm lg:text-base font-bold border border-takaful-blue/30 relative z-20">
                        <i class="fas fa-id-badge mr-1 sm:mr-2 text-xs sm:text-sm"></i>
                        <span>{{ $agen->kode_agen }}</span>
                    </div>
                </div>
            </div>

            <!-- CONTACT INFO -->
            <div class="mt-4 sm:mt-6 lg:mt-8">

                <div class="flex flex-col lg:flex-row gap-3 sm:gap-4">
                    <!-- Social Media Links -->
                    <div class="flex-1 bg-gray-50 p-3 sm:p-4 rounded-lg sm:rounded-xl border border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="flex items-center">
                                <div class="bg-takaful-lightBlue p-2 rounded-lg mr-2 sm:mr-3 flex-shrink-0">
                                    <i class="fas fa-share-alt text-takaful-blue text-sm"></i>
                                </div>
                                <div class="text-left min-w-0 flex-1">
                                    <p class="font-semibold text-gray-700 text-xs sm:text-sm">Sosial Media</p>
                                    <p class="text-gray-600 text-xs hidden sm:block">Hubungi melalui platform favorit Anda</p>
                                </div>
                            </div>
                            
                            <!-- Social Media Icons -->
                            <div class="flex items-center space-x-2 sm:space-x-3 justify-center sm:justify-end">
                                @if($agen->instagram_username)
                                <!-- Instagram -->
                                <a href="{{ $agen->instagram_url }}" 
                                   target="_blank"
                                   class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white hover:shadow-lg transition-all duration-300 hover:scale-110"
                                   title="Instagram (@{{ $agen->instagram_username }})">
                                    <i class="fab fa-instagram text-xs sm:text-sm"></i>
                                </a>
                                @endif
                                
                                @if($agen->facebook_username)
                                <!-- Facebook -->
                                <a href="{{ $agen->facebook_url }}" 
                                   target="_blank"
                                   class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:shadow-lg transition-all duration-300 hover:scale-110"
                                   title="Facebook ({{ $agen->facebook_username }})">
                                    <i class="fab fa-facebook-f text-xs sm:text-sm"></i>
                                </a>
                                @endif
                                
                                @if($agen->linkedin_username)
                                <!-- LinkedIn -->
                                <a href="{{ $agen->linkedin_url }}" 
                                   target="_blank"
                                   class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-700 rounded-full flex items-center justify-center text-white hover:shadow-lg transition-all duration-300 hover:scale-110"
                                   title="LinkedIn ({{ $agen->linkedin_username }})">
                                    <i class="fab fa-linkedin-in text-xs sm:text-sm"></i>
                                </a>
                                @endif
                                
                                @if(!$agen->instagram_username && !$agen->facebook_username && !$agen->linkedin_username)
                                <!-- Default social media jika tidak ada yang diset -->
                                <div class="text-gray-500 text-xs">
                                    Belum ada social media
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Button -->
                    <div class="lg:w-auto">
                        <a href="{{ $agen->wa_link }}" target="_blank"
                           class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg sm:rounded-xl font-semibold text-center transition-all shadow-md hover:shadow-lg text-sm sm:text-base w-full lg:whitespace-nowrap">
                            <i class="fab fa-whatsapp mr-1 sm:mr-2"></i>
                            <span class="hidden sm:inline">Chat via WhatsApp</span>
                            <span class="sm:hidden">WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Contact Info Row -->
            </div>
        </div>
    </div>

    <!-- GRID LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">

        <!-- LEFT COLUMN -->
        <div class="lg:col-span-2 space-y-4 sm:space-y-6 lg:space-y-8">

            <!-- ABOUT SECTION -->
            @if($agen->deskripsi)
            <div class="bg-white p-4 sm:p-5 lg:p-6 xl:p-8 rounded-lg sm:rounded-xl lg:rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center mb-3 sm:mb-4 lg:mb-6">
                    <div class="bg-takaful-lightBlue p-2 sm:p-3 rounded-lg mr-3 sm:mr-4 flex-shrink-0">
                        <i class="fas fa-user text-takaful-blue text-sm sm:text-base lg:text-lg"></i>
                    </div>
                    <h2 class="font-bold text-base sm:text-lg lg:text-xl text-gray-800">Tentang Saya</h2>
                </div>

                <div class="relative">
                    <div id="about-text" class="text-gray-700 leading-relaxed text-sm sm:text-base overflow-hidden max-h-20 sm:max-h-24 transition-all duration-300">
                        {{ $agen->deskripsi }}
                    </div>

                    @if(strlen($agen->deskripsi) > 300)
                    <div class="mt-3 sm:mt-4">
                        <button onclick="toggleText('about')" 
                            id="about-toggle"
                            class="font-semibold text-xs sm:text-sm inline-flex items-center transition-colors"
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
                                <a href="{{ $product->getWaLinkForAgen($agen) }}" 
                                   target="_blank"
                                   class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full border border-takaful-green/20">
                                    <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                                </a>
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

    // Mobile Menu Toggle
    document.getElementById('mobileMenuButton').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>

</body>
</html>