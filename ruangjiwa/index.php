<?php
// index.php - RuangJiwa Landing Page & Health Hub
require_once __DIR__ . '/includes/data.php';

$page_title = 'RuangJiwa - Portal Kesehatan Mental Terpadu & Rujukan Profesional';
$active_page = 'beranda';

include __DIR__ . '/includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-text-content">
                <div class="hero-tag">
                    <span>✨</span>
                    <span>Platform Skrining & Telekonsultasi Mental Terverifikasi</span>
                </div>
                <h1 class="hero-title">
                    Jaga Ketenangan Jiwa, <br>
                    <span class="highlight">Bicara Tanpa Ragu.</span>
                </h1>
                <p class="hero-desc">
                    RuangJiwa hadir seperti Halodoc untuk kesehatan mental Anda. Mulai dari skrining mandiri terstandarisasi medis (PHQ-9 & GAD-7), edukasi psikologis berbasis sains, hingga rujukan langsung ke Psikolog Klinis dan Psikiater berlisensi resmi.
                </p>

                <div class="hero-cta-group">
                    <a href="skrining.php" class="btn-primary" style="padding: 0.85rem 1.75rem; font-size: 1.05rem;">
                        <span>📋 Skrining Mandiri Gratis</span>
                        <span>→</span>
                    </a>
                    <a href="profesional.php" class="btn-secondary" style="padding: 0.85rem 1.75rem; font-size: 1.05rem;">
                        <span>🩺 Cari Tenaga Profesional</span>
                    </a>
                </div>

                <div class="hero-trust-badges">
                    <div class="trust-item">
                        <span class="num">15.000+</span>
                        <span class="label">Skrining Terbantu</span>
                    </div>
                    <div class="trust-item">
                        <span class="num">100%</span>
                        <span class="label">Anonim & Terjaga</span>
                    </div>
                    <div class="trust-item">
                        <span class="num">48+</span>
                        <span class="label">Psikolog & Psikiater STR</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <img src="assets/img/hero-illustration.svg" alt="Kesehatan Jiwa Ilustrasi Figma">
            </div>
        </div>
    </div>
</section>

<!-- HALODOC-STYLE QUICK ACCESS GRID -->
<section class="quick-access-section">
    <div class="container">
        <div class="section-header-centered">
            <span class="section-pill">Layanan Unggulan</span>
            <h2 class="section-title">Solusi Terpadu Kesehatan Jiwa</h2>
            <p class="section-subtitle">Akses cepat layanan kesehatan mental sesuai kebutuhan dan kondisi Anda saat ini</p>
        </div>

        <div class="quick-grid">
            <!-- Card 1: Skrining PHQ-9 -->
            <a href="skrining.php?test=phq9" class="quick-card c-teal">
                <div class="card-icon-box">🧠</div>
                <h3>Skrining Depresi (PHQ-9)</h3>
                <p>9 pertanyaan baku untuk mendeteksi tingkat suasana hati, kelelahan, dan indikasi depresi 2 minggu terakhir.</p>
                <div class="card-action-link">
                    <span>Mulai Tes Cepat</span>
                    <span>→</span>
                </div>
            </a>

            <!-- Card 2: Skrining GAD-7 -->
            <a href="skrining.php?test=gad7" class="quick-card c-blue">
                <div class="card-icon-box">⚡</div>
                <h3>Skrining Cemas (GAD-7)</h3>
                <p>Ukur tingkat overthinking, serangan panik, dan ketegangan saraf dengan instrumen baku psikologi.</p>
                <div class="card-action-link">
                    <span>Mulai Evaluasi</span>
                    <span>→</span>
                </div>
            </a>

            <!-- Card 3: Konsultasi Dokter -->
            <a href="profesional.php" class="quick-card c-purple">
                <div class="card-icon-box">🩺</div>
                <h3>Chat & Rujukan Psikolog</h3>
                <p>Terhubung langsung dengan Psikolog Klinis dan Psikiater terverifikasi STR untuk sesi konseling terarah.</p>
                <div class="card-action-link">
                    <span>Lihat Jadwal Dokter</span>
                    <span>→</span>
                </div>
            </a>

            <!-- Card 4: Relaksasi Napas -->
            <a href="edukasi.php#latihan-napas" class="quick-card c-orange">
                <div class="card-icon-box">🌬️</div>
                <h3>Latihan Napas 4-7-8</h3>
                <p>Panduan visual pernapasan interaktif untuk meredakan kepanikan dan menenangkan denyut nadi seketika.</p>
                <div class="card-action-link">
                    <span>Coba Relaksasi</span>
                    <span>→</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- TENAGA PROFESIONAL REKOMENDASI (MIRIP HALODOC) -->
<section class="profesional-section">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span class="section-pill">Tenaga Profesional Terdaftar</span>
                <h2 class="section-title">Psikolog & Psikiater Siap Membantu</h2>
                <p class="section-subtitle">Pilih jadwal konsultasi nyaman melalui chat, telepon, maupun video call</p>
            </div>
            <a href="profesional.php" class="btn-secondary">
                <span>Lihat Semua Spesialis (<?= count($profesional_data); ?>)</span>
                <span>→</span>
            </a>
        </div>

        <div class="doctor-grid">
            <?php foreach (array_slice($profesional_data, 0, 3) as $doc): ?>
            <div class="doctor-card" data-category="<?= htmlspecialchars($doc['kategori']); ?>">
                <div class="doctor-head">
                    <div class="doctor-avatar-wrap">
                        <img src="<?= htmlspecialchars($doc['avatar']); ?>" alt="<?= htmlspecialchars($doc['nama']); ?>">
                        <span class="status-badge <?= $doc['status']; ?>"><?= ucfirst($doc['status']); ?></span>
                    </div>
                    <div class="doctor-info">
                        <h4><?= htmlspecialchars($doc['nama']); ?></h4>
                        <div class="doctor-specialty"><?= htmlspecialchars($doc['gelar']); ?></div>
                        <div class="doctor-str">
                            <span>🛡️</span>
                            <span><?= htmlspecialchars($doc['str']); ?></span>
                        </div>
                    </div>
                </div>

                <div class="doctor-metrics">
                    <div class="metric-item">
                        <span>⭐</span>
                        <strong><?= $doc['rating']; ?></strong> (<?= $doc['ulasan']; ?> ulasan)
                    </div>
                    <div class="metric-item">
                        <span>💼</span>
                        <strong><?= $doc['pengalaman']; ?> Tahun</strong> Pengalaman
                    </div>
                </div>

                <p class="bio"><?= htmlspecialchars($doc['tentang']); ?></p>

                <div class="doctor-footer">
                    <div class="fee-wrap">
                        <span class="fee-label">Biaya Konsultasi</span>
                        <span class="fee-amount">Rp <?= number_format($doc['biaya'], 0, ',', '.'); ?></span>
                    </div>
                    <button type="button" class="btn-consult" 
                        data-name="<?= htmlspecialchars($doc['nama']); ?>"
                        data-specialty="<?= htmlspecialchars($doc['gelar']); ?>"
                        data-fee="Rp <?= number_format($doc['biaya'], 0, ',', '.'); ?>">
                        <span>💬 Konsultasi</span>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- INTERACTIVE RELAXATION WIDGET HIGHLIGHT -->
<section class="breathing-section">
    <div class="container">
        <div class="section-header-centered">
            <span class="section-pill">Pertolongan Pertama Panik</span>
            <h2 class="section-title">Tarik Napas Sejenak, Tenangkan Pikiran</h2>
            <p class="section-subtitle">Ikuti ritme lingkaran pernapasan metode 4-7-8 untuk menurunkan hormon kortisol stres</p>
        </div>

        <div class="breathing-box">
            <div class="breathing-circle-outer" id="breathingCircle">
                <div class="breathing-circle-inner">
                    <span class="breath-phase" id="breathPhaseText">Siap Memulai</span>
                    <span class="breath-timer" id="breathTimerText">4s</span>
                </div>
            </div>

            <div style="font-size: 0.95rem; color: var(--neutral-600); margin-bottom: 1.5rem;" id="breathCyclesText">
                Metode 4 Detik Hirup • 7 Detik Tahan • 8 Detik Hembuskan
            </div>

            <div class="breathing-controls">
                <button type="button" class="btn-primary" id="breathingStartBtn" onclick="toggleBreathing()">
                    <span>Mulai Relaksasi 4-7-8</span>
                </button>
                <button type="button" class="btn-secondary" onclick="stopBreathing()">
                    <span>Reset</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ARTIKEL EDUKASI HIGHLIGHTS -->
<section class="education-section">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span class="section-pill">Pojok Edukasi Medis</span>
                <h2 class="section-title">Wawasan Kesehatan Jiwa Terverifikasi</h2>
                <p class="section-subtitle">Artikel ilmiah populer yang ditulis dan ditinjau oleh psikiater dan psikolog klinis</p>
            </div>
            <a href="edukasi.php" class="btn-secondary">
                <span>Baca Semua Artikel</span>
                <span>→</span>
            </a>
        </div>

        <div class="articles-grid">
            <?php foreach ($articles_data as $art): ?>
            <div class="article-card">
                <div class="article-img-wrap">
                    <img src="<?= htmlspecialchars($art['gambar']); ?>" alt="<?= htmlspecialchars($art['judul']); ?>">
                </div>
                <div class="article-body">
                    <div class="article-meta">
                        <span class="article-badge"><?= htmlspecialchars($art['kategori']); ?></span>
                        <span>⏱️ <?= htmlspecialchars($art['waktu_baca']); ?></span>
                    </div>
                    <h3 class="article-title"><?= htmlspecialchars($art['judul']); ?></h3>
                    <p class="article-desc"><?= htmlspecialchars($art['ringkasan']); ?></p>
                    <div class="article-author">
                        <span>✍️</span>
                        <span>Ditinjau oleh: <strong><?= htmlspecialchars($art['penulis']); ?></strong></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Mitos vs Fakta Grid -->
        <div style="margin-top: 3rem;">
            <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.45rem; font-weight: 800; color: var(--neutral-900);">💡 Mitos vs Fakta Kesehatan Mental</h3>
                <p style="color: var(--neutral-500); font-size: 0.95rem;">Mari hilangkan stigma keliru di masyarakat dengan fakta berbasis psikiatri modern</p>
            </div>

            <div class="myths-grid">
                <?php foreach ($mitos_fakta as $mf): ?>
                <div class="myth-card">
                    <span class="myth-label">❌ MITOS</span>
                    <h4>"<?= htmlspecialchars($mf['mitos']); ?>"</h4>
                    <div class="fact-box">
                        <span class="fact-label">✓ FAKTA MEDIS</span>
                        <p><?= htmlspecialchars($mf['fakta']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- CALLOUT BANNER DARURAT -->
<section style="padding: 2rem 0 4.5rem;">
    <div class="container">
        <div style="background: linear-gradient(135deg, #0F766E 0%, #0D9488 100%); border-radius: var(--radius-xl); padding: 3rem; color: #FFFFFF; display: flex; align-items: center; justify-content: space-between; gap: 2rem; flex-wrap: wrap; box-shadow: var(--shadow-teal);">
            <div style="max-width: 620px;">
                <span style="background: rgba(255, 255, 255, 0.2); padding: 0.3rem 0.85rem; border-radius: 9999px; font-size: 0.82rem; font-weight: 700; display: inline-block; margin-bottom: 0.75rem;">🌟 ANDA TIDAK SENDIRIAN</span>
                <h2 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.75rem; line-height: 1.25;">Perasaan Anda Valid dan Berharga untuk Diperhatikan.</h2>
                <p style="font-size: 1.05rem; opacity: 0.9; line-height: 1.6;">Tidak ada kata terlambat untuk mulai merawat kesehatan jiwa Anda hari ini. Mulai dengan skrining 3 menit tanpa dipungut biaya apapun.</p>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="skrining.php" class="btn-primary" style="background: #FFFFFF; color: #0F766E; box-shadow: 0 10px 20px rgba(0,0,0,0.15);">
                    <span>Mulai Skrining Sekarang</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- BOOKING MODAL -->
<div class="modal-overlay" id="bookingModal">
    <div class="modal-card">
        <div class="modal-header">
            <div>
                <h3>Jadwalkan Telekonsultasi</h3>
                <p style="font-size: 0.85rem; color: var(--neutral-500);">Terhubung langsung via Chat atau Video Call</p>
            </div>
            <button class="modal-close-btn" id="closeBookingModal">&times;</button>
        </div>
        <div class="modal-body">
            <!-- Doctor preview summary -->
            <div style="background: var(--primary-50); border: 1px solid var(--primary-200); border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 id="modalDocName" style="font-size: 1.05rem; color: var(--neutral-900);">dr. Nama Dokter</h4>
                    <span id="modalDocSpecialty" style="font-size: 0.82rem; color: var(--primary-700); font-weight: 600;">Spesialis</span>
                </div>
                <div style="text-align: right;">
                    <span style="font-size: 0.75rem; color: var(--neutral-500); display: block;">Biaya Sesi</span>
                    <strong id="modalDocFee" style="font-size: 1.05rem; color: var(--neutral-900);">Rp 0</strong>
                </div>
            </div>

            <form id="bookingForm">
                <div class="form-group">
                    <label for="patientName">Nama Lengkap (Boleh Inisial / Samaran)</label>
                    <input type="text" id="patientName" class="form-control" placeholder="Contoh: Rian Pratama" required>
                </div>
                <div class="form-group">
                    <label for="patientPhone">Nomor WhatsApp (Untuk Tautan Sesi)</label>
                    <input type="tel" id="patientPhone" class="form-control" placeholder="0812-xxxx-xxxx" required>
                </div>
                <div class="form-group">
                    <label for="sessionMethod">Metode Konsultasi</label>
                    <select id="sessionMethod" class="form-control">
                        <option value="Chat Interaktif Telehealth">💬 Chat Interaktif Telehealth (Mirip Halodoc)</option>
                        <option value="Video Call Konseling HD">📹 Video Call Konseling HD Pribadi</option>
                        <option value="Panggilan Suara / Voice Call">📞 Panggilan Suara / Voice Call</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sessionDate">Pilih Waktu & Sesi</label>
                    <input type="datetime-local" id="sessionDate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="complaintNotes">Keluhan atau Hal yang Ingin Diceritakan (Opsional)</label>
                    <textarea id="complaintNotes" class="form-control" rows="3" placeholder="Ceritakan singkat apa yang sedang Anda rasakan..."></textarea>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; padding: 0.85rem; font-size: 1rem; margin-top: 1rem;">
                    <span>Konfirmasi Janji Temu</span>
                    <span>✓</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/pernapasan.js"></script>
<script src="assets/js/profesional.js"></script>

<?php include __DIR__ . '/includes/footer.php'; ?>
