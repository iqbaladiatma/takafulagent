# Sistem Produk Agent - Filament Admin Panel

## Overview
Sistem ini memungkinkan admin mengelola produk secara terpusat dan agent mengelola produk mereka sendiri melalui panel terpisah.

## Fitur yang Telah Dibuat

### 1. Admin Panel (admin)
- **ProductResource**: Admin dapat mengelola semua produk dari semua agent
- **AgenResource**: Admin dapat mengelola agent dan menghubungkan dengan user account
- **URL**: `/admin`

### 2. Agent Panel (agent)  
- **ProductResource**: Agent hanya dapat mengelola produk mereka sendiri
- **ProfileResource**: Agent dapat mengedit profil mereka sendiri
- **Dashboard**: Dashboard khusus dengan statistik dan quick actions
- **URL**: `/agent`

### 3. Database Changes
- Menambahkan kolom `user_id` ke tabel `agens` untuk menghubungkan agent dengan user account
- Migration: `2025_12_10_062723_add_user_id_to_agens_table.php`

### 4. Model Updates
- **User Model**: 
  - Menambahkan method `canAccessPanel()` untuk mengatur akses panel
  - Menambahkan relasi ke Agen
  - Menambahkan method `isAgent()`
  
- **Agen Model**:
  - Menambahkan relasi ke User
  - Menambahkan `user_id` ke fillable

## Cara Penggunaan

### Setup Agent User
1. Login ke admin panel (`/admin`)
2. Buat atau edit Agen
3. Pilih atau buat User account untuk agen tersebut
4. Set role user menjadi 'agent'
5. Agent sekarang bisa login ke `/agent` dengan email dan password user

### Demo Account
- **Admin**: `admin@takaful.com` / `password`
- **Agent**: `agent@takaful.com` / `password`

### Agent Panel Features
- **Dashboard**: Statistik produk dan quick actions
- **Produk Saya**: Kelola produk yang dimiliki agent
- **Profil Saya**: Edit informasi profil agent
- **Auto-filtering**: Agent hanya melihat data mereka sendiri

### Admin Panel Features  
- **Kelola Produk**: Melihat dan mengelola semua produk dari semua agent
- **Kelola Agen**: Mengelola agent dan menghubungkan dengan user account
- **Full Control**: Admin memiliki akses penuh ke semua data

## File Structure
```
app/
├── Filament/
│   ├── Resources/
│   │   ├── ProductResource.php (Admin)
│   │   └── AgenResource.php (Admin)
│   └── Agent/
│       ├── Resources/
│       │   ├── ProductResource.php (Agent)
│       │   └── ProfileResource.php (Agent)
│       ├── Pages/
│       │   └── Dashboard.php
│       └── Widgets/
│           ├── StatsOverview.php
│           └── QuickActions.php
├── Models/
│   ├── User.php (Updated)
│   ├── Agen.php (Updated)
│   └── Product.php
└── Providers/Filament/
    ├── AdminPanelProvider.php
    └── AgentPanelProvider.php (New)
```

## Security Features
- **Panel Isolation**: Agent hanya bisa akses panel agent, admin hanya bisa akses panel admin
- **Data Filtering**: Agent hanya melihat data mereka sendiri
- **Role-based Access**: Sistem role untuk mengatur akses panel
- **Auto-assignment**: Produk otomatis di-assign ke agent yang sedang login

## Next Steps
1. Test semua fitur dengan login sebagai agent dan admin
2. Customize tampilan sesuai kebutuhan
3. Tambahkan validasi tambahan jika diperlukan
4. Setup production environment