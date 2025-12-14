<div class="space-y-4">
    @if($product->agens->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($product->agens as $agen)
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            @if($agen->foto)
                                <img src="{{ asset('storage/' . $agen->foto) }}" alt="{{ $agen->nama }}" class="w-full h-full rounded-full object-cover">
                            @else
                                <i class="fas fa-user text-blue-600 text-lg"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900">{{ $agen->nama }}</h4>
                            <p class="text-sm text-gray-600">{{ $agen->kode_agen }}</p>
                            <p class="text-sm text-gray-500">{{ $agen->telepon }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('agen.show', $agen->kode_agen) }}" 
                               target="_blank"
                               class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i>
                                Lihat
                            </a>
                            <a href="{{ $product->getWaLinkForAgen($agen) }}" 
                               target="_blank"
                               class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded hover:bg-green-700 transition-colors">
                                <i class="fab fa-whatsapp mr-1"></i>
                                WA
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8">
            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                <i class="fas fa-users text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada agen</h3>
            <p class="text-gray-500">Produk ini belum digunakan oleh agen manapun.</p>
        </div>
    @endif
</div>