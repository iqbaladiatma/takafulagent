<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#1D76BB] mr-3">
                        <i class="fas fa-eye text-white"></i>
                    </div>
                    Detail Request
                </h2>
                <p class="text-gray-600 mt-1 text-sm">Lihat detail permintaan perubahan</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('agent.requests') }}" class="bg-white hover:bg-gray-50 text-gray-800 font-semibold py-3 px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar Request
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 md:py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Request Detail Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-4 bg-[#1D76BB]">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <h3 class="text-lg font-bold text-white">
                            {{ $request->title }}
                        </h3>
                        <div class="flex items-center gap-2">
                            @if($request->status === 'pending')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                    <i class="fas fa-clock mr-1"></i>Pending
                                </span>
                            @elseif($request->status === 'approved')
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                    <i class="fas fa-check mr-1"></i>Disetujui
                                </span>
                            @elseif($request->status === 'rejected')
                                <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                    <i class="fas fa-times mr-1"></i>Ditolak
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Request</label>
                            <p class="text-gray-900 font-medium capitalize">
                                @if($request->type === 'profile')
                                    Perubahan Profil
                                @elseif($request->type === 'product_add')
                                    Tambah Produk
                                @elseif($request->type === 'product_edit')
                                    Edit Produk
                                @elseif($request->type === 'product_delete')
                                    Hapus Produk
                                @endif
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Request</label>
                            <p class="text-gray-900 font-medium">{{ $request->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-900 whitespace-pre-line">{{ $request->description }}</p>
                        </div>
                    </div>

                    @if($request->requested_data)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data yang Diminta</label>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <pre class="text-sm text-gray-900 whitespace-pre-wrap">{{ json_encode($request->requested_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        </div>
                    </div>
                    @endif

                    @if($request->admin_notes)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin</label>
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                            <p class="text-gray-900 whitespace-pre-line">{{ $request->admin_notes }}</p>
                        </div>
                    </div>
                    @endif

                    @if($request->processed_at)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Diproses Tanggal</label>
                            <p class="text-gray-900 font-medium">{{ $request->processed_at->format('d M Y, H:i') }}</p>
                        </div>
                        @if($request->approvedBy)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Diproses Oleh</label>
                            <p class="text-gray-900 font-medium">{{ $request->approvedBy->name }}</p>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>