# ✅ CHECKLIST SEBELUM PRODUCTION

Pastikan semua item ini sudah dicek sebelum go live!

---

## 🔒 Keamanan

### Admin Panel
- [ ] Ganti password admin default (`admin123`)
- [ ] Gunakan email admin yang valid
- [ ] Setup 2FA jika memungkinkan
- [ ] Batasi IP yang bisa akses admin (opsional)
- [ ] Setup rate limiting untuk login

### Environment
- [ ] `APP_ENV=production` di `.env`
- [ ] `APP_DEBUG=false` di `.env`
- [ ] `APP_KEY` sudah di-generate
- [ ] Database credentials aman
- [ ] Hapus kredensial default dari dokumentasi

### File Permissions
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## 🗄️ Database

- [ ] Migration sudah dijalankan
- [ ] Seeder admin sudah dijalankan
- [ ] Data agen sudah diimport
- [ ] Backup database sudah disetup
- [ ] Database credentials aman
- [ ] Setup automated backup (daily/weekly)

---

## 📁 File & Storage

- [ ] `php artisan storage:link` sudah dijalankan
- [ ] Folder `storage/app/public` writable
- [ ] Folder `public/images` ada
- [ ] Default avatar sudah diupload
- [ ] Foto agen sudah diupload
- [ ] File permissions sudah benar

---

## ⚡ Performance

### Caching
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

### Optimization
- [ ] Composer autoload optimized: `composer install --optimize-autoloader --no-dev`
- [ ] Asset compiled: `npm run build`
- [ ] OPcache enabled di PHP
- [ ] Redis/Memcached setup (opsional)

---

## 🌐 Domain & SSL

- [ ] Domain sudah pointing ke server
- [ ] SSL certificate sudah terinstall
- [ ] HTTPS redirect sudah aktif
- [ ] `APP_URL` di `.env` sudah benar (https)
- [ ] Mixed content warning sudah resolved

### Nginx Config (Contoh)
```nginx
server {
    listen 80;
    server_name takaful.id www.takaful.id;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name takaful.id www.takaful.id;

    ssl_certificate /path/to/cert.pem;
    ssl_certificate_key /path/to/key.pem;

    root /var/www/takaful.id/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

---

## 🧪 Testing

### Functional Testing
- [ ] Login admin berhasil
- [ ] Tambah agen berhasil
- [ ] Edit agen berhasil
- [ ] Hapus agen berhasil
- [ ] Upload foto berhasil
- [ ] Generate WA link otomatis
- [ ] Halaman agen tampil dengan benar
- [ ] Tombol WhatsApp redirect dengan benar

### UI Testing
- [ ] Test di Chrome
- [ ] Test di Firefox
- [ ] Test di Safari
- [ ] Test di mobile (iOS)
- [ ] Test di mobile (Android)
- [ ] Test responsive breakpoints
- [ ] Test foto loading
- [ ] Test default avatar

### Performance Testing
- [ ] Page load < 3 detik
- [ ] Image optimization
- [ ] No console errors
- [ ] No 404 errors
- [ ] Lighthouse score > 80

---

## 📱 Mobile Optimization

- [ ] Viewport meta tag ada
- [ ] Touch targets cukup besar (min 44x44px)
- [ ] Font size readable di mobile
- [ ] Tombol WhatsApp mudah diklik
- [ ] Scroll smooth
- [ ] No horizontal scroll

---

## 🔍 SEO (Opsional)

- [ ] Meta title per halaman
- [ ] Meta description per halaman
- [ ] Open Graph tags
- [ ] Twitter Card tags
- [ ] Sitemap.xml
- [ ] Robots.txt
- [ ] Google Analytics (opsional)

### Contoh Meta Tags
```blade
<!-- resources/views/agen/show.blade.php -->
<head>
    <title>{{ $agen->nama }} - Agen Takaful</title>
    <meta name="description" content="{{ Str::limit($agen->deskripsi, 160) }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $agen->nama }} - Agen Takaful">
    <meta property="og:description" content="{{ Str::limit($agen->deskripsi, 160) }}">
    <meta property="og:image" content="{{ $agen->foto_url }}">
    <meta property="og:url" content="{{ route('agen.show', $agen->kode_agen) }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $agen->nama }} - Agen Takaful">
    <meta name="twitter:description" content="{{ Str::limit($agen->deskripsi, 160) }}">
    <meta name="twitter:image" content="{{ $agen->foto_url }}">
</head>
```

---

## 📊 Monitoring

- [ ] Setup error logging
- [ ] Setup uptime monitoring (UptimeRobot, Pingdom)
- [ ] Setup performance monitoring (New Relic, Scout)
- [ ] Setup email alerts untuk errors
- [ ] Setup backup monitoring

### Laravel Logging
```php
// config/logging.php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['daily', 'slack'],
    ],
    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'level' => 'error',
    ],
],
```

---

## 📧 Email (Opsional)

Jika ada fitur email:
- [ ] SMTP credentials sudah benar
- [ ] Test email berhasil terkirim
- [ ] Email template sudah benar
- [ ] Unsubscribe link ada (jika newsletter)

---

## 🔄 Backup

### Database Backup
```bash
# Setup cron job untuk backup harian
0 2 * * * mysqldump -u user -p'password' takaful_db > /backup/takaful_$(date +\%Y\%m\%d).sql
```

### File Backup
```bash
# Backup storage folder
0 3 * * * tar -czf /backup/storage_$(date +\%Y\%m\%d).tar.gz /var/www/takaful.id/storage
```

### Automated Backup
- [ ] Database backup otomatis (daily)
- [ ] File backup otomatis (weekly)
- [ ] Backup retention policy (30 hari)
- [ ] Backup testing (restore test)

---

## 📝 Dokumentasi

- [ ] README.md lengkap
- [ ] Panduan instalasi
- [ ] Panduan penggunaan admin
- [ ] Kredensial admin didokumentasikan (aman)
- [ ] Kontak support tersedia

---

## 👥 Training

- [ ] Admin sudah ditraining cara pakai Filament
- [ ] Admin tahu cara tambah agen
- [ ] Admin tahu cara upload foto
- [ ] Admin tahu cara edit/hapus agen
- [ ] Admin tahu cara lihat halaman agen

---

## 🚀 Deployment

### Pre-Deployment
- [ ] Code sudah di-review
- [ ] Testing sudah lengkap
- [ ] Backup sudah dibuat
- [ ] Rollback plan sudah ada

### Deployment Steps
```bash
# 1. Pull latest code
git pull origin main

# 2. Install dependencies
composer install --optimize-autoloader --no-dev
npm install && npm run build

# 3. Run migrations
php artisan migrate --force

# 4. Clear & cache
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Restart services
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx
```

### Post-Deployment
- [ ] Test homepage
- [ ] Test admin login
- [ ] Test beberapa halaman agen
- [ ] Check error logs
- [ ] Monitor performance

---

## 🆘 Rollback Plan

Jika ada masalah setelah deployment:

```bash
# 1. Restore database
mysql -u user -p takaful_db < /backup/takaful_YYYYMMDD.sql

# 2. Restore code
git reset --hard <previous-commit>

# 3. Clear cache
php artisan optimize:clear

# 4. Restart services
sudo systemctl restart php8.2-fpm nginx
```

---

## 📞 Emergency Contacts

Siapkan kontak untuk:
- [ ] Developer
- [ ] System Admin
- [ ] Hosting Support
- [ ] Domain Provider

---

## ✅ Final Check

Sebelum announce ke agen:
- [ ] Semua checklist di atas sudah ✅
- [ ] Test dengan 5-10 agen dulu
- [ ] Collect feedback
- [ ] Fix issues
- [ ] Baru announce ke semua agen

---

## 🎉 Go Live!

Setelah semua checklist selesai:

1. ✅ Announce ke tim internal
2. ✅ Soft launch ke 10 agen
3. ✅ Monitor 1-2 hari
4. ✅ Fix issues jika ada
5. ✅ Full launch ke 100 agen
6. ✅ Celebrate! 🎊

---

**Good luck with your launch! 🚀**
