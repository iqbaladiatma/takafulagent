# Cara Akses Agent Panel

## Untuk Agent
1. **Login** dengan akun agent Anda di halaman login biasa
2. **Akses Agent Panel** dengan cara:
   - Klik tombol **"Panel Agen"** di navigation bar (tombol orange)
   - Atau langsung akses URL: `/agent`
   - **JANGAN** akses `/dashboard` (itu untuk dashboard Laravel biasa)

## Demo Account
- **Email**: `agent@takaful.com`
- **Password**: `password`

## URL yang Benar
- ✅ **Agent Panel**: `http://takafulagent.test/agent`
- ❌ **Dashboard Biasa**: `http://takafulagent.test/dashboard` (ini bukan Filament)

## Fitur Agent Panel
- Dashboard dengan statistik produk
- Kelola Produk Saya
- Edit Profil Saya (terbatas)

## Troubleshooting
Jika tidak muncul tombol "Panel Agen":
1. Pastikan user memiliki role 'agent'
2. Pastikan user sudah dihubungkan dengan data agen di admin panel
3. Clear cache: `php artisan config:clear`

## Perbedaan dengan Admin Panel
- **Admin Panel** (`/admin`): Kelola semua data, semua agen, semua produk
- **Agent Panel** (`/agent`): Hanya kelola data sendiri, produk sendiri