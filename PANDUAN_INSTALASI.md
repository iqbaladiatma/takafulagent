# 🚀 PANDUAN INSTALASI WEBSITE AGEN TAKAFUL

## 📋 Langkah-Langkah Instalasi

### 1️⃣ Install Filament Admin Panel

```bash
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
```

### 2️⃣ Jalankan Migration

**JANGAN LUPA** pastikan database sudah dibuat terlebih dahulu!

```bash
php artisan migrate
```

### 3️⃣ Jalankan Seeder untuk Membuat Admin & Sample Data

```bash
php artisan db:seed
```

Ini akan membuat:
- **Admin User**
  - Email: `admin@takaful.com`
  - Password: `admin123`
  
- **2 Sample Agen** untuk testing

### 4️⃣ Buat Storage Link (untuk upload foto)

```bash
php artisan storage:link
```

### 5️⃣ Jalankan Server

```bash
php artisan serve
```

---

## 🎯 Cara Menggunakan

### Akses Admin Panel

1. Buka browser: `http://localhost:8000/admin`
2. Login dengan:
   - Email: `admin@takaful.com`
   - Password: `admin123`

### Kelola Agen

Di admin panel, Anda bisa:
- ✅ Tambah agen baru
- ✅ Edit data agen
- ✅ Upload foto agen
- ✅ Hapus agen
- ✅ Generate otomatis link WhatsApp
- ✅ Lihat halaman profil agen

### Akses Halaman Agen

Format URL: `http://localhost:8000/agen/{kode_agen}`

Contoh:
- `http://localhost:8000/agen/TKF001`
- `http://localhost:8000/agen/TKF002`

---

## 📁 Struktur File yang Dibuat

```
app/
├── Models/
│   ├── Agen.php                    ✅ Model Agen
│   └── User.php                    ✅ Model User (updated)
├── Http/Controllers/
│   └── AgenController.php          ✅ Controller Frontend
└── Filament/Resources/
    └── AgenResource.php            ✅ Filament Resource
        └── Pages/
            ├── ListAgens.php       ✅ Halaman List
            ├── CreateAgen.php      ✅ Halaman Create
            └── EditAgen.php        ✅ Halaman Edit

database/
├── migrations/
│   ├── 2024_12_04_000001_create_agens_table.php      ✅ Migration Agen
│   └── 2024_12_04_000002_create_users_table.php      ✅ Migration User
└── seeders/
    └── DatabaseSeeder.php          ✅ Seeder Admin & Sample

resources/views/
└── agen/
    └── show.blade.php              ✅ View Halaman Agen

routes/
└── web.php                         ✅ Routes
```

---

## 🎨 Fitur UI yang Sudah Dibuat

### Landing Page Agen (`/agen/{kode}`)

✅ **Hero Section dengan Gradient Biru-Hijau**
- Background gradient dari biru ke hijau (brand Takaful)
- Card putih dengan shadow modern
- Header gradient di atas card

✅ **Foto Profil**
- Circular avatar dengan border putih
- Badge icon shield (simbol proteksi)
- Default avatar jika belum upload foto

✅ **Informasi Agen**
- Nama lengkap (heading besar)
- Role/posisi
- Kode agen dengan badge hijau

✅ **Section Deskripsi**
- Background abu-abu lembut
- Icon user circle
- Typography yang mudah dibaca

✅ **Section Pencapaian**
- Background gradient light
- Border hijau di kiri
- Icon trophy

✅ **Kontak Info Cards**
- 2 kolom (responsive)
- Icon telepon & WhatsApp
- Background abu-abu dengan rounded

✅ **Tombol WhatsApp Besar**
- Gradient hijau
- Icon WhatsApp
- Hover effect (scale & shadow)
- Text ajakan konsultasi gratis

✅ **Link ke Website Resmi**
- Link ke takaful.co.id
- Hover effect smooth

✅ **Fully Responsive**
- Mobile-first design
- Breakpoint untuk tablet & desktop

---

## 🎨 Warna Brand Takaful

```css
Biru Takaful: #0066CC
Hijau Takaful: #00A651
Light Background: #E8F5F1
```

---

## 🔐 Keamanan

- ✅ Hanya admin yang bisa login ke panel
- ✅ Agen TIDAK bisa login
- ✅ Agen TIDAK bisa edit profil sendiri
- ✅ Semua data dikelola oleh tim admin

---

## 📝 Field Database Agen

| Field | Type | Keterangan |
|-------|------|------------|
| id | bigint | Primary key |
| nama | string | Nama lengkap agen |
| kode_agen | string | Kode unik agen (unique) |
| telepon | string | Nomor telepon |
| wa_link | string | Link WhatsApp (auto-generate) |
| foto | string | Path foto profil |
| deskripsi | text | Deskripsi singkat |
| role | string | Role/posisi (default: Agen Takaful) |
| pencapaian | text | Pencapaian/pengalaman (opsional) |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

---

## 🔄 Duplikasi untuk 100 Agen

Setelah prototipe selesai, untuk duplikasi:

1. **Export database** dari prototipe
2. **Clone project** untuk setiap agen
3. **Import data** agen yang sesuai
4. **Update .env** untuk setiap instance
5. **Deploy** ke hosting masing-masing

Atau gunakan **multi-tenancy** untuk satu codebase, banyak agen.

---

## 🆘 Troubleshooting

### Error: Class 'Filament\...' not found
```bash
composer dump-autoload
php artisan optimize:clear
```

### Foto tidak muncul
```bash
php artisan storage:link
```

### Migration error
```bash
php artisan migrate:fresh --seed
```

---

## 📞 Support

Jika ada pertanyaan, hubungi tim development.

**Selamat menggunakan! 🎉**
