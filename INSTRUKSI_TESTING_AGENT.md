# Instruksi Testing Agent Panel

## Langkah-langkah Testing

### 1. Login sebagai Agent
- **URL Login**: `http://takafulagent.test/login` (login biasa Laravel)
- **Email**: `agent@takaful.com`
- **Password**: `password`

### 2. Akses Agent Panel
Setelah login, ada 2 cara akses agent panel:

#### Cara 1: Via Navigation (Recommended)
- Lihat navigation bar di atas
- Klik tombol **"Panel Agen"** (warna orange/merah)
- Akan redirect ke `/agent`

#### Cara 2: Direct URL
- Langsung akses: `http://takafulagent.test/agent`

### 3. Yang Harus Terlihat di Agent Panel
- Dashboard dengan judul "Dashboard Agen"
- Menu sidebar:
  - Dashboard
  - Produk Saya (di grup "Kelola Data")
  - Profil Saya (di grup "Kelola Data")

### 4. Test Fitur
1. **Dashboard**: Harus muncul welcome message
2. **Produk Saya**: Harus menampilkan 3 produk demo
3. **Profil Saya**: Harus menampilkan data agen, beberapa field disabled

## Troubleshooting

### Jika tidak muncul tombol "Panel Agen":
1. Pastikan login sebagai `agent@takaful.com`
2. Check role user: harus 'agent'
3. Refresh halaman

### Jika error saat akses `/agent`:
1. Clear cache: `php artisan config:clear`
2. Clear route: `php artisan route:clear`
3. Check log error

### Jika halaman kosong:
- Kemungkinan ada error di widget atau dashboard
- Check browser console untuk error JavaScript
- Check Laravel log

## Expected Behavior
- ✅ Agent hanya melihat produk mereka sendiri
- ✅ Agent tidak bisa edit kode_agen, role, pencapaian
- ✅ Agent bisa edit nama, telepon, deskripsi, foto, background
- ✅ Agent bisa tambah/edit/hapus produk mereka

## Perbedaan dengan Admin
- **Admin Panel** (`/admin`): Melihat semua data
- **Agent Panel** (`/agent`): Hanya data sendiri