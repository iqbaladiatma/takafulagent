<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#1D76BB] mr-3">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                    {{ __('Buat Request Perubahan') }}
                </h2>
                <p class="text-gray-600 mt-1 text-sm">Ajukan permintaan perubahan data kepada admin</p>
            </div>
            <a href="{{ route('agent.dashboard') }}" class="bg-white hover:bg-gray-50 text-gray-800 font-semibold py-3 px-4 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-6 md:py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('agent.requests.store') }}" id="requestForm">
                        @csrf
                        
                        <!-- Type Selection -->
                        <div class="mb-8">
                            <label for="type" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-filter text-[#1D76BB] mr-2"></i>
                                Jenis Request
                            </label>
                            <select name="type" id="type" class="w-full p-3 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D76BB]/50 focus:border-[#1D76BB] transition-all duration-200 appearance-none" required>
                                <option value="">Pilih jenis request...</option>
                                <option value="profile" {{ request('type') == 'profile' || old('type') == 'profile' ? 'selected' : '' }}>Perubahan Profil</option>
                                <option value="product_add" {{ request('type') == 'product_add' || old('type') == 'product_add' ? 'selected' : '' }}>Tambah Produk Baru</option>
                                <option value="product_edit" {{ request('type') == 'product_edit' || old('type') == 'product_edit' ? 'selected' : '' }}>Edit Produk</option>
                                <option value="product_delete" {{ request('type') == 'product_delete' || old('type') == 'product_delete' ? 'selected' : '' }}>Hapus Produk</option>
                            </select>
                            @error('type')
                                <p class="mt-2 text-sm text-red-600 bg-red-50 p-3 rounded-lg">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Product Selection (for product-related requests) -->
                        <div id="product-selection" class="mb-8" style="display: none;">
                            <label for="product_id" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-box text-[#8BC53F] mr-2"></i>
                                Pilih Produk
                            </label>
                            <select name="product_id" id="product_id" class="w-full p-3 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D76BB]/50 focus:border-[#1D76BB] transition-all duration-200 appearance-none">
                                <option value="">Pilih produk...</option>
                                @foreach($agen->products as $product)
                                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id || old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->judul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-2 text-sm text-red-600 bg-red-50 p-3 rounded-lg">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-8">
                            <label for="title" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-heading text-[#1D76BB] mr-2"></i>
                                Judul Request
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                   class="w-full p-3 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D76BB]/50 focus:border-[#1D76BB] transition-all duration-200"
                                   placeholder="Contoh: Perubahan nomor telepon" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 bg-red-50 p-3 rounded-lg">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <label for="description" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-align-left text-[#8BC53F] mr-2"></i>
                                Deskripsi Detail
                            </label>
                            <textarea name="description" id="description" rows="5" 
                                     class="w-full p-3 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1D76BB]/50 focus:border-[#1D76BB] transition-all duration-200 resize-none"
                                     placeholder="Jelaskan secara detail perubahan yang Anda inginkan..." 
                                     oninput="updateCharCount(this)" required>{{ old('description') }}</textarea>
                            <div class="mt-2 flex justify-between items-center">
                                <div class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-lightbulb mr-2 text-yellow-500"></i>
                                    Berikan deskripsi yang jelas agar cepat diproses
                                </div>
                                <span id="charCount" class="text-sm text-gray-400">0/500</span>
                            </div>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600 bg-red-50 p-3 rounded-lg">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Dynamic Fields based on Type -->
                        <div id="dynamic-fields" class="mb-8"></div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 pt-6 border-t border-gray-100">
                            <a href="{{ route('agent.dashboard') }}" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-6 rounded-lg transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                            <button type="submit" class="w-full sm:w-auto bg-[#8BC53F] hover:bg-[#7AB42E] text-white font-semibold py-3 px-8 rounded-lg shadow-sm hover:shadow transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-[#1D76BB] mr-3">
                            <i class="fas fa-question-circle text-white"></i>
                        </div>
                        Panduan Request
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-[#1D76BB]/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-[#1D76BB] text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Perubahan Profil</h4>
                                <p class="text-sm text-gray-600 mt-1">Untuk mengubah nama, telepon, deskripsi, foto, atau background profil Anda.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-[#8BC53F]/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-plus text-[#8BC53F] text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Tambah Produk</h4>
                                <p class="text-sm text-gray-600 mt-1">Untuk menambahkan produk baru ke profil Anda.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-edit text-purple-600 text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Edit Produk</h4>
                                <p class="text-sm text-gray-600 mt-1">Untuk mengubah informasi produk yang sudah ada.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-trash text-red-600 text-sm"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Hapus Produk</h4>
                                <p class="text-sm text-gray-600 mt-1">Untuk menghapus produk dari profil Anda.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-lightbulb text-yellow-500 mt-1"></i>
                            </div>
                            <div class="ml-3">
                                <h4 class="font-bold text-gray-900 mb-1">Tips Penting</h4>
                                <p class="text-sm text-gray-600">Berikan deskripsi yang jelas dan detail agar admin dapat memproses request dengan cepat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update character count
        function updateCharCount(textarea) {
            const charCount = textarea.value.length;
            const charCountElement = document.getElementById('charCount');
            charCountElement.textContent = `${charCount}/500`;
            
            if (charCount > 500) {
                charCountElement.classList.remove('text-gray-400');
                charCountElement.classList.add('text-red-500');
            } else if (charCount > 400) {
                charCountElement.classList.remove('text-gray-400', 'text-red-500');
                charCountElement.classList.add('text-yellow-500');
            } else {
                charCountElement.classList.remove('text-yellow-500', 'text-red-500');
                charCountElement.classList.add('text-gray-400');
            }
        }
        
        // Initialize character count
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('description');
            if (textarea) {
                updateCharCount(textarea);
            }
        });
        
        // Handle type selection
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
                    <div class="bg-gray-50 rounded-lg p-5">
                        <label class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-check-circle text-[#1D76BB] mr-2"></i>
                            Data yang ingin diubah (opsional)
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-all duration-200 cursor-pointer">
                                <input type="checkbox" name="requested_data[nama]" value="1" class="w-5 h-5 rounded border-gray-300 text-[#1D76BB] focus:ring-[#1D76BB]">
                                <span class="ml-3 font-medium text-gray-900">Nama</span>
                            </label>
                            
                            <label class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-all duration-200 cursor-pointer">
                                <input type="checkbox" name="requested_data[telepon]" value="1" class="w-5 h-5 rounded border-gray-300 text-[#1D76BB] focus:ring-[#1D76BB]">
                                <span class="ml-3 font-medium text-gray-900">Nomor Telepon</span>
                            </label>
                            
                            <label class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-all duration-200 cursor-pointer">
                                <input type="checkbox" name="requested_data[deskripsi]" value="1" class="w-5 h-5 rounded border-gray-300 text-[#1D76BB] focus:ring-[#1D76BB]">
                                <span class="ml-3 font-medium text-gray-900">Deskripsi</span>
                            </label>
                            
                            <label class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-all duration-200 cursor-pointer">
                                <input type="checkbox" name="requested_data[foto]" value="1" class="w-5 h-5 rounded border-gray-300 text-[#1D76BB] focus:ring-[#1D76BB]">
                                <span class="ml-3 font-medium text-gray-900">Foto Profil</span>
                            </label>
                            
                            <label class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-all duration-200 cursor-pointer">
                                <input type="checkbox" name="requested_data[background]" value="1" class="w-5 h-5 rounded border-gray-300 text-[#1D76BB] focus:ring-[#1D76BB]">
                                <span class="ml-3 font-medium text-gray-900">Background</span>
                            </label>
                        </div>
                        <div class="mt-3 text-sm text-gray-500 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                            Kosongkan jika ingin mengubah semua data
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