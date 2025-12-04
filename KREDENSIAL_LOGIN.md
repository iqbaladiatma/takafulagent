# 🔐 KREDENSIAL LOGIN

## 👨‍💼 ADMIN

**URL**: http://localhost:8000/admin

```
Email    : admin@takaful.com
Password : admin123
```

**Akses**:
- ✅ Filament Admin Panel
- ✅ CRUD Agen (Create, Read, Update, Delete)
- ✅ Upload foto agen
- ✅ Lihat halaman agen
- ❌ Tidak bisa akses dashboard user

---

## 👤 USER

**URL**: http://localhost:8000/dashboard

```
Email    : user@takaful.com
Password : user123
```

**Akses**:
- ✅ Dashboard user
- ✅ Lihat daftar semua agen
- ✅ Lihat profil agen
- ✅ Chat WhatsApp dengan agen
- ❌ Tidak bisa akses admin panel
- ❌ Tidak bisa edit/hapus agen

---

## 🌐 URL PENTING

| Halaman | URL | Akses |
|---------|-----|-------|
| **Landing Page** | http://localhost:8000 | Public |
| **Login** | http://localhost:8000/login | Public |
| **Register** | http://localhost:8000/register | Public |
| **Dashboard User** | http://localhost:8000/dashboard | User only |
| **Admin Panel** | http://localhost:8000/admin | Admin only |
| **Profil Agen** | http://localhost:8000/agen/{kode} | Public |

---

## 🔄 ALUR LOGIN

### Admin Login:
```
1. Buka http://localhost:8000/login
2. Email: admin@takaful.com
3. Password: admin123
4. Klik "Log in"
5. Otomatis redirect ke → /admin (Filament Panel)
```

### User Login:
```
1. Buka http://localhost:8000/login
2. Email: user@takaful.com
3. Password: user123
4. Klik "Log in"
5. Otomatis redirect ke → /dashboard (User Dashboard)
```

---

## 📊 PERBEDAAN ADMIN & USER

| Fitur | Admin | User |
|-------|-------|------|
| **Login** | ✅ | ✅ |
| **Lihat Landing Page** | ✅ | ✅ |
| **Lihat Profil Agen** | ✅ | ✅ |
| **Dashboard User** | ❌ | ✅ |
| **Admin Panel** | ✅ | ❌ |
| **Tambah Agen** | ✅ | ❌ |
| **Edit Agen** | ✅ | ❌ |
| **Hapus Agen** | ✅ | ❌ |
| **Upload Foto** | ✅ | ❌ |

---

## 🎯 FITUR YANG SUDAH DIBUAT

### ✅ Landing Page (Public)
- Hero section dengan gradient biru-hijau
- Stats (total agen, nasabah, tahun)
- Featured agen (6 agen terbaru)
- Section "Mengapa Takaful?"
- Footer lengkap
- Navbar dengan login/register

### ✅ Auth System (Laravel Breeze)
- Login page
- Register page
- Forgot password
- Email verification
- Profile management

### ✅ User Dashboard
- Welcome card dengan nama user
- Stats cards (total agen, dll)
- Grid daftar semua agen
- Pagination
- Button "Lihat Profil" & "Chat WA"

### ✅ Admin Panel (Filament)
- Dashboard admin
- CRUD agen lengkap
- Upload foto dengan editor
- Auto-generate WA link
- Table dengan search & filter

---

## 🚀 CARA MENGGUNAKAN

### Sebagai Admin:
1. Login dengan kredensial admin
2. Masuk ke Filament Admin Panel
3. Klik "Agen Takaful" di sidebar
4. Kelola agen (tambah/edit/hapus)
5. Upload foto agen
6. Klik "Lihat Halaman" untuk preview

### Sebagai User:
1. Login dengan kredensial user (atau register baru)
2. Masuk ke Dashboard
3. Lihat daftar semua agen
4. Klik "Lihat Profil" untuk detail agen
5. Klik "Chat" untuk WhatsApp dengan agen

### Sebagai Public (Tanpa Login):
1. Buka landing page
2. Lihat featured agen (6 agen)
3. Klik "Lihat Profil" untuk detail
4. Klik "Daftar" untuk register
5. Setelah login, bisa lihat semua agen

---

## ⚠️ PENTING!

1. **Ganti Password**: Ganti password admin & user sebelum production!
2. **Role System**: Admin dan User dipisah berdasarkan field `role` di database
3. **Redirect Otomatis**: Setelah login, otomatis redirect sesuai role
4. **Public Access**: Halaman profil agen bisa diakses tanpa login

---

## 🔒 KEAMANAN

- ✅ Password di-hash dengan bcrypt
- ✅ CSRF protection aktif
- ✅ Session management
- ✅ Email verification (opsional)
- ✅ Role-based access control
- ✅ Middleware auth untuk dashboard
- ✅ Filament panel hanya untuk admin

---

## 📝 CATATAN

- Admin tidak bisa akses dashboard user
- User tidak bisa akses admin panel
- Halaman profil agen bisa diakses semua orang (public)
- Landing page bisa diakses semua orang (public)
- Register akan membuat user dengan role "user" (bukan admin)

---

**Selamat menggunakan! 🎉**
