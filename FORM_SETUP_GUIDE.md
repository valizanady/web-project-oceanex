# 📧 Panduan Setup Form Contact - Oceanex (cPanel)

Form inquiry di website sudah siap untuk cPanel hosting!

---

## 🚀 Setup untuk cPanel (PHP mail)

Form sudah dikonfigurasi menggunakan PHP `mail()` function yang tersedia di semua cPanel hosting.

### Langkah 1: Upload Files ke cPanel

1. Login ke **cPanel** hosting kamu
2. Buka **File Manager**
3. Navigasi ke folder `public_html` (atau document root website)
4. Upload semua file website termasuk **`send-email.php`**

### Langkah 2: Cek Konfigurasi Email (Opsional)

Buka file `send-email.php`, pastikan konfigurasi sudah benar:

```php
$config = [
    'to_email'   => 'info@oceanexmarine.com',   // Email penerima inquiry
    'to_name'    => 'Oceanex Marine Team',
    'from_email' => 'noreply@oceanexmarine.com', // Email pengirim (domain sama)
    'from_name'  => 'Oceanex Website'
];
```

⚠️ **Penting**: `from_email` harus menggunakan domain yang sama dengan website (oceanexmarine.com) agar email tidak masuk spam.

### Langkah 3: Buat Email Account di cPanel (Recommended)

1. Di cPanel, buka **Email Accounts**
2. Buat email `noreply@oceanexmarine.com` (untuk "From" address)
3. Buat email `info@oceanexmarine.com` (untuk penerima inquiry) - jika belum ada

### Langkah 4: Test Form

1. Buka website di browser
2. Isi form contact lengkap
3. Klik Submit
4. Cek email `info@oceanexmarine.com` - email dari form seharusnya masuk!

---

## ✅ Fitur Form

- **Spam Protection**: Honeypot field untuk block bot
- **Loading State**: Tombol berubah saat mengirim
- **Success Message**: Konfirmasi hijau setelah berhasil
- **Error Fallback**: Jika gagal, ada link mailto dan WhatsApp sebagai backup
- **Responsive**: Berfungsi di desktop dan mobile
- **HTML Email**: Email yang dikirim formatnya bagus dan profesional

---

## 📋 Data yang Diterima

Setiap submission akan mengirim:
- Nama pengirim
- Email pengirim  
- Nomor WhatsApp/Phone (jika diisi)
- Jenis Inquiry (Product, Bulk Order, Sample, Partnership, General)
- Pesan tambahan
- Tombol quick-reply ke email dan WhatsApp

---

## 🆘 Troubleshooting

### Form tidak terkirim?
- Cek Console browser (F12 → Console) untuk error
- Pastikan file `send-email.php` sudah di-upload ke hosting
- Pastikan domain dan URL sudah benar

### Email tidak masuk?
- Cek folder **Spam/Junk** di inbox
- Pastikan `from_email` menggunakan domain yang sama (bukan Gmail/Yahoo)
- Cek di cPanel → Email Deliverability untuk masalah DNS (SPF, DKIM)
- Tunggu beberapa menit (kadang delay)

### Error 500 Internal Server Error?
- Cek error log di cPanel → Error Log
- Pastikan PHP version minimal 7.4

### Email masuk Spam?
- Pastikan sudah setup **SPF record** dan **DKIM** di cPanel
- Gunakan `from_email` dengan domain yang sama
- Buka cPanel → Email Deliverability dan follow recommendations

---

## 📞 Kontak Support

Jika ada masalah teknis hosting:
- Hubungi support cPanel/hosting provider
- Email: info@oceanexmarine.com
