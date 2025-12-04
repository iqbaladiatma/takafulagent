# 🔄 CARA DUPLIKASI UNTUK 100 AGEN

Setelah prototipe selesai dan disetujui, ada 2 cara untuk duplikasi ke 100 agen:

---

## 📋 Opsi 1: Multi-Instance (Terpisah)

Setiap agen punya website sendiri dengan domain/subdomain terpisah.

### Kelebihan
- ✅ Independen per agen
- ✅ Bisa custom per agen
- ✅ Tidak saling mempengaruhi

### Kekurangan
- ❌ Maintenance banyak instance
- ❌ Update harus satu-satu
- ❌ Biaya hosting lebih besar

### Langkah-Langkah

#### 1. Persiapan Template
```bash
# Clone project prototipe
git clone /path/to/prototipe web-takaful-template
cd web-takaful-template

# Hapus data spesifik
rm -rf .git
rm -rf storage/app/public/*
```

#### 2. Buat Script Duplikasi
Buat file `duplicate.sh`:

```bash
#!/bin/bash

# Parameter
AGEN_KODE=$1
AGEN_NAMA=$2
AGEN_TELEPON=$3
DOMAIN=$4

# Clone template
cp -r web-takaful-template web-takaful-$AGEN_KODE
cd web-takaful-$AGEN_KODE

# Update .env
cp .env.example .env
sed -i "s/APP_NAME=.*/APP_NAME=\"$AGEN_NAMA - Takaful\"/" .env
sed -i "s/APP_URL=.*/APP_URL=https:\/\/$DOMAIN/" .env
sed -i "s/DB_DATABASE=.*/DB_DATABASE=takaful_$AGEN_KODE/" .env

# Generate key
php artisan key:generate

# Setup database
mysql -u root -p -e "CREATE DATABASE takaful_$AGEN_KODE;"
php artisan migrate
php artisan storage:link

# Buat admin
php artisan tinker --execute="
\App\Models\User::create([
    'name' => 'Admin $AGEN_NAMA',
    'email' => 'admin.$AGEN_KODE@takaful.com',
    'password' => bcrypt('admin123')
]);
"

echo "✅ Duplikasi selesai untuk $AGEN_NAMA ($AGEN_KODE)"
echo "📧 Email: admin.$AGEN_KODE@takaful.com"
echo "🔑 Password: admin123"
echo "🌐 Domain: $DOMAIN"
```

#### 3. Jalankan Script
```bash
chmod +x duplicate.sh

# Contoh penggunaan
./duplicate.sh TKF001 "Ahmad Fauzi" "081234567890" "ahmad.takaful.id"
./duplicate.sh TKF002 "Siti Nurhaliza" "082345678901" "siti.takaful.id"
```

#### 4. Deploy ke Hosting
Untuk setiap instance:
```bash
# Upload ke server
rsync -avz web-takaful-TKF001/ user@server:/var/www/ahmad.takaful.id/

# Setup di server
ssh user@server
cd /var/www/ahmad.takaful.id
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📋 Opsi 2: Multi-Tenancy (Satu Codebase)

Satu website, banyak agen, dengan routing dinamis.

### Kelebihan
- ✅ Satu codebase untuk semua
- ✅ Update sekali untuk semua
- ✅ Maintenance mudah
- ✅ Biaya hosting lebih murah

### Kekurangan
- ❌ Tidak bisa custom per agen
- ❌ Jika down, semua down
- ❌ Perlu setup lebih kompleks

### Langkah-Langkah

#### 1. Struktur URL
```
https://takaful.id/agen/TKF001  → Ahmad Fauzi
https://takaful.id/agen/TKF002  → Siti Nurhaliza
https://takaful.id/agen/TKF003  → ...
```

Atau dengan subdomain:
```
https://TKF001.takaful.id  → Ahmad Fauzi
https://TKF002.takaful.id  → Siti Nurhaliza
```

#### 2. Setup Subdomain (Opsional)
Jika pakai subdomain, update `routes/web.php`:

```php
Route::domain('{kode}.takaful.id')->group(function () {
    Route::get('/', [AgenController::class, 'showBySubdomain']);
});

// Di AgenController.php
public function showBySubdomain(Request $request)
{
    $kode = $request->route('kode');
    $agen = Agen::where('kode_agen', $kode)->firstOrFail();
    return view('agen.show', compact('agen'));
}
```

#### 3. Import Data Agen Massal
Buat file `import-agen.php`:

```php
<?php

use App\Models\Agen;
use Illuminate\Support\Facades\DB;

// Data agen dari CSV atau Excel
$agens = [
    ['nama' => 'Ahmad Fauzi', 'kode_agen' => 'TKF001', 'telepon' => '081234567890', ...],
    ['nama' => 'Siti Nurhaliza', 'kode_agen' => 'TKF002', 'telepon' => '082345678901', ...],
    // ... 98 agen lainnya
];

DB::beginTransaction();
try {
    foreach ($agens as $data) {
        Agen::create($data);
    }
    DB::commit();
    echo "✅ Import 100 agen berhasil!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "❌ Error: " . $e->getMessage() . "\n";
}
```

Jalankan:
```bash
php artisan tinker < import-agen.php
```

#### 4. Deploy
```bash
# Upload ke server
rsync -avz . user@server:/var/www/takaful.id/

# Setup di server
ssh user@server
cd /var/www/takaful.id
composer install --optimize-autoloader --no-dev
php artisan migrate
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📊 Perbandingan Opsi

| Aspek | Multi-Instance | Multi-Tenancy |
|-------|----------------|---------------|
| **Maintenance** | Sulit (100 instance) | Mudah (1 instance) |
| **Update** | Satu-satu | Sekali untuk semua |
| **Biaya Hosting** | Tinggi | Rendah |
| **Customization** | Tinggi | Rendah |
| **Scalability** | Rendah | Tinggi |
| **Kompleksitas** | Rendah | Sedang |
| **Reliability** | Tinggi (isolated) | Sedang (shared) |

---

## 🎯 Rekomendasi

### Untuk 100 Agen → **Multi-Tenancy**

Alasan:
1. ✅ Maintenance jauh lebih mudah
2. ✅ Update fitur sekali jalan
3. ✅ Biaya hosting lebih efisien
4. ✅ Monitoring terpusat
5. ✅ Backup lebih simple

### Struktur URL yang Disarankan

**Opsi A**: Path-based (Paling Simple)
```
https://takaful.id/agen/TKF001
https://takaful.id/agen/TKF002
```

**Opsi B**: Subdomain (Lebih Personal)
```
https://ahmad.takaful.id
https://siti.takaful.id
```

**Opsi C**: Custom Domain (Paling Profesional)
```
https://ahmadfauzi.com
https://sitinurhaliza.com
```

---

## 📝 Checklist Duplikasi

### Persiapan
- [ ] Prototipe sudah disetujui
- [ ] Data 100 agen sudah lengkap (nama, kode, telepon, foto, dll)
- [ ] Hosting sudah disiapkan
- [ ] Domain/subdomain sudah disiapkan
- [ ] Database sudah disiapkan

### Eksekusi
- [ ] Clone/setup codebase
- [ ] Import data agen
- [ ] Upload foto agen
- [ ] Test setiap halaman agen
- [ ] Setup SSL certificate
- [ ] Setup backup otomatis

### Testing
- [ ] Test 10 agen random
- [ ] Test tombol WhatsApp
- [ ] Test responsive mobile
- [ ] Test loading speed
- [ ] Test admin panel

### Go Live
- [ ] Ganti password admin
- [ ] Setup monitoring
- [ ] Setup analytics (opsional)
- [ ] Dokumentasi untuk tim
- [ ] Training untuk admin

---

## 🚀 Script Helper

### Import Agen dari CSV

Buat file `import-from-csv.php`:

```php
<?php

use App\Models\Agen;
use Illuminate\Support\Facades\DB;

$file = fopen('agen-data.csv', 'r');
$header = fgetcsv($file); // Skip header

DB::beginTransaction();
try {
    $count = 0;
    while (($row = fgetcsv($file)) !== false) {
        Agen::create([
            'nama' => $row[0],
            'kode_agen' => $row[1],
            'telepon' => $row[2],
            'role' => $row[3] ?? 'Agen Takaful',
            'deskripsi' => $row[4] ?? '',
            'pencapaian' => $row[5] ?? '',
        ]);
        $count++;
    }
    DB::commit();
    echo "✅ Import $count agen berhasil!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "❌ Error: " . $e->getMessage() . "\n";
}
fclose($file);
```

Format CSV (`agen-data.csv`):
```csv
nama,kode_agen,telepon,role,deskripsi,pencapaian
Ahmad Fauzi,TKF001,081234567890,Senior Agen,Deskripsi...,Pencapaian...
Siti Nurhaliza,TKF002,082345678901,Agen Takaful,Deskripsi...,Pencapaian...
```

Jalankan:
```bash
php artisan tinker < import-from-csv.php
```

---

## 📞 Support

Jika ada pertanyaan tentang duplikasi, hubungi tim development.

---

**Siap untuk scale ke 100 agen! 🚀**
