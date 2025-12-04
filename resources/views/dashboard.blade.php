<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Daftar Agen Takaful') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-lg shadow-lg p-6 mb-6 text-white">
                <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}! 👋</h3>
                <p class="opacity-90">Temukan agen Takaful terbaik untuk kebutuhan asuransi syariah Anda</p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Total Agen</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $agens->total() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-shield-halved text-green-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Asuransi Syariah</p>
                                <p class="text-2xl font-bold text-gray-800">100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i class="fas fa-award text-purple-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Terpercaya</p>
                                <p class="text-2xl font-bold text-gray-800">15+ Tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agen List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Daftar Agen Profesional</h3>

                    @if($agens->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($agens as $agen)
                                <div class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition">
                                    <div class="bg-gradient-to-r from-blue-600 to-green-600 h-20"></div>
                                    <div class="relative px-4 pb-4">
                                        <div class="flex justify-center -mt-12 mb-3">
                                            <img 
                                                src="{{ $agen->foto ? asset('storage/' . $agen->foto) : asset('images/default-avatar.svg') }}" 
                                                alt="{{ $agen->nama }}"
                                                class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover"
                                            >
                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-lg font-bold text-gray-800 mb-1">{{ $agen->nama }}</h4>
                                            <p class="text-blue-600 font-semibold text-sm mb-2">{{ $agen->role }}</p>
                                            <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold mb-3">
                                                {{ $agen->kode_agen }}
                                            </span>
                                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                                {{ Str::limit($agen->deskripsi, 80) }}
                                            </p>
                                            <div class="flex gap-2">
                                                <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                                                   class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm text-center">
                                                    <i class="fas fa-eye mr-1"></i>Lihat Profil
                                                </a>
                                                <a href="{{ $agen->wa_link }}" 
                                                   target="_blank"
                                                   class="flex-1 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm text-center">
                                                    <i class="fab fa-whatsapp mr-1"></i>Chat
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $agens->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">Belum ada agen tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
