# 📧 GMAIL SMTP SETUP GUIDE - App Password Method

## ✅ Apa yang Sudah Di-Setup

✅ File `send-email.php` - PHP script untuk kirim email via Gmail SMTP  
✅ File `index.html` - Form sudah terintegrasi dengan PHP  
✅ HTML Email Template yang bagus & responsive

---

## 🔐 STEP 1: Buat App Password Gmail (PENTING!)

Google tidak allow pakai password Gmail langsung lagi. Kamu harus bikin **App Password** (16 karakter).

### **Cara Buat App Password:**

1. **Login ke Gmail** kamu
2. Buka: **https://myaccount.google.com/security**
3. Cari section **"How you sign in to Google"**
4. Klik **"2-Step Verification"**
   - ⚠️ **PENTING**: 2FA harus aktif dulu! Kalau belum aktif, aktifkan dulu.
   - Follow steps untuk verifikasi (pakai phone number)
5. Setelah 2FA aktif, balik ke: **https://myaccount.google.com/security**
6. Klik **"App passwords"** (ada di section 2-Step Verification)
7. Mungkin diminta login lagi → Login
8. Di halaman App Passwords:
   - **Select app**: pilih "Mail"
   - **Select device**: pilih "Other (Custom name)"
   - Ketik: "Oceanex Website"
9. Klik **Generate**
10. **PENTING**: Copy **16-digit password** yang muncul
    - Contoh: `abcd efgh ijkl mnop`
    - **Simpan di notepad!** Password ini cuma muncul sekali!

---

## 🛠️ STEP 2: Edit File `send-email.php`

Buka file: `/Users/valizanadya/Downloads/templatemo_587_tiya_golf_club/send-email.php`

**Cari section ini** (sekitar line 20-30):

```php
$smtp_config = [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'your-email@gmail.com',        // Ganti dengan Gmail kamu
    'password' => 'your-app-password-here',      // Ganti dengan App Password (16 karakter)
    'from_email' => 'your-email@gmail.com',      // Email pengirim
    'from_name' => 'Oceanex Website',
    'to_email' => 'your-email@gmail.com',        // Email tujuan (penerima)
    'to_name' => 'Oceanex Team'
];
```

**Ganti dengan data kamu:**

```php
$smtp_config = [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'oceanex@gmail.com',           // Gmail kamu yang udah setup App Password
    'password' => 'abcdefghijklmnop',            // App Password 16 digit (tanpa spasi!)
    'from_email' => 'oceanex@gmail.com',         // Email pengirim (sama dengan username)
    'from_name' => 'Oceanex Website',
    'to_email' => 'oceanex@gmail.com',           // Email tujuan - bisa sama atau beda
    'to_name' => 'Oceanex Team'
];
```

⚠️ **PENTING**:
- `username` dan `from_email` **harus sama**
- `password` isi dengan App Password 16 digit **tanpa spasi**
- `to_email` bisa sama dengan `from_email` (kalau mau terima di email yang sama)

**Save file!**

---

## 🌐 STEP 3: Upload ke Server PHP

Website kamu **butuh server dengan PHP** untuk bisa jalan. Ada beberapa opsi:

### **Option A: Hosting Berbayar** (Recommended)
- Niagahoster (Rp 10rb/bulan)
- Hostinger (Rp 15rb/bulan)
- Rumahweb
- DomaiNesia

**Upload via FTP/cPanel:**
1. Login ke cPanel hosting
2. Buka **File Manager**
3. Upload semua file website ke folder `public_html/`
4. Pastikan `send-email.php` ada di root folder
5. Done!

### **Option B: Testing di Localhost (XAMPP/MAMP)**

Kalau mau test dulu di komputer:

**macOS - MAMP:**
1. Download MAMP: https://www.mamp.info/
2. Install MAMP
3. Jalankan MAMP → Start Servers
4. Copy folder website ke: `/Applications/MAMP/htdocs/oceanex/`
5. Buka browser: `http://localhost:8888/oceanex/`

**Windows - XAMPP:**
1. Download XAMPP: https://www.apachefriends.org/
2. Install XAMPP
3. Jalankan XAMPP → Start Apache
4. Copy folder website ke: `C:\xampp\htdocs\oceanex\`
5. Buka browser: `http://localhost/oceanex/`

### **Option C: Free Hosting (Limited)**
- InfinityFree (gratis, tapi lambat)
- 000webhost (gratis, ada ads)

---

## 🧪 STEP 4: TESTING

1. Buka website: `http://your-domain.com/` atau `http://localhost:8888/oceanex/`
2. Scroll ke section **Contact Us**
3. Isi form:
   - **Inquiry Type**: pilih "Product & Pricing Information"
   - **Name**: Nama Test
   - **Email**: emailtest@gmail.com
   - **Phone**: +62 812 3456 7890
   - **Message**: "This is a test message"
4. Klik **Send Message**
5. Tunggu 3-5 detik
6. Harus muncul notifikasi hijau: **"✓ Message sent successfully!"**

### **Check Email:**
1. Buka Gmail yang kamu setting di `to_email`
2. Harusnya ada email baru masuk dari **Oceanex Website**
3. Subject: "New Inquiry from Nama Test - Product & Pricing Information"

---

## 📨 Contoh Email yang Diterima

Email yang masuk akan terlihat seperti ini:

**Subject:**
```
New Inquiry from John Doe - Bulk Order / Wholesale
```

**Body:**
```
🔔 New Contact Form Submission
Oceanex Marine Industries Website

━━━━━━━━━━━━━━━━━━━━━━━━━━━
📋 Inquiry Type: Bulk Order / Wholesale
👤 Customer Name: John Doe
📧 Email Address: john@company.com
📱 WhatsApp / Phone: +62 812 3456 7890

━━━━━━━━━━━━━━━━━━━━━━━━━━━
💬 Message:
Hi, we're interested in ordering 500kg of Atlantic Salmon 
for delivery to Singapore. Please send quotation.

━━━━━━━━━━━━━━━━━━━━━━━━━━━

Reply directly to the customer at: john@company.com

Sent via Oceanex Website Contact Form
```

Kamu tinggal klik **Reply** untuk jawab customer!

---

## 🔧 TROUBLESHOOTING

### ❌ Error: "Failed to connect to SMTP server"

**Solusi:**
1. Check internet connection server
2. Pastikan port 587 tidak diblock firewall
3. Coba ganti port 465 di `send-email.php`:
   ```php
   'port' => 465,
   ```

### ❌ Error: "SMTP Authentication failed"

**Solusi:**
1. ✅ **Pastikan 2FA Gmail aktif**
2. ✅ **Generate App Password lagi** (yang baru)
3. ✅ Copy App Password **tanpa spasi**: `abcdefghijklmnop`
4. ✅ Check `username` dan `password` di `send-email.php` sudah benar
5. ✅ Pastikan `username` = email yang punya App Password

### ❌ Error: "Call to undefined function fsockopen()"

**Solusi:**
- PHP function `fsockopen` disabled di hosting
- Hubungi hosting support minta enable `fsockopen`
- Atau pakai alternative: PHPMailer library (saya bisa buatkan)

### ❌ Email masuk ke Spam

**Solusi:**
1. Tandai email sebagai "Not Spam"
2. Tambahkan sender ke Contacts
3. Di hosting, setup SPF record (minta bantuan support hosting)

### ❌ Button loading terus, email ga kirim

**Solusi:**
1. Buka **Developer Console** browser (tekan F12)
2. Tab **Console** - lihat error message
3. Tab **Network** - cek response dari `send-email.php`
4. Kalau ada error 500 → check `send-email.php` syntax
5. Kalau ada error 403 → check CORS / server permissions

---

## 🔐 SECURITY TIPS

### ⚠️ **JANGAN** Commit Password ke GitHub!

Kalau push ke GitHub, **JANGAN** include App Password di file!

**Cara aman:**

1. Buat file `.gitignore` di root folder:
```
send-email.php
config.php
```

2. Atau buat file `config.php` terpisah untuk password:
```php
<?php
return [
    'smtp_username' => 'oceanex@gmail.com',
    'smtp_password' => 'abcdefghijklmnop',
    'to_email' => 'oceanex@gmail.com'
];
```

3. Di `send-email.php` load config:
```php
$config = require 'config.php';
$smtp_config['username'] = $config['smtp_username'];
```

### 🔒 Tambahan Security (Optional):

Di `send-email.php`, tambahkan rate limiting:
```php
// Check IP rate limit (max 5 email per hour per IP)
session_start();
if (!isset($_SESSION['email_count'])) {
    $_SESSION['email_count'] = 0;
    $_SESSION['email_time'] = time();
}

if (time() - $_SESSION['email_time'] > 3600) {
    $_SESSION['email_count'] = 0;
    $_SESSION['email_time'] = time();
}

if ($_SESSION['email_count'] >= 5) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Too many requests']);
    exit();
}

$_SESSION['email_count']++;
```

---

## 📊 Monitoring

### Log Emails (Optional)

Tambahkan di `send-email.php` setelah sukses kirim:

```php
// Log successful emails
$log_entry = date('[Y-m-d H:i:s]') . " Email sent from: $from_name <$reply_to>\n";
file_put_contents('email-log.txt', $log_entry, FILE_APPEND);
```

File `email-log.txt` akan record semua email yang terkirim.

---

## 🆚 SMTP vs EmailJS - Mana yang Lebih Baik?

| Feature | **SMTP PHP** | **EmailJS** |
|---------|-------------|-------------|
| Setup | ⚠️ Medium (butuh hosting) | ✅ Easy (no backend) |
| Cost | 💰 Hosting ~Rp 10-50rb/bln | 🆓 Free 200 email/bln |
| Control | ✅ Full control | ⚠️ Limited customization |
| Security | ✅ Password di server | ⚠️ Public key exposed |
| Email Limit | ✅ Unlimited | ⚠️ 200/month (free) |
| Reliability | ✅ High (depends on hosting) | ✅ High |
| Speed | ✅ Fast | ✅ Fast |

**Recommendation:**
- Kalau **sudah punya hosting PHP** → pakai **SMTP**
- Kalau **belum ada hosting** / mau cepat → pakai **EmailJS** (lebih simple)

---

## 📞 Alternative: PHPMailer (Lebih Robust)

Kalau mau yang lebih advanced & reliable, bisa pakai library PHPMailer.

Kasih tau kalau mau, saya buatkan versi PHPMailer (lebih mudah handle error & support banyak SMTP provider).

---

## ✅ CHECKLIST

Setup selesai kalau semua ini sudah ✅:

- [ ] 2FA Gmail aktif
- [ ] App Password 16 digit sudah di-generate
- [ ] File `send-email.php` sudah diisi username, password, to_email
- [ ] Website sudah di-upload ke hosting PHP
- [ ] Test kirim form → email masuk ✅
- [ ] Email tidak masuk ke spam

---

## 🆘 NEED HELP?

Kalau ada error:
1. Screenshot error message (console browser)
2. Screenshot response dari `send-email.php` (network tab)
3. Kasih tau hosting provider yang kamu pakai

Saya bisa bantu debug!

---

**Good luck! 🚀**

Kalau butuh alternatif lain atau PHPMailer version, let me know!
