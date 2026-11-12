<?php
// edukasi.php - Pusat Edukasi Kesehatan Jiwa & Latihan Relaksasi
require_once __DIR__ . '/includes/data.php';

$page_title = 'Edukasi Kesehatan Jiwa & Panduan Relaksasi - RuangJiwa';
$active_page = 'edukasi';

include __DIR__ . '/includes/header.php';
?>

<!-- HEADER SECTION -->
<section style="padding: 3rem 0 1.5rem;">
    <div class="container">
        <div class="section-header-centered" style="margin-bottom: 2rem;">
            <span class="section-pill">Literasi & Self-Care</span>
            <h1 class="section-title">Pusat Edukasi & Pemulihan Jiwa</h1>
            <p class="section-subtitle">
                Pengetahuan ilmiah populer seputar psikologi, panduan pertolongan pertama pada krisis emosi, dan latihan mindfulness mandiri.
            </p>
        </div>

        <!-- CATEGORY BADGES -->
        <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 3rem;">
            <span class="filter-btn active">Semua Topik</span>
            <span class="filter-btn">Manajemen Kecemasan</span>
            <span class="filter-btn">Depresi & Pemulihan</span>
            <span class="filter-btn">Burnout Tempat Kerja</span>
            <span class="filter-btn">Mindfulness & Meditasi</span>
        </div>

        <!-- ARTICLES GRID -->
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
                    
                    <button type="button" class="btn-secondary read-article-btn" 
                        style="width: 100%; justify-content: center; margin-bottom: 1rem; border-color: var(--primary-300); color: var(--primary-700);"
                        data-title="<?= htmlspecialchars($art['judul']); ?>"
                        data-author="<?= htmlspecialchars($art['penulis']); ?>"
                        data-badge="<?= htmlspecialchars($art['kategori']); ?>"
                        data-content="<?= htmlspecialchars($art['konten']); ?>">
                        <span>Baca Selengkapnya</span>
                        <span>📖</span>
                    </button>

                    <div class="article-author">
                        <span>✍️</span>
                        <span>Ditinjau oleh: <strong><?= htmlspecialchars($art['penulis']); ?></strong></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- GUIDED BREATHING RELAXATION WIDGET (4-7-8) -->
<section class="breathing-section" id="latihan-napas">
    <div class="container">
        <div class="section-header-centered">
            <span class="section-pill" style="background: #CCFBF1; color: #0F766E;">Fitur Interaktif Mandiri</span>
            <h2 class="section-title">Latihan Relaksasi Napas 4-7-8</h2>
            <p class="section-subtitle">
                Dikembangkan oleh Dr. Andrew Weil dari Harvard Medical School. Ritme ini menstimulasi saraf vagus untuk menghentikan kepanikan akut dan menurunkan detak jantung cepat.
            </p>
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

            <div style="margin-top: 2rem; background: var(--neutral-50); border: 1px solid var(--neutral-200); border-radius: 12px; padding: 1rem; font-size: 0.85rem; color: var(--neutral-600); text-align: left;">
                <strong>Instruksi Penggunaan:</strong><br>
                1. Duduk tegak dengan nyaman, letakkan ujung lidah di langit-langit mulut tepat di belakang gigi depan atas.<br>
                2. Tarik napas tanpa suara melalui hidung selama 4 detik.<br>
                3. Tahan napas Anda selama 7 detik tanpa tegang.<br>
                4. Hembuskan napas sepenuhnya melalui mulut sambil membuat suara 'whoosh' selama 8 detik. Ulangi 4 siklus.
            </div>
        </div>
    </div>
</section>

<!-- PANDUAN PERTOLONGAN PERTAMA KESEHATAN MENTAL (DOS & DON'TS) -->
<section style="padding: 4.5rem 0; background: #FFFFFF; border-top: 1px solid var(--neutral-200);">
    <div class="container">
        <div class="section-header-centered">
            <span class="section-pill">Pedoman Dukungan Sosial</span>
            <h2 class="section-title">Apa yang Boleh & Jangan Dikatakan</h2>
            <p class="section-subtitle">Ketika teman atau keluarga sedang curhat mengenai pergumulan mental mereka</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
            <!-- DOs -->
            <div style="background: #F0FDF4; border: 1px solid #BBF7D0; border-radius: 20px; padding: 2rem;">
                <h3 style="color: #15803D; font-size: 1.25rem; font-weight: 800; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>✅</span> KALIMAT YANG MENGUATKAN (DO)
                </h3>
                <ul style="display: flex; flex-direction: column; gap: 0.85rem; list-style: none; font-size: 0.95rem; color: #166534;">
                    <li><strong>"Terima kasih sudah berani cerita ke aku."</strong> (Memvalidasi keberanian mereka terbuka)</li>
                    <li><strong>"Aku mungkin gak sepenuhnya paham rasanya, tapi aku ada di sini buat nemenin kamu."</strong> (Empati tulus)</li>
                    <li><strong>"Mau kita cari bantuan profesional bareng-bareng? Aku temani cari jadwalnya."</strong> (Dukungan proaktif)</li>
                    <li><strong>"Gak apa-apa kalau hari ini kamu merasa belum sanggup melakukan apa-apa."</strong> (Bebas dari penghakiman)</li>
                </ul>
            </div>

            <!-- DONTs -->
            <div style="background: #FEF2F2; border: 1px solid #FECACA; border-radius: 20px; padding: 2rem;">
                <h3 style="color: #B91C1C; font-size: 1.25rem; font-weight: 800; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>❌</span> HINDARI MENGATAKAN INI (DON'T)
                </h3>
                <ul style="display: flex; flex-direction: column; gap: 0.85rem; list-style: none; font-size: 0.95rem; color: #991B1B;">
                    <li><strong>"Kamu kurang bersyukur dan kurang ibadah sih."</strong> (Menghakimi secara spiritual & memicu guilt berlebih)</li>
                    <li><strong>"Banyak orang lain yang nasibnya jauh lebih susah dari kamu."</strong> (Membandingkan penderitaan / toxic positivity)</li>
                    <li><strong>"Itu cuma ada di pikiran kamu doang, coba bawa hepi aja."</strong> (Meremehkan respon biologis otak)</li>
                    <li><strong>"Gak usah lebay, zaman dulu orang gak gampang kena mental begini."</strong> (Gaslighting emosional)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ARTICLE READER MODAL -->
<div class="modal-overlay" id="articleReaderModal">
    <div class="modal-card" style="max-width: 680px;">
        <div class="modal-header">
            <div>
                <span id="readModalBadge" class="article-badge" style="margin-bottom: 0.4rem; display: inline-block;">Kategori</span>
                <h3 id="readModalTitle" style="font-size: 1.35rem; font-weight: 800; color: var(--neutral-900); line-height: 1.3;">Judul Artikel</h3>
                <div id="readModalAuthor" style="font-size: 0.82rem; color: var(--neutral-500); margin-top: 0.25rem;">Penulis</div>
            </div>
            <button class="modal-close-btn" id="closeArticleModal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="readModalContent" style="font-size: 0.98rem; color: var(--neutral-700); line-height: 1.8;">
                Konten artikel...
            </div>
            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--neutral-200); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <span style="font-size: 0.85rem; color: var(--neutral-500);">Artikel ditinjau oleh Dewan Medis RuangJiwa</span>
                <a href="skrining.php" class="btn-primary" style="padding: 0.5rem 1.1rem; font-size: 0.88rem;">
                    <span>Coba Skrining Jiwa</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/pernapasan.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const readerModal = document.getElementById('articleReaderModal');
    const closeBtn = document.getElementById('closeArticleModal');

    if (closeBtn && readerModal) {
        closeBtn.addEventListener('click', () => {
            readerModal.classList.remove('active');
        });
    }

    document.querySelectorAll('.read-article-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('readModalTitle').innerText = btn.dataset.title;
            document.getElementById('readModalAuthor').innerText = 'Ditinjau oleh: ' + btn.dataset.author;
            document.getElementById('readModalBadge').innerText = btn.dataset.badge;
            document.getElementById('readModalContent').innerHTML = btn.dataset.content;

            readerModal.classList.add('active');
        });
    });
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
