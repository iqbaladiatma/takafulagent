<x-filament-panels::page>
    {{-- Page Header --}}
    <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    {{ $this->getHeading() }}
                </h1>
                <p class="text-sm text-gray-600">{{ $this->getSubheading() }}</p>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Widget --}}
    @if(class_exists(\App\Filament\Widgets\AgenStatsOverview::class))
        <div class="mb-8">
            @livewire(\App\Filament\Widgets\AgenStatsOverview::class)
        </div>
    @endif

    {{-- Quick Actions Section --}}
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Aksi Cepat</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Add Agent Card --}}
        <a href="{{ route('filament.admin.resources.agens.create') }}" 
           class="group block bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-200 hover:-translate-y-1 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">Tambah Agen</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Daftarkan agen baru ke dalam sistem</p>
            </div>
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100">
                <span class="text-sm font-medium text-blue-600 flex items-center gap-2">
                    Mulai sekarang
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>
        </a>

        {{-- Manage Agents Card --}}
        <a href="{{ route('filament.admin.resources.agens.index') }}" 
           class="group block bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-200 hover:-translate-y-1 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">Kelola Agen</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Lihat dan kelola semua data agen</p>
            </div>
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100">
                <span class="text-sm font-medium text-green-600 flex items-center gap-2">
                    Lihat daftar
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>
        </a>

        {{-- View Website Card --}}
        <a href="{{ url('/') }}" target="_blank"
           class="group block bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-200 hover:-translate-y-1 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Lihat Website</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Preview tampilan frontend website</p>
            </div>
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100">
                <span class="text-sm font-medium text-purple-600 flex items-center gap-2">
                    Buka website
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </span>
            </div>
        </a>

        {{-- System Status Card --}}
        <div class="block bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Status Sistem</h3>
                <p class="text-sm text-gray-600 leading-relaxed mb-3">Monitoring sistem real-time</p>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium text-green-600">Semua sistem normal</span>
                </div>
            </div>
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100">
                <span class="text-sm text-gray-500">Terakhir dicek: Baru saja</span>
            </div>
        </div>
    </div>

    {{-- Recent Activity Section (Optional) --}}
    <div class="mt-8">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h2>
            <p class="text-sm text-gray-600">Belum ada aktivitas untuk ditampilkan.</p>
        </div>
    </div>
</x-filament-panels::page>
