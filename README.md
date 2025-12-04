# 🛡️ Website Agen Asuransi Takaful

Website landing page personal untuk agen asuransi syariah Takaful yang digunakan untuk meningkatkan nilai jual agen, memperkuat personal branding, dan memudahkan komunikasi dengan calon nasabah.

---

## 🎯 Tujuan Project

Website ini adalah **landing page personal** untuk agen asuransi syariah Takaful yang digunakan untuk:
- ✅ Meningkatkan nilai jual agen
- ✅ Memperkuat personal branding
- ✅ Memudahkan komunikasi dengan calon nasabah

Website dibuat **1 PROTOTIPE** terlebih dahulu, nanti akan diduplikasi untuk **100 agen**.

---

## ✨ Fitur Utama

### 1. Landing Page Agen (Frontend)
Setiap agen memiliki halaman: `/agen/{kode_agen}`

Menampilkan:
- ✅ Foto agen
- ✅ Nama lengkap
- ✅ Kode agen
- ✅ Role / posisi
- ✅ Deskripsi singkat
- ✅ Pencapaian / pengalaman (opsional)
- ✅ Tombol WhatsApp Chat (langsung ke nomor agen)
- ✅ Warna UI biru–hijau seperti brand Takaful
- ✅ Responsif & modern
- ✅ Link produk diarahkan ke website resmi Takaful

### 2. Admin Panel (Backend)
Menggunakan **Filament 3.2**

Admin dapat:
- ✅ Tambah agen
- ✅ Edit agen
- ✅ Hapus agen
- ✅ Upload foto
- ✅ Generate otomatis link WA
- ✅ Semua data tersimpan di database

**Penting**: Agen tidak boleh login & tidak boleh edit sendiri.

### 3. Konten Dikelola Tim Admin
- ✅ Hanya admin panel yang boleh input profil agen
- ✅ Standar bahasa mengikuti perusahaan
- ✅ Tidak ada fitur edit mandiri oleh agen

---

## 🎨 Desain UI

### Warna Brand Takaful
- **Biru Takaful**: `#0066CC`
- **Hijau Takaful**: `#00A651`
- **Light Background**: `#E8F5F1`

### Fitur Desain
- ✅ Typography modern
- ✅ Responsif HP & Laptop
- ✅ Tampilan profesional & clean
- ✅ Komponen UI simple: card, avatar, tombol WA, section profile
- ✅ Menggunakan Tailwind CSS
- ✅ Hero section minimalis

---

## 🚀 Quick Start

### 1. Install Filament
```bash
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
```

### 2. Jalankan Migration
```bash
php artisan migrate
```

### 3. Jalankan Seeder
```bash
php artisan db:seed
```

Ini akan membuat:
- Admin user (email: `admin@takaful.com`, password: `admin123`)
- 2 sample agen untuk testing

### 4. Buat Storage Link
```bash
php artisan storage:link
```

### 5. Jalankan Server
```bash
php artisan serve
```

---

## 🔐 Login Admin

**URL**: `http://localhost:8000/admin`

**Kredensial Default**:
- Email: `admin@takaful.com`
- Password: `admin123`

⚠️ **PENTING**: Ganti password setelah login pertama kali!

---

## 📱 Akses Halaman Agen

Format URL: `http://localhost:8000/agen/{kode_agen}`

**Contoh**:
- `http://localhost:8000/agen/TKF001`
- `http://localhost:8000/agen/TKF002`

---

## 📂 Struktur Database

### Table: agens
| Field | Type | Keterangan |
|-------|------|------------|
| id | bigint | Primary key |
| nama | string | Nama lengkap agen |
| kode_agen | string | Kode unik agen (unique) |
| telepon | string | Nomor telepon |
| wa_link | string | Link WhatsApp (auto-generate) |
| foto | string | Path foto profil |
| deskripsi | text | Deskripsi singkat |
| role | string | Role/posisi |
| pencapaian | text | Pencapaian/pengalaman (opsional) |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12
- **Admin Panel**: Filament 3.2
- **Frontend**: Blade + Tailwind CSS
- **Database**: MySQL
- **Icons**: Font Awesome 6

---

## 📖 Dokumentasi Lengkap

- 📄 [PANDUAN_INSTALASI.md](PANDUAN_INSTALASI.md) - Panduan instalasi lengkap
- 📄 [ADMIN_CREDENTIALS.md](ADMIN_CREDENTIALS.md) - Kredensial admin & keamanan
- 📄 [UI_PREVIEW.md](UI_PREVIEW.md) - Preview desain UI
- 📄 [STRUKTUR_PROJECT.md](STRUKTUR_PROJECT.md) - Struktur file lengkap
- 📄 [INSTALL_FILAMENT.md](INSTALL_FILAMENT.md) - Command install Filament

---

## 🔒 Keamanan

- ✅ Hanya admin yang bisa login ke panel
- ✅ Agen TIDAK bisa login
- ✅ Agen TIDAK bisa edit profil sendiri
- ✅ Semua data dikelola oleh tim admin
- ⚠️ Ganti password default sebelum production!

---

## 🎯 Fitur Admin Panel

### Form Input Agen
- Nama lengkap
- Kode agen (unique, validation)
- Role/posisi
- Nomor telepon (auto-generate WA link)
- Upload foto (dengan image editor, rasio 1:1)
- Deskripsi singkat
- Pencapaian/pengalaman

### Table List Agen
- Foto circular
- Nama
- Kode agen (badge hijau)
- Role
- Telepon
- Tanggal dibuat

### Actions
- 👁️ Lihat Halaman (preview frontend)
- ✏️ Edit
- 🗑️ Delete

---

## 📱 Preview UI Frontend

### Hero Section
- Background gradient biru → hijau
- Card putih dengan shadow modern
- Header gradient di atas card

### Foto Profil
- Circular avatar 160x160px
- Border putih 8px
- Badge icon shield (simbol proteksi)
- Default avatar jika belum upload

### Informasi Agen
- Nama lengkap (heading besar)
- Role/posisi
- Kode agen dengan badge hijau

### Section Deskripsi
- Background abu-abu lembut
- Icon user circle
- Typography yang mudah dibaca

### Section Pencapaian
- Background gradient light
- Border hijau di kiri
- Icon trophy

### Kontak Info
- 2 kolom cards (responsive)
- Icon telepon & WhatsApp
- Background abu-abu dengan rounded

### Tombol WhatsApp
- Gradient hijau
- Icon WhatsApp
- Hover effect (scale & shadow)
- Text ajakan konsultasi gratis

### Link Website Resmi
- Link ke takaful.co.id
- Hover effect smooth

---

## 🔄 Duplikasi untuk 100 Agen

Setelah prototipe selesai, untuk duplikasi:

1. Export database dari prototipe
2. Clone project untuk setiap agen
3. Import data agen yang sesuai
4. Update .env untuk setiap instance
5. Deploy ke hosting masing-masing

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

---

## 📝 License

Proprietary - Takaful Indonesia

---

**Dibuat dengan ❤️ untuk Agen Takaful Indonesia** 🛡️
