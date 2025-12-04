# 🎨 CARA GANTI DENGAN LOGO ASLI

## 📋 Yang Sudah Saya Lakukan:

1. ✅ Buat logo placeholder SVG di `public/images/takaful-logo.svg`
2. ✅ Update semua file untuk menggunakan logo:
   - Landing page (navbar & footer)
   - User dashboard (navbar)
   - Semua halaman dengan layout app

---

## 🖼️ CARA GANTI DENGAN LOGO ASLI ANDA:

### Opsi 1: Gunakan PNG (Recommended)

1. **Simpan logo Anda** dari gambar yang diberikan
2. **Convert ke PNG** dengan background transparan:
   - Buka di Photoshop/GIMP
   - Hapus background hitam
   - Export sebagai PNG
3. **Upload ke**: `public/images/takaful-logo.png`
4. **Update file** (ganti `.svg` jadi `.png`):

```bash
# Otomatis ganti semua
sed -i 's/takaful-logo.svg/takaful-logo.png/g' resources/views/welcome.blade.php
sed -i 's/takaful-logo.svg/takaful-logo.png/g' resources/views/layouts/navigation.blade.php
```

### Opsi 2: Gunakan SVG (Kualitas Terbaik)

1. **Convert logo ke SVG**:
   - Gunakan tool online: https://convertio.co/png-svg/
   - Atau Adobe Illustrator
2. **Replace file**: `public/images/takaful-logo.svg`
3. **Selesai!** (sudah otomatis terpakai)

### Opsi 3: Gunakan Logo Asli Langsung

Jika Anda punya file logo asli (PNG/SVG):

```bash
# Copy logo Anda
cp /path/to/logo-takaful-keluarga.png public/images/takaful-logo.png

# Atau untuk SVG
cp /path/to/logo-takaful-keluarga.svg public/images/takaful-logo.svg
```

---

## 📐 SPESIFIKASI LOGO DARI GAMBAR ANDA:

Dari gambar yang Anda berikan:

- **Dimensi**: Landscape (sekitar 1024x300px)
- **Warna**: 
  - Biru: #0066CC (untuk "takaful" dan tagline)
  - Hijau: #00A651 (untuk "keluarga")
- **Elemen**:
  - Kaligrafi biru-hijau di kiri
  - Text "takafulkeluarga" (biru & hijau)
  - Tagline "Saling Melindungi" di bawah
- **Background**: Hitam (harus dihapus untuk web)

---

## 🎯 LANGKAH DETAIL UNTUK LOGO PNG:

### 1. Buka Logo di Editor

Gunakan:
- Photoshop
- GIMP (gratis)
- Photopea (online, gratis)

### 2. Hapus Background Hitam

```
1. Select → Color Range → Pilih hitam
2. Delete
3. Atau gunakan Magic Wand Tool
```

### 3. Crop & Resize

```
- Crop area yang tidak perlu
- Resize tinggi menjadi 200-300px
- Lebar otomatis proporsional
```

### 4. Export

```
File → Export → PNG
- Transparency: ON
- Quality: High
- Size: < 100KB
```

### 5. Upload

```bash
# Via terminal
cp logo-takaful.png public/images/takaful-logo.png

# Atau drag & drop ke folder public/images/
```

---

## 🔧 JIKA INGIN EDIT UKURAN LOGO DI WEBSITE:

### Navbar (Landing Page):
```html
<!-- File: resources/views/welcome.blade.php -->
<img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-12">
                                                                          ↑
                                                                    Ganti h-12 ke h-10, h-14, dll
```

### Navbar (Dashboard):
```html
<!-- File: resources/views/layouts/navigation.blade.php -->
<img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-10">
                                                                          ↑
                                                                    Ganti h-10 ke h-8, h-12, dll
```

### Footer:
```html
<!-- File: resources/views/welcome.blade.php -->
<img src="{{ asset('images/takaful-logo.svg') }}" alt="Takaful Keluarga" class="h-10">
```

**Ukuran Tailwind**:
- `h-8` = 32px
- `h-10` = 40px
- `h-12` = 48px
- `h-14` = 56px
- `h-16` = 64px

---

## ✅ CHECKLIST:

- [ ] Download/simpan logo dari gambar yang diberikan
- [ ] Hapus background hitam (jika PNG)
- [ ] Resize ke ukuran yang sesuai (tinggi 200-300px)
- [ ] Export sebagai PNG (transparan) atau SVG
- [ ] Upload ke `public/images/takaful-logo.png` atau `.svg`
- [ ] Refresh browser (Ctrl+Shift+R)
- [ ] Cek di landing page
- [ ] Cek di dashboard
- [ ] Cek di mobile view
- [ ] Adjust ukuran jika perlu (edit class `h-10`, `h-12`, dll)

---

## 🎨 SEMENTARA:

Saya sudah buat logo placeholder SVG yang mirip dengan logo Anda:
- Kaligrafi biru-hijau
- Text "takafulkeluarga"
- Tagline "Saling Melindungi"

**Tapi untuk hasil terbaik, ganti dengan logo asli Anda!**

---

## 🆘 BUTUH BANTUAN?

Jika kesulitan convert logo:

1. **Kirim file logo asli** (PNG/JPG/SVG)
2. Saya bisa bantu convert & optimize
3. Atau gunakan tool online:
   - Remove background: https://remove.bg
   - Convert to SVG: https://convertio.co
   - Resize: https://imageresizer.com

---

**Logo yang bagus akan membuat website terlihat lebih profesional! 🎨**
