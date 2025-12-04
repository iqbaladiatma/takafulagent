# 🔐 KREDENSIAL ADMIN

## Login Admin Panel

**URL Admin**: `http://localhost:8000/admin`

### Akun Admin Default

```
Email    : admin@takaful.com
Password : admin123
```

---

## ⚠️ PENTING - Keamanan

Setelah instalasi, **WAJIB** ganti password admin:

1. Login ke admin panel
2. Klik profil di pojok kanan atas
3. Pilih "Edit Profile"
4. Ganti password
5. Logout dan login ulang

---

## 👥 Sample Agen (untuk Testing)

Setelah run `php artisan db:seed`, akan ada 2 agen sample:

### Agen 1
- **Nama**: Ahmad Fauzi
- **Kode**: TKF001
- **URL**: `http://localhost:8000/agen/TKF001`

### Agen 2
- **Nama**: Siti Nurhaliza
- **Kode**: TKF002
- **URL**: `http://localhost:8000/agen/TKF002`

---

## 🔒 Catatan Keamanan

- ✅ Hanya admin yang bisa login
- ✅ Agen TIDAK memiliki akses login
- ✅ Agen TIDAK bisa edit profil sendiri
- ✅ Semua perubahan data hanya melalui admin panel
- ✅ Ganti password default sebelum production!

---

## 📝 Cara Menambah Admin Baru

Jika ingin menambah admin lain, gunakan tinker:

```bash
php artisan tinker
```

Lalu jalankan:

```php
\App\Models\User::create([
    'name' => 'Nama Admin Baru',
    'email' => 'email@example.com',
    'password' => bcrypt('password123')
]);
```

---

**JANGAN LUPA GANTI PASSWORD! 🔐**
