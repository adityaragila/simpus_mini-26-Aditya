<?php
// includes/header.php
if (!isset($page_title)) {
    $page_title = 'RuangJiwa - Portal Kesehatan Mental & Telekonsultasi Terpadu';
}
if (!isset($active_page)) {
    $active_page = 'beranda';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title); ?></title>
    <!-- Google Fonts Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Figma Design System Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- TOP EMERGENCY CRISIS STRIP -->
    <div class="emergency-strip">
        <span class="pulse-dot"></span>
        <span>Butuh bantuan darurat segera? Hotline Krisis Jiwa Kemenkes Sejiwa: <strong>119 Ext. 8</strong> (Bebas Pulsa 24/7)</span>
        <a href="tel:119" class="hotline-btn">📞 Hubungi 119</a>
    </div>

    <!-- MAIN NAVBAR -->
    <header class="navbar">
        <div class="container nav-inner">
            <a href="index.php" class="nav-brand">
                <img src="assets/img/logo.svg" alt="RuangJiwa Mental Health Portal">
            </a>

            <!-- Navigation Links -->
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link <?= ($active_page === 'beranda') ? 'active' : ''; ?>">🏠 Beranda</a></li>
                <li><a href="skrining.php" class="nav-link <?= ($active_page === 'skrining') ? 'active' : ''; ?>">📋 Skrining Mandiri</a></li>
                <li><a href="profesional.php" class="nav-link <?= ($active_page === 'profesional') ? 'active' : ''; ?>">🩺 Tenaga Profesional</a></li>
                <li><a href="edukasi.php" class="nav-link <?= ($active_page === 'edukasi') ? 'active' : ''; ?>">📚 Edukasi & Napas</a></li>
            </ul>

            <!-- Navbar Actions -->
            <div class="nav-actions">
                <button type="button" class="btn-figma-badge" id="figmaInspectorBtn" title="Lihat Figma Design System & Tokens">
                    <span>🎨</span>
                    <span>Figma UI Kit</span>
                </button>
                <a href="skrining.php" class="btn-primary">
                    <span>Mulai Skrining</span>
                    <span>→</span>
                </a>
                <button type="button" class="mobile-toggle" id="mobileNavToggle" aria-label="Toggle Navigation">☰</button>
            </div>
        </div>
    </header>

    <!-- FIGMA DESIGN SYSTEM INSPECTOR DRAWER -->
    <aside class="figma-inspector-drawer" id="figmaDrawer">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; border-bottom: 1px solid var(--neutral-200); padding-bottom: 1rem;">
            <div>
                <h3 style="font-weight: 800; font-size: 1.25rem; color: #0F172A; display: flex; align-items: center; gap: 0.5rem;">
                    <span>🎨</span> Figma Design Tokens
                </h3>
                <p style="font-size: 0.8rem; color: #64748B;">Sistem desain standar industri untuk RuangJiwa</p>
            </div>
            <button id="closeFigmaDrawer" class="modal-close-btn">&times;</button>
        </div>

        <div style="margin-bottom: 1.75rem;">
            <h4 style="font-size: 0.9rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem;">PALET WARNA (FIGMA TOKENS)</h4>
            <div class="color-swatch-grid">
                <div class="swatch-item" style="background: #0D9488;"><span>#0D9488</span><span>Teal 600</span></div>
                <div class="swatch-item" style="background: #0F766E;"><span>#0F766E</span><span>Teal 700</span></div>
                <div class="swatch-item" style="background: #2563EB;"><span>#2563EB</span><span>Blue 600</span></div>
                <div class="swatch-item" style="background: #0F172A;"><span>#0F172A</span><span>Dark 900</span></div>
                <div class="swatch-item" style="background: #CCFBF1; color: #0F766E;"><span>#CCFBF1</span><span>Teal 100</span></div>
                <div class="swatch-item" style="background: #DBEAFE; color: #1E40AF;"><span>#DBEAFE</span><span>Blue 100</span></div>
                <div class="swatch-item" style="background: #FEE2E2; color: #991B1B;"><span>#FEE2E2</span><span>Rose 100</span></div>
                <div class="swatch-item" style="background: #F8FAFC; color: #475569; border: 1px solid #E2E8F0;"><span>#F8FAFC</span><span>Light 50</span></div>
            </div>
        </div>

        <div style="margin-bottom: 1.75rem;">
            <h4 style="font-size: 0.9rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem;">TYPOGRAPHY SCALE</h4>
            <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 1rem; font-size: 0.85rem;">
                <p><strong>Font Family:</strong> 'Plus Jakarta Sans', system-ui</p>
                <p><strong>Heading 1:</strong> 52px / Line-height 1.18 (800 Bold)</p>
                <p><strong>Heading 2:</strong> 34px / Line-height 1.25 (800 Bold)</p>
                <p><strong>Subheading:</strong> 20px / Line-height 1.4 (700 Semi)</p>
                <p><strong>Body Text:</strong> 16px / Line-height 1.6 (400 Regular)</p>
                <p><strong>Caption / Badges:</strong> 12px / Line-height 1.3 (700 Bold)</p>
            </div>
        </div>

        <div style="margin-bottom: 1.75rem;">
            <h4 style="font-size: 0.9rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem;">FIGMA SPACING & ELEVATION</h4>
            <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 1rem; font-size: 0.85rem;">
                <p><strong>Corner Radius:</strong> 16px (Cards), 24px (Modals), 9999px (Pills)</p>
                <p><strong>Elevation 1:</strong> 0 2px 6px -1px rgba(15,23,42,0.06)</p>
                <p><strong>Elevation 2:</strong> 0 10px 20px -3px rgba(15,23,42,0.06)</p>
                <p><strong>Glassmorphism:</strong> Blur 14px, White 88%</p>
            </div>
        </div>

        <div>
            <h4 style="font-size: 0.9rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem;">FIGMA COMPONENT STATUS</h4>
            <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.85rem;">
                <div style="display: flex; justify-content: space-between;"><span>✓ Header & Emergency Banner</span><strong style="color: #0D9488;">Ready</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>✓ Quick Telehealth Action Grid</span><strong style="color: #0D9488;">Ready</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>✓ Screening Stepper (PHQ-9/GAD-7)</span><strong style="color: #0D9488;">Ready</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>✓ Doctor Catalog & Booking Modal</span><strong style="color: #0D9488;">Ready</strong></div>
                <div style="display: flex; justify-content: space-between;"><span>✓ Interactive Breathing Widget</span><strong style="color: #0D9488;">Ready</strong></div>
            </div>
        </div>
    </aside>
