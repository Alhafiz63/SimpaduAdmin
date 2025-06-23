<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin Prodi</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e5e5e5;
            min-height: 100vh;

        }

        /* Sidebar dan user card */
        aside {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            z-index: 100;
            overflow-y: auto;
        }

        .user-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            background-color: #f9f9f9;
            margin-bottom: 1.5rem;
        }

        .user-card img {
            border-radius: 50%;
            width: 48px;
            height: 48px;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }

        .user-card strong {
            display: block;
            font-size: 14px;
            color: #333;
        }

        .user-card small {
            font-size: 12px;
            color: #777;
        }

        .nav-menu {
            list-style: none;
            margin-bottom: auto;
            padding-left: 0;
        }

        .has-dropdown {
            position: relative;
        }

        .dropdown-toggle {
            cursor: pointer;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chevron {
            width: 16px;
            height: 16px;
            margin-left: auto;
            transition: transform 0.2s;
        }

        .submenu {
            display: none;
            list-style: none;
            padding-left: 32px;
            margin: 0;
        }

        .submenu-arrow {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            vertical-align: middle;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .submenu li a {
            display: flex;
            align-items: center;
            gap: 6px;
            background: none;
            color: #444;
            border-radius: 4px;
            padding: 0.4rem 0.5rem;
            position: relative;
            font-size: 14px;
        }

        .submenu li a .active-arrow {
            display: none;
        }

        .submenu li a.active {
            background: #1669f2;
            color: #fff;
        }

        .submenu li a.active .default-arrow {
            display: none;
        }

        .submenu li a.active .active-arrow {
            display: inline;
            filter: brightness(0) invert(1);
        }

        .submenu li a:hover {
            background: #f0f4ff;
            color: #1669f2;
        }

        .has-dropdown.open>.submenu {
            display: block;
        }

        .has-dropdown.open>.dropdown-toggle .chevron {
            transform: rotate(180deg);
        }

        .nav-menu li {
            margin: 0.5rem 0;
        }

        .nav-menu li a {
            display: flex;
            align-items: center;
            padding: 0.6rem 1rem;
            text-decoration: none;
            color: #333;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }

        .nav-menu li a.active,
        .nav-menu li a:hover {
            background-color: #1669f2;
            color: white;
        }

        .nav-menu li a img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .nav-menu li a.active img {
            filter: brightness(0) invert(1);
        }

        .bottom-menu {
            margin-top: auto;
        }

        main {
            margin-left: 240px;
            padding: 32px 32px 32px 32px;
            min-height: 100vh;
            background: #e5e5e5;
            max-width: calc(100vw - 240px);
            overflow-x: hidden;
            box-sizing: border-box;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 16px;
        }

        .left-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .right-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 24px 28px;
        }

        .stat-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .stat-card {
            flex: 1;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            padding: 20px 18px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
        }

        .stat-card .icon {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 28px;
            height: 28px;
            background: #f4f4f4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card .icon img {
            width: 30px;
            height: 30px;
        }

        .stat-card strong {
            font-size: 15px;
            color: #333;
            margin-bottom: 8px;
        }

        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .stat-card .stat-badge {
            display: inline-block;
            font-size: 13px;
            padding: 2px 10px;
            border-radius: 12px;
            margin-left: 8px;
            font-weight: 500;
        }

        .stat-badge.up {
            background: #e6f9ed;
            color: #22c55e;
        }

        .stat-badge.down {
            background: #ffeaea;
            color: #f87171;
        }

        .time-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .time-card {
            flex: 1;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            padding: 20px 18px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .time-card .label {
            font-size: 15px;
            color: #333;
            margin-bottom: 8px;
        }

        .time-card .value {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .time-card small {
            color: #666;
        }

        .chart-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 24px 28px;
        }

        .calendar-card h3,
        .notif-card h3,
        .chart-card h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #222;
        }

        .calendar-card {
            margin-bottom: 0;
        }

        #calendar-month {
            font-size: 15px;
            font-weight: 500;
            background: #f4f4f4;
            border: none;
            border-radius: 6px;
            padding: 4px 16px;
            margin-right: 8px;
            min-width: 90px;
            text-align: center;
            display: inline-block;
        }

        .calendar-box {
            background: #f8f9fb;
            border-radius: 10px;
            padding: 18px;
            text-align: center;
            margin-bottom: 18px;
        }

        .calendar-box>div[style*="display:flex"] button {
            border: 1px solid #bbb;
            background: #fff;
            border-radius: 6px;
            width: 28px;
            height: 28px;
            font-size: 16px;
            color: #444;
            margin-left: 2px;
            transition: background 0.2s;
            cursor: pointer;
        }

        .calendar-box>div[style*="display:flex"] button:hover {
            background: #f0f4ff;
            border-color: #1669f2;
            color: #1669f2;
        }

        .calendar-box .calendar-header {
            font-size: 15px;
            color: #666;
            margin-bottom: 12px;
            font-weight: 400;
        }



        .calendar-days {
            display: flex;
            gap: 12px;
            justify-content: flex-start;
            margin-bottom: 18px;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 2px;
        }

        .calendar-day {
            min-width: 64px;
            min-height: 64px;
            background: #fff;
            border: 2px solid #e5e7eb;
            border-radius: 0px;
            text-align: center;
            font-size: 16px;
            color: #222;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: background 0.2s, color 0.2s, border 0.2s;
            box-sizing: border-box;
            padding: 0;
            position: relative;
        }

        .calendar-day.active {
            background: #1669f2;
            color: #fff;
            border-color: #1669f2;
        }

        @media (max-width: 700px) {
            .calendar-day {
                min-width: 44px;
                min-height: 44px;
                font-size: 13px;
            }

            #calendar-month {
                min-width: 60px;
                font-size: 13px;
                padding: 2px 8px;
            }
        }

        .calendar-box .calendar-day {
            min-width: 40px;
            /* Atur lebar minimum agar tidak terlalu kecil */
            text-align: center;
            box-sizing: border-box;
        }

        .calendar-box .calendar-day.active {
            background: #1669f2;
            color: #fff;
            border: none;
        }

        .calendar-empty {
            margin-top: 18px;
            color: #888;
            font-size: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .calendar-empty img {
            width: 48px;
            opacity: 0.5;
        }

        .notif-card {
            margin-top: 0;
        }

        .notif-card h3 {
            margin-bottom: 4px;
        }

        .notif-card .notif-desc {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }

        .notif-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .notif-item {
            background: #ffe066;
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 14px;
            color: #444;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notif-item .notif-icon {
            width: 18px;
            height: 18px;
        }
    </style>
</head>

<body>

    <aside>
        <div class="user-card">
            <img src="/images/admin.png" alt="Admin Akademik">
            <strong>Admin Prodi</strong>
            <small>adminakademik@example.com</small>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="/prodi/dashboard" class="active">
                    <img src="/images/dashboard.png" alt="Dashboard">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/prodi/nilai">
                    <img src="/images/report.png" alt="Nilai">
                    Nilai
                </a>
            </li>
            <li>
                <a href="/prodi/kurikulum">
                    <img src="/images/report-analytics.png" alt="Kurikulum">
                    Kurikulum
                </a>
            </li>
            <li class="has-dropdown">
                <a href="#mata-kuliah" class="dropdown-toggle">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/folder.png" alt="Mata Kuliah">
                        Mata Kuliah
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu">
                    <li>
                        <a href="/prodi/matkul" class="{{ request()->is('buat-mata-kuliah') ? 'active' : '' }}">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Buat Mata Kuliah
                        </a>
                    </li>
                    <li>
                        <a href="/prodi/dosen" class="{{ request()->is('dosen') ? 'active' : '' }}">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Pilih Dosen
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#presensi" class="dropdown-toggle">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/person-badge.png" alt="Presensi">
                        Presensi
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu">
                    <li>
                        <a href="/prodi/presensi-mahasiswa" class="{{ request()->is('presensi-mahasiswa') ? 'active' : '' }}">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="/prodi/presensi-dosen" class="{{ request()->is('presensi-dosen') ? 'active' : '' }}">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Dosen
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#laporan" class="dropdown-toggle">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/document-report.png" alt="Laporan">
                        Laporan
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu">
                    <!-- Tambahkan submenu laporan nanti -->
                </ul>
            </li>
        </ul>

        <div class="bottom-menu">
            <ul class="nav-menu">
                <li>
                    <a href="/help">
                        <img src="/images/help-circle.png" alt="Help me">
                        Help me
                    </a>
                </li>
                <li>
                    <a href="/login">
                        <img src="/images/logout.png" alt="Keluar">
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="dashboard-grid">

            <div class="left-col">
                <div class="card calendar-card">
                    <h3>Kalender</h3>
                    <div class="calendar-box">
                        <div class="calendar-header">Biar nggak lupa, biar lebih teratur, pelan-pelan bareng, ya.</div>
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                            <span id="calendar-month" style="font-size:13px;color:#888;"></span>
                            <div>
                                <button id="prev-month">&#8592;</button>
                                <button id="next-month">&#8594;</button>
                            </div>
                        </div>
                        <div class="calendar-days" id="calendar-days"></div>
                        <div class="calendar-empty" id="calendar-empty">
                            <img src="/images/calendar-sad.png" alt="empty">
                            Hari ini masih kosong di kalender
                            <span style="font-size:12px;color:#aaa;">Tapi nggak apa-apa, nggak semua hari harus
                                sibuk</span>
                        </div>
                    </div>
                </div>
                <div class="card notif-card">
                    <h3>Notifikasi</h3>
                    <div class="notif-desc">Semua aktivitas terbaru, langsung terlihat.</div>
                    <div style="margin-bottom:10px;">
                        <select style="padding:4px 10px;border-radius:6px;border:1px solid #ccc;font-size:13px;">
                            <option>Hari ini</option>
                            <option>Minggu ini</option>
                            <option>Bulan ini</option>
                        </select>
                    </div>
                    <div class="notif-list">
                        <div class="notif-item">
                            <img src="/images/mahasiswa.png" class="notif-icon" alt="user">
                            <span><b>SuperAdmin :</b> Sistem sedang mengalami Maintanace</span>
                            <span style="margin-left:auto;font-size:12px;color:#888;">1 menit yang lalu</span>
                        </div>
                        <div class="notif-item">
                            <img src="/images/mahasiswa.png" class="notif-icon" alt="user">
                            <span><b>SuperAdmin :</b> Sistem sedang mengalami Maintanace</span>
                            <span style="margin-left:auto;font-size:12px;color:#888;">1 menit yang lalu</span>
                        </div>
                        <div class="notif-item">
                            <img src="/images/mahasiswa.png" class="notif-icon" alt="user">
                            <span><b>SuperAdmin :</b> Sistem sedang mengalami Maintanace</span>
                            <span style="margin-left:auto;font-size:12px;color:#888;">1 menit yang lalu</span>
                        </div>
                        <div class="notif-item">
                            <img src="/images/mahasiswa.png" class="notif-icon" alt="user">
                            <span><b>SuperAdmin :</b> Sistem sedang mengalami Maintanace</span>
                            <span style="margin-left:auto;font-size:12px;color:#888;">1 menit yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-col">
                <div class="stat-cards">
                    <div class="stat-card">
                        <strong>Total Mahasiswa</strong>
                        <div class="stat-value">4.231
                            <span class="stat-badge up">+5.3%</span>
                        </div>
                        <div class="icon"><img src="/images/person1.png" alt="mahasiswa"></div>
                    </div>
                    <div class="stat-card">
                        <strong>Total Dosen</strong>
                        <div class="stat-value">0089
                            <span class="stat-badge down">-5.3%</span>
                        </div>
                        <div class="icon"><img src="/images/person1.png" alt="dosen"></div>
                    </div>
                    <div class="stat-card">
                        <strong>Total Terminal</strong>
                        <div class="stat-value">0034
                            <span class="stat-badge up">+5.3%</span>
                        </div>
                        <div class="icon"><img src="/images/person1.png" alt="terminal"></div>
                    </div>
                </div>
                <div class="time-cards">
                    <div class="time-card">
                        <div class="label">Waktu saat ini :</div>
                        <div class="value" id="current-time">18:23</div>
                        <small>Senin 28 Juli 2025</small>
                    </div>
                    <div class="time-card">
                        <div class="label">Minggu ke :</div>
                        <div class="value">15</div>
                        <small>Semester Ganjil 2025</small>
                    </div>
                </div>
                <div class="chart-card">
                    <h3>Total Pendaftar per Tahun</h3>
                    <canvas id="chartCanvas" height="200"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Waktu real-time
        function updateClock() {
            const now = new Date();
            document.getElementById('current-time').innerText = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Chart
        const ctx = document.getElementById('chartCanvas').getContext('2d');
        // Gradien warna
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, '#90caf9'); // Warna biru muda
        gradient.addColorStop(1, '#42a5f5'); // Warna biru lebih gelap

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2010', '2013', '2016', '2019', '2022', '2025'],
                datasets: [{
                    label: 'Total Pendaftar',
                    data: [50, 120, 70, 110, 30, 130],
                    backgroundColor: gradient, // Gunakan gradien
                    borderColor: '#1e88e5', // Border biru gelap
                    borderWidth: 2 // Ketebalan border
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        grid: {
                            display: false // Hilangkan grid horizontal
                        },
                        ticks: {
                            color: '#666', // Warna label sumbu X
                            font: {
                                size: 12 // Ukuran font label
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: '#e0e0e0', // Warna grid sumbu Y
                            lineWidth: 1 // Ketebalan garis grid
                        },
                        ticks: {
                            color: '#666', // Warna label sumbu Y
                            font: {
                                size: 12 // Ukuran font label
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: '#1e88e5', // Background tooltip
                        titleColor: '#fff', // Warna judul tooltip
                        bodyColor: '#fff', // Warna isi tooltip
                        borderColor: '#90caf9', // Border tooltip
                        borderWidth: 1 // Ketebalan border tooltip
                    }
                },
                animation: {
                    duration: 1000, // Durasi animasi
                    easing: 'easeInOutBounce' // Jenis animasi
                }
            }
        });

        document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const li = this.closest('.has-dropdown');
                li.classList.toggle('open');
                document.querySelectorAll('.has-dropdown').forEach(function(otherLi) {
                    if (otherLi !== li) otherLi.classList.remove('open');
                });
            });
        });

        const monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        const dayNames = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

        let today = new Date();
        let baseDate = new Date(today); // Tanggal awal tampilan minggu (real time)
        let weekOffset = 0; // Offset minggu dari hari ini

        function renderCalendar6Days() {
            const daysContainer = document.getElementById('calendar-days');
            const monthLabel = document.getElementById('calendar-month');
            daysContainer.innerHTML = "";

            // Hitung tanggal mulai minggu ini (dari hari ini + offset)
            let startDate = new Date(today);
            startDate.setDate(today.getDate() + weekOffset * 6);

            // Set label bulan
            monthLabel.textContent = `${monthNames[startDate.getMonth()]} ${startDate.getFullYear()}`;

            // Render 6 hari ke depan
            for (let i = 0; i < 6; i++) {
                let d = new Date(startDate);
                d.setDate(startDate.getDate() + i);
                let isToday =
                    d.getDate() === today.getDate() &&
                    d.getMonth() === today.getMonth() &&
                    d.getFullYear() === today.getFullYear();
                daysContainer.innerHTML += `
            <div class="calendar-day${isToday ? ' active' : ''}">
                ${dayNames[d.getDay()]}<br>${d.getDate()}
            </div>
        `;
            }
        }

        // Tombol navigasi
        document.getElementById('prev-month').onclick = function() {
            weekOffset--;
            renderCalendar6Days();
        };
        document.getElementById('next-month').onclick = function() {
            weekOffset++;
            renderCalendar6Days();
        };

        renderCalendar6Days();
    </script>
</body>

</html>
