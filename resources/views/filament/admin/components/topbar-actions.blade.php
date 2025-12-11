<div class="flex items-center space-x-2 mr-4">
    <!-- Tombol Kembali ke Website -->
    <x-filament::button
        tag="a"
        :href="route('home')"
        target="_blank"
        color="primary"
        size="sm"
        icon="heroicon-o-arrow-left-on-rectangle"
        tooltip="Kembali ke Website Utama"
    >
        Website
    </x-filament::button>
    
    <!-- Tombol Dashboard User -->
    <x-filament::button
        tag="a"
        :href="route('dashboard')"
        target="_blank"
        color="success"
        size="sm"
        icon="heroicon-o-squares-2x2"
        tooltip="Dashboard User"
    >
        Dashboard
    </x-filament::button>
</div>