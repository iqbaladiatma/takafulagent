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
</x-filament-panels::page>
