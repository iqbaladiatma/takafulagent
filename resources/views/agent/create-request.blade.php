<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-plus mr-2"></i>{{ __('Buat Request Perubahan') }}
            </h2>
            <a href="{{ route('agent.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('agent.requests.store') }}">
                        @csrf
                        
                        <!-- Type Selection -->
                        <div class="mb-6">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Request</label>
                            <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Pilih jenis request...</option>
                                <option value="profile" {{ request('type') == 'profile' ? 'selected' : '' }}>Perubahan Profil</option>
                                <option value="product_add" {{ request('type') == 'product_add' ? 'selected' : '' }}>Tambah Produk Baru</option>
                                <option value="product_edit" {{ request('type') == 'product_edit' ? 'selected' : '' }}>Edit Produk</option>
                                <option value="product_delete" {{ request('type') == 'product_delete' ? 'selected' : '' }}>Hapus Produk</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Selection (for product-related requests) -->
                        <div id="product-selection" class="mb-6" style="display: none;">
                            <label for="product_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Produk</label>
                            <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Pilih produk...</option>
                                @foreach($agen->products as $product)
                                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->judul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Request</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Perubahan nomor telepon" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Detail</label>
                            <textarea name="description" id="description" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Jelaskan secara detail perubahan yang Anda inginkan..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dynamic Fields based on Type -->
                        <div id="dynamic-fields"></div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('agent.dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-blue-900 mb-3">
                    <i class="fas fa-question-circle mr-2"></i>Panduan Request
                </h3>
                <div class="text-sm text-blue-800 space-y-2">
                    <p><strong>Perubahan Profil:</strong> Untuk mengubah nama, telepon, deskripsi, foto, atau background.</p>
                    <p><strong>Tambah Produk:</strong> Untuk menambahkan produk baru ke profil Anda.</p>
                    <p><strong>Edit Produk:</strong> Untuk mengubah informasi produk yang sudah ada.</p>
                    <p><strong>Hapus Produk:</strong> Untuk menghapus produk dari profil Anda.</p>
                    <p class="mt-3"><strong>Tips:</strong> Berikan deskripsi yang jelas dan detail agar admin dapat memproses request dengan cepat.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            const type = this.value;
            const productSelection = document.getElementById('product-selection');
            const productSelect = document.getElementById('product_id');
            const dynamicFields = document.getElementById('dynamic-fields');
            
            // Show/hide product selection
            if (type === 'product_edit' || type === 'product_delete') {
                productSelection.style.display = 'block';
                productSelect.required = true;
            } else {
                productSelection.style.display = 'none';
                productSelect.required = false;
                productSelect.value = '';
            }
            
            // Clear dynamic fields
            dynamicFields.innerHTML = '';
            
            // Add specific fields based on type
            if (type === 'profile') {
                dynamicFields.innerHTML = `
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data yang ingin diubah (opsional)</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="requested_data[nama]" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Nama</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="requested_data[telepon]" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Nomor Telepon</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="requested_data[deskripsi]" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Deskripsi</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="requested_data[foto]" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Foto Profil</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="requested_data[background]" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Background</span>
                            </label>
                        </div>
                    </div>
                `;
            }
        });
        
        // Trigger change event on page load if type is pre-selected
        if (document.getElementById('type').value) {
            document.getElementById('type').dispatchEvent(new Event('change'));
        }
    </script>
</x-app-layout>