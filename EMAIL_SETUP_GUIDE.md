# 📧 EMAIL FORM SETUP GUIDE - Oceanex Website

## ✅ Apa yang Sudah Di-Setup

Form contact di homepage (`index.html`) sudah terintegrasi dengan **EmailJS** - service gratis untuk mengirim email dari website static tanpa perlu backend/server PHP.

---

## 🚀 STEP-BY-STEP SETUP (5-10 Menit)

### **STEP 1: Daftar EmailJS (Gratis)**

1. Buka: **https://www.emailjs.com/**
2. Klik **Sign Up** 
3. Daftar menggunakan:
   - Google Account (paling cepat), atau
   - Email biasa
4. Verifikasi email kamu
5. **Plan gratis**: 200 email/bulan (cukup untuk website B2B)

---

### **STEP 2: Connect Email Service**

Setelah login ke EmailJS dashboard:

1. Klik **Email Services** di sidebar kiri
2. Klik tombol **Add New Service**
3. Pilih provider email kamu:
   - **Gmail** (paling populer) ✅
   - Outlook
   - Yahoo
   - Custom SMTP
4. Klik **Connect Account**
5. Login dengan akun Gmail yang mau menerima email
6. Allow permissions
7. **PENTING**: Copy **Service ID** yang muncul
   - Contoh: `service_abc123xyz`
   - Simpan di notepad

---

### **STEP 3: Buat Email Template**

1. Klik **Email Templates** di sidebar
2. Klik **Create New Template**
3. Isi form template:

#### **Template Settings:**
- **Template Name**: `Oceanex Contact Form`

#### **Email Subject:**
```
New Inquiry from {{from_name}} - {{inquiry_type}}
```

#### **Email Content (Body):**
```
Hi Oceanex Team,

You have received a new inquiry from your website contact form:

━━━━━━━━━━━━━━━━━━━━━━━━━━━
CONTACT DETAILS
━━━━━━━━━━━━━━━━━━━━━━━━━━━

Name: {{from_name}}
Email: {{reply_to}}
Phone/WhatsApp: {{phone}}
Inquiry Type: {{inquiry_type}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━
MESSAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━

{{message}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━

Reply to this customer directly at: {{reply_to}}

---
Sent via Oceanex Website Contact Form
```

#### **From Settings:**
- **From Name**: `Oceanex Website`
- **From Email**: (akan otomatis diisi EmailJS)
- **Reply To**: `{{reply_to}}` (email customer)

4. Klik **Save**
5. **PENTING**: Copy **Template ID** 
   - Contoh: `template_xyz789abc`
   - Simpan di notepad

---

### **STEP 4: Get Public Key**

1. Klik **Account** di sidebar
2. Scroll ke section **API Keys**
3. **PENTING**: Copy **Public Key**
   - Contoh: `abcd1234EFGH5678wxyz`
   - Simpan di notepad

---

### **STEP 5: Update Website Code**

Buka file: `/Users/valizanadya/Downloads/templatemo_587_tiya_golf_club/index.html`

Cari baris ini (sekitar line 1545-1550):

```javascript
const EMAILJS_CONFIG = {
    publicKey: 'YOUR_PUBLIC_KEY',        // Ganti dengan Public Key dari EmailJS
    serviceID: 'YOUR_SERVICE_ID',        // Ganti dengan Service ID
    templateID: 'YOUR_TEMPLATE_ID'       // Ganti dengan Template ID
};
```

**Ganti dengan data kamu:**

```javascript
const EMAILJS_CONFIG = {
    publicKey: 'abcd1234EFGH5678wxyz',           // Dari Step 4
    serviceID: 'service_abc123xyz',              // Dari Step 2
    templateID: 'template_xyz789abc'             // Dari Step 3
};
```

**Save file!**

---

## 🎯 TESTING

1. Buka website: `http://localhost:8080/index.html`
2. Scroll ke section **Contact Us**
3. Isi form:
   - Inquiry Type: pilih salah satu
   - Name: nama kamu
   - Email: email kamu (untuk test)
   - Phone: nomor WhatsApp (opsional)
   - Message: tulis pesan test
4. Klik **Send Message**
5. Tunggu beberapa detik
6. Harus muncul notifikasi hijau: "✓ Message sent successfully!"
7. **Check email** yang kamu connect di Step 2 - harusnya ada email masuk!

---

## 📨 Hasil yang Kamu Terima

Setiap kali ada yang isi form, kamu akan terima email seperti ini:

**Subject:**
```
New Inquiry from John Doe - Bulk Order / Wholesale
```

**Body:**
```
Hi Oceanex Team,

You have received a new inquiry from your website contact form:

━━━━━━━━━━━━━━━━━━━━━━━━━━━
CONTACT DETAILS
━━━━━━━━━━━━━━━━━━━━━━━━━━━

Name: John Doe
Email: john@company.com
Phone/WhatsApp: +62 812 3456 7890
Inquiry Type: bulk-order

━━━━━━━━━━━━━━━━━━━━━━━━━━━
MESSAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━

Hi, we're interested in ordering 500kg of Atlantic Salmon 
for delivery to Singapore. Please send quotation.

━━━━━━━━━━━━━━━━━━━━━━━━━━━

Reply to this customer directly at: john@company.com

---
Sent via Oceanex Website Contact Form
```

Kamu bisa langsung reply email tersebut untuk jawab customer!

---

## 🔧 TROUBLESHOOTING

### ❌ "Failed to send message" muncul

**Solusi:**
1. Check koneksi internet
2. Pastikan 3 ID (Public Key, Service ID, Template ID) sudah benar
3. Buka Console browser (F12 → Console) - lihat error messagenya
4. Pastikan EmailJS service status aktif (check di dashboard)

### ❌ Email tidak masuk

**Solusi:**
1. Check **Spam folder** di Gmail
2. Check quota EmailJS (max 200 email/bulan di free plan)
3. Pastikan email yang di-connect di EmailJS bener
4. Test kirim email manual dari EmailJS dashboard

### ❌ Form tidak submit / button loading terus

**Solusi:**
1. Buka Console browser (F12 → Console)
2. Lihat error message
3. Pastikan semua field required sudah diisi
4. Clear browser cache dan refresh

---

## 🎨 CUSTOMIZATION

### Ganti Email Tujuan

Di EmailJS Dashboard → **Email Services** → klik service kamu → bisa ganti/tambah email tujuan.

### Ganti Template Email

Di EmailJS Dashboard → **Email Templates** → edit template → save.

### Auto-Reply ke Customer

Buat template kedua untuk kirim auto-reply ke customer:
1. **Email Templates** → Create New
2. Template untuk customer:
   - Subject: `Thank you for contacting Oceanex Marine Industries`
   - Body: Ucapan terima kasih + info response time
3. Update code untuk kirim 2 email (ke kamu + ke customer)

---

## 💰 PRICING

| Plan | Email/Month | Price |
|------|-------------|-------|
| **Free** | 200 | $0 |
| Personal | 1,000 | $9/month |
| Professional | 10,000 | $39/month |

Untuk website B2B biasanya free plan **cukup banget**.

---

## 🔐 SECURITY

✅ **Aman**:
- Public Key boleh di-expose di frontend (by design)
- EmailJS punya rate limiting
- Form validation di browser
- No sensitive data exposed

⚠️ **Jangan**:
- Jangan share Private Key kalau ada
- Jangan hardcode password di code

---

## 📞 ALTERNATIVE OPTIONS

Jika butuh fitur lebih advanced:

### **Option 2: FormSubmit.co** (Simple, no config)
```html
<form action="https://formsubmit.co/your@email.com" method="POST">
    <!-- form fields -->
</form>
```
- Paling simple
- Redirect based
- Gratis unlimited

### **Option 3: Formspree.io**
- Mirip EmailJS
- 50 submissions/month (free)

### **Option 4: Custom Backend (PHP/Node.js)**
- Butuh hosting dengan PHP/Node.js
- Full control
- Lebih kompleks

---

## ✨ FITUR YANG SUDAH ADA

✅ Form validation (required fields)  
✅ Loading state saat kirim email  
✅ Success/error notification animation  
✅ Auto reset form setelah sukses  
✅ Responsive design  
✅ Multi-language support ready  

---

## 📝 SUMMARY

**Yang perlu kamu lakukan:**

1. ✅ Daftar EmailJS (5 menit)
2. ✅ Connect Gmail (2 menit)
3. ✅ Buat email template (3 menit)
4. ✅ Copy 3 ID ke `index.html` (1 menit)
5. ✅ Test form (1 menit)

**Total waktu: ~10-15 menit**

---

## 🆘 NEED HELP?

Kalau ada error atau bingung:
1. Screenshot error message (console browser)
2. Kasih tau step mana yang stuck
3. Check dokumentasi EmailJS: https://www.emailjs.com/docs/

---

**Good luck! 🚀**
