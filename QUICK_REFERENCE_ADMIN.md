# 🚀 Quick Reference - Admin Kelola Agen

## 📍 URL Penting

| Halaman | URL | Akses |
|---------|-----|-------|
| Dashboard User | `/dashboard` | Semua user (login) |
| Panel Admin | `/admin` | Admin only |
| Kelola Agen | `/admin/agens` | Admin only |
| Tambah Agen | `/admin/agens/create` | Admin only |
| Profil Agen | `/agen/{kode}` | Public |

---

## 👤 Role & Permission

```php
// Check if user is admin
auth()->user()->isAdmin()  // true/false

// Check if user can access panel
auth()->user()->canAccessPanel($panel)  // true/false

// User roles
'admin' → Full access to Filament panel
'user'  → Dashboard only, no admin access
```

---

## 🎨 UI Components

### Navigation (Admin Only)
```blade
@if(Auth::user()->isAdmin())
    <x-nav-link :href="url('/admin')">
        <i class="fas fa-shield-halved mr-2"></i>Panel Admin
    </x-nav-link>
@endif
```

### Admin Badge
```blade
@if(auth()->user()->isAdmin())
    <span class="badge-admin">
        <i class="fas fa-crown mr-1"></i>ADMIN
    </span>
@endif
```

---

## 🔧 Model Methods

### Agen Model
```php
// Get WhatsApp link
$agen->wa_link  // Auto-generate dari telepon

// Get foto URL
$agen->foto_url  // With fallback to default avatar

// Attributes
$agen->nama
$agen->kode_agen
$agen->telepon
$agen->foto
$agen->deskripsi
$agen->role
$agen->pencapaian
```

### User Model
```php
// Check role
$user->isAdmin()  // true/false
$user->isUser()   // true/false

// Access panel
$user->canAccessPanel($panel)  // true/false
```

---

## 🔍 Search Query

```php
// Controller
$query = Agen::query();

if ($request->filled('search')) {
    $search = $request->search;
    $query->where(function($q) use ($search) {
        $q->where('nama', 'like', "%{$search}%")
          ->orWhere('kode_agen', 'like', "%{$search}%")
          ->orWhere('role', 'like', "%{$search}%")
          ->orWhere('deskripsi', 'like', "%{$search}%");
    });
}

$agens = $query->latest()->paginate(12)->withQueryString();
```

---

## 📱 Responsive Grid

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($agens as $agen)
        <!-- Card agen -->
    @endforeach
</div>
```

**Breakpoints:**
- `grid-cols-1` → Mobile (< 768px)
- `md:grid-cols-2` → Tablet (768px - 1024px)
- `lg:grid-cols-3` → Desktop (1024px - 1280px)
- `xl:grid-cols-4` → Large Desktop (> 1280px)

---

## 🎯 Filament Resource

### Form Schema
```php
Forms\Components\TextInput::make('nama')
    ->required()
    ->maxLength(255)
    ->label('Nama Lengkap')

Forms\Components\FileUpload::make('foto')
    ->image()
    ->directory('agen-photos')
    ->imageEditor()
    ->imageEditorAspectRatios(['1:1'])
    ->maxSize(2048)
```

### Table Columns
```php
Tables\Columns\ImageColumn::make('foto')
    ->circular()
    ->defaultImageUrl(asset('images/default-avatar.png'))

Tables\Columns\TextColumn::make('kode_agen')
    ->badge()
    ->color('success')
```

### Actions
```php
Tables\Actions\Action::make('view')
    ->label('Lihat Halaman')
    ->icon('heroicon-o-eye')
    ->url(fn (Agen $record): string => route('agen.show', $record->kode_agen))
    ->openUrlInNewTab()
```

---

## 🔒 Middleware

### AdminMiddleware
```php
// File: app/Http/Middleware/AdminMiddleware.php

public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check() || !auth()->user()->isAdmin()) {
        abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
    }
    return $next($request);
}
```

### Register in Filament
```php
// File: app/Providers/Filament/AdminPanelProvider.php

->authMiddleware([
    Authenticate::class,
    AdminMiddleware::class,
])
```

---

## 📦 Database

### Migration
```php
Schema::create('agens', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('kode_agen')->unique();
    $table->string('telepon');
    $table->string('wa_link')->nullable();
    $table->string('foto')->nullable();
    $table->text('deskripsi')->nullable();
    $table->string('role')->default('Agen Takaful');
    $table->text('pencapaian')->nullable();
    $table->timestamps();
});
```

### Fillable
```php
protected $fillable = [
    'nama',
    'kode_agen',
    'telepon',
    'wa_link',
    'foto',
    'deskripsi',
    'role',
    'pencapaian',
];
```

---

## 🎨 Tailwind Classes

### Card Agen
```html
<div class="bg-white border border-gray-200 rounded-xl overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
```

### Gradient Header
```html
<div class="bg-gradient-to-r from-blue-600 to-green-600 h-24"></div>
```

### Avatar
```html
<img class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover bg-white"
     onerror="this.src='https://ui-avatars.com/api/?name=...'">
```

### Badge
```html
<span class="inline-flex items-center bg-green-100 text-green-700 
             px-3 py-1 rounded-full text-xs font-bold">
    <i class="fas fa-id-badge mr-1"></i>TKF001
</span>
```

---

## 🚀 Quick Commands

```bash
# Clear cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Storage link
php artisan storage:link

# Check routes
php artisan route:list --path=admin

# Migrate
php artisan migrate

# Seed test data
php artisan tinker
>>> App\Models\Agen::factory()->count(20)->create()

# Create admin user
php artisan tinker
>>> App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
])
```

---

## 📝 Common Issues

### Issue: Admin tidak bisa akses panel
**Solution:**
```php
// Check user role
User::where('email', 'admin@example.com')->update(['role' => 'admin']);
```

### Issue: Foto tidak muncul
**Solution:**
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### Issue: Search tidak bekerja
**Solution:**
```php
// Pastikan withQueryString() ada di pagination
$agens = $query->latest()->paginate(12)->withQueryString();
```

### Issue: Icons tidak muncul
**Solution:**
```html
<!-- Add FontAwesome CDN di layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

---

## 📚 Documentation Files

- `FITUR_ADMIN_AGEN.md` → Dokumentasi lengkap fitur
- `TESTING_ADMIN_AGEN.md` → Checklist testing
- `QUICK_REFERENCE_ADMIN.md` → Quick reference (this file)
- `ADMIN_CREDENTIALS.md` → Kredensial admin
