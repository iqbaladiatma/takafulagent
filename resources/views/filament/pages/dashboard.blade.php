<x-filament-panels::page>
    <!-- Welcome Card -->
    <div class="mb-6">
        <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-2">
                        Selamat Datang, {{ auth()->user()->name }}! 👋
                    </h2>
                    <p class="text-blue-100">
                        Kelola agen Takaful Anda dengan mudah dan efisien
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <a href="{{ route('filament.admin.resources.agens.create') }}" 
           class="bg-white rounded-xl shadow-sm hover:shadow-lg transition p-6 border-2 border-transparent hover:border-blue-500">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Tambah Agen</h3>
                    <p class="text-sm text-gray-500">Daftarkan agen baru</p>
                </div>
            </div>
        </a>

        <a href="{{ route('filament.admin.resources.agens.index') }}" 
           class="bg-white rounded-xl shadow-sm hover:shadow-lg transition p-6 border-2 border-transparent hover:border-green-500">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Kelola Agen</h3>
                    <p class="text-sm text-gray-500">Lihat & edit agen</p>
                </div>
            </div>
        </a>

        <a href="{{ route('dashboard') }}" 
           target="_blank"
           class="bg-white rounded-xl shadow-sm hover:shadow-lg transition p-6 border-2 border-transparent hover:border-purple-500">
            <div class="flex items-center">
                <div class="bg-purple-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Lihat Website</h3>
                    <p class="text-sm text-gray-500">Preview tampilan user</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
            <div class="flex items-start">
                <div class="bg-blue-500 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Tips Kelola Agen</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>✓ Upload foto profil untuk setiap agen</li>
                        <li>✓ Pastikan nomor telepon valid</li>
                        <li>✓ Isi deskripsi yang menarik</li>
                        <li>✓ Update data secara berkala</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200">
            <div class="flex items-start">
                <div class="bg-green-500 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Fitur Tersedia</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>✓ Tambah & edit agen</li>
                        <li>✓ Upload foto profil</li>
                        <li>✓ Auto-generate WhatsApp link</li>
                        <li>✓ Search & filter agen</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
