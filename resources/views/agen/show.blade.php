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

<<<<<<< HEAD
    <!-- Tombol Kembali -->
    <div class="absolute top-6 left-6 z-50">
        <a href="{{ route('home') }}"
        class="bg-white/90 backdrop-blur-md text-gray-700 px-4 py-2 rounded-full shadow-lg 
                hover:bg-white transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
=======
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
            <div class="pt-4 sm:pt-6 md:pt-8 flex-1">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800 mb-1">
                    {{ $agen->nama }}
                </h1>

                <p class="text-takaful-blue font-semibold text-base md:text-lg mb-2">
                    {{ $agen->role }}
                </p>

                <!-- BADGE KODE AGEN -->
                <div class="inline-flex items-center bg-takaful-lightBlue text-takaful-blue px-4 py-2 rounded-full text-sm md:text-base font-bold border border-takaful-blue/30">
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
            </div>

        </div>
>>>>>>> 0dab6f0 (menambahkan bacground di foto porfilenya di setiap agentnya)
    </div>
</div>


<<<<<<< HEAD
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
=======
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

<script>
    function toggleText(section) {
        const text = document.getElementById(section + "-text");
        const toggleButton = document.getElementById(section + "-toggle");

        if (text.classList.contains("max-h-24")) {
            text.classList.remove("max-h-24");
            toggleButton.innerHTML = `Tutup <i class="fas fa-chevron-up ml-1 text-xs"></i>`;
        } else {
            text.classList.add("max-h-24");
            toggleButton.innerHTML = `Lihat Selengkapnya <i class="fas fa-chevron-down ml-1 text-xs"></i>`;
        }
    }
</script>

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
                    <div id="achievement-text" class="text-gray-700 leading-relaxed text-sm md:text-base text-truncate">
                        {{ $agen->pencapaian }}
                    </div>
                    @if(strlen($agen->pencapaian) > 300)
                    <div class="mt-4">
                        <button onclick="toggleText('achievement')" 
                                id="achievement-toggle" 
                                class="text-takaful-blue font-semibold text-sm hover:text-takaful-darkBlue transition-colors inline-flex items-center">
                            Lihat Selengkapnya
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- PRODUCTS SECTION -->
            @if($agen->products->count() > 0)
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
                                    class="text-takaful-blue font-medium text-xs hover:text-takaful-darkBlue transition-colors inline-flex items-center focus:outline-none">
                                Lihat Selengkapnya
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                @endif

                <!-- WhatsApp Button - Warna hijau Takaful yang tepat -->
                <div class="mt-auto pt-2">
                    <a href="{{ $product->wa_link }}" 
                       target="_blank"
                       class="block bg-takaful-green hover:bg-takaful-darkGreen text-white py-2.5 sm:py-3 px-3 sm:px-4 rounded-lg font-semibold text-xs sm:text-sm text-center transition-all duration-300 hover:shadow-md w-full border border-takaful-green/20">
                        <i class="fab fa-whatsapp mr-1.5 sm:mr-2"></i>Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
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

// Inisialisasi: tambahkan class line-clamp-3 untuk teks panjang
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-description').forEach((desc, index) => {
        if (desc.textContent.length > 120) {
            desc.classList.add('line-clamp-3');
        }
    });
});
</script>

<style>
/* Tambahkan CSS untuk smooth transition pada teks */
.product-description {
    transition: all 0.3s ease;
}

/* Pastikan tombol WhatsApp memiliki warna hijau Takaful yang tepat */
.bg-takaful-green {
    background-color: #8CC63F !important;
}

.hover\:bg-takaful-darkGreen:hover {
    background-color: #8CC63F !important;
}
</style>
</div>
            @endif
>>>>>>> 0dab6f0 (menambahkan bacground di foto porfilenya di setiap agentnya)

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
