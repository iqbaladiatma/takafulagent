<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takaful Keluarga - Asuransi Syariah Terpercaya</title>
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
        
        .feature-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            border-radius: 50%;
            background: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 102, 204, 0.1);
            border: 2px solid #E8F5F1;
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.25);
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
                    <a href="#beranda" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#agen" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Agen Kami
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#layanan" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Layanan
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#tentang" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
                        Tentang
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-takaful-blue group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#kontak" class="text-gray-700 font-medium hover:text-takaful-blue transition-colors duration-300 relative group">
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
                    <a href="#beranda" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-home mr-3 text-takaful-blue"></i>Beranda
                    </a>
                    <a href="#agen" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-users mr-3 text-takaful-blue"></i>Agen Kami
                    </a>
                    <a href="#layanan" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-concierge-bell mr-3 text-takaful-blue"></i>Layanan
                    </a>
                    <a href="#tentang" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
                        <i class="fas fa-info-circle mr-3 text-takaful-blue"></i>Tentang
                    </a>
                    <a href="#kontak" class="text-gray-700 font-medium hover:text-takaful-blue py-2 border-b border-gray-100">
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
    <section id="beranda" class="relative overflow-hidden bg-takaful-blue text-white py-16 md:py-24">
        <div class="absolute inset-0 z-0 hero-pattern"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-takaful-green opacity-10 rounded-full -translate-y-32 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-takaful-blue opacity-10 rounded-full translate-y-40 -translate-x-40"></div>
        
        <div class="section-container relative z-10">
            <div class="max-w-4xl mx-auto text-center animate-fade-in">
               
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-tight">
                    Lindungi Keluarga Anda dengan 
                    <span class="text-takaful-light">Asuransi Syariah</span>
                </h1>
                
                <p class="text-lg md:text-xl mb-10 opacity-95 max-w-3xl mx-auto">
                    Memberikan perlindungan terbaik berdasarkan prinsip syariah yang amanah, transparan, dan saling tolong-menolong
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                    <a href="#agen" class="px-6 py-3.5 bg-white text-takaful-blue font-bold rounded-lg hover:bg-gray-100 transition-all duration-300 btn-hover-effect animate-slide-up shadow-lg">
                        <i class="fas fa-users mr-3"></i>Temui Agen Kami
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-3.5 bg-takaful-green text-white font-bold rounded-lg hover:bg-takaful-darkGreen transition-all duration-300 btn-hover-effect animate-slide-up" style="animation-delay: 0.1s">
                        <i class="fas fa-user-plus mr-3"></i>Daftar Sekarang
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                    <div class="stat-card rounded-xl p-5 text-center animate-float">
                        <div class="text-2xl md:text-3xl font-bold mb-2">{{ $totalAgen }}+</div>
                        <div class="text-sm opacity-90 font-medium">Agen Profesional</div>
                    </div>
                    <div class="stat-card rounded-xl p-5 text-center animate-float" style="animation-delay: 0.2s">
                        <div class="text-2xl md:text-3xl font-bold mb-2">10K+</div>
                        <div class="text-sm opacity-90 font-medium">Nasabah Terlayani</div>
                    </div>
                    <div class="stat-card rounded-xl p-5 text-center animate-float" style="animation-delay: 0.4s">
                        <div class="text-2xl md:text-3xl font-bold mb-2">15+</div>
                        <div class="text-sm opacity-90 font-medium">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Unggulan -->
    <section class="py-16 bg-white">
        <div class="section-container">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Layanan Unggulan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Produk asuransi syariah terbaik untuk semua kebutuhan perlindungan Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 card-shadow border border-gray-100 hover:border-takaful-blue transition-all duration-300">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-heartbeat text-takaful-green text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Asuransi Kesehatan Syariah</h3>
                    <p class="text-gray-600 mb-4">Perlindungan kesehatan lengkap untuk seluruh anggota keluarga dengan prinsip syariah</p>
                    <a href="#" class="text-takaful-blue font-medium hover:text-takaful-darkBlue inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="bg-white rounded-xl p-6 card-shadow border border-gray-100 hover:border-takaful-green transition-all duration-300">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-user-shield text-takaful-blue text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Asuransi Jiwa Syariah</h3>
                    <p class="text-gray-600 mb-4">Perlindungan finansial keluarga Anda dengan sistem bagi hasil yang adil</p>
                    <a href="#" class="text-takaful-green font-medium hover:text-takaful-darkGreen inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="bg-white rounded-xl p-6 card-shadow border border-gray-100 hover:border-takaful-blue transition-all duration-300">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-graduation-cap text-takaful-green text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Asuransi Pendidikan</h3>
                    <p class="text-gray-600 mb-4">Jaminan masa depan pendidikan anak dengan sistem syariah yang amanah</p>
                    <a href="#" class="text-takaful-blue font-medium hover:text-takaful-darkBlue inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Agen Section -->
<!-- Featured Agen Section -->
<section id="agen" class="py-12 md:py-16 bg-takaful-lightBlue">
    <div class="section-container">
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Agen Profesional Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">Tim agen profesional kami siap membantu Anda mendapatkan perlindungan yang tepat</p>
        </div>

        @if($featuredAgens->count() > 0)
            <!-- Grid layout: 2 kolom di HP, 3 di tablet, 4 di laptop -->
            <div class="mx-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5">
                @foreach($featuredAgens as $agen)
                    <!-- Card dengan warna biru bersih -->
                    <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                       class="bg-white rounded-lg md:rounded-xl card-shadow overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg block cursor-pointer group border border-takaful-lightBlue/30 hover:border-takaful-blue/50">
                        
                        <!-- Bagian atas dengan background biru gradient -->
                        <div class="relative pt-8 md:pt-10 px-2 md:px-3 bg-gradient-to-r from-takaful-blue to-takaful-darkBlue rounded-t-lg md:rounded-t-xl">
                            <!-- Foto agen -->
                            <div class="w-20 h-20 md:w-24 md:h-24 mx-auto rounded-full overflow-hidden border-4 border-white shadow-xl group-hover:border-takaful-blue/80 group-hover:shadow-[0_0_20px_rgba(29,118,187,0.3)] transition-all duration-300 bg-white relative z-10">
                                <img 
                                    src="{{ $agen->foto ? asset('storage/' . $agen->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($agen->nama) . '&background=1D76BB&color=fff&size=200' }}" 
                                    alt="{{ $agen->nama }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&background=1D76BB&color=fff&size=200'"
                                >
                            </div>
                            <!-- Decorative element - biru saja -->
                            <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-takaful-blue/60 to-takaful-darkBlue/60"></div>
                        </div>
                        
                        <!-- Bagian bawah dengan informasi -->
                        <div class="pb-4 md:pb-5 px-3 md:px-4 text-center pt-6">
                            <!-- Nama -->
                            <h3 class="font-bold text-gray-800 mb-1 group-hover:text-takaful-blue transition-colors duration-300 text-sm md:text-base truncate">
                                {{ $agen->nama }}
                            </h3>
                            
                            <!-- Posisi/Role -->
                            <p class="text-takaful-blue font-semibold mb-3 text-xs md:text-sm truncate">
                                {{ $agen->role }}
                            </p>
                            
                            <!-- Kode Agen -->
                            <div class="inline-flex items-center bg-takaful-lightBlue text-takaful-blue px-3 py-1.5 rounded-full text-xs font-bold mb-4 border border-takaful-blue/30 group-hover:border-takaful-blue/60 transition-all duration-300">
                                <i class="fas fa-id-badge mr-1.5"></i>
                                <span class="font-bold tracking-wide">{{ $agen->kode_agen }}</span>
                            </div>
                            
                            <!-- Tombol Profil -->
                            <div class="mt-2">
                                <span class="inline-flex items-center justify-center text-takaful-blue font-semibold text-xs md:text-sm bg-takaful-lightBlue hover:bg-takaful-blue hover:text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-sm group-hover:shadow-md">
                                    <span>Lihat Profil</span>
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Tombol Lihat Semua -->
            <div class="text-center mt-10 md:mt-12">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-takaful-blue text-white font-bold rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 btn-hover-effect shadow-lg hover:shadow-xl">
                        <i class="fas fa-th-large mr-2"></i>Lihat Semua Agen
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-takaful-blue text-white font-bold rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 btn-hover-effect shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-plus mr-2"></i>Daftar untuk Lihat Semua
                    </a>
                @endauth
            </div>
        @else
            <!-- Jika tidak ada agen -->
            <div class="text-center py-10 bg-white rounded-xl card-shadow max-w-md mx-auto border border-takaful-lightBlue/50">
                <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 rounded-full bg-takaful-lightBlue flex items-center justify-center border-4 border-white shadow-lg">
                    <i class="fas fa-users text-2xl md:text-3xl text-takaful-blue"></i>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Belum ada agen tersedia</h3>
                <p class="text-gray-600 mb-6 text-sm md:text-base px-4">Tim agen profesional kami sedang dalam proses seleksi.</p>
                <a href="#kontak" class="inline-flex items-center px-5 py-2.5 bg-takaful-blue text-white font-medium rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                </a>
            </div>
        @endif
    </div>
</section>
    <!-- Tentang Section -->
    <section id="tentang" class="py-16 bg-white">
        <div class="section-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Mengapa Memilih Takaful?</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Takaful Indonesia adalah perusahaan asuransi syariah terpercaya dengan lebih dari 15 tahun pengalaman melayani masyarakat Indonesia. Kami berkomitmen memberikan perlindungan terbaik berdasarkan prinsip-prinsip syariah.
                    </p>
                    
                    <div class="space-y-5">
                        <div class="flex items-start bg-takaful-light rounded-lg p-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-takaful-green flex items-center justify-center mr-4">
                                <i class="fas fa-shield-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Sesuai Syariah</h4>
                                <p class="text-gray-600 text-sm">Diawasi oleh Dewan Pengawas Syariah yang kompeten dan berpengalaman</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start bg-takaful-lightBlue rounded-lg p-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-takaful-blue flex items-center justify-center mr-4">
                                <i class="fas fa-hands-helping text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Prinsip Tolong-Menolong</h4>
                                <p class="text-gray-600 text-sm">Menerapkan prinsip ta'awun dalam setiap produk asuransi yang kami tawarkan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start bg-takaful-light rounded-lg p-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-takaful-green flex items-center justify-center mr-4">
                                <i class="fas fa-award text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Terpercaya & Berpengalaman</h4>
                                <p class="text-gray-600 text-sm">Lebih dari 15 tahun melayani ribuan nasabah di seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="bg-takaful-light rounded-2xl p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Visi & Misi Kami</h3>
                        
                        <div class="mb-6">
                            <h4 class="font-bold text-lg mb-3 text-takaful-blue">Visi</h4>
                            <p class="text-gray-600">Menjadi perusahaan asuransi syariah terdepan yang memberikan perlindungan komprehensif dan bernilai tambah bagi masyarakat Indonesia.</p>
                        </div>
                        
                        <div>
                            <h4 class="font-bold text-lg mb-3 text-takaful-green">Misi</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mt-1 mr-3 text-takaful-green"></i>
                                    <span>Menyediakan produk asuransi syariah yang inovatif dan terjangkau</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mt-1 mr-3 text-takaful-blue"></i>
                                    <span>Memberikan layanan terbaik melalui jaringan agen profesional</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mt-1 mr-3 text-takaful-green"></i>
                                    <span>Mengedukasi masyarakat tentang manfaat asuransi syariah</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle mt-1 mr-3 text-takaful-blue"></i>
                                    <span>Menerapkan prinsip transparansi dan keadilan dalam setiap transaksi</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-takaful-green text-white">
        <div class="section-container">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Siap Melindungi Masa Depan Keluarga Anda?</h2>
                <p class="text-lg mb-8 opacity-95">Daftar sekarang dan dapatkan konsultasi gratis dari agen profesional kami</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="px-6 py-3.5 bg-white text-takaful-green font-bold rounded-lg hover:bg-gray-100 transition-all duration-300 btn-hover-effect shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a href="#kontak" class="px-6 py-3.5 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition-all duration-300 btn-hover-effect">
                        <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white pt-12 pb-6">
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
                        <li><a href="#beranda" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Beranda</a></li>
                        <li><a href="#agen" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Agen Kami</a></li>
                        <li><a href="#layanan" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-takaful-blue"></i>Layanan</a></li>
                        <li><a href="#tentang" class="hover:text-takaful-green transition-colors duration-300 flex items-center">
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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobileMenu');
                    const menuButton = document.getElementById('mobileMenuButton');
                    
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('active');
                        menuButton.querySelector('i').className = 'fas fa-bars text-2xl';
                    }
                }
            });
        });
    </script>

</body>
</html>