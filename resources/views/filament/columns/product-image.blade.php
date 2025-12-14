@php
    $record = $getRecord();
    $fallbackUrl = "https://via.placeholder.com/200x200/3B82F6/FFFFFF?text=" . urlencode(\Str::limit($record->judul, 10));
@endphp

<div class="flex items-center justify-center">
    @if($record->gambar)
        <img 
            src="{{ asset('storage/' . $record->gambar) }}" 
            alt="{{ $record->judul }}"
            class="w-20 h-20 object-cover rounded-lg shadow-sm border border-gray-200"
            onerror="this.src='{{ $fallbackUrl }}'"
        >
    @else
        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-sm border border-gray-200 flex items-center justify-center text-white text-xs font-medium text-center p-2">
            <div class="text-center">
                <i class="fas fa-box-open mb-1 text-lg opacity-75"></i>
                <div class="text-xs leading-tight">
                    {{ \Str::limit($record->judul, 12) }}
                </div>
            </div>
        </div>
    @endif
</div>