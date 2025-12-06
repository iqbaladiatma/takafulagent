<x-filament-panels::page>
    <!-- Welcome Card -->
    <div class="mb-6">
        <div class="relative bg-gradient-to-r from-blue-600 to-green-600 rounded-2xl shadow-xl p-6 sm:p-8 text-white overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <div class="inline-block mb-3 px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm font-semibold">
                        ⚡ Admin Panel
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold mb-2">
                        Selamat Datang, {{ auth()->user()->name }}! 👋
                    </h2>
                    <p class="text-blue-50">
                        Kelola agen Takaful Anda dengan mudah dan efisien
                    </p>
                </div>
                <div class="hidden lg:block">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Widgets -->
    <div class="mb-6">
        @livewire(\App\Filament\Widgets\AgenStatsOverview::class)
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">
        <a href="{{ route('filament.admin.resources.agens.create') }}" 
           class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 hover:border-blue-500 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Tambah Agen</h3>
                    <p class="text-sm text-gray-500">Daftarkan agen baru</p>
                </div>
            </div>
        </a>

        <a href="{{ route('filament.admin.resources.agens.index') }}" 
           class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 hover:border-green-500 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="bg-gradient-to-br from-green-500 to-green-600 p-4 rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-green-600 transition-colors">Kelola Agen</h3>
                    <p class="text-sm text-gray-500">Lihat & edit agen</p>
                </div>
            </div>
        </a>

        <a href="{{ route('dashboard') }}" 
           target="_blank"
           class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 hover:border-yellow-500 transform hover:-translate-y-1 sm:col-span-2 lg:col-span-1">
            <div class="flex items-center">
                <div class="bg-gradient-to-br from-yellow-500 to-orange-500 p-4 rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-yellow-600 transition-colors">Lihat Website</h3>
                    <p class="text-sm text-gray-500">Preview tampilan user</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 sm:p-8 border border-blue-200 shadow-lg">
            <div class="flex items-start">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Tips Kelola Agen</h3>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                            <span>Upload foto profil untuk setiap agen</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                            <span>Pastikan nomor telepon valid</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                            <span>Isi deskripsi yang menarik</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                            <span>Update data secara berkala</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 sm:p-8 border border-green-200 shadow-lg">
            <div class="flex items-start">
                <div class="bg-gradient-to-br from-green-500 to-green-600 p-4 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Fitur Tersedia</h3>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-0.5"></i>
                            <span>Tambah & edit agen</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-0.5"></i>
                            <span>Upload foto profil</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-0.5"></i>
                            <span>Auto-generate WhatsApp link</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-0.5"></i>
                            <span>Search & filter agen</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
