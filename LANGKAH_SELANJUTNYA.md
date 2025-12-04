# 🎯 LANGKAH SELANJUTNYA

Panduan apa yang harus dilakukan setelah semua file dibuat.

---

## ✅ Yang Sudah Selesai

### Backend
- ✅ Migration (agens & users)
- ✅ Model (Agen & User)
- ✅ Controller (AgenController)
- ✅ Filament Resource (AgenResource + Pages)
- ✅ Seeder (Admin + Sample Agen)
- ✅ Routes (web.php)

### Frontend
- ✅ View (show.blade.php)
- ✅ Default Avatar (SVG)
- ✅ Tailwind CSS (via CDN)
- ✅ Font Awesome (via CDN)

### Dokumentasi
- ✅ 12 file dokumentasi lengkap
- ✅ README.md
- ✅ Quick Start Guide
- ✅ Panduan Instalasi
- ✅ UI Preview
- ✅ Diagram Alur
- ✅ Dan lainnya...

---

## 🚀 LANGKAH 1: Install Filament (WAJIB!)

**PENTING**: Filament belum terinstall, harus install dulu!

```bash
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
```

Tunggu sampai selesai (sekitar 2-3 menit).

---

## 🗄️ LANGKAH 2: Setup Database

### Pastikan Database Sudah Dibuat

Cek file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_takaful
DB_USERNAME=root
DB_PASSWORD=
```

### Buat Database (jika belum)

**Via MySQL Command**:
```bash
mysql -u root -p
CREATE DATABASE web_takaful;
EXIT;
```

**Via phpMyAdmin**:
1. Buka phpMyAdmin
2. Klik "New" di sidebar
3. Nama database: `web_takaful`
4. Collation: `utf8mb4_unicode_ci`
5. Klik "Create"

---

## 📊 LANGKAH 3: Jalankan Migration

```bash
php artisan migrate
```

Ini akan membuat table:
- `users` - Untuk admin
- `agens` - Untuk data agen
- `sessions` - Untuk session management
- `password_reset_tokens` - Untuk reset password

---

## 🌱 LANGKAH 4: Jalankan Seeder

```bash
php artisan db:seed
```

Ini akan membuat:
- **1 Admin User**
  - Email: `admin@takaful.com`
  - Password: `admin123`
  
- **2 Sample Agen**
  - TKF001 (Ahmad Fauzi)
  - TKF002 (Siti Nurhaliza)

---

## 🔗 LANGKAH 5: Buat Storage Link

```bash
php artisan storage:link
```

Ini untuk upload foto agen.

---

## 🖼️ LANGKAH 6: Upload Default Avatar

Saat ini sudah ada `default-avatar.svg` di `public/images/`.

**Opsional**: Ganti dengan foto default yang lebih bagus.

Download avatar default dari:
- https://ui-avatars.com/api/?name=Agen+Takaful&size=500&background=00A651&color=fff
- Atau buat sendiri

Simpan sebagai `public/images/default-avatar.png`

---

## 🚀 LANGKAH 7: Jalankan Server

```bash
php artisan serve
```

Server akan jalan di: `http://localhost:8000`

---

## 🔐 LANGKAH 8: Test Login Admin

1. Buka browser: `http://localhost:8000/admin`
2. Login dengan:
   - Email: `admin@takaful.com`
   - Password: `admin123`
3. Jika berhasil, akan masuk ke dashboard Filament

---

## ✏️ LANGKAH 9: Test Tambah Agen

1. Di admin panel, klik **"Agen Takaful"** di sidebar
2. Klik **"Tambah Agen Baru"**
3. Isi form:
   - Nama: `Budi Santoso`
   - Kode: `TKF003`
   - Role: `Agen Takaful`
   - Telepon: `081234567890`
   - Deskripsi: `Agen berpengalaman...`
4. Upload foto (opsional)
5. Klik **"Simpan"**
6. Klik **"Lihat Halaman"** untuk preview

---

## 📱 LANGKAH 10: Test Halaman Agen

Buka di browser:
- `http://localhost:8000/agen/TKF001`
- `http://localhost:8000/agen/TKF002`
- `http://localhost:8000/agen/TKF003`

Pastikan:
- ✅ Foto muncul (atau default avatar)
- ✅ Nama, kode, role tampil
- ✅ Deskripsi tampil
- ✅ Tombol WhatsApp ada
- ✅ Responsive di mobile

---

## 💬 LANGKAH 11: Test Tombol WhatsApp

1. Klik tombol **"Chat via WhatsApp"**
2. Akan redirect ke `https://wa.me/628123456789`
3. Jika ada WhatsApp, akan buka chat
4. Jika tidak ada, akan minta install WhatsApp

---

## 🔒 LANGKAH 12: Ganti Password Admin

**PENTING**: Ganti password default!

1. Login ke admin panel
2. Klik avatar di pojok kanan atas
3. Pilih **"Edit Profile"** atau **"Account"**
4. Ganti password
5. Logout dan login ulang

---

## 📸 LANGKAH 13: Upload Foto Agen

### Untuk Sample Agen

1. Edit agen TKF001 atau TKF002
2. Upload foto profil
3. Crop jika perlu (rasio 1:1)
4. Simpan
5. Lihat halaman untuk cek

### Tips Foto
- Ukuran: 500x500px atau lebih
- Format: JPG atau PNG
- Background: Polos/profesional
- Pencahayaan: Terang
- Ekspresi: Ramah & profesional

---

## 🎨 LANGKAH 14: Kustomisasi (Opsional)

### Ganti Warna Brand

Edit `resources/views/agen/show.blade.php`:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                takaful: {
                    blue: '#0066CC',   // Ganti warna biru
                    green: '#00A651',  // Ganti warna hijau
                    light: '#E8F5F1',  // Ganti warna light
                }
            }
        }
    }
}
```

### Ganti Logo/Icon

Edit badge icon di `show.blade.php`:

```html
<!-- Ganti icon shield dengan icon lain -->
<i class="fas fa-shield-halved text-xl"></i>
```

Lihat icon lain di: https://fontawesome.com/icons

---

## 📊 LANGKAH 15: Import Data Agen (Jika Ada)

Jika sudah punya data 100 agen, import dengan cara:

### Via Seeder

Edit `database/seeders/DatabaseSeeder.php`:

```php
$agens = [
    ['nama' => 'Agen 1', 'kode_agen' => 'TKF001', ...],
    ['nama' => 'Agen 2', 'kode_agen' => 'TKF002', ...],
    // ... 98 agen lainnya
];

foreach ($agens as $data) {
    Agen::create($data);
}
```

Jalankan:
```bash
php artisan db:seed
```

### Via CSV

Lihat panduan di [CARA_DUPLIKASI.md](CARA_DUPLIKASI.md)

---

## 🧪 LANGKAH 16: Testing Lengkap

### Test di Browser
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

### Test di Device
- [ ] Desktop
- [ ] Tablet
- [ ] Mobile (Android)
- [ ] Mobile (iOS)

### Test Fitur
- [ ] Login admin
- [ ] Tambah agen
- [ ] Edit agen
- [ ] Hapus agen
- [ ] Upload foto
- [ ] Lihat halaman agen
- [ ] Klik tombol WhatsApp
- [ ] Responsive

---

## 📝 LANGKAH 17: Dokumentasi Internal

Buat dokumentasi untuk tim:

1. **Cara Login Admin**
   - URL, email, password
   
2. **Cara Tambah Agen**
   - Step-by-step dengan screenshot
   
3. **Cara Upload Foto**
   - Tips foto yang bagus
   
4. **Cara Share Link**
   - Format URL
   - Cara copy link

---

## 🚀 LANGKAH 18: Persiapan Production

Sebelum deploy ke production, baca:
- [CHECKLIST_SEBELUM_PRODUCTION.md](CHECKLIST_SEBELUM_PRODUCTION.md)

Checklist singkat:
- [ ] Ganti password admin
- [ ] Setup hosting
- [ ] Setup domain
- [ ] Install SSL
- [ ] Setup backup
- [ ] Test semua fitur
- [ ] Training admin

---

## 🔄 LANGKAH 19: Duplikasi (Jika Perlu)

Jika ingin duplikasi untuk 100 agen, baca:
- [CARA_DUPLIKASI.md](CARA_DUPLIKASI.md)

Pilih metode:
1. **Multi-Instance** - Setiap agen punya website sendiri
2. **Multi-Tenancy** - Satu website untuk semua agen (RECOMMENDED)

---

## 📞 LANGKAH 20: Support & Maintenance

### Setup Monitoring
- Uptime monitoring (UptimeRobot)
- Error logging (Sentry)
- Performance monitoring (New Relic)

### Setup Backup
- Database backup (daily)
- File backup (weekly)
- Backup retention (30 hari)

### Training
- Training admin cara pakai
- Training agen cara share link
- Dokumentasi troubleshooting

---

## ✅ Checklist Lengkap

Copy checklist ini dan centang satu per satu:

```
INSTALASI
[ ] Install Filament
[ ] Buat database
[ ] Jalankan migration
[ ] Jalankan seeder
[ ] Buat storage link
[ ] Upload default avatar
[ ] Jalankan server

TESTING
[ ] Login admin berhasil
[ ] Tambah agen berhasil
[ ] Edit agen berhasil
[ ] Hapus agen berhasil
[ ] Upload foto berhasil
[ ] Halaman agen tampil
[ ] Tombol WhatsApp berfungsi
[ ] Responsive di mobile

KEAMANAN
[ ] Ganti password admin
[ ] Setup .env production
[ ] Setup SSL (production)
[ ] Setup backup

DOKUMENTASI
[ ] Baca README.md
[ ] Baca QUICK_START.md
[ ] Baca dokumentasi lain
[ ] Buat dokumentasi internal

PRODUCTION (Jika Siap)
[ ] Baca CHECKLIST_SEBELUM_PRODUCTION.md
[ ] Setup hosting
[ ] Setup domain
[ ] Deploy code
[ ] Import data agen
[ ] Upload foto agen
[ ] Test production
[ ] Go live!
```

---

## 🎉 Selesai!

Jika semua langkah sudah dilakukan, project siap digunakan!

### Next Steps:
1. ✅ Gunakan untuk prototipe
2. ✅ Collect feedback dari tim
3. ✅ Improve berdasarkan feedback
4. ✅ Siap untuk production
5. ✅ Duplikasi untuk 100 agen

---

## 🆘 Butuh Bantuan?

Jika ada masalah:

1. Cek [QUICK_START.md](QUICK_START.md) - Troubleshooting
2. Cek [PANDUAN_INSTALASI.md](PANDUAN_INSTALASI.md) - Detail instalasi
3. Cek error log: `storage/logs/laravel.log`
4. Hubungi tim development

---

## 📚 Dokumentasi Lengkap

Lihat [INDEX_DOKUMENTASI.md](INDEX_DOKUMENTASI.md) untuk navigasi semua dokumentasi.

---

**Selamat bekerja! 🚀**

*Semoga project ini sukses dan membantu 100 agen Takaful!* 🛡️
