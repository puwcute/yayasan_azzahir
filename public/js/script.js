// =============================================================
// Yayasan Azzahir Mojosari — Complete Interactive Features
// =============================================================

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // ===== Header Scroll Effect =====
  const header = document.getElementById('siteHeader');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 60);
    });
  }

  // ===== Mobile Nav Toggle =====
  const navToggle = document.getElementById('navToggle');
  const navLinks = document.getElementById('navLinks');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
      const active = this.classList.toggle('active');
      navLinks.classList.toggle('active');
      this.setAttribute('aria-expanded', active);
      document.body.style.overflow = active ? 'hidden' : '';
    });

    // Close on link click
    navLinks.querySelectorAll('.nav-link').forEach(function (link) {
      link.addEventListener('click', function () {
        navToggle.classList.remove('active');
        navLinks.classList.remove('active');
        navToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    // Close on click outside
    document.addEventListener('click', function (e) {
      if (
        navLinks.classList.contains('active') &&
        !navLinks.contains(e.target) &&
        !navToggle.contains(e.target)
      ) {
        navToggle.classList.remove('active');
        navLinks.classList.remove('active');
        navToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // ===== Tab Navigation (RA / MI / MTs) =====
  const tabButtons = document.querySelectorAll('.tab-btn');
  if (tabButtons.length) {
    tabButtons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const targetId = this.getAttribute('data-tab');
        if (!targetId) return;

        // Deactivate all
        tabButtons.forEach(function (b) { b.classList.remove('active'); });
        document.querySelectorAll('.tab-panel').forEach(function (p) { p.classList.remove('active'); });

        // Activate current
        this.classList.add('active');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
          targetPanel.classList.add('active');
          // Trigger reveal for elements inside
          targetPanel.querySelectorAll('.reveal').forEach(function (el) {
            el.classList.add('visible');
          });
        }
      });
    });
  }

  // ===== FAQ Accordion =====
  document.querySelectorAll('.faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const item = this.closest('.faq-item');
      if (!item) return;
      const isOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('.faq-item').forEach(function (i) { i.classList.remove('open'); });
      document.querySelectorAll('.faq-q').forEach(function (b) { b.setAttribute('aria-expanded', 'false'); });
      document.querySelectorAll('.faq-icon').forEach(function (icon) { icon.textContent = '+'; });

      // Toggle current
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
        this.querySelector('.faq-icon').textContent = '−';
      }
    });
  });

  // ===== Counter Animation =====
  function animateCounters() {
    document.querySelectorAll('[data-count]').forEach(function (el) {
      const target = parseInt(el.getAttribute('data-count'));
      if (!target || el.dataset.animated) return;
      el.dataset.animated = 'true';

      const duration = 2000;
      const startTime = performance.now();

      function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Ease-out cubic
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(eased * target).toLocaleString();
        if (progress < 1) {
          requestAnimationFrame(update);
        } else {
          el.textContent = target.toLocaleString();
        }
      }
      requestAnimationFrame(update);
    });
  }

  // Intersection Observer for counters
  const counterObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounters();
          counterObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 }
  );

  document.querySelectorAll('.hero-stats, .impact-grid').forEach(function (el) {
    if (el) counterObserver.observe(el);
  });

  // ===== Scroll Reveal Animation =====
  const revealObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
  );

  document.querySelectorAll('.reveal').forEach(function (el) {
    revealObserver.observe(el);
  });

  // ===== Copy to Clipboard (Donate Cards) =====
  document.querySelectorAll('.copy-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const card = this.closest('.donate-card');
      if (!card) return;
      const accEl = card.querySelector('.acc');
      if (!accEl) return;
      const text = accEl.getAttribute('data-copy') || accEl.textContent.trim();

      navigator.clipboard.writeText(text).then(function () {
        showToast('Nomor rekening berhasil disalin!', 'success');
      }).catch(function () {
        // Fallback
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        showToast('Nomor rekening berhasil disalin!', 'success');
      });
    });
  });

  // ===== Toast Notification =====
  function showToast(message, type) {
    var existing = document.querySelector('.toast');
    if (existing) existing.remove();

    var toast = document.createElement('div');
    toast.className = 'toast ' + (type || 'success');
    toast.textContent = message;
    document.body.appendChild(toast);

    requestAnimationFrame(function () {
      toast.classList.add('show');
    });

    setTimeout(function () {
      toast.classList.remove('show');
      setTimeout(function () { toast.remove(); }, 400);
    }, 3000);
  }

  // Expose to global
  window.showToast = showToast;

  // ===== File Upload (Contact Form) =====
  var uploadInput = document.getElementById('fberkas');
  var uploadList = document.getElementById('uploadList');
  if (uploadInput && uploadList) {
    uploadInput.addEventListener('change', function () {
      uploadList.innerHTML = '';
      Array.from(this.files).forEach(function (file) {
        var div = document.createElement('div');
        div.className = 'file-item';
        div.innerHTML =
          '<span>' + file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)</span>' +
          '<span class="remove" data-file="' + file.name + '">&times;</span>';
        uploadList.appendChild(div);
      });

      // Remove handler
      uploadList.querySelectorAll('.remove').forEach(function (rm) {
        rm.addEventListener('click', function () {
          this.closest('.file-item').remove();
          // Reset input if no files
          if (!uploadList.children.length) {
            uploadInput.value = '';
          }
        });
      });
    });
  }

  // ===== Contact Form Handler (Demo) =====
  var contactForm = document.getElementById('contactForm');
  var formMsg = document.getElementById('formMsg');
  if (contactForm && formMsg) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();

      var name = document.getElementById('fname');
      var email = document.getElementById('femail');
      var jenjang = document.getElementById('fjenjang');
      var message = document.getElementById('fmessage');
      var isValid = true;

      // Simple validation
      if (!name.value.trim()) {
        document.querySelector('[data-err="fname"]').textContent = 'Nama harus diisi';
        isValid = false;
      } else {
        document.querySelector('[data-err="fname"]').textContent = '';
      }

      if (!email.value.trim()) {
        document.querySelector('[data-err="femail"]').textContent = 'Email harus diisi';
        isValid = false;
      } else {
        document.querySelector('[data-err="femail"]').textContent = '';
      }

      if (!isValid) {
        formMsg.className = 'form-msg error';
        formMsg.textContent = 'Lengkapi data yang wajib diisi.';
        return;
      }

      // Simulate success
      formMsg.className = 'form-msg success';
      formMsg.textContent = 'Formulir berhasil dikirim! Tim kami akan menghubungi Anda.';
      contactForm.reset();
      if (uploadList) uploadList.innerHTML = '';

      setTimeout(function () {
        formMsg.className = 'form-msg';
        formMsg.textContent = '';
      }, 5000);
    });
  }

  // ===== Newsletter Form (Demo) =====
  var newsletterForm = document.getElementById('newsletterForm');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var input = this.querySelector('input[type="email"]');
      if (input && input.value.trim()) {
        showToast('Terima kasih! Anda telah berlangganan.', 'success');
        input.value = '';
      }
    });
  }

  // ===== Scroll to Top Button =====
  var scrollTopBtn = document.getElementById('scrollTop');
  if (scrollTopBtn) {
    window.addEventListener('scroll', function () {
      scrollTopBtn.classList.toggle('visible', window.scrollY > 400);
    });

    scrollTopBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ===== Smooth Scroll for Anchor Links =====
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var targetId = this.getAttribute('href');
      if (targetId === '#') return;
      var target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        var offset = 80; // header height
        var targetPos = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: targetPos, behavior: 'smooth' });
      }
    });
  });

  // ===== Footer Year =====
  var yearEl = document.getElementById('year');
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }

  // ===== Active Nav Link Highlight =====
  var currentPath = window.location.pathname;
  document.querySelectorAll('.nav-link').forEach(function (link) {
    var href = link.getAttribute('href');
    if (href && href !== '#') {
      if (currentPath === href || (href !== '/' && currentPath.startsWith(href))) {
        link.classList.add('active');
      }
    }
  });

  // ===== Auto-hide Alerts =====
  document.querySelectorAll('.alert').forEach(function (alert) {
    setTimeout(function () {
      alert.style.transition = 'opacity 0.5s ease';
      alert.style.opacity = '0';
      setTimeout(function () { alert.remove(); }, 500);
    }, 5000);
  });

  // ===== Confirm Actions =====
  document.querySelectorAll('[data-confirm]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      var msg = this.getAttribute('data-confirm') || 'Apakah Anda yakin?';
      if (!confirm(msg)) {
        e.preventDefault();
      }
    });
  });

  // ===== Image Error Handler (for admin gallery) =====
  window.handleImgError = function (img) {
    img.style.display = 'none';
    var placeholder = img.nextElementSibling;
    if (placeholder) {
      placeholder.style.display = 'flex';
    }
  };

  console.log('Yayasan Azzahir Mojosari — All systems ready.');
});
