<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-[#1D76BB] mr-3 shadow-md">
                        <i class="fas fa-tachometer-alt text-white"></i>
                    </div>
                    {{ __('Dashboard Agen') }}
                </h2>
                <p class="text-gray-600 mt-1 text-sm">Ringkasan performa dan aktivitas Anda</p>
            </div>
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full md:w-auto">
                <a href="{{ route('agent.profile') }}" class="bg-white hover:bg-gray-50 text-gray-800 font-semibold py-3 px-4 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-user mr-2 text-[#1D76BB]"></i>
                    <span>Profil Saya</span>
                </a>
                <a href="{{ route('agent.requests.create') }}" class="bg-[#8BC53F] hover:bg-[#7AB42E] text-white font-semibold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>
                    <span>Request Perubahan</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl mb-8">
                <div class="md:flex">
                    <div class="md:w-2/3 p-6 md:p-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-5">
                                @if($agen->foto)
                                    <img class="h-20 w-20 rounded-full object-cover border-4 border-white shadow-lg" src="{{ asset('storage/' . $agen->foto) }}" alt="{{ $agen->nama }}">
                                @else
                                    <div class="h-20 w-20 rounded-full bg-[#1D76BB] flex items-center justify-center shadow-lg">
                                        <i class="fas fa-user text-white text-3xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Halo, {{ $agen->nama }}!</h1>
                                <p class="text-gray-600 mt-1">Selamat datang kembali di dashboard agen Anda</p>
                                <div class="flex flex-wrap gap-2 mt-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#1D76BB]/10 text-[#1D76BB] shadow-sm">
                                        <i class="fas fa-id-badge mr-1"></i> {{ $agen->kode_agen }}
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#8BC53F]/10 text-[#8BC53F] shadow-sm">
                                        <i class="fas fa-user-tag mr-1"></i> {{ $agen->role }}
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 shadow-sm">
                                        <i class="fas fa-calendar-day mr-1"></i> Bergabung {{ $agen->created_at->format('M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/3 bg-[#1D76BB] p-6 md:p-8 flex items-center justify-center">
                        <div class="text-center text-white">
                            <div class="text-4xl font-bold mb-2">{{ $stats['total_products'] }}</div>
                            <p class="text-white/90 font-medium">Total Produk</p>
                            <p class="text-white/80 text-sm mt-1">Tersedia untuk nasabah</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Pengunjung Unik 30 Hari -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-xl bg-[#1D76BB]/10 flex items-center justify-center shadow-sm">
                                    <i class="fas fa-user-friends text-[#1D76BB] text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Pengunjung Unik</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['unique_visitors_30'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">30 hari terakhir</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-calendar-day mr-1"></i>
                                <span>Update harian</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Kunjungan 30 Hari -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-xl bg-[#8BC53F]/10 flex items-center justify-center shadow-sm">
                                    <i class="fas fa-eye text-[#8BC53F] text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Total Kunjungan</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total_visits_30'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">30 hari terakhir</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-chart-line mr-1"></i>
                                <span>+{{ $stats['unique_visitors_30'] > 0 ? round(($stats['total_visits_30'] - $stats['unique_visitors_30']) / $stats['unique_visitors_30'] * 100, 0) : 0 }}% dari pengunjung</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengunjung vs Kunjungan -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center shadow-sm">
                                    <i class="fas fa-chart-line text-purple-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Rasio Kunjungan</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">
                                    @if($stats['unique_visitors_30'] > 0)
                                        {{ round($stats['total_visits_30'] / $stats['unique_visitors_30'], 1) }}x
                                    @else
                                        0x
                                    @endif
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Kunjungan per pengunjung</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-info-circle mr-1"></i>
                                <span>Semakin tinggi semakin baik</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Request Pending -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center shadow-sm">
                                    <i class="fas fa-clock text-yellow-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Request Pending</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $pendingRequests->count() }}</p>
                                <p class="text-xs text-gray-500 mt-1">Menunggu persetujuan</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-hourglass-half mr-1"></i>
                                <span>Rata-rata 1-2 hari proses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Quick Actions -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="px-6 py-5 bg-gradient-to-r from-[#1D76BB] to-[#8BC53F]">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-bolt mr-3"></i>
                                Aksi Cepat
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <a href="{{ route('agent.profile') }}" class="group flex items-center p-5 bg-gray-50 hover:bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-[#1D76BB] flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                        <i class="fas fa-user text-white text-xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-bold text-gray-900 group-hover:text-[#1D76BB] transition-colors duration-200">Profil Lengkap</p>
                                        <p class="text-sm text-gray-500 mt-1">Kelola informasi profil Anda</p>
                                    </div>
                                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </a>
                                
                                <a href="{{ route('agen.show', $agen->kode_agen) }}" target="_blank" class="group flex items-center p-5 bg-gray-50 hover:bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-[#8BC53F] flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                        <i class="fas fa-external-link-alt text-white text-xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-bold text-gray-900 group-hover:text-[#8BC53F] transition-colors duration-200">Halaman Publik</p>
                                        <p class="text-sm text-gray-500 mt-1">Lihat halaman nasabah</p>
                                    </div>
                                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </a>
                                
                                <a href="{{ route('agent.requests.create') }}" class="group flex items-center p-5 bg-gray-50 hover:bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-purple-600 flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                        <i class="fas fa-plus text-white text-xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-200">Request Perubahan</p>
                                        <p class="text-sm text-gray-500 mt-1">Minta perubahan data</p>
                                    </div>
                                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </a>
                                
                                <a href="{{ route('agent.requests') }}" class="group flex items-center p-5 bg-gray-50 hover:bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-yellow-600 flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                        <i class="fas fa-history text-white text-xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <p class="font-bold text-gray-900 group-hover:text-yellow-600 transition-colors duration-200">Riwayat Request</p>
                                        <p class="text-sm text-gray-500 mt-1">Lihat semua request Anda</p>
                                    </div>
                                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <i class="fas fa-chevron-right text-gray-400"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Requests -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="px-6 py-5 bg-[#1D76BB]">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-history mr-3"></i>
                                Request Terbaru
                            </h3>
                            <a href="{{ route('agent.requests') }}" class="text-sm font-medium text-white/90 hover:text-white transition-colors duration-200">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-5">
                        @if($recentRequests->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentRequests->take(4) as $request)
                                <a href="{{ route('agent.requests.show', $request) }}" class="block group">
                                    <div class="flex items-center justify-between p-4 bg-gray-50 hover:bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center">
                                                @if($request->status == 'pending')
                                                    <div class="w-2 h-2 rounded-full bg-yellow-500 mr-3"></div>
                                                @elseif($request->status == 'approved')
                                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-3"></div>
                                                @else
                                                    <div class="w-2 h-2 rounded-full bg-red-500 mr-3"></div>
                                                @endif
                                                <p class="text-sm font-semibold text-gray-900 truncate group-hover:text-[#1D76BB] transition-colors duration-200">{{ $request->title }}</p>
                                            </div>
                                            <div class="flex items-center mt-2 ml-5">
                                                <span class="text-xs px-2 py-1 bg-gray-200 rounded-md text-gray-700">{{ $request->type_name }}</span>
                                                <span class="mx-2 text-gray-300">•</span>
                                                <span class="text-xs text-gray-500">{{ $request->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-3 flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            <i class="fas fa-chevron-right text-gray-400"></i>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4 shadow-sm">
                                    <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                                </div>
                                <p class="text-gray-600 font-semibold mb-2">Belum ada request</p>
                                <p class="text-gray-500 text-sm mb-5 px-4">Mulai dengan membuat request perubahan data</p>
                                <a href="{{ route('agent.requests.create') }}" class="inline-flex items-center text-sm font-semibold text-[#8BC53F] hover:text-[#7AB42E] transition-colors duration-200">
                                    <i class="fas fa-plus mr-2"></i>
                                    Buat Request Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile Summary & Contact Info -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
                <div class="px-6 py-5 bg-[#8BC53F]">
                    <h3 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-info-circle mr-3"></i>
                        Informasi Profil
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-[#1D76BB] flex items-center justify-center mr-3 shadow-sm">
                                    <i class="fas fa-user-tag text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Lengkap</p>
                                    <p class="font-bold text-gray-900 mt-1">{{ $agen->nama }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-[#8BC53F] flex items-center justify-center mr-3 shadow-sm">
                                    <i class="fas fa-id-card text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Kode Agen</p>
                                    <p class="font-bold text-gray-900 mt-1">{{ $agen->kode_agen }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-purple-600 flex items-center justify-center mr-3 shadow-sm">
                                    <i class="fas fa-phone-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Telepon</p>
                                    <p class="font-bold text-gray-900 mt-1">{{ $agen->telepon }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-yellow-600 flex items-center justify-center mr-3 shadow-sm">
                                    <i class="fas fa-user-cog text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Role</p>
                                    <p class="font-bold text-gray-900 mt-1">{{ $agen->role }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status & Join Date -->
                    <div class="flex flex-wrap items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <div class="flex items-center bg-green-100 rounded-full px-4 py-2 shadow-sm">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-2 animate-pulse"></div>
                                <span class="text-sm font-semibold text-green-800">Status: Aktif</span>
                            </div>
                            <span class="mx-4 text-gray-300 hidden md:block">|</span>
                            <div class="flex items-center bg-blue-100 rounded-full px-4 py-2 shadow-sm mt-3 md:mt-0">
                                <i class="fas fa-calendar-alt text-blue-600 mr-2 text-sm"></i>
                                <span class="text-sm font-semibold text-blue-800">Bergabung: {{ $agen->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('agent.profile') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-semibold text-[#1D76BB] hover:text-[#1565a3] transition-colors duration-200 bg-[#1D76BB]/10 hover:bg-[#1D76BB]/20 px-4 py-2 rounded-lg shadow-sm">
                            <span>Kelola Profil</span>
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Performance Chart Placeholder -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="px-6 py-5 bg-gradient-to-r from-[#1D76BB] to-[#8BC53F]">
                    <h3 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Statistik Kunjungan (30 Hari Terakhir)
                    </h3>
                </div>
                <div class="p-6">
                    <div class="h-72 flex flex-col items-center justify-center">
                        <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6 shadow-md">
                            <i class="fas fa-chart-area text-gray-400 text-3xl"></i>
                        </div>
                        <p class="text-gray-600 font-semibold text-lg mb-2">Visualisasi Grafik</p>
                        <p class="text-gray-500 text-sm mb-8">Chart akan muncul di sini untuk data kunjungan</p>
                        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-[#1D76BB] mr-3 shadow-sm"></div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500">Pengunjung Unik</p>
                                    <p class="text-lg font-bold text-gray-900">{{ $stats['unique_visitors_30'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-[#8BC53F] mr-3 shadow-sm"></div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500">Total Kunjungan</p>
                                    <p class="text-lg font-bold text-gray-900">{{ $stats['total_visits_30'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>