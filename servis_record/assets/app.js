// AutoTrack Service Record Interactive Controller

document.addEventListener("DOMContentLoaded", () => {
    // Data State for Vehicle Showcase
    const vehicleData = {
        motor: {
            name: "Yamaha Aerox 155 VVA (2023)",
            icon: "🛵",
            km: 18450,
            dashOffset: 120, // out of 283
            recentService: {
                title: "Ganti Oli Mesin & Oli Gardan",
                desc: "Servis Rutin Berkala di Bengkel Resmi Yamaha",
                price: "Rp 115.000",
                icon: "🛢️",
                iconClass: "icon-cyan"
            },
            nextService: {
                title: "Ganti Oli Mesin & Cek CVT",
                kmRemaining: "750 km lagi",
                progress: "82%"
            },
            inspection: [
                { label: "💡 Lampu Depan & Sein", status: "Aman", class: "badge-ok" },
                { label: "🛑 Kampas Rem Depan", status: "Aman", class: "badge-ok" },
                { label: "🔋 Tegangan Aki (12.4V)", status: "Aman", class: "badge-ok" },
                { label: "⚙️ V-Belt & Roller CVT", status: "Perlu Cek", class: "badge-warn" }
            ],
            bars: [45, 60, 30, 85, 50, 70]
        },
        mobil: {
            name: "Honda HR-V 1.5 SE (2022)",
            icon: "🚗",
            km: 48650,
            dashOffset: 70, // out of 283
            recentService: {
                title: "Servis 40.000 KM & Ganti Oli Sintetik",
                desc: "Oli 4L, Filter Oli, Filter AC, Tune Up",
                price: "Rp 1.250.000",
                icon: "🔧",
                iconClass: "icon-amber"
            },
            nextService: {
                title: "Spooring, Balancing & Rotasi Ban",
                kmRemaining: "1.350 km lagi",
                progress: "68%"
            },
            inspection: [
                { label: "💡 Lampu Proyektor LED", status: "Aman", class: "badge-ok" },
                { label: "🛑 Brake Pad & Minyak Rem", status: "Aman", class: "badge-ok" },
                { label: "🔋 Aki Kering 12V", status: "Aman", class: "badge-ok" },
                { label: "🛞 Tekanan & Alur Ban", status: "Perlu Cek", class: "badge-warn" }
            ],
            bars: [65, 80, 45, 95, 75, 90]
        }
    };

    let currentVehicle = "motor";

    // Selectors
    const motorBtn = document.getElementById("toggle-motor");
    const mobilBtn = document.getElementById("toggle-mobil");
    const vehicleBadge = document.getElementById("vehicle-name-badge");
    const odometerKm = document.getElementById("odometer-km");
    const gaugeProgress = document.getElementById("gauge-progress");
    const recentTitle = document.getElementById("recent-title");
    const recentDesc = document.getElementById("recent-desc");
    const recentPrice = document.getElementById("recent-price");
    const recentIcon = document.getElementById("recent-icon");
    const nextTitle = document.getElementById("next-title");
    const nextMeta = document.getElementById("next-meta");
    const nextProgress = document.getElementById("next-progress");
    const inspectionList = document.getElementById("inspection-items");
    const chartBars = document.querySelectorAll(".bar-pillar");

    // Animate Number Counter
    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (end - start) + start).toLocaleString("id-ID");
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Update UI on Vehicle Change
    function switchVehicle(type) {
        currentVehicle = type;
        const data = vehicleData[type];

        // Toggle Buttons
        if (type === "motor") {
            motorBtn.classList.add("active");
            mobilBtn.classList.remove("active");
        } else {
            mobilBtn.classList.add("active");
            motorBtn.classList.remove("active");
        }

        // Vehicle Badge & Odometer
        vehicleBadge.innerHTML = `<span>${data.icon}</span> ${data.name}`;
        animateValue(odometerKm, 0, data.km, 800);
        gaugeProgress.style.strokeDashoffset = data.dashOffset;

        // Recent Activity
        recentTitle.textContent = data.recentService.title;
        recentDesc.textContent = data.recentService.desc;
        recentPrice.textContent = data.recentService.price;
        recentIcon.textContent = data.recentService.icon;
        recentIcon.className = `activity-icon ${data.recentService.iconClass}`;

        // Next Maintenance
        nextTitle.textContent = data.nextService.title;
        nextMeta.textContent = `Estimasi jadwal: ${data.nextService.kmRemaining}`;
        nextProgress.style.width = data.nextService.progress;

        // Inspection Items
        inspectionList.innerHTML = "";
        data.inspection.forEach((item, index) => {
            const div = document.createElement("div");
            div.className = "check-item";
            div.innerHTML = `
                <span class="check-label">${item.label}</span>
                <span class="status-badge ${item.class}">${item.status}</span>
            `;
            // Interactive toggle on click
            div.addEventListener("click", () => {
                const badge = div.querySelector(".status-badge");
                if (badge.classList.contains("badge-ok")) {
                    badge.classList.remove("badge-ok");
                    badge.classList.add("badge-warn");
                    badge.textContent = "Perlu Cek";
                } else {
                    badge.classList.remove("badge-warn");
                    badge.classList.add("badge-ok");
                    badge.textContent = "Aman";
                }
            });
            inspectionList.appendChild(div);
        });

        // Chart Bars
        chartBars.forEach((bar, idx) => {
            bar.style.height = `${data.bars[idx]}%`;
        });
    }

    motorBtn?.addEventListener("click", () => switchVehicle("motor"));
    mobilBtn?.addEventListener("click", () => switchVehicle("mobil"));

    // Initial setup
    switchVehicle("motor");

    // ===== Interactive Service Cost Calculator =====
    const calcVehicleType = document.getElementById("calc-vehicle-type");
    const calcServiceType = document.getElementById("calc-service-type");
    const resultCost = document.getElementById("result-cost");
    const resultInterval = document.getElementById("result-interval");
    const breakdownPart = document.getElementById("breakdown-part");
    const breakdownLabor = document.getElementById("breakdown-labor");
    const breakdownTotal = document.getElementById("breakdown-total");

    const costRates = {
        motor: {
            oli: { part: 75000, labor: 25000, interval: "Setiap 2.500 - 3.000 KM" },
            tuneup: { part: 45000, labor: 65000, interval: "Setiap 6.000 - 8.000 KM" },
            cvt: { part: 140000, labor: 45000, interval: "Setiap 10.000 - 15.000 KM" },
            rem: { part: 65000, labor: 30000, interval: "Setiap 10.000 KM atau saat aus" },
            aki: { part: 240000, labor: 20000, interval: "Setiap 1.5 - 2 Tahun" }
        },
        mobil: {
            oli: { part: 450000, labor: 100000, interval: "Setiap 7.500 - 10.000 KM" },
            tuneup: { part: 350000, labor: 250000, interval: "Setiap 10.000 - 15.000 KM" },
            cvt: { part: 650000, labor: 200000, interval: "Setiap 20.000 - 40.000 KM" },
            rem: { part: 480000, labor: 150000, interval: "Setiap 20.000 KM atau saat aus" },
            aki: { part: 850000, labor: 50000, interval: "Setiap 2 - 3 Tahun" }
        }
    };

    function updateCalculator() {
        if (!calcVehicleType || !calcServiceType) return;
        const vType = calcVehicleType.value;
        const sType = calcServiceType.value;
        const data = costRates[vType][sType];

        const total = data.part + data.labor;
        resultCost.textContent = `Rp ${total.toLocaleString("id-ID")}`;
        resultInterval.textContent = `Interval Rekomendasi: ${data.interval}`;
        breakdownPart.textContent = `Biaya Part / Bahan: Rp ${data.part.toLocaleString("id-ID")}`;
        breakdownLabor.textContent = `Jasa Servis / Mekanik: Rp ${data.labor.toLocaleString("id-ID")}`;
        breakdownTotal.textContent = `Estimasi Total: Rp ${total.toLocaleString("id-ID")}`;
    }

    calcVehicleType?.addEventListener("change", updateCalculator);
    calcServiceType?.addEventListener("change", updateCalculator);
    updateCalculator();
});
