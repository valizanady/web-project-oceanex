# 🎬 Video Background Setup Guide

## 📁 File Location
Simpan video di folder:
```
/videos/ocean-hero.mp4
/videos/ocean-hero.webm (optional, untuk browser compatibility)
```

Simpan poster image di folder:
```
/images/about-hero-poster.jpg
```

---

## 📐 Spesifikasi Video

### Ukuran & Resolusi
| Aspect | Rekomendasi |
|--------|-------------|
| **Resolusi** | 1920x1080 (Full HD) atau 1280x720 (HD) |
| **Aspect Ratio** | 16:9 |
| **Durasi** | 10-30 detik (loop seamless) |
| **Frame Rate** | 24-30 fps |

### Format & Kompresi
| Format | Codec | File Size Target |
|--------|-------|------------------|
| **MP4** | H.264 | 5-15 MB |
| **WebM** | VP9 | 3-10 MB (optional) |

### Kualitas
- **Bitrate**: 3-5 Mbps untuk web
- **Kompresi**: Medium-High (untuk loading cepat)

---

## 🎨 Konten Video yang Cocok

### Tema Ocean/Seafood:
1. **Underwater ocean footage** - ikan berenang, terumbu karang
2. **Aerial ocean view** - drone shot laut biru
3. **Fishing boats** - kapal nelayan di laut
4. **Fish market/processing** - aktivitas di pasar ikan
5. **Ocean waves** - ombak yang tenang

### Sumber Video Gratis:
- [Pexels Videos](https://www.pexels.com/videos/)
- [Pixabay Videos](https://pixabay.com/videos/)
- [Coverr](https://coverr.co/)
- [Videezy](https://www.videezy.com/)

### Contoh Search Keywords:
- "ocean underwater"
- "fish swimming"
- "fishing boat"
- "sea waves"
- "marine life"

---

## 🛠️ Cara Kompresi Video

### Online Tools (Gratis):
1. **[FreeConvert](https://www.freeconvert.com/video-compressor)**
2. **[Clideo](https://clideo.com/compress-video)**
3. **[HandBrake](https://handbrake.fr/)** (Desktop app)

### Settings Rekomendasi di HandBrake:
```
Preset: Fast 1080p30
Video Codec: H.264 (x264)
Quality: RF 23-28 (lower = better quality, bigger file)
Audio: None (untuk background video, audio tidak perlu)
```

---

## 📝 Poster Image

Poster adalah gambar yang ditampilkan sebelum video loading.

### Spesifikasi:
- **Ukuran**: 1920x1080 px
- **Format**: JPG
- **File size**: < 200 KB
- **Konten**: Screenshot pertama dari video, atau gambar ocean yang mirip

### Cara Buat:
1. Ambil screenshot dari frame pertama video
2. Atau gunakan gambar ocean yang mirip
3. Simpan sebagai `about-hero-poster.jpg` di folder `/images/`

---

## ✅ Checklist Sebelum Upload

- [ ] Video durasi 10-30 detik
- [ ] File size < 15 MB
- [ ] Format MP4 (H.264)
- [ ] Resolusi 1920x1080 atau 1280x720
- [ ] Video loops seamlessly (akhir menyambung ke awal)
- [ ] Tidak ada audio (atau audio sudah di-mute)
- [ ] Poster image sudah disiapkan
- [ ] Test di mobile device

---

## 🔧 Troubleshooting

### Video tidak muncul?
1. Cek path file sudah benar: `videos/ocean-hero.mp4`
2. Cek format video (harus MP4 H.264)
3. Cek file size tidak terlalu besar

### Video lag/patah-patah?
1. Kompresi video lebih kecil (target 5-10 MB)
2. Kurangi resolusi ke 1280x720
3. Kurangi frame rate ke 24 fps

### Video tidak autoplay di mobile?
- Video harus `muted` untuk autoplay di mobile (sudah di-set)
- Tambahkan atribut `playsinline` (sudah ada)

---

## 📱 Mobile Optimization

Video sudah dioptimasi untuk mobile:
- `autoplay` - otomatis play
- `muted` - tanpa suara (required untuk autoplay)
- `loop` - berulang terus
- `playsinline` - play di dalam page (tidak fullscreen)
- Overlay gelap memastikan teks tetap terbaca

---

## 🎯 Quick Start

1. Download video ocean dari Pexels/Pixabay
2. Kompresi dengan HandBrake (target 5-10 MB)
3. Rename jadi `ocean-hero.mp4`
4. Simpan di folder `/videos/`
5. Buat poster image, simpan di `/images/about-hero-poster.jpg`
6. Refresh halaman About!

