<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Agen - Takaful Keluarga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        takaful: {
                            blue: '#1D76BB',
                            green: '#8BC53F',
                            light: '#E8F5F1',
                            darkBlue: '#004A99',
                            darkGreen: '#008542',
                            lightBlue: '#E6F2FF',
                            lightGreen: '#E8F5F0'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'slide-down': 'slideDown 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' }
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        .section-container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .section-container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            .section-container {
                padding-left: 4rem;
                padding-right: 4rem;
            }
        }
        
        .card-shadow {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }
        
        .card-shadow:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        
        .btn-hover-effect {
            transition: all 0.3s ease;
        }
        
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="section-container">
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
                    <a href="{{ route('agen.index') }}" class="text-takaful-blue font-medium relative group">
                        Daftar Agen
                        <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-takaful-blue"></span>
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
                            <a href="/admin" class="px-5 py-2.5 bg-takaful-blue text-white font-medium rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 btn-hover-effect">
                                <i class="fas fa-user-shield mr-2"></i>Admin
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300 btn-hover-effect">
                                <i class="fas fa-th-large mr-2"></i>Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 border border-takaful-blue text-takaful-blue font-medium rounded-lg hover:bg-takaful-lightBlue transition-all duration-300 btn-hover-effect">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-takaful-green text-white font-medium rounded-lg hover:bg-takaful-darkGreen transition-all duration-300 btn-hover-effect">
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
                    <a href="{{ route('agen.index') }}" class="text-takaful-blue font-medium py-2 border-b border-gray-100">
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

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-takaful-blue text-white py-16 md:py-24">
        <div class="absolute inset-0 z-0 hero-pattern"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-takaful-green opacity-10 rounded-full -translate-y-32 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-takaful-blue opacity-10 rounded-full translate-y-40 -translate-x-40"></div>
        
        <div class="section-container relative z-10">
            <div class="max-w-4xl mx-auto text-center animate-fade-in">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-tight">
                    <i class="fas fa-users mr-3"></i>Daftar Agen 
                    <span class="text-takaful-light">Takaful Keluarga</span>
                </h1>
                
                <p class="text-lg md:text-xl mb-10 opacity-95 max-w-3xl mx-auto">
                    Temukan agen profesional terpercaya yang siap membantu kebutuhan asuransi syariah Anda
                </p>
                
                <div class="flex justify-center mb-8">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-5 text-center animate-float">
                        <div class="text-2xl md:text-3xl font-bold mb-2">{{ $agens->count() }}+</div>
                        <div class="text-sm opacity-90 font-medium">Agen Profesional Tersedia</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <div class="section-container -mt-6 sm:-mt-8 relative z-10">
        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 card-shadow">
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" id="searchInput" placeholder="Cari nama agen..." 
                               class="w-full pl-9 sm:pl-12 pr-3 sm:pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-takaful-blue focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    </div>
                </div>
                <button onclick="clearSearch()" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-takaful-green text-white rounded-lg hover:bg-takaful-darkGreen transition-all duration-300 btn-hover-effect text-sm sm:text-base font-medium">
                    <i class="fas fa-times mr-1 sm:mr-2"></i>
                    <span class="hidden sm:inline">Reset</span>
                    <span class="sm:hidden">Reset</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Agents Grid -->
    <section class="py-12 md:py-16 bg-white">
        <div class="section-container">
            <!-- Grid layout: 2 kolom di HP, 3 di tablet, 4 di laptop, 5 di desktop besar -->
            <div id="agentsGrid" class="mx-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3 sm:gap-4 lg:gap-5">
                @forelse($agens as $agen)
                    <!-- Card dengan warna biru bersih -->
                    <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                       class="agent-card bg-white rounded-lg lg:rounded-xl card-shadow overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg block cursor-pointer group border border-takaful-lightBlue/30 hover:border-takaful-blue/50">
                        
                        <!-- Bagian atas dengan background biru gradient -->
                        <div class="relative pt-6 sm:pt-8 lg:pt-10 px-2 sm:px-3 bg-gradient-to-r from-takaful-blue to-takaful-darkBlue rounded-t-lg lg:rounded-t-xl">
                            <!-- Foto agen -->
                            <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 mx-auto rounded-full overflow-hidden border-3 sm:border-4 border-white shadow-xl group-hover:border-takaful-blue/80 group-hover:shadow-[0_0_20px_rgba(29,118,187,0.3)] transition-all duration-300 bg-white relative z-10">
                                <img 
                                    src="{{ $agen->foto ? asset('storage/' . $agen->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($agen->nama) . '&background=1D76BB&color=fff&size=200' }}" 
                                    alt="{{ $agen->nama }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&background=1D76BB&color=fff&size=200'"
                                >
                            </div>
                            <!-- Decorative element - biru saja -->
                            <div class="absolute bottom-0 left-0 right-0 h-1.5 sm:h-2 bg-gradient-to-r from-takaful-blue/60 to-takaful-darkBlue/60"></div>
                        </div>
                        
                        <!-- Bagian bawah dengan informasi -->
                        <div class="pb-3 sm:pb-4 lg:pb-5 px-2 sm:px-3 lg:px-4 text-center pt-4 sm:pt-5 lg:pt-6">
                            <!-- Nama -->
                            <h3 class="font-bold text-gray-800 mb-1 group-hover:text-takaful-blue transition-colors duration-300 text-xs sm:text-sm lg:text-base truncate agent-name leading-tight">
                                {{ $agen->nama }}
                            </h3>
                            
                            <!-- Posisi/Role -->
                            <p class="text-takaful-blue font-semibold mb-2 sm:mb-3 text-xs sm:text-sm truncate">
                                {{ $agen->role }}
                            </p>
                            
                            <!-- Kode Agen -->
                            <div class="inline-flex items-center bg-takaful-lightBlue text-takaful-blue px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-bold mb-3 sm:mb-4 border border-takaful-blue/30 group-hover:border-takaful-blue/60 transition-all duration-300">
                                <i class="fas fa-id-badge mr-1 sm:mr-1.5 text-xs"></i>
                                <span class="font-bold tracking-wide text-xs">{{ $agen->kode_agen }}</span>
                            </div>
                            
                            <!-- Stats -->
                            @if($agen->tahun_pengalaman || $agen->klien_terlayani)
                                <div class="grid grid-cols-2 gap-1.5 sm:gap-2 mb-3 sm:mb-4 text-center">
                                    @if($agen->tahun_pengalaman)
                                        <div class="bg-takaful-lightBlue rounded-lg p-1.5 sm:p-2">
                                            <div class="text-sm sm:text-base lg:text-lg font-bold text-takaful-blue">{{ $agen->tahun_pengalaman }}</div>
                                            <div class="text-xs text-gray-600">Tahun</div>
                                        </div>
                                    @endif
                                    @if($agen->klien_terlayani)
                                        <div class="bg-takaful-light rounded-lg p-1.5 sm:p-2">
                                            <div class="text-sm sm:text-base lg:text-lg font-bold text-takaful-green">{{ $agen->klien_terlayani }}+</div>
                                            <div class="text-xs text-gray-600">Klien</div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Tombol Profil -->
                            <div class="mt-1 sm:mt-2">
                                <span class="inline-flex items-center justify-center text-takaful-blue font-semibold text-xs sm:text-sm bg-takaful-lightBlue hover:bg-takaful-blue hover:text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg transition-all duration-300 shadow-sm group-hover:shadow-md w-full">
                                    <span class="hidden sm:inline">Lihat Profil</span>
                                    <span class="sm:hidden">Profil</span>
                                    <i class="fas fa-arrow-right ml-1 sm:ml-2 group-hover:translate-x-1 transition-transform duration-300 text-xs"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Jika tidak ada agen -->
                    <div class="col-span-full text-center py-10 bg-white rounded-xl card-shadow max-w-md mx-auto border border-takaful-lightBlue/50">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 rounded-full bg-takaful-lightBlue flex items-center justify-center border-4 border-white shadow-lg">
                            <i class="fas fa-users text-2xl md:text-3xl text-takaful-blue"></i>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Belum ada agen tersedia</h3>
                        <p class="text-gray-600 mb-6 text-sm md:text-base px-4">Tim agen profesional kami sedang dalam proses seleksi.</p>
                        <a href="{{ route('home') }}#kontak" class="inline-flex items-center px-5 py-2.5 bg-takaful-blue text-white font-medium rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-search text-6xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak Ada Hasil</h3>
                <p class="text-gray-500">Tidak ditemukan agen yang sesuai dengan pencarian Anda.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="section-container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                <div>
                    <div class="mb-6">
                        <img src="{{ asset('images/logo-takaful.png') }}" alt="Takaful Keluarga" class="h-10 sm:h-12">
                    </div>
                    <p class="text-gray-400 mb-6 leading-relaxed">Asuransi syariah terpercaya untuk melindungi masa depan Anda dan keluarga dengan prinsip syariah yang amanah.</p>
                    
                    <div class="flex space-x-3">
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center hover:bg-takaful-blue transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center hover:bg-takaful-blue transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center hover:bg-takaful-green transition-all duration-300">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-500 transition-all duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-5 text-white">Perusahaan</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Beranda</a></li>
                        <li><a href="{{ route('agen.index') }}" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Daftar Agen</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Layanan</a></li>
                        <li><a href="{{ route('home') }}#tentang" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Tentang Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-5 text-white">Layanan</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-green"></i>Asuransi Jiwa Syariah</a></li>
                        <li><a href="#" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-green"></i>Asuransi Kesehatan</a></li>
                        <li><a href="#" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-green"></i>Asuransi Pendidikan</a></li>
                        <li><a href="#" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-green"></i>Asuransi Investasi</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-5 text-white">Kontak Kami</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-3 text-takaful-green"></i>
                            <div>
                                <div class="font-medium">Telepon</div>
                                <div class="text-sm">1500-123 (24 Jam)</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-takaful-blue"></i>
                            <div>
                                <div class="font-medium">Email</div>
                                <div class="text-sm">info@takaful.co.id</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-takaful-green"></i>
                            <div>
                                <div class="font-medium">Alamat</div>
                                <div class="text-sm">Gedung Takaful Tower<br>Jl. Sudirman Kav. 21<br>Jakarta Selatan</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} Takaful Indonesia. Semua hak dilindungi undang-undang.</p>
                <p class="mt-1 text-xs">Asuransi syariah yang diawasi oleh Otoritas Jasa Keuangan</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            const icon = this.querySelector('i');
            
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('active');
            
            if (mobileMenu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-2xl';
            } else {
                icon.className = 'fas fa-times text-2xl';
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuButton = document.getElementById('mobileMenuButton');
            
            if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('active');
                    menuButton.querySelector('i').className = 'fas fa-bars text-2xl';
                }
            }
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const agentCards = document.querySelectorAll('.agent-card');
            const noResults = document.getElementById('noResults');
            let visibleCount = 0;

            agentCards.forEach(card => {
                const agentName = card.querySelector('.agent-name').textContent.toLowerCase();
                if (agentName.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0 && searchTerm !== '') {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });

        // Clear search
        function clearSearch() {
            document.getElementById('searchInput').value = '';
            const agentCards = document.querySelectorAll('.agent-card');
            const noResults = document.getElementById('noResults');
            
            agentCards.forEach(card => {
                card.style.display = 'block';
            });
            
            noResults.classList.add('hidden');
        }

        // Handle navigation links - close mobile menu when clicking any link
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function () {
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobileMenu');
                const menuButton = document.getElementById('mobileMenuButton');
                
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('active');
                    menuButton.querySelector('i').className = 'fas fa-bars text-2xl';
                }
            });
        });
    </script>
</body>
</html>