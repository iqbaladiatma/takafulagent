# 🧪 Testing Fitur Admin Kelola Agen

## ✅ Checklist Testing

### 1. Test Akses Admin Panel

**Login sebagai Admin:**
```bash
# Pastikan ada user dengan role 'admin' di database
# Email: admin@example.com (sesuai ADMIN_CREDENTIALS.md)
```

**Test:**
- [ ] Login sebagai admin
- [ ] Lihat tombol "Panel Admin" di navigation bar
- [ ] Klik tombol "Panel Admin" → redirect ke `/admin`
- [ ] Lihat menu "Agen Takaful" di sidebar Filament
- [ ] Badge "ADMIN" muncul di welcome card dashboard
- [ ] Badge "ADMINISTRATOR" muncul di dropdown profile

**Login sebagai User Biasa:**
```bash
# Login dengan user role 'user'
```

**Test:**
- [ ] Tombol "Panel Admin" TIDAK muncul
- [ ] Akses langsung ke `/admin` → error 403 (Forbidden)
- [ ] Badge admin TIDAK muncul

---

### 2. Test CRUD Agen (Admin Only)

**Tambah Agen Baru:**
- [ ] Klik "Panel Admin" → "Agen Takaful" → "Create"
- [ ] Isi form:
  - Nama: "Ahmad Hidayat"
  - Kode Agen: "TKF001"
  - Role: "Senior Agen Takaful"
  - Telepon: "081234567890"
  - Upload foto (optional)
  - Deskripsi: "Agen berpengalaman 10 tahun"
  - Pencapaian: "Top Performer 2023"
- [ ] Klik "Create"
- [ ] Agen berhasil ditambahkan
- [ ] WA Link otomatis terisi: `https://wa.me/6281234567890`

**Edit Agen:**
- [ ] Klik icon edit pada agen
- [ ] Ubah data (misal: nama atau deskripsi)
- [ ] Klik "Save"
- [ ] Data berhasil diupdate

**Hapus Agen:**
- [ ] Klik icon delete pada agen
- [ ] Konfirmasi hapus
- [ ] Agen berhasil dihapus

**Validasi:**
- [ ] Kode agen harus unik (tidak boleh duplikat)
- [ ] Nama dan telepon wajib diisi
- [ ] Foto max 2MB

---

### 3. Test Dashboard User (Semua User)

**Tampilan Agen:**
- [ ] Login sebagai user biasa atau admin
- [ ] Dashboard menampilkan semua agen dalam grid
- [ ] Card agen tampil rapih dengan:
  - Gradient header (blue to green)
  - Avatar/foto agen
  - Nama agen
  - Role/posisi
  - Badge kode agen
  - Deskripsi (max 3 baris)
  - Nomor telepon
  - Tombol "Profil" dan "Chat"
- [ ] Hover card → shadow dan sedikit naik

**Responsive:**
- [ ] Mobile (< 640px): 1 kolom
- [ ] Tablet (640px - 1024px): 2 kolom
- [ ] Desktop (1024px - 1280px): 3 kolom
- [ ] Large Desktop (> 1280px): 4 kolom

---

### 4. Test Fitur Pencarian

**Search Agen:**
- [ ] Ketik nama agen di search box → klik "Cari"
- [ ] Hasil pencarian muncul
- [ ] Info "Menampilkan hasil pencarian untuk: ..." muncul
- [ ] Klik tombol "X" → kembali ke semua agen

**Search by:**
- [ ] Nama agen
- [ ] Kode agen
- [ ] Role
- [ ] Deskripsi

**Pagination:**
- [ ] Jika agen > 12, pagination muncul
- [ ] Klik halaman 2 → data berubah
- [ ] Search + pagination → query string tetap aktif

---

### 5. Test Tombol Action

**Tombol "Profil":**
- [ ] Klik tombol "Profil" pada card agen
- [ ] Redirect ke `/agen/{kode_agen}`
- [ ] Halaman profil agen muncul

**Tombol "Chat":**
- [ ] Klik tombol "Chat" pada card agen
- [ ] Buka WhatsApp Web/App
- [ ] Nomor tujuan sesuai dengan nomor agen
- [ ] Format: `https://wa.me/62xxx`

---

### 6. Test Default Avatar

**Jika Foto Tidak Ada:**
- [ ] Tambah agen tanpa upload foto
- [ ] Avatar default muncul (UI Avatars dengan initial nama)
- [ ] Format: `https://ui-avatars.com/api/?name=...`

**Jika Foto Error:**
- [ ] Foto rusak/tidak ditemukan
- [ ] Fallback ke UI Avatars

---

### 7. Test Stats Dashboard

**Stats Card:**
- [ ] Total Agen → sesuai jumlah agen di database
- [ ] Asuransi Syariah → 100%
- [ ] Terpercaya → 15+ Tahun

---

## 🐛 Bug Testing

**Test Edge Cases:**
- [ ] Nama agen sangat panjang → line clamp bekerja
- [ ] Deskripsi sangat panjang → line clamp 3 baris
- [ ] Kode agen duplikat → error validasi
- [ ] Upload foto > 2MB → error validasi
- [ ] Nomor telepon invalid → tetap bisa simpan (optional validation)
- [ ] Search dengan keyword tidak ada → "Belum ada agen tersedia"

---

## 📊 Performance Testing

**Load Testing:**
- [ ] Tambah 50+ agen
- [ ] Dashboard load cepat (< 2 detik)
- [ ] Pagination bekerja dengan baik
- [ ] Search tetap cepat

---

## ✅ Final Checklist

- [ ] Semua fitur admin berfungsi
- [ ] Hanya admin yang bisa akses panel
- [ ] Dashboard user menampilkan semua agen
- [ ] Search berfungsi dengan baik
- [ ] UI responsive di semua device
- [ ] Tombol action berfungsi
- [ ] Default avatar bekerja
- [ ] Validasi form bekerja
- [ ] No error di console browser
- [ ] No error di Laravel log

---

## 🚀 Command Testing

```bash
# Clear cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Check routes
php artisan route:list --path=admin

# Check migrations
php artisan migrate:status

# Create test data (optional)
php artisan tinker
>>> App\Models\Agen::factory()->count(20)->create()
```

---

## 📝 Notes

- Pastikan storage link sudah dibuat: `php artisan storage:link`
- Pastikan folder `storage/app/public/agen-photos` writable
- Pastikan FontAwesome loaded untuk icons
- Pastikan Tailwind CSS compiled
