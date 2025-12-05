<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takaful Indonesia - Asuransi Syariah Terpercaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        takaful: {
                            blue: '#0066CC',
                            green: '#00A651',
                            light: '#E8F5F1',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50">
    
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-10 sm:h-12">
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-takaful-blue transition font-medium relative group">
                        Beranda
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-takaful-blue transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#agen" class="text-gray-700 hover:text-takaful-blue transition font-medium relative group">
                        Agen Kami
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-takaful-blue transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#tentang" class="text-gray-700 hover:text-takaful-blue transition font-medium relative group">
                        Tentang
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-takaful-blue transition-all group-hover:w-full"></span>
                    </a>
                </div>
                
                <div class="flex space-x-2 sm:space-x-3">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin" class="bg-gradient-to-r from-takaful-blue to-blue-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg hover:shadow-lg transition-all duration-300 text-sm sm:text-base font-medium">
                                <i class="fas fa-user-shield mr-1 sm:mr-2"></i><span class="hidden sm:inline">Admin Panel</span><span class="sm:hidden">Admin</span>
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-takaful-green to-green-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg hover:shadow-lg transition-all duration-300 text-sm sm:text-base font-medium">
                                <i class="fas fa-th-large mr-1 sm:mr-2"></i><span class="hidden sm:inline">Dashboard</span><span class="sm:hidden">Menu</span>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-takaful-blue border-2 border-takaful-blue px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg hover:bg-takaful-blue hover:text-white transition-all duration-300 text-sm sm:text-base font-medium">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-takaful-green to-green-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg hover:shadow-lg transition-all duration-300 text-sm sm:text-base font-medium">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative bg-gradient-to-br from-takaful-blue via-blue-600 to-takaful-green text-white py-16 sm:py-20 lg:py-28 overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-5xl mx-auto text-center fade-in-up">
                <div class="inline-block mb-4 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-semibold">
                    ✨ Asuransi Syariah Terpercaya
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Lindungi Masa Depan<br/>
                    <span class="text-yellow-300">Keluarga Anda</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl mb-10 opacity-95 max-w-3xl mx-auto leading-relaxed">
                    Solusi asuransi syariah yang amanah dan terpercaya untuk melindungi yang Anda cintai
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                    <a href="#agen" class="group bg-white text-takaful-blue px-8 py-4 rounded-xl font-bold text-base sm:text-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fas fa-users mr-2 group-hover:scale-110 transition-transform"></i>Temui Agen Kami
                    </a>
                    <a href="{{ route('register') }}" class="group bg-takaful-green text-white px-8 py-4 rounded-xl font-bold text-base sm:text-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 border-2 border-white/30">
                        <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform"></i>Daftar Sekarang
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 sm:gap-8 max-w-3xl mx-auto">
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">{{ $totalAgen }}+</div>
                        <div class="text-xs sm:text-sm opacity-90">Agen Profesional</div>
                    </div>
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">10K+</div>
                        <div class="text-xs sm:text-sm opacity-90">Nasabah Terlayani</div>
                    </div>
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl md:text-5xl font-bold mb-2">15+</div>
                        <div class="text-xs sm:text-sm opacity-90">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Agen Section -->
    <section id="agen" class="py-16 sm:py-20 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16 fade-in-up">
                <div class="inline-block mb-4 px-4 py-2 bg-takaful-light rounded-full text-takaful-blue text-sm font-semibold">
                    👥 Tim Profesional
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">Agen Profesional Kami</h2>
                <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto">Temui agen-agen terbaik yang siap membantu mewujudkan perlindungan finansial Anda</p>
            </div>

            @if($featuredAgens->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-7xl mx-auto mb-12">
                    @foreach($featuredAgens as $agen)
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-takaful-blue/30 transform hover:-translate-y-2">
                            <!-- Header with Gradient -->
                            <div class="relative bg-gradient-to-r from-takaful-blue to-takaful-green h-32 sm:h-36">
                                <div class="absolute inset-0 bg-black/5"></div>
                                <!-- Avatar -->
                                <div class="absolute -bottom-16 left-1/2 transform -translate-x-1/2">
                                    <div class="relative">
                                        @if($agen->foto)
                                            <img 
                                                src="{{ asset('storage/' . $agen->foto) }}" 
                                                alt="{{ $agen->nama }}"
                                                class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-white shadow-xl object-cover bg-white"
                                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=0066CC&color=fff&bold=true'"
                                            >
                                        @else
                                            <img 
                                                src="https://ui-avatars.com/api/?name={{ urlencode($agen->nama) }}&size=200&background=0066CC&color=fff&bold=true" 
                                                alt="{{ $agen->nama }}"
                                                class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-white shadow-xl object-cover bg-white"
                                            >
                                        @endif
                                        <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="pt-20 px-6 pb-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-takaful-blue transition-colors">
                                    {{ $agen->nama }}
                                </h3>
                                <p class="text-takaful-blue font-semibold text-sm mb-3">{{ $agen->role }}</p>
                                <span class="inline-flex items-center bg-takaful-light text-takaful-green px-4 py-1.5 rounded-full text-xs font-bold mb-4">
                                    <i class="fas fa-id-badge mr-1.5"></i>{{ $agen->kode_agen }}
                                </span>
                                
                                @if($agen->deskripsi)
                                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 min-h-[60px]">
                                        {{ $agen->deskripsi }}
                                    </p>
                                @else
                                    <p class="text-gray-400 text-sm mb-6 italic min-h-[60px]">
                                        Agen profesional siap membantu Anda
                                    </p>
                                @endif
                                
                                <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                   class="inline-flex items-center justify-center w-full bg-gradient-to-r from-takaful-green to-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-eye mr-2"></i>Lihat Profil Lengkap
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center bg-gradient-to-r from-takaful-blue to-blue-700 text-white px-8 py-4 rounded-xl font-bold hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-lg">
                            <i class="fas fa-th-large mr-2"></i>Lihat Semua Agen
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center bg-gradient-to-r from-takaful-blue to-blue-700 text-white px-8 py-4 rounded-xl font-bold hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-lg">
                            <i class="fas fa-user-plus mr-2"></i>Daftar untuk Lihat Semua
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @endauth
                </div>
            @else
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                        <i class="fas fa-users text-5xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Agen Tersedia</h3>
                    <p class="text-gray-500 text-lg">Agen profesional akan segera hadir untuk melayani Anda</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 sm:mb-16 fade-in-up">
                    <div class="inline-block mb-4 px-4 py-2 bg-white rounded-full text-takaful-blue text-sm font-semibold shadow-sm">
                        ⭐ Keunggulan Kami
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">Mengapa Memilih Takaful?</h2>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto">Asuransi syariah dengan prinsip tolong-menolong yang amanah dan terpercaya</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                    <div class="group bg-white rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="bg-gradient-to-br from-takaful-blue to-blue-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-shield-halved text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Sesuai Syariah</h3>
                        <p class="text-gray-600 leading-relaxed">Diawasi oleh Dewan Pengawas Syariah dan sesuai dengan prinsip Islam</p>
                    </div>

                    <div class="group bg-white rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="bg-gradient-to-br from-takaful-green to-green-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-hands-helping text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Tolong-Menolong</h3>
                        <p class="text-gray-600 leading-relaxed">Prinsip ta'awun dalam setiap produk untuk saling membantu sesama</p>
                    </div>

                    <div class="group bg-white rounded-2xl p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-award text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Terpercaya</h3>
                        <p class="text-gray-600 leading-relaxed">Berpengalaman lebih dari 15 tahun melayani masyarakat Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="mb-6">
                        <img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-10 sm:h-12">
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">Asuransi syariah terpercaya untuk masa depan yang lebih baik dan penuh berkah</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-takaful-blue rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-takaful-blue rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-takaful-green rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-takaful-blue rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Link Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="text-gray-400 hover:text-takaful-green transition-colors flex items-center group">
                            <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>Beranda
                        </a></li>
                        <li><a href="#agen" class="text-gray-400 hover:text-takaful-green transition-colors flex items-center group">
                            <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>Agen Kami
                        </a></li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-takaful-green transition-colors flex items-center group">
                            <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>Tentang
                        </a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-takaful-green transition-colors flex items-center group">
                            <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>Daftar
                        </a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Layanan</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-takaful-green mr-2 mt-1"></i>
                            <span>Asuransi Jiwa</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-takaful-green mr-2 mt-1"></i>
                            <span>Asuransi Kesehatan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-takaful-green mr-2 mt-1"></i>
                            <span>Asuransi Pendidikan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-takaful-green mr-2 mt-1"></i>
                            <span>Investasi Syariah</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start text-gray-400">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-phone text-takaful-green"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Telepon</div>
                                <div class="font-semibold">1500-123</div>
                            </div>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-envelope text-takaful-green"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Email</div>
                                <div class="font-semibold">info@takaful.co.id</div>
                            </div>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-takaful-green"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Alamat</div>
                                <div class="font-semibold">Jakarta, Indonesia</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm text-center sm:text-left">
                        &copy; {{ date('Y') }} Takaful Indonesia. All rights reserved.
                    </p>
                    <div class="flex gap-6 text-sm text-gray-400">
                        <a href="#" class="hover:text-takaful-green transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-takaful-green transition-colors">Syarat & Ketentuan</a>
                    </div>
                </div>
            </d
