<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Aksi Cepat
        </x-slot>

        @if($agen)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="/agent/products/create" 
                   class="flex items-center p-4 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800 hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-colors">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-plus class="w-8 h-8 text-primary-600 dark:text-primary-400" />
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-primary-900 dark:text-primary-100">Tambah Produk</h3>
                        <p class="text-xs text-primary-600 dark:text-primary-400">Tambahkan produk baru</p>
                    </div>
                </a>

                <a href="/agent/profiles/{{ $agen->id }}/edit" 
                   class="flex items-center p-4 bg-success-50 dark:bg-success-900/20 rounded-lg border border-success-200 dark:border-success-800 hover:bg-success-100 dark:hover:bg-success-900/30 transition-colors">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-user class="w-8 h-8 text-success-600 dark:text-success-400" />
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-success-900 dark:text-success-100">Edit Profil</h3>
                        <p class="text-xs text-success-600 dark:text-success-400">Perbarui informasi profil</p>
                    </div>
                </a>

                <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                   target="_blank"
                   class="flex items-center p-4 bg-info-50 dark:bg-info-900/20 rounded-lg border border-info-200 dark:border-info-800 hover:bg-info-100 dark:hover:bg-info-900/30 transition-colors">
                    <div class="flex-shrink-0">
                        <x-heroicon-o-eye class="w-8 h-8 text-info-600 dark:text-info-400" />
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-info-900 dark:text-info-100">Lihat Halaman</h3>
                        <p class="text-xs text-info-600 dark:text-info-400">Lihat halaman profil publik</p>
                    </div>
                </a>
            </div>

            <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Statistik Profil</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600 dark:text-gray-400">Nama:</span>
                        <span class="ml-2 font-medium text-gray-900 dark:text-gray-100">{{ $agen->nama }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 dark:text-gray-400">Kode Agen:</span>
                        <span class="ml-2 font-medium text-gray-900 dark:text-gray-100">{{ $agen->kode_agen }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 dark:text-gray-400">Total Produk:</span>
                        <span class="ml-2 font-medium text-gray-900 dark:text-gray-100">{{ $agen->products->count() }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600 dark:text-gray-400">Pengunjung (30 hari):</span>
                        <span class="ml-2 font-medium text-gray-900 dark:text-gray-100">{{ \App\Models\ProfileVisit::getUniqueVisitors($agen->id, 30) }}</span>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <x-heroicon-o-exclamation-triangle class="w-12 h-12 text-warning-500 mx-auto mb-4" />
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Profil Agen Belum Diatur</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Hubungi administrator untuk mengatur profil agen Anda agar dapat menggunakan panel ini.
                </p>
                <div class="bg-warning-50 dark:bg-warning-900/20 border border-warning-200 dark:border-warning-800 rounded-lg p-4">
                    <p class="text-sm text-warning-800 dark:text-warning-200">
                        <strong>Email Anda:</strong> {{ $user->email }}
                    </p>
                </div>
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>