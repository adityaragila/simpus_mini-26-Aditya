<?php
// skrining.php - Halaman Skrining Mandiri Interaktif (PHQ-9 & GAD-7)
require_once __DIR__ . '/includes/data.php';

$page_title = 'Skrining Mandiri Kesehatan Jiwa (PHQ-9 & GAD-7) - RuangJiwa';
$active_page = 'skrining';

$selected_test = isset($_GET['test']) && $_GET['test'] === 'gad7' ? 'gad7' : 'phq9';

include __DIR__ . '/includes/header.php';
?>

<section style="padding: 3rem 0 1.5rem;">
    <div class="container">
        <div class="section-header-centered" style="margin-bottom: 2rem;">
            <span class="section-pill">Instrumen Baku Psikologi</span>
            <h1 class="section-title">Skrining Mandiri Kesehatan Jiwa</h1>
            <p class="section-subtitle">
                Pilih kuesioner baku untuk mengenali kondisi suasana hati (PHQ-9) atau tingkat kecemasan (GAD-7) Anda dalam 2 minggu terakhir.
            </p>
        </div>

        <div class="screening-wrapper">
            <!-- TABS -->
            <div class="screening-nav-tabs">
                <button type="button" class="tab-btn <?= ($selected_test === 'phq9') ? 'active' : ''; ?>" data-type="phq9" onclick="switchScreeningTab('phq9')">
                    <span>🧠</span>
                    <span>Skrining Depresi (PHQ-9)</span>
                </button>
                <button type="button" class="tab-btn <?= ($selected_test === 'gad7') ? 'active' : ''; ?>" data-type="gad7" onclick="switchScreeningTab('gad7')">
                    <span>⚡</span>
                    <span>Skrining Kecemasan (GAD-7)</span>
                </button>
            </div>

            <div class="screening-content">
                <!-- QUIZ CONTAINER -->
                <div id="quizBox">
                    <div class="screening-progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>

                    <div class="screening-header-meta">
                        <span class="step-indicator" id="stepIndicator">Pertanyaan 1 dari 9</span>
                        <span style="font-size: 0.85rem; color: var(--neutral-500);">🔒 Jawaban bersifat rahasia</span>
                    </div>

                    <div style="font-size: 0.95rem; color: var(--primary-700); font-weight: 700; margin-bottom: 0.5rem;">
                        Dalam 2 minggu terakhir, seberapa sering Anda terganggu oleh:
                    </div>

                    <h2 class="question-text" id="questionText">
                        Memuat pertanyaan...
                    </h2>

                    <!-- 4 OPTIONS -->
                    <div class="options-container" id="optionsContainer">
                        <!-- Populated by JavaScript -->
                    </div>

                    <!-- FOOTER ACTIONS -->
                    <div class="screening-footer-actions">
                        <button type="button" class="btn-secondary" id="prevQuestionBtn" onclick="prevQuestion()">
                            <span>← Sebelumnya</span>
                        </button>
                        <button type="button" class="btn-primary" id="nextQuestionBtn" onclick="nextQuestion()">
                            <span>Lanjut</span>
                            <span>→</span>
                        </button>
                    </div>
                </div>

                <!-- RESULT DASHBOARD (HIDDEN INITIALLY) -->
                <div id="resultCard" class="result-card">
                    <div style="font-size: 0.9rem; font-weight: 700; color: var(--neutral-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">
                        Hasil Evaluasi Klinis Anda
                    </div>

                    <div class="result-score-number" id="resScoreNum">0</div>
                    <div id="resLevelBadge" class="result-badge normal">Tingkat Normal</div>
                    <p class="result-score-desc" id="resDesc">Kondisi Anda berada dalam batas normal dan stabil.</p>

                    <!-- REKOMENDASI TINDAKAN -->
                    <div class="result-recommendation-box">
                        <h4>
                            <span>💡</span> Rekomendasi Langkah Selanjutnya
                        </h4>
                        <p id="resRecommendation" style="font-size: 0.95rem; color: var(--neutral-700); line-height: 1.6;">
                            Pertahankan pola hidup sehat dan luangkan waktu untuk relaksasi.
                        </p>
                    </div>

                    <!-- RUJUKAN DOKTER & ACTION -->
                    <div class="result-actions">
                        <button type="button" class="btn-primary" id="resDoctorRefBtn" style="padding: 0.85rem 1.75rem; font-size: 1rem;">
                            <span>🩺 Konsultasi ke Tenaga Profesional Terkait</span>
                            <span>→</span>
                        </button>
                        <button type="button" class="btn-secondary" onclick="restartScreening()">
                            <span>🔄 Ulangi Skrining</span>
                        </button>
                        <button type="button" class="btn-secondary" onclick="window.print()">
                            <span>🖨️ Cetak Hasil</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFO CARD PENJELASAN SKRINING -->
        <div style="margin-top: 3.5rem; display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
            <div style="background: #FFFFFF; border: 1px solid var(--neutral-200); border-radius: 16px; padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--neutral-900); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>🧠</span> Apa itu PHQ-9 (Patient Health Questionnaire)?
                </h3>
                <p style="font-size: 0.9rem; color: var(--neutral-600); line-height: 1.6;">
                    PHQ-9 adalah kuesioner skrining 9 butir pertanyaan yang dirancang oleh Dr. Robert L. Spitzer dkk. Digunakan oleh dokter umum, psikolog, dan psikiater di seluruh dunia untuk mendeteksi derajat keparahan episode depresi mayor secara objektif.
                </p>
            </div>

            <div style="background: #FFFFFF; border: 1px solid var(--neutral-200); border-radius: 16px; padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--neutral-900); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>⚡</span> Apa itu GAD-7 (Generalized Anxiety Disorder)?
                </h3>
                <p style="font-size: 0.9rem; color: var(--neutral-600); line-height: 1.6;">
                    GAD-7 adalah instrumen skrining 7 butir pertanyaan untuk mengukur tingkat kecemasan umum. Sangat efektif untuk mengevaluasi apakah rasa cemas atau overthinking sudah melampaui respon stres wajar dan membutuhkan pendampingan medis.
                </p>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/skrining.js"></script>

<?php include __DIR__ . '/includes/footer.php'; ?>
