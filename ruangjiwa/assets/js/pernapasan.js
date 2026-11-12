/**
 * RuangJiwa - Guided Breathing Relaxation (Teknik 4-7-8 Dr. Andrew Weil)
 */

let breathingInterval = null;
let breathState = 'idle'; // 'inhale', 'hold', 'exhale'
let currentSeconds = 4;
let cyclesCompleted = 0;

function toggleBreathing() {
  const btn = document.getElementById('breathingStartBtn');
  if (breathState === 'idle') {
    startBreathing();
    if (btn) {
      btn.innerText = 'Jeda Latihan';
      btn.className = 'btn-secondary';
    }
  } else {
    stopBreathing();
    if (btn) {
      btn.innerText = 'Mulai Relaksasi 4-7-8';
      btn.className = 'btn-primary';
    }
  }
}

function startBreathing() {
  runInhale();
}

function stopBreathing() {
  clearInterval(breathingInterval);
  breathState = 'idle';
  const circle = document.getElementById('breathingCircle');
  const phaseText = document.getElementById('breathPhaseText');
  const timerText = document.getElementById('breathTimerText');

  if (circle) circle.style.transform = 'scale(1)';
  if (phaseText) phaseText.innerText = 'Siap Memulai';
  if (timerText) timerText.innerText = '4s';
}

function runInhale() {
  breathState = 'inhale';
  currentSeconds = 4;
  updateBreathDisplay('Tarik Napas Perlahan...', currentSeconds, 'scale(1.35)');

  breathingInterval = setInterval(() => {
    currentSeconds--;
    if (currentSeconds > 0) {
      updateBreathTimer(currentSeconds);
    } else {
      clearInterval(breathingInterval);
      runHold();
    }
  }, 1000);
}

function runHold() {
  breathState = 'hold';
  currentSeconds = 7;
  updateBreathDisplay('Tahan Napas & Rileks...', currentSeconds, 'scale(1.35)');

  breathingInterval = setInterval(() => {
    currentSeconds--;
    if (currentSeconds > 0) {
      updateBreathTimer(currentSeconds);
    } else {
      clearInterval(breathingInterval);
      runExhale();
    }
  }, 1000);
}

function runExhale() {
  breathState = 'exhale';
  currentSeconds = 8;
  updateBreathDisplay('Hembuskan Perlahan...', currentSeconds, 'scale(0.95)');

  breathingInterval = setInterval(() => {
    currentSeconds--;
    if (currentSeconds > 0) {
      updateBreathTimer(currentSeconds);
    } else {
      clearInterval(breathingInterval);
      cyclesCompleted++;
      const cycleEl = document.getElementById('breathCyclesText');
      if (cycleEl) cycleEl.innerText = `${cyclesCompleted} Siklus Selesai`;
      // Loop next cycle
      runInhale();
    }
  }, 1000);
}

function updateBreathDisplay(phase, seconds, transformScale) {
  const circle = document.getElementById('breathingCircle');
  const phaseText = document.getElementById('breathPhaseText');
  const timerText = document.getElementById('breathTimerText');

  if (circle) circle.style.transform = transformScale;
  if (phaseText) phaseText.innerText = phase;
  if (timerText) timerText.innerText = `${seconds}s`;
}

function updateBreathTimer(seconds) {
  const timerText = document.getElementById('breathTimerText');
  if (timerText) timerText.innerText = `${seconds}s`;
}
