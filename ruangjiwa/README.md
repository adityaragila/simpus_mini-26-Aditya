# 🌿 RuangJiwa - Web Telehealth Kesehatan Mental (Inspirasi Halodoc & Standar Figma)

Platform referensi kesehatan mental berbasis web interaktif yang dirancang untuk **skrining mandiri terstandarisasi medis**, **edukasi berbasis neurosains**, dan **rujukan langsung ke tenaga profesional (Psikolog Klinis & Psikiater)**.

---

## 🚀 Cara Menjalankan di Laragon
1. Pastikan **Laragon** sudah dalam status **Start All** (Apache & PHP aktif).
2. Buka browser dan kunjungi:
   ```
   http://localhost/Dasweb2026/ruangjiwa/
   ```
3. Alternatif akses halaman:
   - **Beranda & Hub Layanan:** `http://localhost/Dasweb2026/ruangjiwa/index.php`
   - **Skrining Mandiri (PHQ-9 & GAD-7):** `http://localhost/Dasweb2026/ruangjiwa/skrining.php`
   - **Direktori Dokter & Rujukan:** `http://localhost/Dasweb2026/ruangjiwa/profesional.php`
   - **Pusat Edukasi & Latihan Napas:** `http://localhost/Dasweb2026/ruangjiwa/edukasi.php`

---

## 🎨 Tampilan & Standar Desain Figma (Figma UI Kit)
Web ini dibangun dengan **Figma Design System** modern:
- **Design Tokens**: Palet warna medis menenangkan (Teal `#0D9488`, Royal Blue `#2563EB`, Lavender `#8B5CF6`, Slate Dark `#0F172A`).
- **Typography Scale**: Google Font *Plus Jakarta Sans* (Standar UI/UX industri telemedisin di Indonesia).
- **Interactive Figma Inspector**: Klik tombol **"🎨 Figma UI Kit"** pada navbar untuk membuka drawer spesifikasi warna, tipografi, dan elevasi bayangan secara interaktif.
- **Glassmorphism & Micro-animations**: Efek hover interaktif, kartu melayang (floating cards), dan transisi halus.

---

## 🌟 3 Fitur Utama Sesuai Kebutuhan

### 1. Skrining Mandiri Interaktif (Mental Health Assessment)
- **Instrumen Baku Medis**:
  - **PHQ-9 (Patient Health Questionnaire-9)**: Mengukur derajat depresi dalam 2 minggu terakhir.
  - **GAD-7 (Generalized Anxiety Disorder-7)**: Mengukur tingkat kecemasan dan overthinking.
- **Fitur Teknis**: Stepper pertanyaan dinamis, kalkulasi skor otomatis real-time, badge tingkat keparahan (*Normal, Ringan, Sedang, Berat*), interpretasi klinis, dan tombol rujukan langsung ke dokter terkait.

### 2. Edukasi Jiwa & Self-Care Center
- **Artikel Edukasi Medis**: Teknik Grounding 5-4-3-2-1, Mitos vs Fakta Depresi & Psikiatri, Panduan Burnout Kerja.
- **Interactive Article Modal**: Pembaca artikel modal tanpa reload halaman.
- **Latihan Relaksasi Napas 4-7-8 Interaktif**: Animasi visual lingkaran napas dinamis (*Tarik 4s ➔ Tahan 7s ➔ Hembus 8s*) untuk menurunkan kepanikan seketika.
- **Pedoman DOs & DONTs**: Panduan cara merespon teman/keluarga yang sedang curhat masalah emosional.

### 3. Rujukan ke Tenaga Profesional (Telekonsultasi Mirip Halodoc)
- **Direktori Dokter & Psikolog**:
  - Profil dokter terverifikasi dengan nomor STR Kemenkes.
  - Rating, jam terbang/pengalaman, almamater universitas, dan tarif sesi konsultasi.
- **Pencarian & Filter Cepat**: Filter berdasarkan spesialisasi (*Psikolog Klinis* atau *Psikiater Sp.KJ*) dan live search keyword.
- **Alur Rujukan Terhubung**: Hasil skrining yang memerlukan bantuan medis otomatis menyertakan tombol rujukan khusus yang menampilkan banner hasil skrining di halaman dokter.
- **Modal Booking Konsultasi**: Formulir janji temu telekonsultasi (Chat Telehealth, Video Call, Panggilan Suara) dengan notifikasi instan.

### 4. Layanan Darurat Krisis 24 Jam
- Banner darurat responsif terhubung dengan **Hotline Sejiwa Kemenkes (119 Ext. 8)**, **LISA Suicide Helpline**, dan **Yayasan Pulih**.

---

## 📁 Struktur Direktori
```
ruangjiwa/
├── index.php                 # Halaman utama & dashboard layanan kesehatan mental
├── skrining.php              # Skrining mandiri interaktif PHQ-9 & GAD-7
├── profesional.php           # Direktori psikolog/psikiater & modal booking
├── edukasi.php               # Artikel edukasi, mitos vs fakta & latihan napas
├── README.md                 # Dokumentasi sistem
├── includes/
│   ├── header.php            # Navbar, emergency banner, Figma Inspector drawer
│   ├── footer.php            # Footer, disclaimer medis resmi, hotline darurat
│   └── data.php              # Dataset dokter, artikel edukasi, butir skrining
└── assets/
    ├── css/
    │   └── style.css         # Figma Design System Tokens & styling lengkap
    ├── js/
    │   ├── main.js           # Drawer Figma, mobile navigation, toast alert
    │   ├── skrining.js       # Logika kuesioner, perhitungan skor & rekomendasi
    │   ├── profesional.js    # Filter pencarian dokter & modal telekonsultasi
    │   └── pernapasan.js     # Widget animasi pernapasan relaksasi 4-7-8
    └── img/                  # Logo SVG, avatar dokter, dan ilustrasi estetis
```
