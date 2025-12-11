<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Takaful</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        takaful: {
                            blue: '#1D76BB',
                            green: '#8BC53F',
                            light: '#E8F5F1',
                            darkBlue: '#004A99',
                            darkGreen: '#008542',
                            lightBlue: '#E6F2FF',
                            lightGreen: '#E8F5F0'
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(29, 118, 187, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    
    <!-- Login Container -->
    <div class="w-full max-w-md mx-auto">
        
        <!-- Logo dan Header -->
        <div class="text-center mb-8">
            <!-- Logo Takaful - ganti dengan SVG atau gambar Anda -->
            <div class="flex justify-center mb-6">
    <div class=" ">
        <!-- Ganti dengan path gambar logo Takaful Anda -->
        <img 
            src="{{ asset('images/logo-takaful.png') }}" 
            alt="Takaful Indonesia" 
            class="w-48 h-48 object-contain"
            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22%3E%3Cpath fill=%22%231D76BB%22 d=%22M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91c4.59-1.15 8-5.86 8-10.91V5l-8-3zm0 15c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5z%22/%3E%3Cpath fill=%22%231D76BB%22 d=%22M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z%22/%3E%3C/svg%3E'"
        >
    </div>
</div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Takaful Indonesia</h1>
            <p class="text-gray-600">Masuk ke akun Anda</p>
        </div>
        
        <!-- Session Status -->
        @if(session('status'))
        <div class="mb-6 p-4 bg-takaful-green/20 text-takaful-green rounded-lg border border-takaful-green/30">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>{{ session('status') }}</span>
            </div>
        </div>
        @endif
        
        <!-- Login Form -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-gray-100">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Input -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-envelope text-takaful-blue mr-2"></i>
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="email"
                            class="input-field w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-takaful-blue"
                            placeholder="masukan@email.com"
                        >
                    </div>
                    @error('email')
                    <div class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-lock text-takaful-blue mr-2"></i>
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="input-field w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-takaful-blue"
                            placeholder="••••••••"
                        >
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400 hover:text-takaful-blue"></i>
                        </button>
                    </div>
                    @error('password')
                    <div class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="w-4 h-4 text-takaful-blue bg-gray-100 border-gray-300 rounded focus:ring-takaful-blue focus:ring-2"
                        >
                        <label for="remember_me" class="ml-2 text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>
                    
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-takaful-blue hover:text-takaful-darkBlue transition-colors duration-300">
                        Lupa password?
                    </a>
                    @endif
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-takaful-blue text-white font-bold py-3.5 px-4 rounded-lg hover:bg-takaful-darkBlue transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-3"></i>
                    <span>Masuk</span>
                </button>
                
                @error('login')
                <div class="mt-4 p-3 bg-red-50 text-red-600 rounded-lg border border-red-200 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span>{{ $message }}</span>
                    </div>
                </div>
                @enderror
            </form>
            
            <!-- Divider -->
            <div class="mt-8 mb-6 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Belum punya akun?</span>
                </div>
            </div>
            
            <!-- Register Link - Only show if registration is enabled -->
            @if(config('registration.enabled', false))
            <div class="text-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full border-2 border-takaful-green text-takaful-green font-bold py-3.5 px-4 rounded-lg hover:bg-takaful-lightGreen transition-all duration-300">
                    <i class="fas fa-user-plus mr-3"></i>
                    <span>Daftar Akun Baru</span>
                </a>
            </div>
            @else
            <div class="text-center">
                <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-info-circle mr-2"></i>
                        Pendaftaran akun baru saat ini dinonaktifkan.
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        Hubungi administrator untuk mendapatkan akses.
                    </p>
                </div>
            </div>
            @endif
            
            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-gray-600 hover:text-takaful-blue transition-colors duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} Takaful Indonesia. Asuransi Syariah Terpercaya.</p>
            <p class="mt-1">Diawasi oleh Otoritas Jasa Keuangan</p>
        </div>
        
    </div>
    
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.className = 'fas fa-eye-slash text-takaful-blue';
            } else {
                passwordInput.type = 'password';
                icon.className = 'fas fa-eye text-gray-400 hover:text-takaful-blue';
            }
        });
        
        // Focus effect for inputs
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('i').className = 'fas fa-user text-takaful-blue';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.querySelector('i').className = 'fas fa-user text-gray-400';
                }
            });
        });
    </script>
    
</body>
</html>