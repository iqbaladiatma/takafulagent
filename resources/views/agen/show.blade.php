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
<body class="bg-gradient-to-br from-takaful-blue to-takaful-green min-h-screen">
    
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            
            <!-- Card Profil Agen -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                
                <!-- Header dengan Gradient -->
                <div class="bg-gradient-to-r from-takaful-blue to-takaful-green h-32"></div>
                
                <!-- Konten Profil -->
                <div class="relative px-6 pb-8 sm:px-12 sm:pb-12">
                    
                    <!-- Foto Profil -->
                    <div class="flex justify-center -mt-20 mb-6">
                        <div class="relative">
                            <img 
                                src="{{ $agen->foto ? asset('storage/' . $agen->foto) : asset('images/default-avatar.png') }}" 
                                alt="{{ $agen->nama }}"
                                class="w-40 h-40 rounded-full border-8 border-white shadow-xl object-cover"
                            >
                            <div class="absolute bottom-2 right-2 bg-takaful-green text-white rounded-full p-3 shadow-lg">
                                <i class="fas fa-shield-halved text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Agen -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">
                            {{ $agen->nama }}
                        </h1>
                        <p class="text-takaful-blue font-semibold text-lg mb-2">
                            {{ $agen->role }}
                        </p>
                        <div class="inline-block bg-takaful-light px-6 py-2 rounded-full">
                            <span class="text-takaful-green font-bold text-sm">
                                <i class="fas fa-id-card mr-2"></i>{{ $agen->kode_agen }}
                            </span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    @if($agen->deskripsi)
                    <div class="mb-8">
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-user-circle text-takaful-blue mr-2"></i>
                                Tentang Saya
                            </h2>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $agen->deskripsi }}
                            </p>
                        </div>
                    </div>
                    @endif

                    <!-- Pencapaian -->
                    @if($agen->pencapaian)
                    <div class="mb-8">
                        <div class="bg-gradient-to-r from-takaful-light to-white rounded-2xl p-6 border-l-4 border-takaful-green">
                            <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-trophy text-takaful-green mr-2"></i>
                                Pencapaian & Pengalaman
                            </h2>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $agen->pencapaian }}
                            </p>
                        </div>
                    </div>
                    @endif

                    <!-- Kontak Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="bg-gray-50 rounded-xl p-4 flex items-center">
                            <div class="bg-takaful-blue text-white rounded-full p-3 mr-4">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Telepon</p>
                                <p class="font-semibold text-gray-800">{{ $agen->telepon }}</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 flex items-center">
                            <div class="bg-takaful-green text-white rounded-full p-3 mr-4">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">WhatsApp</p>
                                <p class="font-semibold text-gray-800">Siap Melayani</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol WhatsApp -->
                    <div class="text-center">
                        <a 
                            href="{{ $agen->wa_link }}" 
                            target="_blank"
                            class="inline-flex items-center justify-center bg-gradient-to-r from-takaful-green to-green-600 text-white font-bold py-4 px-8 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                        >
                            <i class="fab fa-whatsapp text-2xl mr-3"></i>
                            <span class="text-lg">Chat via WhatsApp</span>
                        </a>
                        <p class="text-gray-500 text-sm mt-4">
                            Konsultasi gratis seputar asuransi syariah Takaful
                        </p>
                    </div>

                    <!-- Info Produk -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="text-center">
                            <p class="text-gray-600 mb-4">
                                Ingin tahu lebih lanjut tentang produk Takaful?
                            </p>
                            <a 
                                href="https://www.takaful.co.id" 
                                target="_blank"
                                class="inline-flex items-center text-takaful-blue font-semibold hover:text-takaful-green transition-colors"
                            >
                                <span>Kunjungi Website Resmi Takaful</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-white">
                <p class="text-sm opacity-90">
                    © {{ date('Y') }} Takaful Indonesia. Asuransi Syariah Terpercaya.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
