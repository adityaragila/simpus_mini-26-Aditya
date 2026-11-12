<?php
// profesional.php - Direktori & Rujukan Tenaga Profesional Kesehatan Mental
require_once __DIR__ . '/includes/data.php';

$page_title = 'Direktori Tenaga Profesional (Psikolog & Psikiater) - RuangJiwa';
$active_page = 'profesional';

include __DIR__ . '/includes/header.php';
?>

<section style="padding: 3rem 0 4.5rem;">
    <div class="container">
        <!-- Referral notification banner (populated if redirected from screening) -->
        <div id="referralBanner" style="display: none;"></div>

        <div class="section-header-centered" style="margin-bottom: 2.5rem;">
            <span class="section-pill">Tenaga Medis Berizin STR</span>
            <h1 class="section-title">Konsultasi dengan Psikolog & Psikiater</h1>
            <p class="section-subtitle">
                Temukan pendamping klinis terpercaya untuk sesi konseling terarah, manajemen kecemasan, terapi emosi, hingga evaluasi medis psikiatri.
            </p>
        </div>

        <!-- SEARCH & FILTER TOOLBAR (HALODOC STYLE) -->
        <div class="doctor-filter-bar">
            <div class="filter-pills">
                <button type="button" class="filter-btn active" data-category="all">Semua Spesialis</button>
                <button type="button" class="filter-btn" data-category="psikolog">🧠 Psikolog Klinis</button>
                <button type="button" class="filter-btn" data-category="psikiater">🩺 Psikiater (Sp.KJ)</button>
            </div>

            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="doctorSearchInput" placeholder="Cari nama dokter atau keluhan (misal: cemas, trauma)...">
            </div>
        </div>

        <!-- DOCTOR LIST GRID -->
        <div class="doctor-grid">
            <?php foreach ($profesional_data as $doc): ?>
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
                        <strong><?= $doc['pengalaman']; ?> Thn</strong> Praktek
                    </div>
                </div>

                <p class="bio"><?= htmlspecialchars($doc['tentang']); ?></p>

                <div style="font-size: 0.8rem; color: var(--neutral-500); margin-bottom: 1rem; background: var(--neutral-50); padding: 0.5rem 0.75rem; border-radius: 8px;">
                    🎓 <strong>Alumni:</strong> <?= htmlspecialchars($doc['alumni']); ?>
                </div>

                <div class="doctor-footer">
                    <div class="fee-wrap">
                        <span class="fee-label">Biaya per Sesi (45 Menit)</span>
                        <span class="fee-amount">Rp <?= number_format($doc['biaya'], 0, ',', '.'); ?></span>
                    </div>
                    <button type="button" class="btn-consult" 
                        data-name="<?= htmlspecialchars($doc['nama']); ?>"
                        data-specialty="<?= htmlspecialchars($doc['gelar']); ?>"
                        data-fee="Rp <?= number_format($doc['biaya'], 0, ',', '.'); ?>">
                        <span>💬 Buat Janji</span>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- EDUKASI PERBEDAAN PSIKOLOG VS PSIKIATER -->
        <div style="margin-top: 4rem; background: #FFFFFF; border: 1px solid var(--neutral-200); border-radius: var(--radius-xl); padding: 2.5rem; box-shadow: var(--shadow-sm);">
            <div style="text-align: center; max-width: 650px; margin: 0 auto 2rem;">
                <span class="section-pill" style="background: var(--primary-100); color: var(--primary-800);">Panduan Memilih Tenaga Medis</span>
                <h3 style="font-size: 1.65rem; font-weight: 800; color: var(--neutral-900); margin-top: 0.5rem;">Kapan Harus ke Psikolog dan Kapan ke Psikiater?</h3>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <div style="background: var(--neutral-50); border: 1px solid var(--neutral-200); border-radius: 16px; padding: 1.75rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <span style="font-size: 1.8rem;">🧠</span>
                        <div>
                            <h4 style="font-size: 1.15rem; font-weight: 800; color: var(--neutral-900);">Psikolog Klinis (M.Psi., Psikolog)</h4>
                            <span style="font-size: 0.82rem; color: var(--neutral-500);">Lulusan Magister Profesi Psikologi</span>
                        </div>
                    </div>
                    <ul style="font-size: 0.9rem; color: var(--neutral-700); line-height: 1.6; padding-left: 1.25rem;">
                        <li>Fokus pada psikoterapi, konseling mendalam, dan modifikasi perilaku (CBT, ACT, DBT).</li>
                        <li>Sangat tepat untuk masalah hubungan emosi, stres kerja, overthinking, burnout, dan krisis identitas.</li>
                        <li>Tidak memiliki wewenang meresepkan obat kimia.</li>
                    </ul>
                </div>

                <div style="background: var(--neutral-50); border: 1px solid var(--neutral-200); border-radius: 16px; padding: 1.75rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <span style="font-size: 1.8rem;">🩺</span>
                        <div>
                            <h4 style="font-size: 1.15rem; font-weight: 800; color: var(--neutral-900);">Psikiater (dr. Sp.KJ)</h4>
                            <span style="font-size: 0.82rem; color: var(--neutral-500);">Dokter Spesialis Kedokteran Jiwa</span>
                        </div>
                    </div>
                    <ul style="font-size: 0.9rem; color: var(--neutral-700); line-height: 1.6; padding-left: 1.25rem;">
                        <li>Dokter medis yang memahami aspek biologis, neurokimia otak, dan fisik kesehatan jiwa.</li>
                        <li>Dapat meresepkan obat medis (antidepresan, antianxietas, mood stabilizer) secara aman dan terpantau.</li>
                        <li>Sangat disarankan bila gejala depresi berat, halusinasi, insomnia kronis, atau gangguan bipolar.</li>
                    </ul>
                </div>
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
                    <label for="complaintNotes">Keluhan atau Riwayat Skrining (Opsional)</label>
                    <textarea id="complaintNotes" class="form-control" rows="3" placeholder="Ceritakan singkat apa yang sedang Anda rasakan atau sertakan hasil skrining..."></textarea>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; padding: 0.85rem; font-size: 1rem; margin-top: 1rem;">
                    <span>Konfirmasi Janji Temu</span>
                    <span>✓</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/profesional.js"></script>

<?php include __DIR__ . '/includes/footer.php'; ?>
