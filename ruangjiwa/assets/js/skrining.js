/**
 * RuangJiwa - Screening Engine (PHQ-9 & GAD-7)
 */

const SCREENING_DATA = {
  phq9: {
    title: "Skrining Tingkat Depresi (PHQ-9)",
    desc: "Kuesioner Baku Patient Health Questionnaire-9 yang diakui secara global untuk mendeteksi dini indikasi depresi dalam 2 minggu terakhir.",
    questions: [
      "Kurang berminat atau kurang bergairah dalam melakukan hal-hal yang biasanya Anda sukai?",
      "Merasa murung, sedih, putus asa, atau merasa tidak memiliki harapan?",
      "Sulit tidur atau sering terbangun di malam hari, atau justru tidur terlalu banyak?",
      "Merasa lelah, letih, atau kekurangan energi sepanjang hari?",
      "Nafsu makan menurun drastis atau justru makan berlebihan?",
      "Merasa buruk tentang diri sendiri — merasa gagal atau telah mengecewakan diri sendiri maupun keluarga?",
      "Sulit berkonsentrasi pada aktivitas sehari-hari, seperti membaca buku atau menonton berita?",
      "Bergerak atau berbicara sangat lambat sehingga diperhatikan orang lain, atau sebaliknya sangat gelisah dan tidak bisa diam?",
      "Muncul pikiran bahwa Anda lebih baik mati atau ingin menyakiti diri sendiri dengan cara apapun?"
    ],
    ranges: [
      { max: 4, level: "Normal / Minimal", badge: "normal", desc: "Kondisi emosi Anda berada dalam rentang normal dan stabil.", rec: "Pertahankan rutinitas sehat, tidur cukup 7-8 jam, olahraga teratur, dan luangkan waktu untuk hobi." },
      { max: 9, level: "Depresi Ringan", badge: "ringan", desc: "Terdapat sedikit penurunan suasana hati dan energi.", rec: "Terapkan jurnalisme emosi, kurangi beban kerja berlebih, dan latih relaksasi pernapasan. Konseling suportif dianjurkan jika menetap > 2 minggu." },
      { max: 14, level: "Depresi Sedang", badge: "sedang", desc: "Gejala depresi mulai mengganggu produktivitas dan relasi harian Anda.", rec: "Sangat disarankan berkonsultasi dengan Psikolog Klinis untuk sesi Cognitive Behavioral Therapy (CBT)." },
      { max: 19, level: "Depresi Sedang Menuju Berat", badge: "berat", desc: "Gejala signifikan yang mempengaruhi hampir seluruh fungsi kehidupan.", rec: "Segera jadwalkan evaluasi klinis bersama Psikiater (dr. Sp.KJ) atau Psikolog Klinis untuk intervensi terpadu." },
      { max: 27, level: "Depresi Berat", badge: "berat", desc: "Kondisi membutuhkan perhatian medis dan pendampingan segera.", rec: "Prioritaskan rujukan langsung ke Psikiater di rumah sakit atau hubungi Hotline Sejiwa 119 Ext 8 untuk pendampingan darurat." }
    ]
  },
  gad7: {
    title: "Skrining Gangguan Kecemasan (GAD-7)",
    desc: "Kuesioner Baku Generalized Anxiety Disorder-7 untuk mengukur tingkat kecemasan, kegelisahan, dan ketegangan fisik/mental.",
    questions: [
      "Merasa gugup, cemas, gelisah, atau merasa sangat tegang?",
      "Tidak mampu menghentikan atau mengendalikan rasa khawatir yang terus bermunculan?",
      "Khawatir terlalu berlebihan terhadap berbagai macam kemungkinan hal buruk?",
      "Sangat sulit untuk merasa santai atau rileks?",
      "Sangat gelisah sampai-sampai Anda sulit untuk duduk diam?",
      "Mudah merasa kesal, tersinggung, atau menjadi lekas marah?",
      "Merasa takut seolah-olah sesuatu yang mengerikan akan segera terjadi?"
    ],
    ranges: [
      { max: 4, level: "Kecemasan Minimal / Normal", badge: "normal", desc: "Tingkat kecemasan Anda tergolong normal dan adaptif terhadap stres sehari-hari.", rec: "Tetap jaga keseimbangan hidup, kurangi asupan kafein berlebih, dan sempatkan jeda saat bekerja." },
      { max: 9, level: "Kecemasan Ringan", badge: "ringan", desc: "Terdapat rasa khawatir dan tegang yang kadang mengganggu ketenangan Anda.", rec: "Coba praktikkan teknik pernapasan 4-7-8 atau Grounding 5-4-3-2-1 ketika mulai merasa overthinking." },
      { max: 14, level: "Kecemasan Sedang", badge: "sedang", desc: "Kecemasan cukup sering muncul dan mulai memicu gejala fisik seperti jantung berdebar atau sulit tidur.", rec: "Dianjurkan melakukan konseling bersama Psikolog untuk mempelajari manajemen emosi dan restrukturisasi kognitif." },
      { max: 21, level: "Kecemasan Berat", badge: "berat", desc: "Tingkat ketegangan dan panik tinggi yang membatasi aktivitas normal harian Anda.", rec: "Disarankan segera melakukan rujukan telekonsultasi dengan Dokter Spesialis Kedokteran Jiwa (Psikiater)." }
    ]
  }
};

const OPTIONS = [
  { label: "Tidak pernah sama sekali", score: 0 },
  { label: "Beberapa hari", score: 1 },
  { label: "Lebih dari separuh waktu", score: 2 },
  { label: "Hampir setiap hari", score: 3 }
];

let currentType = 'phq9';
let currentQuestionIndex = 0;
let userAnswers = [];

function switchScreeningTab(type) {
  currentType = type;
  currentQuestionIndex = 0;
  userAnswers = new Array(SCREENING_DATA[type].questions.length).fill(null);

  // Tab UI
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.type === type);
  });

  const quizBox = document.getElementById('quizBox');
  const resultCard = document.getElementById('resultCard');
  if (quizBox) quizBox.style.display = 'block';
  if (resultCard) resultCard.style.display = 'none';

  renderCurrentQuestion();
}

function renderCurrentQuestion() {
  const quiz = SCREENING_DATA[currentType];
  const total = quiz.questions.length;

  // Step indicator
  const stepIndicator = document.getElementById('stepIndicator');
  if (stepIndicator) {
    stepIndicator.innerText = `Pertanyaan ${currentQuestionIndex + 1} dari ${total}`;
  }

  // Progress Fill
  const progressFill = document.getElementById('progressFill');
  if (progressFill) {
    const pct = ((currentQuestionIndex + 1) / total) * 100;
    progressFill.style.width = `${pct}%`;
  }

  // Question Text
  const questionEl = document.getElementById('questionText');
  if (questionEl) {
    questionEl.innerText = quiz.questions[currentQuestionIndex];
  }

  // Options
  const container = document.getElementById('optionsContainer');
  if (container) {
    container.innerHTML = '';
    OPTIONS.forEach((opt, idx) => {
      const isSelected = userAnswers[currentQuestionIndex] === opt.score;
      const card = document.createElement('div');
      card.className = `option-card ${isSelected ? 'selected' : ''}`;
      card.innerHTML = `
        <span>${opt.label}</span>
        <div class="option-radio"></div>
      `;
      card.onclick = () => selectOption(opt.score);
      container.appendChild(card);
    });
  }

  // Back button state
  const prevBtn = document.getElementById('prevQuestionBtn');
  if (prevBtn) {
    prevBtn.disabled = currentQuestionIndex === 0;
    prevBtn.style.opacity = currentQuestionIndex === 0 ? '0.5' : '1';
  }

  // Next / Submit button state
  const nextBtn = document.getElementById('nextQuestionBtn');
  if (nextBtn) {
    const isAnswered = userAnswers[currentQuestionIndex] !== null;
    nextBtn.disabled = !isAnswered;
    nextBtn.style.opacity = isAnswered ? '1' : '0.5';

    if (currentQuestionIndex === total - 1) {
      nextBtn.innerHTML = `<span>Lihat Hasil Skrining</span> <span>✓</span>`;
    } else {
      nextBtn.innerHTML = `<span>Lanjut</span> <span>→</span>`;
    }
  }
}

function selectOption(score) {
  userAnswers[currentQuestionIndex] = score;
  renderCurrentQuestion();

  // Auto advance slightly after selection if not last
  setTimeout(() => {
    if (currentQuestionIndex < SCREENING_DATA[currentType].questions.length - 1) {
      currentQuestionIndex++;
      renderCurrentQuestion();
    }
  }, 220);
}

function prevQuestion() {
  if (currentQuestionIndex > 0) {
    currentQuestionIndex--;
    renderCurrentQuestion();
  }
}

function nextQuestion() {
  const total = SCREENING_DATA[currentType].questions.length;
  if (currentQuestionIndex < total - 1) {
    currentQuestionIndex++;
    renderCurrentQuestion();
  } else {
    calculateAndShowResult();
  }
}

function calculateAndShowResult() {
  const totalScore = userAnswers.reduce((acc, val) => acc + (val || 0), 0);
  const quiz = SCREENING_DATA[currentType];

  let evalResult = quiz.ranges[quiz.ranges.length - 1];
  for (let r of quiz.ranges) {
    if (totalScore <= r.max) {
      evalResult = r;
      break;
    }
  }

  // Hide Quiz, Show Result
  const quizBox = document.getElementById('quizBox');
  const resultCard = document.getElementById('resultCard');
  if (quizBox) quizBox.style.display = 'none';
  if (resultCard) {
    resultCard.style.display = 'block';

    document.getElementById('resScoreNum').innerText = totalScore;
    document.getElementById('resLevelBadge').innerText = evalResult.level;
    document.getElementById('resLevelBadge').className = `result-badge ${evalResult.badge}`;
    document.getElementById('resDesc').innerText = evalResult.desc;
    document.getElementById('resRecommendation').innerText = evalResult.rec;

    // Doctor recommendation hint
    const doctorRefBtn = document.getElementById('resDoctorRefBtn');
    if (doctorRefBtn) {
      doctorRefBtn.onclick = () => {
        window.location.href = `profesional.php?rujukan=${currentType}&skor=${totalScore}&level=${encodeURIComponent(evalResult.level)}`;
      };
    }
  }
}

function restartScreening() {
  switchScreeningTab(currentType);
}

// Initializer
document.addEventListener('DOMContentLoaded', () => {
  if (document.getElementById('quizBox')) {
    switchScreeningTab('phq9');
  }
});
