/**
 * RuangJiwa - Main UI & Figma Inspector Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  initFigmaInspector();
  initMobileNav();
});

// Figma Design System Inspector Drawer
function initFigmaInspector() {
  const figmaBtn = document.getElementById('figmaInspectorBtn');
  const drawer = document.getElementById('figmaDrawer');
  const closeBtn = document.getElementById('closeFigmaDrawer');

  if (figmaBtn && drawer) {
    figmaBtn.addEventListener('click', () => {
      drawer.classList.add('active');
    });
  }

  if (closeBtn && drawer) {
    closeBtn.addEventListener('click', () => {
      drawer.classList.remove('active');
    });
  }

  // Close on outside click
  document.addEventListener('click', (e) => {
    if (drawer && drawer.classList.contains('active')) {
      if (!drawer.contains(e.target) && !figmaBtn.contains(e.target)) {
        drawer.classList.remove('active');
      }
    }
  });
}

// Mobile Nav Toggle
function initMobileNav() {
  const toggleBtn = document.getElementById('mobileNavToggle');
  const navMenu = document.querySelector('.nav-menu');

  if (toggleBtn && navMenu) {
    toggleBtn.addEventListener('click', () => {
      if (navMenu.style.display === 'flex') {
        navMenu.style.display = 'none';
      } else {
        navMenu.style.display = 'flex';
        navMenu.style.flexDirection = 'column';
        navMenu.style.position = 'absolute';
        navMenu.style.top = '74px';
        navMenu.style.left = '0';
        navMenu.style.width = '100%';
        navMenu.style.background = '#FFFFFF';
        navMenu.style.padding = '1.5rem';
        navMenu.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
      }
    });
  }
}

// Global Toast Notification
function showToast(message, type = 'success') {
  let toastContainer = document.getElementById('toastContainer');
  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'toastContainer';
    toastContainer.style.position = 'fixed';
    toastContainer.style.bottom = '24px';
    toastContainer.style.right = '24px';
    toastContainer.style.zIndex = '9999';
    toastContainer.style.display = 'flex';
    toastContainer.style.flexDirection = 'column';
    toastContainer.style.gap = '10px';
    document.body.appendChild(toastContainer);
  }

  const toast = document.createElement('div');
  const bg = type === 'success' ? '#0D9488' : (type === 'error' ? '#E11D48' : '#2563EB');
  toast.style.background = bg;
  toast.style.color = '#FFFFFF';
  toast.style.padding = '14px 20px';
  toast.style.borderRadius = '12px';
  toast.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
  toast.style.fontWeight = '600';
  toast.style.fontSize = '0.9rem';
  toast.style.display = 'flex';
  toast.style.alignItems = 'center';
  toast.style.gap = '10px';
  toast.style.animation = 'scaleUp 0.3s ease';

  toast.innerHTML = `<span>${type === 'success' ? '✓' : 'ℹ'}</span> <span>${message}</span>`;
  toastContainer.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(10px)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}
