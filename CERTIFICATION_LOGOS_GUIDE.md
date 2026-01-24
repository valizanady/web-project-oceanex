# 📜 Certification Logos Guide

## Lokasi File
Semua logo certification harus disimpan di folder:
```
images/certifications/
```

---

## 📋 Daftar Logo yang Dibutuhkan

| No | Nama File | Sertifikasi | Ukuran Rekomendasi |
|----|-----------|-------------|-------------------|
| 1 | `cert-haccp.png` | HACCP (Food Safety) | **200x200 px** atau **300x300 px** |
| 2 | `cert-halal.png` | Halal MUI | **200x200 px** atau **300x300 px** |
| 3 | `cert-brc.png` | BRC Food Safety | **200x200 px** atau **300x300 px** |
| 4 | `cert-iso14001.png` | ISO 14001 (Environmental) | **200x200 px** atau **300x300 px** |

---

## 🎨 Spesifikasi Gambar

### Format
- **PNG** (recommended - untuk background transparan)
- **JPG/JPEG** (jika tidak butuh transparansi)
- **SVG** (jika tersedia vector)

### Ukuran
- **Minimum**: 200x200 pixels
- **Recommended**: 300x300 pixels
- **Maximum**: 500x500 pixels

### Aspect Ratio
- **1:1 (Square)** - Paling ideal
- Logo dengan rasio berbeda tetap bisa dipakai, akan di-fit otomatis

### Background
- **Transparan** (PNG) - Paling bagus
- **Putih** - Bisa juga

### Resolusi
- **72 DPI** - Web standard
- **150 DPI** - Untuk tampilan lebih tajam di retina display

---

## 📂 Cara Menambahkan Logo

### Langkah 1: Siapkan File
1. Download/export logo certification resmi
2. Resize ke ukuran 200x200 atau 300x300 px
3. Pastikan background transparan (PNG)

### Langkah 2: Rename File
Rename file sesuai nama yang ditentukan:
```
Logo HACCP     → cert-haccp.png
Logo Halal     → cert-halal.png  
Logo BRC Food  → cert-brc.png
Logo ISO 14001 → cert-iso14001.png
```

### Langkah 3: Upload ke Folder
Copy file ke folder:
```
images/certifications/
```

### Langkah 4: Test
Buka website untuk memastikan logo tampil dengan benar di:
- ✅ Homepage (Trust Bar Section)
- ✅ About Page (Certifications Section)

---

## 🖼️ Tampilan di Website

### Homepage (index.html) - Trust Bar
- Logo ditampilkan dengan ukuran: **60x60 px**
- Background: Gold (#EBC042)
- Posisi: Setelah Hero Section

### About Page (about.html) - Certifications Grid
- Logo ditampilkan dengan ukuran: **80x80 px** (dalam box 100x100 px)
- Background: Putih dengan border
- Posisi: Section "Our Certifications"

---

## ⚠️ Catatan Penting

1. **Jangan ubah nama file** - Nama file sudah di-hardcode di HTML
2. **Gunakan logo resmi** - Pastikan logo certification yang dipakai adalah logo resmi/official
3. **Kualitas gambar** - Hindari logo yang blur atau pixelated
4. **File size** - Usahakan dibawah 100KB per file untuk loading cepat

---

## 🔧 Troubleshooting

### Logo tidak muncul?
- Cek nama file sudah benar (case-sensitive)
- Pastikan file ada di folder `images/certifications/`
- Refresh browser dengan Ctrl+F5 (Windows) atau Cmd+Shift+R (Mac)

### Logo terlihat blur?
- Gunakan ukuran gambar minimal 200x200 px
- Export dari source vector jika memungkinkan

### Logo terlalu besar/kecil?
- Ukuran akan auto-fit, tapi pastikan aspek ratio 1:1 untuk hasil terbaik

---

## ✅ Checklist Sebelum Go-Live

- [ ] cert-haccp.png sudah ada
- [ ] cert-halal.png sudah ada
- [ ] cert-brc.png sudah ada
- [ ] cert-iso14001.png sudah ada
- [ ] Semua logo tampil di Homepage
- [ ] Semua logo tampil di About Page
- [ ] Tidak ada broken image
