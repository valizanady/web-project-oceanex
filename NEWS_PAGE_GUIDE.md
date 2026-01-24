# News Page Image Guide

## Hero Section Background (Optional)
Jika ingin menambahkan background image pada hero section:

| Property | Value |
|----------|-------|
| **File Name** | `news-hero.jpg` |
| **Location** | `images/news-hero.jpg` |
| **Size** | 1920 x 800 px |
| **Format** | JPG atau WebP |
| **Max File Size** | 500KB |

### Cara Menambahkan Background Image:
Edit file `news.html`, cari bagian `.news-hero` di dalam `<style>` tag, lalu tambahkan:

```css
.news-hero {
    background: linear-gradient(135deg, rgba(6, 35, 81, 0.9) 0%, rgba(10, 72, 117, 0.9) 100%),
                url('images/news-hero.jpg');
    background-size: cover;
    background-position: center;
    /* ... existing styles ... */
}
```

---

## News Card Images

### Featured News Card
| Property | Value |
|----------|-------|
| **Size** | 800 x 600 px |
| **Aspect Ratio** | 4:3 |
| **Format** | JPG atau WebP |
| **Max File Size** | 200KB |

### Regular News Card
| Property | Value |
|----------|-------|
| **Size** | 600 x 400 px |
| **Aspect Ratio** | 3:2 |
| **Format** | JPG atau WebP |
| **Max File Size** | 150KB |

---

## News Detail Page Images

### Featured Article Image
| Property | Value |
|----------|-------|
| **Size** | 1200 x 600 px |
| **Aspect Ratio** | 2:1 |
| **Format** | JPG atau WebP |
| **Max File Size** | 300KB |

### In-Article Images
| Property | Value |
|----------|-------|
| **Size** | 1000 x 600 px |
| **Format** | JPG atau WebP |
| **Max File Size** | 200KB |

### Author Avatar
| Property | Value |
|----------|-------|
| **Size** | 200 x 200 px |
| **Aspect Ratio** | 1:1 (Square) |
| **Format** | JPG atau PNG |
| **Max File Size** | 50KB |

---

## Hero Content

### Hero Title
**Current:** "News & Insights"

Untuk mengubah, edit di `news.html`:
```html
<h1 class="animate-on-scroll">News & Insights</h1>
```

### Hero Subtitle
**Current:** "Stay informed with the latest updates, industry trends, and announcements from Oceanex Marine Industries."

Untuk mengubah, edit di `news.html`:
```html
<p class="animate-on-scroll">Stay informed with the latest updates...</p>
```

---

## Recommended Image Sources
- [Unsplash](https://unsplash.com) - Free high-quality photos
- [Pexels](https://pexels.com) - Free stock photos
- Foto sendiri dengan kualitas tinggi

## Image Optimization Tips
1. Gunakan format WebP untuk file size lebih kecil
2. Compress images menggunakan [TinyPNG](https://tinypng.com) atau [Squoosh](https://squoosh.app)
3. Pastikan resolusi sesuai spesifikasi di atas
