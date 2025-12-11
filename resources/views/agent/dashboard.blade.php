<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard Agen') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('agent.profile') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-user mr-2"></i>Profil Saya
                </a>
                <a href="{{ route('agent.requests.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-plus mr-2"></i>Request Perubahan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-500 to-green-500 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if($agen->foto)
                                <img class="h-16 w-16 rounded-full object-cover border-2 border-white" src="{{ asset('storage/' . $agen->foto) }}" alt="{{ $agen->nama }}">
                            @else
                                <div class="h-16 w-16 rounded-full bg-white/20 flex items-center justify-center">
                                    <i class="fas fa-user text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h1 class="text-2xl font-bold">Selamat datang, {{ $agen->nama }}!</h1>
                            <p class="text-blue-100">{{ $agen->role }} • Kode: {{ $agen->kode_agen }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Pengunjung Unik 30 Hari -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-users text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Pengunjung Unik (30 hari)</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['unique_visitors_30'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Kunjungan 30 Hari -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-eye text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Kunjungan (30 hari)</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_visits_30'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Produk -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shopping-bag text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Produk</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_products'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Request Pending -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Request Pending</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $pendingRequests->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            <i class="fas fa-bolt mr-2"></i>Aksi Cepat
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('agent.profile') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Lihat Profil Lengkap</p>
                                    <p class="text-xs text-gray-500">Detail informasi profil Anda</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('agen.show', $agen->kode_agen) }}" target="_blank" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-external-link-alt text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Lihat Halaman Publik</p>
                                    <p class="text-xs text-gray-500">Halaman yang dilihat nasabah</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('agent.requests.create') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-plus text-purple-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Request Perubahan</p>
                                    <p class="text-xs text-gray-500">Minta admin untuk mengubah data</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('agent.requests') }}" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-list text-yellow-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Riwayat Request</p>
                                    <p class="text-xs text-gray-500">Lihat semua request Anda</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Requests -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">
                                <i class="fas fa-history mr-2"></i>Request Terbaru
                            </h3>
                            <a href="{{ route('agent.requests') }}" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua</a>
                        </div>
                        
                        @if($recentRequests->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentRequests->take(5) as $request)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $request->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $request->type_name }} • {{ $request->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="ml-3">
                                        {!! $request->status_badge !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="fas fa-inbox text-gray-400 text-3xl mb-2"></i>
                                <p class="text-gray-500">Belum ada request</p>
                                <a href="{{ route('agent.requests.create') }}" class="text-blue-600 hover:text-blue-800 text-sm">Buat request pertama</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile Summary -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-info-circle mr-2"></i>Ringkasan Profil
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                            <p class="text-gray-900">{{ $agen->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kode Agen</p>
                            <p class="text-gray-900">{{ $agen->kode_agen }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Telepon</p>
                            <p class="text-gray-900">{{ $agen->telepon }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Role</p>
                            <p class="text-gray-900">{{ $agen->role }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Bergabung</p>
                            <p class="text-gray-900">{{ $agen->created_at->format('d M Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>