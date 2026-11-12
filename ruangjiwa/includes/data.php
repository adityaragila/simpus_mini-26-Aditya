<?php
// includes/data.php - Data Referensi Medis & Konten Mental Health RuangJiwa

// Data Dokter & Psikolog Klinis Terverifikasi (Mirip Halodoc)
$profesional_data = [
    [
        'id' => 1,
        'nama' => 'dr. Anita Rahayu, Sp.KJ',
        'gelar' => 'Spesialis Kedokteran Jiwa (Psikiater)',
        'spesialisasi' => 'Depresi, Bipolar & Gangguan Tidur',
        'kategori' => 'psikiater',
        'str' => 'STR-31.2.1.100.2.21.089452',
        'pengalaman' => 12,
        'rating' => 4.9,
        'ulasan' => 348,
        'alumni' => 'Fakultas Kedokteran Universitas Indonesia',
        'biaya' => 180000,
        'status' => 'online',
        'avatar' => 'assets/img/doctor-1.svg',
        'tentang' => 'Berpengalaman menangani depresi mayor, gangguan afektif bipolar, kecemasan kronis, serta manajemen farmakoterapi dan psikoterapi suportif.',
        'jadwal' => ['Senin - Jumat: 09.00 - 16.00 WIB', 'Sabtu: 10.00 - 14.00 WIB']
    ],
    [
        'id' => 2,
        'nama' => 'Bintang Pratama, M.Psi., Psikolog',
        'gelar' => 'Psikolog Klinis Dewasa',
        'spesialisasi' => 'Kecemasan, Burnout & Manajemen Stres',
        'kategori' => 'psikolog',
        'str' => 'STR-12.1.2.200.3.22.045123',
        'pengalaman' => 8,
        'rating' => 4.95,
        'ulasan' => 412,
        'alumni' => 'Magister Psikologi Profesi Universitas Gadjah Mada',
        'biaya' => 150000,
        'status' => 'online',
        'avatar' => 'assets/img/doctor-2.svg',
        'tentang' => 'Fokus pada Cognitive Behavioral Therapy (CBT) dan Mindfulness-Based Stress Reduction untuk profesional muda yang mengalami overthinking dan career burnout.',
        'jadwal' => ['Setiap Hari: 13.00 - 21.00 WIB']
    ],
    [
        'id' => 3,
        'nama' => 'Sarah Clarissa, M.Psi., Psikolog',
        'gelar' => 'Psikolog Klinis Anak & Remaja',
        'spesialisasi' => 'Trauma Remaja, ADHD & Masalah Keluarga',
        'kategori' => 'psikolog',
        'str' => 'STR-11.4.3.100.1.20.098711',
        'pengalaman' => 7,
        'rating' => 4.88,
        'ulasan' => 280,
        'alumni' => 'Universitas Padjadjaran',
        'biaya' => 140000,
        'status' => 'offline',
        'avatar' => 'assets/img/doctor-3.svg',
        'tentang' => 'Mendampingi remaja dan orang tua menghadapi krisis identitas, trauma masa kecil, bullying, serta kecemasan akademik.',
        'jadwal' => ['Selasa, Kamis, Sabtu: 09.00 - 15.00 WIB']
    ],
    [
        'id' => 4,
        'nama' => 'dr. Hendra Wicaksono, Sp.KJ',
        'gelar' => 'Spesialis Kedokteran Jiwa (Psikiater)',
        'spesialisasi' => 'Psikosomatis, Panic Disorder & OCD',
        'kategori' => 'psikiater',
        'str' => 'STR-33.1.2.300.2.19.067332',
        'pengalaman' => 15,
        'rating' => 4.92,
        'ulasan' => 520,
        'alumni' => 'Fakultas Kedokteran Universitas Airlangga',
        'biaya' => 200000,
        'status' => 'online',
        'avatar' => 'assets/img/doctor-4.svg',
        'tentang' => 'Ahli dalam mengatasi keluhan fisik akibat stres (psikosomatis), serangan panik berulang, dan gangguan obsesif kompulsif.',
        'jadwal' => ['Senin - Sabtu: 16.00 - 22.00 WIB']
    ],
    [
        'id' => 5,
        'nama' => 'Dian Kusuma Wardhani, M.Psi., Psikolog',
        'gelar' => 'Psikolog Klinis & Konselor Pernikahan',
        'spesialisasi' => 'Hubungan Asmara, Toxic Relationship & Duka',
        'kategori' => 'psikolog',
        'str' => 'STR-14.2.1.200.2.23.012890',
        'pengalaman' => 9,
        'rating' => 4.97,
        'ulasan' => 310,
        'alumni' => 'Universitas Indonesia',
        'biaya' => 165000,
        'status' => 'online',
        'avatar' => 'assets/img/doctor-5.svg',
        'tentang' => 'Membantu individu dan pasangan membangun komunikasi sehat, sembuh dari patah hati / duka kehilangan, dan mengelola boundary interpersonal.',
        'jadwal' => ['Rabu - Minggu: 10.00 - 18.00 WIB']
    ]
];

// Pertanyaan Skrining Standar Medis PHQ-9 (Patient Health Questionnaire - Skrining Depresi)
$phq9_questions = [
    "Kurang berminat atau kurang bergairah dalam melakukan hal-hal yang biasanya Anda sukai?",
    "Merasa murung, sedih, putus asa, atau merasa tidak memiliki harapan?",
    "Sulit tidur atau sering terbangun di malam hari, atau justru tidur terlalu banyak?",
    "Merasa lelah, letih, atau kekurangan energi sepanjang hari?",
    "Nafsu makan menurun drastis atau justru makan berlebihan?",
    "Merasa buruk tentang diri sendiri — merasa gagal atau telah mengecewakan diri sendiri maupun keluarga?",
    "Sulit berkonsentrasi pada aktivitas sehari-hari, seperti membaca buku atau menonton berita?",
    "Bergerak atau berbicara sangat lambat sehingga diperhatikan orang lain, atau sebaliknya sangat gelisah dan tidak bisa diam?",
    "Muncul pikiran bahwa Anda lebih baik mati atau ingin menyakiti diri sendiri dengan cara apapun?"
];

// Pertanyaan Skrining Standar Medis GAD-7 (Generalized Anxiety Disorder - Skrining Kecemasan)
$gad7_questions = [
    "Merasa gugup, cemas, gelisah, atau merasa sangat tegang?",
    "Tidak mampu menghentikan atau mengendalikan rasa khawatir yang terus bermunculan?",
    "Khawatir terlalu berlebihan terhadap berbagai macam kemungkinan hal buruk?",
    "Sangat sulit untuk merasa santai atau rileks?",
    "Sangat gelisah sampai-sampai Anda sulit untuk duduk diam?",
    "Mudah merasa kesal, tersinggung, atau menjadi lekas marah?",
    "Merasa takut seolah-olah sesuatu yang mengerikan akan segera terjadi?"
];

// Skala Pilihan Jawaban Skrining Standar (2 Minggu Terakhir)
$screening_options = [
    ['label' => 'Tidak pernah', 'score' => 0],
    ['label' => 'Beberapa hari', 'score' => 1],
    ['label' => 'Lebih dari separuh waktu', 'score' => 2],
    ['label' => 'Hampir setiap hari', 'score' => 3]
];

// Artikel Edukasi Kesehatan Mental
$articles_data = [
    [
        'id' => 1,
        'kategori' => 'Kecemasan',
        'tag' => 'Mental Hacks',
        'judul' => 'Teknik Grounding 5-4-3-2-1: Pertolongan Pertama Saat Serangan Panik',
        'ringkasan' => 'Ketika overthinking atau serangan panik melanda, gunakan panca indra Anda untuk kembali terhubung dengan realitas detik ini.',
        'waktu_baca' => '4 menit baca',
        'penulis' => 'dr. Anita Rahayu, Sp.KJ',
        'gambar' => 'assets/img/article-1.svg',
        'konten' => 'Metode grounding 5-4-3-2-1 adalah teknik kognitif yang dirancang untuk mengalihkan fokus otak dari alarm kecemasan menuju stimulus sensorik konkret: <br><br>
        <strong>1. Kenali 5 hal yang Anda lihat:</strong> Lihat jam dinding, motif karpet, cahaya lampu.<br>
        <strong>2. Sentuh 4 benda di sekitar Anda:</strong> Rasakan tekstur baju, dinginnya meja, layar HP.<br>
        <strong>3. Dengarkan 3 suara:</strong> Desau AC, kicau burung, deru kendaraan jauh.<br>
        <strong>4. Cium 2 aroma:</strong> Wangi kopi, aroma pakaian bersih.<br>
        <strong>5. Rasakan 1 cecap rasa:</strong> Sesap air putih dingin atau rasakan mint pasta gigi.<br><br>
        Lakukan bersamaan dengan pernapasan perut lambat untuk menenangkan sistem saraf simpatik.'
    ],
    [
        'id' => 2,
        'kategori' => 'Burnout',
        'tag' => 'Produktivitas Sehat',
        'judul' => 'Perbedaan Kelelahan Fisik Biasa vs Burnout: Jangan Sampai Terlambat',
        'ringkasan' => 'Tidur berjam-jam tapi tetap merasa kosong dan enggan memulai hari? Bisa jadi Anda bukan sekadar lelah, melainkan burnout emosional.',
        'waktu_baca' => '5 menit baca',
        'penulis' => 'Bintang Pratama, M.Psi.',
        'gambar' => 'assets/img/article-2.svg',
        'konten' => 'Organisasi Kesehatan Dunia (WHO) mengklasifikasikan burnout sebagai sindrom akibat stres kronis di tempat kerja yang belum berhasil dikelola.<br><br>
        <strong>Tiga pilar utama burnout:</strong><br>
        - Kelelahan emosional mendalam (merasa terkuras habis).<br>
        - Sinisme atau depersonalisasi (menjadi acuh tak acuh dan sinis terhadap pekerjaan/kolega).<br>
        - Efikasi diri menurun (merasa tidak mampu dan kehilangan arti pencapaian).<br><br>
        Istirahat biasa (tidur) seringkali tidak cukup menyembuhkan burnout. Anda memerlukan psychological detachment, penataan ulang batasan (boundaries), dan jika perlu pendampingan profesional.'
    ],
    [
        'id' => 3,
        'kategori' => 'Depresi',
        'tag' => 'Pemulihan Jiwa',
        'judul' => 'Mematahkan Mitos Depresi: Mengapa \'Kurang Bersyukur\' Adalah Vonis Keliru',
        'ringkasan' => 'Depresi adalah kondisi medis yang melibatkan neurotransmiter otak, bukan kelemahan iman atau kurangnya rasa syukur seseorang.',
        'waktu_baca' => '6 menit baca',
        'penulis' => 'dr. Hendra Wicaksono, Sp.KJ',
        'gambar' => 'assets/img/article-3.svg',
        'konten' => 'Secara neurobiologis, depresi berkaitan dengan ketidakseimbangan neurotransmiter seperti serotonin, dopamin, dan norepinefrin, serta pengecilan volume hipokampus akibat paparan kortisol berkepanjangan.<br><br>
        Menghakimi penderita depresi dengan kata \'kamu kurang ibadah\' atau \'kurang bersyukur\' justru memicu rasa bersalah patologis (guilt feeling) yang memperburuk gejala dan meningkatkan risiko isolasi sosial.<br><br>
        Dukungan terbaik adalah dengan mendengarkan tanpa menghakimi, hadir secara empati, serta mendorong mereka untuk berkonsultasi ke psikolog atau psikiater.'
    ]
];

// Data Mitos vs Fakta
$mitos_fakta = [
    [
        'mitos' => 'Pergi ke psikolog atau psikiater berarti seseorang sudah \'gila\' atau sakit jiwa parah.',
        'fakta' => 'Sama seperti Anda ke dokter gigi saat sakit gigi, konsultasi ke psikolog adalah tindakan pencegahan normal untuk mengelola stres, emosi, dan kesehatan pikiran sehari-hari.'
    ],
    [
        'mitos' => 'Orang yang kuat mental tidak akan pernah mengalami depresi atau kecemasan.',
        'fakta' => 'Gangguan mental dapat dialami siapa saja tanpa memandang kekuatan mental, usia, maupun status sosial. Ini dipengaruhi faktor genetik, biologi otak, dan pengalaman hidup.'
    ],
    [
        'mitos' => 'Obat psikiatri menyebabkan ketergantungan seumur hidup dan merusak otak.',
        'fakta' => 'Di bawah pengawasan psikiater berizin, obat psikiatri berfungsi mengembalikan keseimbangan kimia otak secara terukur dan akan diturunkan dosisnya (tapering off) secara aman saat membaik.'
    ]
];
?>
