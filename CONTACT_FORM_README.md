# 📧 Contact Form - Quick Setup

## ✅ Files Created

1. **`send-email.php`** - PHP script untuk kirim email via Gmail SMTP
2. **`index.html`** - Form sudah terintegrasi (updated)
3. **`SMTP_SETUP_GUIDE.md`** - Panduan lengkap step-by-step
4. **`.htaccess`** - Security & optimization

---

## 🚀 Quick Start (3 Steps)

### **Step 1: Buat App Password Gmail**
1. Buka: https://myaccount.google.com/security
2. Aktifkan **2-Step Verification** (kalau belum)
3. Klik **App Passwords** → Generate untuk "Mail"
4. Copy password 16 digit (contoh: `abcdefghijklmnop`)

### **Step 2: Edit `send-email.php`**
```php
// Line 20-30, ganti dengan data kamu:
$smtp_config = [
    'username' => 'your-email@gmail.com',     // Gmail kamu
    'password' => 'your-16-digit-app-pass',   // App Password dari Step 1
    'to_email' => 'your-email@gmail.com',     // Email tujuan
];
```

### **Step 3: Upload ke Hosting**
- Upload semua file ke hosting PHP
- Test form di website
- Check email masuk!

---

## 📖 Detailed Guides

- **SMTP Setup**: Baca `SMTP_SETUP_GUIDE.md` (full tutorial)
- **EmailJS Alternative**: Baca `EMAIL_SETUP_GUIDE.md` (no backend)

---

## 🆘 Troubleshooting

**Email tidak kirim?**
1. Check App Password sudah benar (16 digit, no space)
2. Check 2FA Gmail aktif
3. Buka Console browser (F12) → lihat error
4. Baca `SMTP_SETUP_GUIDE.md` section Troubleshooting

**Butuh hosting?**
- Niagahoster: https://www.niagahoster.co.id/ (~Rp 10rb/bln)
- Hostinger: https://www.hostinger.co.id/ (~Rp 15rb/bln)

---

## 🔐 Security

- ⚠️ **JANGAN** commit App Password ke GitHub
- ✅ Add `send-email.php` ke `.gitignore`
- ✅ File `.htaccess` sudah protect sensitive files

---

Need help? Check full guide in `SMTP_SETUP_GUIDE.md`! 🚀
