/**
 * RuangJiwa - Profesional / Teleconsultation Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  initDoctorFilters();
  initDoctorSearch();
  initBookingModal();
  checkUrlReferralParams();
});

function initDoctorFilters() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('.doctor-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cat = btn.dataset.category;
      cards.forEach(card => {
        if (cat === 'all' || card.dataset.category === cat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}

function initDoctorSearch() {
  const searchInput = document.getElementById('doctorSearchInput');
  const cards = document.querySelectorAll('.doctor-card');

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const q = e.target.value.toLowerCase();
      cards.forEach(card => {
        const text = card.innerText.toLowerCase();
        if (text.includes(q)) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }
}

// Modal Booking Form
function initBookingModal() {
  const modal = document.getElementById('bookingModal');
  const closeBtn = document.getElementById('closeBookingModal');
  const bookingForm = document.getElementById('bookingForm');

  if (closeBtn && modal) {
    closeBtn.addEventListener('click', () => {
      modal.classList.remove('active');
    });
  }

  // Handle consultation buttons click
  document.querySelectorAll('.btn-consult').forEach(btn => {
    btn.addEventListener('click', () => {
      const docName = btn.dataset.name;
      const docSpecialty = btn.dataset.specialty;
      const docFee = btn.dataset.fee;

      document.getElementById('modalDocName').innerText = docName;
      document.getElementById('modalDocSpecialty').innerText = docSpecialty;
      document.getElementById('modalDocFee').innerText = docFee;

      modal.classList.add('active');
    });
  });

  // Handle Form Submit
  if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const patientName = document.getElementById('patientName').value;
      const sessionDate = document.getElementById('sessionDate').value;
      const sessionMethod = document.getElementById('sessionMethod').value;

      modal.classList.remove('active');
      bookingForm.reset();

      if (typeof showToast === 'function') {
        showToast(`Jadwal Berhasil Dibuat! ${patientName} terdaftar untuk ${sessionMethod} pada ${sessionDate}. Tautan masuk telah dikirim.`);
      } else {
        alert('Janji temu konsultasi berhasil dikonfirmasi!');
      }
    });
  }
}

// Check if redirected from Screening with referral parameters
function checkUrlReferralParams() {
  const urlParams = new URLSearchParams(window.location.search);
  const rujukan = urlParams.get('rujukan');
  const level = urlParams.get('level');
  const skor = urlParams.get('skor');

  if (rujukan && level) {
    const banner = document.getElementById('referralBanner');
    if (banner) {
      banner.style.display = 'block';
      banner.innerHTML = `
        <div style="background: #EFF6FF; border: 1px solid #BFDBFE; border-radius: 16px; padding: 1.25rem 1.5rem; margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
          <div>
            <div style="font-weight: 800; color: #1E40AF; font-size: 1.05rem;">📋 Rujukan Terverifikasi dari Hasil Skrining ${rujukan.toUpperCase()}</div>
            <div style="font-size: 0.9rem; color: #3B82F6; margin-top: 0.2rem;">Hasil Anda: <strong>${decodeURIComponent(level)}</strong> (Skor: ${skor}). Berikut dokter & psikolog terbaik yang direkomendasikan untuk Anda:</div>
          </div>
          <button onclick="document.getElementById('referralBanner').style.display='none'" style="background: #FFFFFF; border: 1px solid #93C5FD; border-radius: 8px; padding: 0.4rem 0.8rem; cursor: pointer; font-size: 0.85rem; font-weight: 600; color: #1E40AF;">Tutup Pemberitahuan</button>
        </div>
      `;
    }
  }
}
