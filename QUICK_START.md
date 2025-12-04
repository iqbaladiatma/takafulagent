# ⚡ QUICK START - Website Agen Takaful

Panduan cepat untuk mulai menggunakan website ini.

---

## 🚀 Instalasi (5 Menit)

```bash
# 1. Install Filament
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels

# 2. Jalankan Migration
php artisan migrate

# 3. Buat Admin & Sample Data
php artisan db:seed

# 4. Link Storage
php artisan storage:link

# 5. Jalankan Server
php artisan serve
```

---

## 🔐 Login Admin

**URL**: http://localhost:8000/admin

```
Email    : admin@takaful.com
Password : admin123
```

⚠️ **Ganti password setelah login!**

---

## 📱 Akses Halaman Agen

Format: `http://localhost:8000/agen/{kode_agen}`

**Contoh**:
- http://localhost:8000/agen/TKF001
- http://localhost:8000/agen/TKF002

---

## ➕ Cara Tambah Agen Baru

1. Login ke admin panel
2. Klik **"Agen Takaful"** di sidebar
3. Klik **"Tambah Agen Baru"**
4. Isi form:
   - Nama lengkap
   - Kode agen (contoh: TKF003)
   - Role (contoh: Agen Takaful)
   - Telepon (contoh: 081234567890)
   - Upload foto (opsional)
   - Deskripsi
   - Pencapaian (opsional)
5. Klik **"Simpan"**
6. Klik **"Lihat Halaman"** untuk preview

---

## 📸 Upload Foto Agen

### Via Admin Panel
1. Edit agen
2. Klik area upload foto
3. Pilih foto (max 2MB)
4. Crop jika perlu (rasio 1:1)
5. Simpan

### Tips Foto
- ✅ Ukuran: 500x500px atau lebih
- ✅ Format: JPG, PNG
- ✅ Background: Polos/profesional
- ✅ Pencahayaan: Terang
- ✅ Ekspresi: Ramah & profesional

---

## 🔗 Link WhatsApp Otomatis

Link WhatsApp akan **otomatis ter-generate** dari nomor telepon.

**Format nomor yang benar**:
- ✅ `081234567890` (diawali 0)
- ✅ `+6281234567890` (dengan +62)
- ✅ `6281234567890` (tanpa +)

**Hasil**:
- Link: `https://wa.me/6281234567890`

---

## 🎨 Kustomisasi Warna

Warna brand Takaful sudah diset di `resources/views/agen/show.blade.php`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                takaful: {
                    blue: '#0066CC',   // Biru Takaful
                    green: '#00A651',  // Hijau Takaful
                    light: '#E8F5F1',  // Background Light
                }
            }
        }
    }
}
```

Untuk ganti warna, edit nilai hex di atas.

---

## 📊 Struktur Database

### Table: agens

| Field | Contoh | Wajib? |
|-------|--------|--------|
| nama | Ahmad Fauzi | ✅ Ya |
| kode_agen | TKF001 | ✅ Ya (unique) |
| telepon | 081234567890 | ✅ Ya |
| role | Senior Agen | ❌ Tidak (default: Agen Takaful) |
| foto | agen-photos/xxx.jpg | ❌ Tidak |
| deskripsi | Berpengalaman 5 tahun... | ❌ Tidak |
| pencapaian | Top Performer 2023... | ❌ Tidak |
| wa_link | https://wa.me/628123... | ❌ Tidak (auto) |

---

## 🛠️ Command Berguna

### Clear Cache
```bash
php artisan optimize:clear
```

### Reset Database
```bash
php artisan migrate:fresh --seed
```

### Generate App Key
```bash
php artisan key:generate
```

### Create Storage Link
```bash
php artisan storage:link
```

### Optimize untuk Production
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

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

### Permission denied (storage)
```bash
chmod -R 775 storage bootstrap/cache
```

---

## 📁 File Penting

| File | Fungsi |
|------|--------|
| `app/Models/Agen.php` | Model Agen |
| `app/Filament/Resources/AgenResource.php` | Admin Panel Resource |
| `app/Http/Controllers/AgenController.php` | Controller Frontend |
| `resources/views/agen/show.blade.php` | View Halaman Agen |
| `routes/web.php` | Routes |
| `database/seeders/DatabaseSeeder.php` | Seeder Admin & Sample |

---

## 📖 Dokumentasi Lengkap

- 📄 [README.md](README.md) - Overview project
- 📄 [PANDUAN_INSTALASI.md](PANDUAN_INSTALASI.md) - Panduan instalasi detail
- 📄 [ADMIN_CREDENTIALS.md](ADMIN_CREDENTIALS.md) - Kredensial & keamanan
- 📄 [UI_PREVIEW.md](UI_PREVIEW.md) - Preview desain UI
- 📄 [STRUKTUR_PROJECT.md](STRUKTUR_PROJECT.md) - Struktur file lengkap
- 📄 [CARA_DUPLIKASI.md](CARA_DUPLIKASI.md) - Cara duplikasi untuk 100 agen
- 📄 [CHECKLIST_SEBELUM_PRODUCTION.md](CHECKLIST_SEBELUM_PRODUCTION.md) - Checklist go live

---

## 🎯 Next Steps

Setelah instalasi selesai:

1. ✅ Login ke admin panel
2. ✅ Ganti password admin
3. ✅ Tambah agen baru
4. ✅ Upload foto agen
5. ✅ Test halaman frontend
6. ✅ Test tombol WhatsApp
7. ✅ Siap untuk production!

---

## 📞 Support

Jika ada pertanyaan, hubungi tim development.

---

**Selamat menggunakan! 🎉**
