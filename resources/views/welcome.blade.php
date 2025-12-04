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
</head>
<body class="bg-white">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-12">
                </div>
                
                <div class="hidden md:flex space-x-6">
                    <a href="#beranda" class="text-gray-700 hover:text-takaful-blue transition">Beranda</a>
                    <a href="#agen" class="text-gray-700 hover:text-takaful-blue transition">Agen Kami</a>
                    <a href="#tentang" class="text-gray-700 hover:text-takaful-blue transition">Tentang</a>
                </div>
                
                <div class="flex space-x-3">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin" class="bg-takaful-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-user-shield mr-2"></i>Admin Panel
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="bg-takaful-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                <i class="fas fa-th-large mr-2"></i>Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-takaful-blue border border-takaful-blue px-4 py-2 rounded-lg hover:bg-takaful-light transition">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-takaful-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="bg-gradient-to-br from-takaful-blue to-takaful-green text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Asuransi Syariah Terpercaya
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Lindungi masa depan Anda dan keluarga dengan prinsip syariah yang amanah
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#agen" class="bg-white text-takaful-blue px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transition transform hover:scale-105">
                        <i class="fas fa-users mr-2"></i>Temui Agen Kami
                    </a>
                    <a href="{{ route('register') }}" class="bg-takaful-green text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-white">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-16">
                    <div class="text-center">
                        <div class="text-4xl font-bold">{{ $totalAgen }}+</div>
                        <div class="text-sm opacity-90 mt-2">Agen Profesional</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold">10K+</div>
                        <div class="text-sm opacity-90 mt-2">Nasabah Terlayani</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold">15+</div>
                        <div class="text-sm opacity-90 mt-2">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Agen Section -->
    <section id="agen" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Agen Profesional Kami</h2>
                <p class="text-xl text-gray-600">Temui agen-agen terbaik yang siap membantu Anda</p>
            </div>

            @if($featuredAgens->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($featuredAgens as $agen)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
                            <div class="bg-gradient-to-r from-takaful-blue to-takaful-green h-24"></div>
                            <div class="relative px-6 pb-6">
                                <div class="flex justify-center -mt-16 mb-4">
                                    <img 
                                        src="{{ $agen->foto ? asset('storage/' . $agen->foto) : asset('images/default-avatar.svg') }}" 
                                        alt="{{ $agen->nama }}"
                                        class="w-32 h-32 rounded-full border-4 border-white shadow-xl object-cover"
                                    >
                                </div>
                                <div class="text-center">
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $agen->nama }}</h3>
                                    <p class="text-takaful-blue font-semibold mb-2">{{ $agen->role }}</p>
                                    <span class="inline-block bg-takaful-light text-takaful-green px-4 py-1 rounded-full text-sm font-bold mb-4">
                                        {{ $agen->kode_agen }}
                                    </span>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                        {{ Str::limit($agen->deskripsi, 100) }}
                                    </p>
                                    <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                       class="inline-block bg-takaful-green text-white px-6 py-2 rounded-full hover:bg-green-700 transition">
                                        <i class="fas fa-eye mr-2"></i>Lihat Profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-block bg-takaful-blue text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-th-large mr-2"></i>Lihat Semua Agen
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-block bg-takaful-blue text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-user-plus mr-2"></i>Daftar untuk Lihat Semua
                        </a>
                    @endauth
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada agen tersedia</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Mengapa Takaful?</h2>
                    <p class="text-xl text-gray-600">Asuransi syariah dengan prinsip tolong-menolong</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="bg-takaful-light w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-halved text-takaful-green text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Sesuai Syariah</h3>
                        <p class="text-gray-600">Diawasi oleh Dewan Pengawas Syariah</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="bg-takaful-light w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hands-helping text-takaful-green text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Tolong-Menolong</h3>
                        <p class="text-gray-600">Prinsip ta'awun dalam setiap produk</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="bg-takaful-light w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-award text-takaful-green text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Terpercaya</h3>
                        <p class="text-gray-600">Berpengalaman lebih dari 15 tahun</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="mb-4">
                        <img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-10">
                    </div>
                    <p class="text-gray-400">Asuransi syariah terpercaya untuk masa depan yang lebih baik</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Link Cepat</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#beranda" class="hover:text-takaful-green transition">Beranda</a></li>
                        <li><a href="#agen" class="hover:text-takaful-green transition">Agen Kami</a></li>
                        <li><a href="#tentang" class="hover:text-takaful-green transition">Tentang</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone mr-2"></i>1500-123</li>
                        <li><i class="fas fa-envelope mr-2"></i>info@takaful.co.id</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Takaful Indonesia. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
