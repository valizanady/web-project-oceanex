

  (function ($) {
  
  "use strict";

    // MENU
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height();
  
      scrollToDiv(elWrapped,header_height);
      return false;
  
      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-navheight;
  
        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });

    // HERO GALLERY SLIDER
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.hero-indicator');
    const totalSlides = slides.length;
    let slideInterval;

    function goToSlide(index) {
      // Remove active from all slides and indicators
      slides.forEach(slide => slide.classList.remove('active'));
      indicators.forEach(ind => ind.classList.remove('active'));
      
      // Set new active
      currentSlide = index;
      if (slides[currentSlide]) {
        slides[currentSlide].classList.add('active');
      }
      if (indicators[currentSlide]) {
        indicators[currentSlide].classList.add('active');
      }
    }

    function nextSlide() {
      goToSlide((currentSlide + 1) % totalSlides);
    }

    function prevSlide() {
      goToSlide((currentSlide - 1 + totalSlides) % totalSlides);
    }

    function startSlideshow() {
      slideInterval = setInterval(nextSlide, 5000);
    }

    function stopSlideshow() {
      clearInterval(slideInterval);
    }

    // Initialize slider
    if (slides.length > 0) {
      // Navigation buttons
      const prevBtn = document.querySelector('.hero-nav-prev');
      const nextBtn = document.querySelector('.hero-nav-next');
      
      if (prevBtn) {
        prevBtn.addEventListener('click', function() {
          stopSlideshow();
          prevSlide();
          startSlideshow();
        });
      }
      
      if (nextBtn) {
        nextBtn.addEventListener('click', function() {
          stopSlideshow();
          nextSlide();
          startSlideshow();
        });
      }
      
      // Indicators
      indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
          stopSlideshow();
          goToSlide(index);
          startSlideshow();
        });
      });
      
      // Start auto-advance
      startSlideshow();
    }

    // SCROLL ANIMATIONS
    function handleScrollAnimations() {
      const animatedElements = document.querySelectorAll('.animate-on-scroll');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animated');
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      });
      
      animatedElements.forEach(el => {
        observer.observe(el);
      });
    }

    // WHY CHOOSE EXPANDABLE CARDS
    function initExpandableCards() {
      const cards = document.querySelectorAll('.why-expand-card');
      
      cards.forEach(card => {
        // Click on card to expand
        card.addEventListener('click', function(e) {
          // Don't expand if clicking on buttons
          if (e.target.closest('.btn-why-primary') || e.target.closest('.btn-why-secondary')) {
            return;
          }
          
          const isExpanded = this.classList.contains('expanded');
          
          // Close all cards first
          cards.forEach(c => c.classList.remove('expanded'));
          
          // If wasn't expanded, expand this one
          if (!isExpanded) {
            this.classList.add('expanded');
            // Scroll to card
            setTimeout(() => {
              this.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
          }
        });
        
        // Close button
        const closeBtn = card.querySelector('.why-expand-close');
        if (closeBtn) {
          closeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            card.classList.remove('expanded');
          });
        }
      });
      
      // Close when clicking outside
      document.addEventListener('click', function(e) {
        if (!e.target.closest('.why-expand-card')) {
          cards.forEach(c => c.classList.remove('expanded'));
        }
      });
      
      // Close on Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          cards.forEach(c => c.classList.remove('expanded'));
        }
      });
    }

    // WHY CHOOSE WITH PHOTOS CARDS
    function initPhotoCards() {
      const photoCards = document.querySelectorAll('.why-photo-card');
      
      photoCards.forEach(card => {
        // Click on card to expand
        card.addEventListener('click', function(e) {
          // Don't expand if clicking on buttons
          if (e.target.closest('.btn-photo-primary') || e.target.closest('.btn-photo-secondary')) {
            return;
          }
          
          const isExpanded = this.classList.contains('expanded');
          
          // Close all cards first
          photoCards.forEach(c => c.classList.remove('expanded'));
          
          // If wasn't expanded, expand this one
          if (!isExpanded) {
            this.classList.add('expanded');
            // Scroll to card
            setTimeout(() => {
              this.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
          }
        });
        
        // Close button
        const closeBtn = card.querySelector('.why-photo-close');
        if (closeBtn) {
          closeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            card.classList.remove('expanded');
          });
        }
      });
      
      // Close when clicking outside
      document.addEventListener('click', function(e) {
        if (!e.target.closest('.why-photo-card')) {
          photoCards.forEach(c => c.classList.remove('expanded'));
        }
      });
      
      // Close on Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          photoCards.forEach(c => c.classList.remove('expanded'));
        }
      });
    }

    // WHY BENTO CARDS - 3D TILT & MODAL
    function initBentoCards() {
      const bentoCards = document.querySelectorAll('.why-bento-card');
      const modalOverlay = document.getElementById('whyModalOverlay');
      const modalContent = document.getElementById('whyModalContent');
      const modalClose = document.querySelector('.why-modal-close');
      
      // Modal Content Data
      const modalData = {
        quality: {
          icon: 'bi-shield-check',
          title: 'Premium Quality',
          desc: 'Every product undergoes rigorous selection and quality control processes. We source only from MSC-certified sustainable fisheries and maintain strict traceability from ocean to your market.',
          features: [
            'Grade A+ premium selection',
            'MSC certified sustainable sources',
            'Complete traceability system',
            'Strict quality control at every stage',
            'Freshness guaranteed',
            'Third-party lab testing'
          ]
        },
        coldchain: {
          icon: 'bi-thermometer-snow',
          title: 'Cold Chain Excellence',
          desc: 'State-of-the-art cold chain infrastructure ensures optimal freshness from processing to delivery. Our facilities feature automated climate control and real-time monitoring systems.',
          features: [
            '5,000 ton cold storage capacity',
            '-60°C deep freeze capability',
            '24/7 temperature monitoring',
            'Automated backup systems',
            'Real-time data logging',
            'Emergency response protocols'
          ]
        },
        global: {
          icon: 'bi-globe2',
          title: 'Global Reach',
          desc: 'Extensive global distribution network with strategic partnerships across major markets. We provide reliable shipping logistics and ensure timely delivery worldwide.',
          features: [
            '50+ countries coverage',
            'Major ports access globally',
            'Sea & air freight options',
            'Customs clearance support',
            'Real-time shipment tracking',
            'Express delivery available'
          ]
        },
        custom: {
          icon: 'bi-box-seam',
          title: 'Custom Solutions',
          desc: 'We understand every business has unique requirements. Our team works closely with you to develop customized solutions that meet your specific needs and market demands.',
          features: [
            'Flexible minimum order quantities',
            'Private label packaging options',
            'Custom size specifications',
            'Branded carton design',
            'Retail-ready packaging',
            'Special handling requests'
          ]
        }
      };

      // 3D Tilt Effect
      bentoCards.forEach(card => {
        const glow = card.querySelector('.why-bento-glow');
        
        card.addEventListener('mousemove', (e) => {
          const rect = card.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          
          const centerX = rect.width / 2;
          const centerY = rect.height / 2;
          
          const rotateX = (y - centerY) / 20;
          const rotateY = (centerX - x) / 20;
          
          card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px) scale(1.02)`;
          
          // Move glow
          if (glow) {
            glow.style.left = x + 'px';
            glow.style.top = y + 'px';
          }
        });
        
        card.addEventListener('mouseleave', () => {
          card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0) scale(1)';
        });
        
        // Button click - open modal
        const btn = card.querySelector('.why-bento-btn');
        if (btn) {
          btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const modalKey = btn.dataset.modal;
            if (modalKey && modalData[modalKey]) {
              openModal(modalData[modalKey]);
            }
          });
        }
      });
      
      // Open Modal
      function openModal(data) {
        let featuresHTML = data.features.map(f => 
          `<div class="why-modal-feature"><i class="bi bi-check-circle-fill"></i> ${f}</div>`
        ).join('');
        
        modalContent.innerHTML = `
          <h3><i class="bi ${data.icon}"></i> ${data.title}</h3>
          <p>${data.desc}</p>
          <div class="why-modal-features">${featuresHTML}</div>
          <div class="why-modal-buttons">
            <a href="#section_5" class="btn-modal-primary" onclick="closeWhyModal()">Get Quote <i class="bi bi-arrow-right"></i></a>
            <a href="product/" class="btn-modal-secondary">View Products</a>
          </div>
        `;
        
        modalOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
      
      // Close Modal
      function closeModal() {
        modalOverlay.classList.remove('active');
        document.body.style.overflow = '';
      }
      
      // Global close function
      window.closeWhyModal = closeModal;
      
      if (modalClose) {
        modalClose.addEventListener('click', closeModal);
      }
      
      if (modalOverlay) {
        modalOverlay.addEventListener('click', (e) => {
          if (e.target === modalOverlay) {
            closeModal();
          }
        });
      }
      
      // Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
          closeModal();
        }
      });
    }
    
    // Initialize scroll animations when DOM is ready
    $(document).ready(function() {
      handleScrollAnimations();
      initExpandableCards();
      initPhotoCards();
      initBentoCards();
    });
  
  })(window.jQuery);




