<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-user mr-2"></i>{{ __('Profil Saya') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('agent.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('agent.requests.create') }}?type=profile" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-edit mr-2"></i>Request Perubahan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="relative">
                    <!-- Background -->
                    <div class="h-32 bg-gradient-to-r from-blue-500 to-green-500" style="{{ $agen->background_style }}"></div>
                    
                    <!-- Profile Info -->
                    <div class="relative px-6 pb-6">
                        <div class="flex items-end -mt-16">
                            <div class="flex-shrink-0">
                                @if($agen->foto)
                                    <img class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg" src="{{ asset('storage/' . $agen->foto) }}" alt="{{ $agen->nama }}">
                                @else
                                    <div class="h-24 w-24 rounded-full bg-gray-300 border-4 border-white shadow-lg flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600 text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-6 pb-2">
                                <h1 class="text-2xl font-bold text-gray-900">{{ $agen->nama }}</h1>
                                <p class="text-gray-600">{{ $agen->role }}</p>
                                <p class="text-sm text-gray-500">Kode Agen: {{ $agen->kode_agen }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Profile Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                <i class="fas fa-info-circle mr-2"></i>Informasi Dasar
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $agen->nama }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Kode Agen</label>
                                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $agen->kode_agen }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Role/Posisi</label>
                                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $agen->role }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $agen->telepon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                <i class="fas fa-align-left mr-2"></i>Deskripsi
                            </h3>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-900">{{ $agen->deskripsi ?: 'Belum ada deskripsi.' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Achievements -->
                    @if($agen->pencapaian)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                <i class="fas fa-trophy mr-2"></i>Pencapaian
                            </h3>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="text-gray-900">{{ $agen->pencapaian }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Products -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    <i class="fas fa-shopping-bag mr-2"></i>Produk Saya ({{ $agen->products->count() }})
                                </h3>
                                <a href="{{ route('agent.requests.create') }}?type=product_add" class="text-sm text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-plus mr-1"></i>Request Tambah Produk
                                </a>
                            </div>
                            
                            @if($agen->products->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($agen->products as $product)
                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <div class="flex items-start space-x-3">
                                            @if($product->gambar)
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->judul }}" class="w-16 h-16 object-cover rounded">
                                            @else
                                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <h4 class="font-medium text-gray-900">{{ $product->judul }}</h4>
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($product->deskripsi, 80) }}</p>
                                                <div class="flex space-x-2 mt-2">
                                                    <a href="{{ route('agent.requests.create') }}?type=product_edit&product_id={{ $product->id }}" class="text-xs text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-edit mr-1"></i>Request Edit
                                                    </a>
                                                    <a href="{{ route('agent.requests.create') }}?type=product_delete&product_id={{ $product->id }}" class="text-xs text-red-600 hover:text-red-800">
                                                        <i class="fas fa-trash mr-1"></i>Request Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <i class="fas fa-shopping-bag text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-gray-500">Belum ada produk</p>
                                    <a href="{{ route('agent.requests.create') }}?type=product_add" class="text-blue-600 hover:text-blue-800 text-sm">Request tambah produk pertama</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Stats -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                <i class="fas fa-chart-bar mr-2"></i>Statistik
                            </h3>
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Pengunjung (30 hari)</span>
                                    <span class="text-sm font-medium text-gray-900">{{ \App\Models\ProfileVisit::getUniqueVisitors($agen->id, 30) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Total Kunjungan</span>
                                    <span class="text-sm font-medium text-gray-900">{{ \App\Models\ProfileVisit::getTotalVisits($agen->id, 30) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Total Produk</span>
                                    <span class="text-sm font-medium text-gray-900">{{ $agen->products->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600">Bergabung</span>
                                    <span class="text-sm font-medium text-gray-900">{{ $agen->created_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                <i class="fas fa-bolt mr-2"></i>Aksi Cepat
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('agen.show', $agen->kode_agen) }}" target="_blank" class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i>Lihat Halaman Publik
                                </a>
                                <a href="{{ $agen->wa_link }}" target="_blank" class="block w-full text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    <i class="fab fa-whatsapp mr-2"></i>Test WhatsApp
                                </a>
                                <a href="{{ route('agent.requests') }}" class="block w-full text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    <i class="fas fa-history mr-2"></i>Riwayat Request
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Note -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Catatan</h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>Untuk mengubah informasi profil atau produk, silakan buat request ke admin melalui tombol "Request Perubahan".</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>