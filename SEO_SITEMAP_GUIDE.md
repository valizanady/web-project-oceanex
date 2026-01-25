# SEO & Sitemap Setup Guide
## Oceanex Marine Industries

**Last Updated:** January 25, 2026  
**Status:** ✅ Ready for Google Search Console

---

## 📋 **Files Created:**

### ✅ **1. sitemap.xml**
- **Location:** `/sitemap.xml`
- **URL:** `https://oceanexmarine.com/sitemap.xml`
- **Purpose:** Membantu Google menemukan dan mengindex semua halaman website

### ✅ **2. robots.txt**
- **Location:** `/robots.txt`
- **URL:** `https://oceanexmarine.com/robots.txt`
- **Purpose:** Memberi instruksi ke search engine tentang halaman mana yang boleh di-crawl

### ✅ **3. SEO Meta Tags**
- **Added to:** `index.html`
- **Includes:** Description, keywords, Open Graph, Twitter Cards, canonical URL

---

## 🔍 **Sitemap Content:**

### **Pages Included in Sitemap:**

| Page | URL | Priority | Change Frequency |
|------|-----|----------|------------------|
| Homepage | `/` | 1.0 | Daily |
| About | `/about` | 0.9 | Monthly |
| Products | `/product/` | 0.9 | Weekly |
| News | `/news` | 0.8 | Daily |
| News Detail | `/news-detail` | 0.7 | Weekly |

**Total URLs:** 5 pages

---

## 🚀 **Cara Submit Sitemap ke Google Search Console**

### **STEP 1: Verifikasi Domain di Google Search Console**

#### **Method 1: Verifikasi DNS (Recommended)**
1. **Login** ke [Google Search Console](https://search.google.com/search-console)
2. Klik **"Add Property"**
3. Pilih **"Domain"** (bukan URL prefix)
4. Masukkan: `oceanexmarine.com`
5. Google akan memberikan **TXT record**
6. **Copy** TXT record tersebut
7. **Login** ke control panel domain (Niagahoster/Hostinger/dll)
8. Buka **DNS Management**
9. Tambahkan **TXT Record** dengan value dari Google
10. **Wait 24-48 hours** untuk propagasi DNS
11. Kembali ke Google Search Console dan klik **"Verify"**

#### **Method 2: Upload HTML File**
1. Google akan kasih file **`google[xxx].html`**
2. Download file tersebut
3. Upload ke root directory website kamu
4. Klik **"Verify"**

#### **Method 3: HTML Tag (Easiest)**
1. Google akan kasih meta tag seperti:
   ```html
   <meta name="google-site-verification" content="xxx" />
   ```
2. Copy tag tersebut
3. Paste di `<head>` section `index.html`
4. Upload ke server
5. Klik **"Verify"**

---

### **STEP 2: Submit Sitemap**

Setelah domain terverifikasi:

1. **Login** ke [Google Search Console](https://search.google.com/search-console)
2. Pilih property: **oceanexmarine.com**
3. Di sidebar kiri, klik **"Sitemaps"**
4. Di kolom "Add a new sitemap", masukkan:
   ```
   sitemap.xml
   ```
5. Klik **"Submit"**

**Screenshot reference:**
```
┌─────────────────────────────────────┐
│  Sitemaps                           │
├─────────────────────────────────────┤
│  Add a new sitemap                  │
│  ┌───────────────────┬────────┐    │
│  │ sitemap.xml       │ Submit │    │
│  └───────────────────┴────────┘    │
└─────────────────────────────────────┘
```

### **STEP 3: Tunggu Indexing**

- ⏱️ **Status awal:** Pending (biru)
- ⏱️ **Proses crawl:** 1-7 hari
- ✅ **Success:** Status "Success" (hijau)
- ❌ **Error:** Cek error message dan fix

---

## 🔎 **Cara Cek Sitemap Valid atau Tidak**

### **Option 1: Online Validator**
1. Buka: [XML Sitemap Validator](https://www.xml-sitemaps.com/validate-xml-sitemap.html)
2. Masukkan URL: `https://oceanexmarine.com/sitemap.xml`
3. Klik **"Validate Sitemap"**
4. Harus muncul: ✅ **"Valid XML sitemap"**

### **Option 2: Browser**
1. Buka browser
2. Visit: `https://oceanexmarine.com/sitemap.xml`
3. Harus tampil XML structure dengan list URL
4. Tidak boleh ada error 404

### **Option 3: Google Search Console**
1. Submit sitemap (langkah di atas)
2. Google akan otomatis validate
3. Cek status di halaman "Sitemaps"

---

## 📊 **SEO Meta Tags yang Sudah Ditambahkan**

### **Basic Meta Tags:**
```html
<meta name="description" content="...">
<meta name="keywords" content="...">
<meta name="author" content="Oceanex Marine Industries">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://oceanexmarine.com/">
```

### **Open Graph (Facebook, LinkedIn):**
```html
<meta property="og:type" content="website">
<meta property="og:url" content="https://oceanexmarine.com/">
<meta property="og:title" content="...">
<meta property="og:description" content="...">
<meta property="og:image" content="...">
```

### **Twitter Cards:**
```html
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="...">
<meta property="twitter:title" content="...">
<meta property="twitter:description" content="...">
<meta property="twitter:image" content="...">
```

---

## 🎯 **SEO Keywords Target:**

### **Primary Keywords:**
- Seafood export Indonesia
- Frozen seafood supplier
- Premium tuna export
- B2B seafood supplier
- Certified seafood exporter

### **Secondary Keywords:**
- Shrimp export Indonesia
- Sustainable seafood
- Global seafood supplier
- Seafood import export
- Frozen fish supplier

### **Long-tail Keywords:**
- Premium frozen seafood export from Indonesia
- Certified halal seafood supplier
- Sustainable seafood export company
- B2B frozen tuna supplier Indonesia

---

## 📈 **Monitoring & Maintenance**

### **Weekly Tasks:**
- ✅ Check Google Search Console for errors
- ✅ Monitor indexing status
- ✅ Check for crawl errors

### **Monthly Tasks:**
- ✅ Update sitemap if new pages added
- ✅ Check keyword rankings
- ✅ Analyze traffic from Google Analytics/PostHog

### **When to Update Sitemap:**
- ➕ Menambah halaman baru (news article, product page)
- 🗑️ Menghapus halaman
- 🔄 Mengubah URL structure
- 📝 Update major content

---

## 🛠️ **Cara Update Sitemap (Manual)**

### **If Adding New Page:**

1. **Edit sitemap.xml**
2. **Add new URL block:**
```xml
<url>
    <loc>https://oceanexmarine.com/new-page</loc>
    <lastmod>2026-01-25</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>
```
3. **Upload** ke server
4. **Resubmit** di Google Search Console

### **Priority Guidelines:**
- `1.0` = Homepage (most important)
- `0.9` = Main pages (About, Products)
- `0.8` = Sub pages (News listing, Category)
- `0.7` = Detail pages (News detail, Product detail)
- `0.5` = Archive, Tags

### **Change Frequency:**
- `always` = Real-time content
- `hourly` = News websites
- `daily` = Blog, News listing
- `weekly` = Products, Services
- `monthly` = About, Contact, Static pages
- `yearly` = Legal pages, Terms

---

## 🔗 **Important URLs:**

### **Website URLs:**
- Homepage: `https://oceanexmarine.com/`
- Sitemap: `https://oceanexmarine.com/sitemap.xml`
- Robots: `https://oceanexmarine.com/robots.txt`

### **Google Tools:**
- Search Console: https://search.google.com/search-console
- Analytics: https://analytics.google.com
- PageSpeed Insights: https://pagespeed.web.dev/
- Mobile-Friendly Test: https://search.google.com/test/mobile-friendly

### **SEO Tools:**
- XML Validator: https://www.xml-sitemaps.com/validate-xml-sitemap.html
- SEO Checker: https://ahrefs.com/free-seo-tools
- Structured Data Test: https://validator.schema.org/

---

## ✅ **Checklist Before Go Live:**

### **Pre-Launch:**
- [x] Sitemap.xml created
- [x] Robots.txt created
- [x] Meta tags added (homepage)
- [ ] Meta tags added (all pages)
- [ ] Domain verified in Google Search Console
- [ ] Sitemap submitted to Google
- [ ] SSL Certificate installed (HTTPS)
- [ ] Analytics tracking installed (PostHog ✅)

### **Post-Launch:**
- [ ] Test sitemap URL (should return XML)
- [ ] Test robots.txt (should return text)
- [ ] Submit to Bing Webmaster Tools
- [ ] Monitor indexing progress (1-2 weeks)
- [ ] Check for crawl errors
- [ ] Set up Google Analytics (optional)

---

## 📞 **Support & Resources:**

### **Documentation:**
- Google Search Console Help: https://support.google.com/webmasters
- Sitemap Protocol: https://www.sitemaps.org/protocol.html
- SEO Starter Guide: https://developers.google.com/search/docs/beginner/seo-starter-guide

### **Questions?**
- Check Google Search Console "Help" section
- Community forum: https://support.google.com/webmasters/community

---

## 🎉 **Summary:**

✅ **Sitemap Created:** `sitemap.xml` (5 URLs)  
✅ **Robots.txt Created:** Allows all bots, points to sitemap  
✅ **SEO Meta Tags:** Added to homepage  
✅ **PostHog Analytics:** Already installed  

**Next Steps:**
1. Deploy website ke production server
2. Verifikasi domain di Google Search Console
3. Submit sitemap
4. Wait 1-7 days untuk indexing
5. Monitor di Google Search Console

---

**Good luck with your SEO! 🚀**

Website URL setelah deploy: `https://oceanexmarine.com`
