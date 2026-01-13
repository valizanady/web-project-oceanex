# Panduan Menggunakan Enhanced Footer

## 📋 Overview

Footer baru telah dibuat dengan desain yang lebih modern dan lengkap, mirip dengan contoh React component yang Anda berikan. Footer ini dapat digunakan di semua halaman website.

## 🎨 Fitur Footer

Footer yang baru memiliki:
- **Logo dan Deskripsi**: Branding perusahaan dengan deskripsi singkat
- **Social Media Links**: Facebook, Instagram, Twitter, LinkedIn
- **Quick Links**: Navigasi cepat ke halaman utama
- **Services**: Daftar layanan yang ditawarkan
- **Contact Info**: Alamat, telepon, dan email
- **Business Hours**: Jam operasional
- **Badges**: Sertifikasi dan penghargaan
- **Bottom Bar**: Copyright dan links kebijakan
- **Decorative Wave**: Efek visual di bagian bawah

## 📁 File yang Sudah Dibuat

1. **includes/footer.html** - Template footer yang bisa di-copy paste
2. **CSS sudah ditambahkan** di `css/templatemo-tiya-golf-club.css`

## 🚀 Cara Menggunakan

### Metode 1: Copy-Paste (Recommended)

1. Buka file `includes/footer.html`
2. Copy seluruh kode footer
3. Ganti footer lama di halaman HTML Anda dengan footer baru

**Contoh:**
```html
<!-- Ganti footer lama -->
<footer class="site-footer">
    ...
</footer>

<!-- Dengan footer baru -->
<footer class="enhanced-footer">
    ...
</footer>
```

### Metode 2: PHP Include (Jika menggunakan PHP)

Jika website Anda menggunakan PHP, Anda bisa include footer:

```php
<?php include 'includes/footer.html'; ?>
```

### Metode 3: JavaScript Include

Anda bisa menggunakan JavaScript untuk load footer:

```html
<div id="footer-placeholder"></div>

<script>
fetch('includes/footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer-placeholder').innerHTML = data;
    });
</script>
```

## ✏️ Kustomisasi

### Mengubah Informasi Kontak

Edit bagian ini di footer:

```html
<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
    <h5 class="footer-title">Contact Us</h5>
    <ul class="footer-contact">
        <li>
            <i class="bi bi-geo-alt-fill"></i>
            <span>Alamat Anda Di Sini</span>
        </li>
        <li>
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:+6212345">+62 123 456</a>
        </li>
        <li>
            <i class="bi bi-envelope-fill"></i>
            <a href="mailto:email@anda.com">email@anda.com</a>
        </li>
    </ul>
</div>
```

### Mengubah Social Media Links

```html
<div class="social-links">
    <a href="https://facebook.com/yourpage" class="social-link">
        <i class="bi bi-facebook"></i>
    </a>
    <a href="https://instagram.com/yourpage" class="social-link">
        <i class="bi bi-instagram"></i>
    </a>
    <!-- Tambah social media lain -->
</div>
```

### Mengubah Jam Operasional

```html
<ul class="footer-hours">
    <li>
        <span class="day">Senin - Jumat</span>
        <span class="time">08:00 - 17:00</span>
    </li>
    <li>
        <span class="day">Sabtu - Minggu</span>
        <span class="time">09:00 - 15:00</span>
    </li>
</ul>
```

### Mengubah Warna

Edit di file `css/templatemo-tiya-golf-club.css`:

```css
.enhanced-footer {
  /* Ubah warna background */
  background: linear-gradient(135deg, #WARNA1 0%, #WARNA2 100%);
}

.enhanced-footer .social-link {
  /* Ubah warna tombol social media */
  background: #WARNA_BARU;
}
```

## 🎨 Warna yang Digunakan

- **Primary Background**: `#2F3F7B` → `#3D405B` (gradient)
- **Accent Color**: `#EBC042` (kuning/gold)
- **Text Color**: `#91ABDA` (biru muda)
- **Wave Color**: `#81B29A` (hijau)

## 📱 Responsive Design

Footer sudah responsive dan akan menyesuaikan di:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (<768px)

## 🔍 Halaman yang Sudah Diupdate

✅ `event-listing.html` - Sudah menggunakan footer baru

## 📝 To-Do

Untuk mengaplikasikan ke semua halaman, ganti footer di file-file berikut:
- [ ] `index.html`
- [ ] `event-detail.html`
- [ ] Halaman lain yang Anda miliki

## 💡 Tips

1. **Konsistensi**: Gunakan footer yang sama di semua halaman
2. **Update Informasi**: Pastikan info kontak, social media, dan jam operasional selalu akurat
3. **Test Responsive**: Cek tampilan di berbagai ukuran layar
4. **Link Aktif**: Pastikan semua link berfungsi dengan benar

## 🆘 Troubleshooting

### Footer tidak muncul dengan benar
- Pastikan file CSS `templatemo-tiya-golf-club.css` sudah ter-load
- Cek apakah Bootstrap Icons CSS sudah ter-load

### Styling tidak sesuai
- Clear cache browser (Ctrl/Cmd + Shift + R)
- Pastikan tidak ada CSS lain yang override

### Icon tidak muncul
- Pastikan file `bootstrap-icons.css` ada di folder `css/`
- Pastikan font files ada di folder `fonts/`

## 📞 Support

Jika ada pertanyaan atau masalah, silakan buat issue atau hubungi tim development.

---

**Created**: December 2025
**Version**: 1.0
