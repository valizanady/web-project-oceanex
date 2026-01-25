# PostHog Analytics - Installation Guide

## ✅ Installation Complete!

PostHog analytics has been successfully installed on all main pages of Oceanex Marine Industries website.

---

## 📊 What is PostHog?

PostHog is an **open-source product analytics platform** that helps you:
- 📈 Track website visitors and page views
- 🖱️ Monitor user behavior and interactions  
- 🎯 Understand which pages are most popular
- 📱 See device types (mobile vs desktop)
- 🌍 View geographic data of visitors
- ⏱️ Analyze session duration and bounce rates

---

## 🔧 Installation Details

### **Files Modified:**
✅ `index.html` - Homepage  
✅ `about.html` - About page  
✅ `product/index.html` - Products page  
✅ `news.html` - News listing page  
✅ `news-detail.html` - News article page  
✅ `includes/analytics.html` - Analytics snippet (backup file)

### **Script Location:**
The PostHog tracking script is added in the `<head>` section of each page, right after the CSS files and before the closing `</head>` tag.

### **Configuration:**
```javascript
posthog.init('phc_ybe5690pza4Vg0KZwkseyYvPH8WKwMXzvXXCM4E1foQ', {
    api_host: 'https://us.i.posthog.com',
    person_profiles: 'identified_only'
});
```

---

## 📈 What Data is Being Tracked?

### **Automatic Tracking (No code needed):**
- ✅ Page views
- ✅ Page scrolls
- ✅ Link clicks
- ✅ Form submissions
- ✅ Button clicks
- ✅ Session duration
- ✅ Geographic location
- ✅ Device & browser info
- ✅ Referral sources

### **Custom Events (Optional):**
You can also track custom events by adding this code:
```javascript
// Example: Track when user clicks "Request Quote"
posthog.capture('quote_requested', { 
    product: 'Tuna',
    source: 'product_page'
});

// Example: Track contact form submission
posthog.capture('contact_form_submitted', {
    name: formData.name,
    company: formData.company
});
```

---

## 🎯 Accessing Your Analytics

### **PostHog Dashboard:**
1. Go to: https://us.posthog.com/
2. Login with your account
3. Select your project: **Oceanex Marine Industries**

### **Key Metrics to Monitor:**
- 📊 **Daily Active Users (DAU)**
- 📈 **Page views per day**
- 🔝 **Most visited pages**
- ⏱️ **Average session duration**
- 📱 **Mobile vs Desktop split**
- 🌍 **Top countries/regions**
- 🔗 **Traffic sources (Direct, Google, Social, etc.)**

---

## 🛠️ Advanced Features

### **1. Session Recording** (Optional)
Record actual user sessions to see how visitors interact with your site:
```javascript
posthog.init('...', {
    session_recording: {
        recordCrossOriginIframes: true
    }
});
```

### **2. Feature Flags** (Optional)
Test new features with specific user groups:
```javascript
if (posthog.isFeatureEnabled('new_product_layout')) {
    // Show new layout
}
```

### **3. A/B Testing**
Test different versions of pages to see which performs better.

### **4. Heatmaps**
See where users click most on your pages.

---

## 🔍 Verification

### **How to verify it's working:**

1. **Open your website** in browser
2. **Open Developer Tools** (F12 or Right-click > Inspect)
3. **Go to Console tab**
4. Type: `posthog` and press Enter
5. You should see the PostHog object with properties

Or check Network tab for requests to `us.i.posthog.com`

### **Check in PostHog Dashboard:**
1. Go to PostHog dashboard
2. Navigate to **"Live Events"** section
3. Browse your website
4. You should see events appearing in real-time!

---

## 📝 Custom Event Examples for Oceanex

### **Product Interest Tracking:**
```javascript
// When user views product details
posthog.capture('product_viewed', {
    product_name: 'Premium Yellowfin Tuna',
    category: 'Tuna',
    page: 'product_detail'
});

// When user clicks "Request Quote"
posthog.capture('quote_button_clicked', {
    product: 'Tuna',
    location: 'product_card'
});
```

### **Contact Form Tracking:**
```javascript
// Already in your contact form code
posthog.capture('contact_form_submitted', {
    form_type: 'quote_request',
    product_interest: selectedProduct,
    company_size: companySize
});
```

### **Navigation Tracking:**
```javascript
// Track language changes
posthog.capture('language_changed', {
    from: 'en',
    to: 'id'
});

// Track navigation clicks
posthog.capture('nav_clicked', {
    destination: 'about_page'
});
```

---

## 🔐 Privacy & GDPR

### **Current Setup:**
- `person_profiles: 'identified_only'` - Only creates profiles for logged-in users
- Anonymous browsing data is collected but not tied to individuals
- IP addresses are tracked for geographic data

### **If you need GDPR compliance:**
Add a cookie consent banner and only initialize PostHog after user accepts:
```javascript
// Only initialize after consent
if (userAcceptedCookies) {
    posthog.init('...', {
        persistence: 'localStorage',
        opt_out_capturing_by_default: false
    });
}
```

---

## 📞 Support & Resources

### **PostHog Documentation:**
- Docs: https://posthog.com/docs
- Tutorials: https://posthog.com/tutorials
- Community: https://posthog.com/questions

### **Oceanex Team:**
- Analytics File: `includes/analytics.html` (backup)
- To disable on a page: Remove the PostHog `<script>` tag
- To add to new pages: Copy the script from any existing page

---

## ✅ Next Steps

1. ✅ **Verification** - Visit your site and check PostHog dashboard
2. 📊 **Monitor** - Check analytics daily/weekly
3. 🎯 **Optimize** - Use data to improve user experience
4. 📈 **Grow** - Track conversions and lead generation

---

**Installation Date:** January 25, 2026  
**Status:** ✅ Active on all main pages  
**Version:** Latest PostHog snippet (2025-11-30)
