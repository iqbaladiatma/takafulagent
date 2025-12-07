# 🎨 FITUR BACKGROUND PROFILE AGEN - SELESAI

## ✅ Yang Sudah Dibuat

### 1. **Database**

#### Migration
```php
Schema::table('agens', function (Blueprint $table) {
    $table->string('background_image')->nullable();
    $table->string('background_type')->default('gradient'); // 'image' or 'gradient'
    $table->string('background_value')->default('blue-green'); // gradient name
});
```

#### Fields
- `background_image` - Path gambar background (nullable)
- `background_type` - Tipe: 'gradient' atau 'image'
- `background_value` - Nama gradient atau color code

---

### 2. **Form Input (Admin Panel)**

#### Lokasi
- Di form agen (AgenResource)
- Section "Foto Profil & Background"
- Setelah informasi agen

#### Fields

**1. Foto Profil** (existing)
- Upload foto profil
- Rasio 1:1
- Max 2MB

**2. Tipe Background** (new)
- Select dropdown
- Options:
  - Gradient (Pilihan Warna)
  - Upload Gambar Custom
- Default: Gradient
- Reactive (show/hide fields)

**3. Pilih Gradient** (conditional)
- Visible jika tipe = Gradient
- Options:
  - 🔵 Biru → Hijau (Default)
  - 🔵 Biru → Ungu
  - 🟢 Hijau → Teal
  - 🟠 Orange → Merah
  - 🌸 Pink → Ungu
  - 🟡 Kuning → Orange

**4. Upload Background Image** (conditional)
- Visible jika tipe = Image
- Max 3MB
- Recommended: 1200x400px
- Image editor included

---

### 3. **Gradient Presets**

#### Available Gradients
```php
'blue-green' => 'linear-gradient(135deg, #1D76BB 0%, #008542 100%)'
'blue-purple' => 'linear-gradient(135deg, #1D76BB 0%, #6B46C1 100%)'
'green-teal' => 'linear-gradient(135deg, #008542 0%, #0D9488 100%)'
'orange-red' => 'linear-gradient(135deg, #F97316 0%, #DC2626 100%)'
'pink-purple' => 'linear-gradient(135deg, #EC4899 0%, #8B5CF6 100%)'
'yellow-orange' => 'linear-gradient(135deg, #EAB308 0%, #F97316 100%)'
```

#### Preview
```
🔵 Biru → Hijau:    [████████████] (Default Takaful)
🔵 Biru → Ungu:     [████████████] (Professional)
🟢 Hijau → Teal:    [████████████] (Fresh)
🟠 Orange → Merah:  [████████████] (Energetic)
🌸 Pink → Ungu:     [████████████] (Creative)
🟡 Kuning → Orange: [████████████] (Warm)
```

---

### 4. **Tampilan di Profile**

#### Design
```
┌─────────────────────────────────────────┐
│                                         │
│     [Background Image/Gradient]         │
│              (h-48)                     │
│                                         │
│              ┌─────┐                    │
│              │ 👤  │ ← Avatar           │
│              └─────┘                    │
├─────────────────────────────────────────┤
│                                         │
│         Nama Agen                       │
│         Role                            │
│         Badge Kode                      │
│                                         │
└─────────────────────────────────────────┘
```

#### Features
- ✅ Height responsive (h-32 sm:h-40 md:h-48 lg:h-56)
- ✅ Overlay hitam 10% (readability)
- ✅ Decorative pattern overlay
- ✅ Avatar dengan ring & shadow
- ✅ Online status indicator (dot hijau)
- ✅ Smooth transitions

#### Avatar
- Size responsive: 24-36 (w-24 sm:w-28 md:w-32 lg:w-36)
- Border: 4px white
- Ring: 4px gray-100
- Shadow: shadow-2xl
- Position: absolute, centered, -bottom-16

---

## 🎨 Design Details

### Background Banner
```css
Height: 
- Mobile: h-32 (128px)
- Tablet: sm:h-40 (160px)
- Desktop: md:h-48 (192px)
- Large: lg:h-56 (224px)

Overlay: bg-black/10
Pattern: SVG dots (opacity-10)
```

### Avatar
```css
Size:
- Mobile: w-24 h-24 (96px)
- Tablet: sm:w-28 sm:h-28 (112px)
- Desktop: md:w-32 md:h-32 (128px)
- Large: lg:w-36 lg:h-36 (144px)

Border: border-4 border-white
Ring: ring-4 ring-gray-100
Shadow: shadow-2xl
Position: -bottom-12 sm:-bottom-14 md:-bottom-16
```

### Online Indicator
```css
Size: w-5 h-5 sm:w-6 sm:h-6
Color: bg-green-500
Border: border-3 border-white
Shadow: shadow-lg
Position: bottom-2 right-2
```

---

## 📱 Responsive

### Mobile (< 640px)
- Background: h-32 (128px)
- Avatar: w-24 h-24 (96px)
- Bottom offset: -12 (-48px)
- Padding top: pt-14 (56px)

### Tablet (640px - 768px)
- Background: h-40 (160px)
- Avatar: w-28 h-28 (112px)
- Bottom offset: -14 (-56px)
- Padding top: pt-16 (64px)

### Desktop (768px - 1024px)
- Background: h-48 (192px)
- Avatar: w-32 h-32 (128px)
- Bottom offset: -16 (-64px)
- Padding top: pt-20 (80px)

### Large (> 1024px)
- Background: h-56 (224px)
- Avatar: w-36 h-36 (144px)
- Bottom offset: -16 (-64px)
- Padding top: pt-24 (96px)

---

## 🔧 Technical Details

### Model Method
```php
public function getBackgroundStyleAttribute()
{
    if ($this->background_type === 'image' && $this->background_image) {
        return "background-image: url('" . asset('storage/' . $this->background_image) . "'); background-size: cover; background-position: center;";
    }

    $gradients = [
        'blue-green' => 'background: linear-gradient(135deg, #1D76BB 0%, #008542 100%);',
        // ... other gradients
    ];

    if ($this->background_type === 'gradient') {
        return $gradients[$this->background_value] ?? $gradients['blue-green'];
    }

    return $gradients['blue-green'];
}
```

### Usage in View
```blade
<div style="{{ $agen->background_style }}">
    <!-- Content -->
</div>
```

---

## 📋 Cara Menggunakan

### 1. Pilih Gradient (Admin)
1. Login ke admin panel
2. Edit agen
3. Section "Foto Profil & Background"
4. Tipe Background: "Gradient (Pilihan Warna)"
5. Pilih gradient: "🔵 Biru → Hijau"
6. Save

**Result:** Profile agen dengan gradient blue-green

### 2. Upload Custom Image (Admin)
1. Login ke admin panel
2. Edit agen
3. Section "Foto Profil & Background"
4. Tipe Background: "Upload Gambar Custom"
5. Upload gambar (max 3MB, 1200x400px)
6. Crop/edit jika perlu
7. Save

**Result:** Profile agen dengan custom background image

### 3. Lihat Profile (User)
1. Buka `/agen/{kode}`
2. Lihat background banner di atas
3. Avatar di tengah dengan ring & shadow
4. Online indicator (dot hijau)

---

## ✨ Features

### Admin Panel
- ✅ Select tipe background
- ✅ 6 gradient presets dengan emoji
- ✅ Upload custom image
- ✅ Image editor
- ✅ Reactive fields (show/hide)
- ✅ Validation

### Profile View
- ✅ Responsive height
- ✅ Overlay untuk readability
- ✅ Decorative pattern
- ✅ Avatar dengan ring
- ✅ Online status
- ✅ Smooth transitions

### Gradients
- ✅ 6 pilihan warna
- ✅ Professional colors
- ✅ 135deg angle
- ✅ Smooth transitions

---

## 🎯 Example Usage

### Scenario 1: Gradient Blue-Green
```
Agen: Ahmad Fauzi
Background Type: Gradient
Background Value: blue-green
```

**Result:**
- Background: Gradient biru → hijau
- Avatar: Centered dengan ring
- Professional look

### Scenario 2: Custom Image
```
Agen: Siti Nurhaliza
Background Type: Image
Background Image: office-background.jpg
```

**Result:**
- Background: Custom image (office)
- Avatar: Centered dengan ring
- Personal touch

### Scenario 3: Pink-Purple Gradient
```
Agen: Dewi Lestari
Background Type: Gradient
Background Value: pink-purple
```

**Result:**
- Background: Gradient pink → ungu
- Avatar: Centered dengan ring
- Creative & unique

---

## 🎨 Color Psychology

### Blue-Green (Default)
- Trust, professionalism
- Takaful brand colors
- Recommended for most agents

### Blue-Purple
- Wisdom, creativity
- Professional & modern
- Good for senior agents

### Green-Teal
- Growth, freshness
- Nature, health
- Good for health insurance

### Orange-Red
- Energy, passion
- Bold, confident
- Good for top performers

### Pink-Purple
- Creativity, innovation
- Friendly, approachable
- Good for young agents

### Yellow-Orange
- Warmth, optimism
- Friendly, positive
- Good for family insurance

---

## 📊 Database

### Table: agens (updated)
| Field | Type | Default | Description |
|-------|------|---------|-------------|
| background_image | string | null | Path gambar |
| background_type | string | 'gradient' | 'image' or 'gradient' |
| background_value | string | 'blue-green' | Gradient name |

---

## 🚀 Testing

### Test 1: Gradient
1. Edit agen
2. Pilih gradient "Biru → Ungu"
3. Save
4. Buka profile → Background ungu ✅

### Test 2: Custom Image
1. Edit agen
2. Pilih "Upload Gambar Custom"
3. Upload image
4. Save
5. Buka profile → Background image ✅

### Test 3: Responsive
1. Buka profile di mobile
2. Background h-32, avatar w-24 ✅
3. Buka di desktop
4. Background h-56, avatar w-36 ✅

---

## 📝 Files Modified/Created

### Created:
1. `database/migrations/2025_12_07_020922_add_background_to_agens_table.php`
2. `FITUR_BACKGROUND_PROFILE.md` (this file)

### Modified:
1. `app/Models/Agen.php` - Add background fields & method
2. `app/Filament/Resources/AgenResource.php` - Add background form
3. `resources/views/agen/show.blade.php` - Update banner design

---

## 🎉 Status

**FITUR BACKGROUND PROFILE SUDAH SELESAI!** ✨

### Checklist:
- [x] Database migration
- [x] Model method
- [x] Form input (admin)
- [x] 6 gradient presets
- [x] Upload custom image
- [x] Tampilan di profile
- [x] Responsive design
- [x] Online indicator
- [x] Decorative pattern
- [x] No errors

**Ready to use!** 🚀

---

## 💡 Tips

### Untuk Admin:
- Gunakan gradient default untuk konsistensi
- Upload image berkualitas tinggi (1200x400px)
- Pilih warna sesuai personality agen
- Test di mobile & desktop

### Untuk Design:
- Gradient 135deg untuk modern look
- Overlay 10% untuk readability
- Pattern overlay untuk texture
- Ring & shadow untuk depth

---

**Selamat menggunakan fitur background profile!** 🎨✨
