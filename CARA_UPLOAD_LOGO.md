# 🖼️ CARA UPLOAD LOGO TAKAFUL KELUARGA

## 📁 Lokasi File Logo

Logo harus disimpan di:
```
public/images/takaful-logo.png
```

---

## 📥 CARA UPLOAD LOGO

### Metode 1: Via File Manager (Paling Mudah)

1. Buka folder project Anda
2. Masuk ke folder `public/images/`
3. Copy file logo yang Anda punya
4. Paste dengan nama: `takaful-logo.png`
5. Selesai! Refresh browser

### Metode 2: Via Terminal

```bash
# Dari root project
cp /path/to/logo-anda.png public/images/takaful-logo.png
```

### Metode 3: Via FTP (Jika di Server)

1. Connect ke server via FTP
2. Masuk ke folder `public/images/`
3. Upload file logo
4. Rename menjadi `takaful-logo.png`

---

## 📐 SPESIFIKASI LOGO

### Format File:
- ✅ PNG (dengan background transparan) - RECOMMENDED
- ✅ JPG (jika background putih)
- ✅ SVG (untuk kualitas terbaik)

### Ukuran:
- **Navbar**: Tinggi 40-48px (otomatis resize)
- **Footer**: Tinggi 32-40px (otomatis resize)
- **Recommended**: 200px tinggi, lebar proporsional

### Kualitas:
- Resolusi tinggi (minimal 2x untuk retina display)
- Background transparan (PNG)
- File size < 100KB

---

## 🎨 LOGO SUDAH DIGUNAKAN DI:

1. ✅ **Landing Page** (`resources/views/welcome.blade.php`)
   - Navbar (pojok kiri atas)
   - Footer

2. ✅ **User Dashboard** (`resources/views/layouts/navigation.blade.php`)
   - Navbar (pojok kiri atas)

3. ✅ **Semua halaman yang menggunakan layout app**
   - Profile
   - Dashboard
   - dll

---

## 🔄 JIKA LOGO TIDAK MUNCUL

### 1. Cek file ada atau tidak:
```bash
ls -la public/images/takaful-logo.png
```

### 2. Cek permission:
```bash
chmod 644 public/images/takaful-logo.png
```

### 3. Clear cache browser:
- Tekan `Ctrl + Shift + R` (Windows/Linux)
- Tekan `Cmd + Shift + R` (Mac)

### 4. Clear Laravel cache:
```bash
php artisan cache:clear
php artisan view:clear
```

---

## 📝 CONTOH STRUKTUR FOLDER

```
public/
├── images/
│   ├── takaful-logo.png          ← Logo utama (UPLOAD DI SINI)
│   ├── default-avatar.svg        ← Avatar default
│   └── .gitkeep
├── build/
├── css/
└── js/
```

---

## 🎯 TIPS

1. **Gunakan PNG dengan background transparan** untuk hasil terbaik
2. **Ukuran file jangan terlalu besar** (< 100KB)
3. **Nama file harus persis**: `takaful-logo.png` (huruf kecil semua)
4. **Jika ganti logo**, cukup replace file yang lama
5. **Backup logo** di tempat aman

---

## 🖼️ LOGO YANG ANDA BERIKAN

Logo Takaful Keluarga dengan:
- Kaligrafi biru-hijau di kiri
- Text "takafulkeluarga" (biru & hijau)
- Tagline "Saling Melindungi" di bawah
- Background hitam (akan jadi transparan di PNG)

**Dimensi**: Landscape (lebar > tinggi)
**Warna**: Biru (#0066CC) & Hijau (#00A651)

---

## ✅ CHECKLIST UPLOAD LOGO

- [ ] Download/simpan logo dari desainer
- [ ] Convert ke PNG dengan background transparan (jika perlu)
- [ ] Resize jika terlalu besar (tinggi 200px recommended)
- [ ] Upload ke `public/images/takaful-logo.png`
- [ ] Refresh browser
- [ ] Cek di landing page
- [ ] Cek di dashboard
- [ ] Cek di mobile view

---

## 🆘 BUTUH BANTUAN?

Jika logo tidak muncul atau ada masalah:

1. Cek console browser (F12) untuk error
2. Cek file path: `http://localhost:8000/images/takaful-logo.png`
3. Pastikan nama file benar: `takaful-logo.png`
4. Pastikan di folder `public/images/`

---

**Setelah upload logo, website akan terlihat lebih profesional! 🎨**
