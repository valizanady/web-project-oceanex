# 📸 IMAGE SIZE GUIDE - Oceanex Website

## 📐 Recommended Image Sizes

### **1. Hero Images (Homepage Slider)**
**Location**: `images/hero/`

- **hero-1-ocean.jpg** - Main hero slide
- **hero-2-cold-storage.jpg** - Slide 2
- **hero-3-shipping.jpg** - Slide 3  
- **hero-4-processing.jpg** - Slide 4

**Specifications:**
```
Size: 1920x1080 px (Full HD)
Aspect Ratio: 16:9
Format: JPG (recommended) or PNG
Quality: 80-90% (optimal balance)
Max File Size: 300-500 KB
```

**Tips:**
- Landscape orientation (horizontal)
- Dark overlay akan ditambahkan otomatis (opacity 50%)
- Pastikan subjek utama di center/left (karena text overlay di kiri)
- Avoid text in image (website sudah ada text overlay)

---

### **2. Why Choose Us - Bento Cards**
**Location**: `images/why/` (folder baru)

Saat ini pakai Unsplash, tapi bisa diganti dengan foto sendiri:

#### **A. Quality Driven (Large Card)**
- **Filename**: `quality-driven.jpg` ✨ **BARU**
- **Size**: **1200x800 px**
- **Aspect Ratio**: 3:2
- **Format**: JPG
- **Quality**: 85%
- **Max File Size**: 200-300 KB

**Content Ideas:**
- Seafood dengan Grade A+ sticker
- Quality control inspection
- Fresh fish close-up with traceability tag
- Quality assurance team checking products

---

#### **B. Cold Chain Excellence (Medium Card)**
- **Filename**: `cold-chain.jpg` ❄️ **BARU**
- **Size**: **800x800 px**
- **Aspect Ratio**: 1:1 (square)
- **Format**: JPG
- **Quality**: 85%
- **Max File Size**: 150-200 KB

**Content Ideas:**
- Cold storage facility interior
- Temperature monitoring system
- Frozen seafood in cold room
- Refrigerated truck/container

---

#### **C. Global Reach (Medium Card)**
- **Filename**: `global-reach.jpg` 🌍
- **Size**: **800x800 px**
- **Aspect Ratio**: 1:1 (square)
- **Format**: JPG
- **Quality**: 85%
- **Max File Size**: 150-200 KB

**Content Ideas:**
- Shipping containers at port
- World map with routes
- Cargo ship/airplane
- International logistics

---

#### **D. Custom Solutions (Medium Card)**
- **Filename**: `custom-processing.jpg` 🔪 **BARU**
- **Size**: **800x800 px**
- **Aspect Ratio**: 1:1 (square)
- **Format**: JPG
- **Quality**: 85%
- **Max File Size**: 150-200 KB

**Content Ideas:**
- Fish filleting/processing
- Custom cutting station
- Seafood packaging line
- Chef preparing custom cuts

---

### **3. Products Page Hero**
**Location**: `images/products/`

- **Filename**: `hero-products.jpg` 🐟 **SUDAH ADA PLACEHOLDER**
- **Size**: **1920x600 px**
- **Aspect Ratio**: 16:5 (wide banner)
- **Format**: JPG
- **Quality**: 85%
- **Max File Size**: 250-400 KB

**Specifications:**
- Shorter height karena hero lebih compact
- Background image (opacity 40% akan ditambahkan)
- Navy gradient overlay otomatis
- Fokus di center

**Content Ideas:**
- Variety of premium seafood display
- Fresh fish market/counter
- Seafood on ice display
- Ocean/fishing boat scene

---

### **4. Product Cards (12 products)**
**Location**: `images/products/`

Currently using Unsplash, optional untuk ganti:

- **Size**: **600x400 px** (for each product)
- **Aspect Ratio**: 3:2
- **Format**: JPG
- **Quality**: 80%
- **Max File Size**: 80-150 KB per image

**Product List:**
```
salmon.jpg          - Wild Atlantic Salmon
shrimp-black.jpg    - Black Tiger Shrimp
crab-king.jpg       - King Crab Legs
tuna-bluefin.jpg    - Bluefin Tuna
shrimp-vannamei.jpg - Vannamei Shrimp
crab-snow.jpg       - Snow Crab Clusters
scallops.jpg        - Sea Scallops
tuna-yellowfin.jpg  - Yellowfin Tuna
lobster.jpg         - Lobster Tails
cod.jpg             - Atlantic Cod
mussels.jpg         - Blue Mussels
squid.jpg           - Squid/Calamari
```

---

### **5. Certification Logos**
**Location**: `images/certifications/`

Already exists:
- **Size**: **200x200 px** (square, transparent background)
- **Format**: PNG (with transparency)
- **Max File Size**: 20-50 KB

---

### **6. Logo**
**Location**: `images/`

- **Filename**: `logo.png`
- **Size**: **200x200 px** (or proportional)
- **Format**: PNG with transparent background
- **Max File Size**: 30-50 KB

---

## 🛠️ How to Update Images

### **Step 1: Prepare Your Images**

1. Resize to recommended dimensions (use Photoshop/Canva/Online tool)
2. Optimize quality (80-90% for JPG)
3. Compress file size (use TinyPNG.com or similar)

### **Step 2: Upload Files**

Upload ke folder yang sesuai:

```
images/
├── why/
│   ├── quality-driven.jpg       ← UPLOAD HERE
│   ├── cold-chain.jpg           ← UPLOAD HERE
│   ├── global-reach.jpg         ← OPTIONAL
│   └── custom-processing.jpg    ← UPLOAD HERE
│
├── products/
│   └── hero-products.jpg        ← UPLOAD HERE
│
└── hero/
    ├── hero-1-ocean.jpg         ← REPLACE if needed
    ├── hero-2-cold-storage.jpg
    ├── hero-3-shipping.jpg
    └── hero-4-processing.jpg
```

### **Step 3: Update HTML Code**

#### **For Why Choose Us Cards:**

Edit `index.html` around line 298-350:

**Before:**
```html
<div class="why-bento-bg" style="background-image: url('https://images.unsplash.com/photo-xxx?w=800&q=80')"></div>
```

**After:**
```html
<div class="why-bento-bg" style="background-image: url('images/why/quality-driven.jpg')"></div>
```

**Update all 4 cards:**

```html
<!-- Card 1: Quality Driven -->
<div class="why-bento-bg" style="background-image: url('images/why/quality-driven.jpg')"></div>

<!-- Card 2: Cold Chain -->
<div class="why-bento-bg" style="background-image: url('images/why/cold-chain.jpg')"></div>

<!-- Card 3: Global Reach -->
<div class="why-bento-bg" style="background-image: url('images/why/global-reach.jpg')"></div>

<!-- Card 4: Custom Solutions -->
<div class="why-bento-bg" style="background-image: url('images/why/custom-processing.jpg')"></div>
```

#### **For Products Hero:**

File `product/index.html` already configured:
```html
background:url('../images/products/hero-products.jpg') center/cover;
```

Just upload `hero-products.jpg` ke folder `images/products/` ✅

---

## 📊 Image Optimization Tips

### **Online Tools (Free):**

1. **TinyPNG** - https://tinypng.com/
   - Best for PNG & JPG compression
   - Can reduce 50-70% file size without visible quality loss

2. **Squoosh** - https://squoosh.app/
   - Google's image optimizer
   - Real-time preview
   - Advanced settings

3. **Compress JPEG** - https://compressjpeg.com/
   - Batch compression
   - Adjust quality slider

4. **Canva** - https://www.canva.com/
   - Resize + compress in one tool
   - Free templates

### **Desktop Tools:**

- **Photoshop**: Save for Web (Ctrl+Shift+Alt+S)
- **GIMP**: Export → Quality 85%
- **ImageOptim** (Mac): Drag & drop optimization

---

## 📐 Quick Size Reference Table

| Location | Filename | Dimensions | Ratio | Max Size |
|----------|----------|------------|-------|----------|
| Hero Slider | hero-X.jpg | 1920x1080 | 16:9 | 500 KB |
| **Quality Card** | **quality-driven.jpg** | **1200x800** | **3:2** | **300 KB** |
| **Cold Chain** | **cold-chain.jpg** | **800x800** | **1:1** | **200 KB** |
| **Custom Process** | **custom-processing.jpg** | **800x800** | **1:1** | **200 KB** |
| **Products Hero** | **hero-products.jpg** | **1920x600** | **16:5** | **400 KB** |
| Product Cards | product-X.jpg | 600x400 | 3:2 | 150 KB |
| Certifications | cert-X.png | 200x200 | 1:1 | 50 KB |

---

## 🎨 Image Style Guide

### **Brand Photography Style:**

✅ **DO:**
- Professional, clean, high-quality photos
- Natural lighting or professional studio lighting
- Focus on products/facilities
- Consistent color grading (cool/blue tones for seafood)
- High resolution (but optimized file size)
- Real company photos (not obvious stock photos)

❌ **DON'T:**
- Low resolution or pixelated images
- Over-filtered or over-saturated
- Text embedded in images
- Watermarks
- Inconsistent style across pages

---

## 🚀 Performance Tips

**Current Status:**
- Hero images: ~1920x1080 (good ✅)
- Using Unsplash CDN for Why cards (fast, but not branded)
- Products using Unsplash (fast, but generic)

**Recommendations:**
1. Replace Unsplash with your own photos untuk branding
2. Use WebP format untuk modern browsers (save 30% size)
3. Implement lazy loading (already done ✅)
4. Use CDN kalau traffic tinggi

---

## ✅ Checklist

Sebelum upload images:

- [ ] Resize ke dimensi yang benar
- [ ] Compress file size (< max recommended)
- [ ] Check aspect ratio correct
- [ ] Format JPG untuk photos, PNG untuk logos/transparency
- [ ] Test di website (check loading speed)
- [ ] Check mobile responsive display
- [ ] Backup original files

---

## 📞 Need Image Editing Help?

Kalau butuh bantuan resize/optimize images:
1. Kasih tau image apa yang mau diupdate
2. Share original image (via link)
3. Saya bisa kasih specific resize command

**Example using ImageMagick (if installed):**
```bash
# Resize hero image
convert input.jpg -resize 1920x1080^ -gravity center -extent 1920x1080 -quality 85 hero-products.jpg

# Resize bento card (square)
convert input.jpg -resize 800x800^ -gravity center -extent 800x800 -quality 85 cold-chain.jpg

# Resize bento card (large)
convert input.jpg -resize 1200x800^ -gravity center -extent 1200x800 -quality 85 quality-driven.jpg
```

---

**Quick Summary:**
- 🖼️ **Hero homepage**: 1920x1080px
- 🎯 **Quality card**: 1200x800px (large)
- ❄️ **Cold chain card**: 800x800px (square)
- 🔪 **Custom card**: 800x800px (square)
- 🐟 **Products hero**: 1920x600px (wide banner)

Upload foto kamu ke folder yang sesuai, terus update path di HTML! 🚀
