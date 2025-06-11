<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Kelas</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f6fa;
            color: #333;
        }

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
        }

        .user-card img {
            border-radius: 50%;
            width: 48px;
            height: 48px;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }

        .card img.card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
            margin-bottom: 8px;
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

        .bottom-menu {
            margin-top: auto;
        }

        main {
            margin-left: 240px;
            padding: 32px;
            min-height: 100vh;
            background: #e5e5e5;
            max-width: calc(100vw - 240px);
            overflow-x: hidden;
            box-sizing: border-box;
        }

        /* Footer di bagian bawah kartu */
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
        }

        /* Container untuk gambar bertumpuk */
        .image-stack {
            position: relative;
            display: flex;
            align-items: center;
        }

        /* Gambar bertumpuk */
        .stack-image {
            width: 40px;
            /* Ukuran gambar */
            height: 40px;
            border-radius: 50%;
            /* Membuat gambar menjadi bulat */
            border: 2px solid #fff;
            /* Border putih untuk memisahkan gambar */
            object-fit: cover;
            position: relative;
            margin-left: -10px;
            /* Tumpukan gambar */
            z-index: 1;
        }

        /* Mengatur z-index untuk tumpukan */
        .stack-image:nth-child(1) {
            z-index: 3;
        }

        .stack-image:nth-child(2) {
            z-index: 2;
        }

        .stack-image:nth-child(3) {
            z-index: 1;
        }

        /* Tombol Lihat Detail */
        .detail-link {
            font-size: 14px;
            color: #1669f2;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .detail-link:hover {
            color: #0057d8;
            text-decoration: underline;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
        }

        .search-box {
            width: 100%;
            margin-bottom: 1rem;
        }

        .search-box input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            color: #333;
            background: #fff;
            transition: border-color 0.2s ease;
        }

        .search-box input:focus {
            border-color: #1669f2;
            outline: none;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .action-bar .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0.6rem 1rem;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            border: 1px solid #ccc;
            background: #fff;
            color: #333;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-bar .btn:hover {
            background: #f0f4ff;
            border-color: #1669f2;
            color: #1669f2;
        }

        .action-bar .btn-primary {
            background: #1669f2;
            color: #fff;
            border: none;
        }

        .action-bar .btn-primary:hover {
            background: #0057d8;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
            justify-content: flex-start;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: auto;
            width: 350px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .filter-dropdown-wrapper {
            position: relative;
        }

        .filter-dropdown-wrapper label {
            font-size: 13px;
            color: #444;
        }

        .filter-dropdown-wrapper select {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .card a {
            font-size: 14px;
            color: #1669f2;
            text-decoration: none;
            font-weight: 500;
        }

        .card a:hover {
            text-decoration: underline;
        }


        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 200;
        }

        /* Popup Content */
        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease;
        }

        .popup-content h2 {
            margin-bottom: 1rem;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 14px;
            color: #333;
        }

        #filterDropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 110%;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 1rem;
            min-width: 220px;
            z-index: 10;
        }

        .filter-dropdown:focus {
            border-color: #1669f2;
            outline: none;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            color: #333;
        }

        .popup-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .popup-actions .btn {
            padding: 0.6rem 1rem;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .popup-actions .btn-secondary {
            background: #fff;
            color: #d00;
            border: 1px solid #d00;
        }

        .popup-actions .btn-secondary:hover {
            background: #ffe5e5;
        }

        .popup-actions .btn-primary {
            background: #1669f2;
            color: #fff;
            border: none;
        }

        .popup-actions .btn-primary:hover {
            background: #0057d8;
        }

        /* Hidden Class */
        .hidden {
            display: none;
        }

        .image-stack {
            position: relative;
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        /* Gambar bertumpuk */
        .stack-image {
            width: 40px;
            /* Ukuran gambar */
            height: 40px;
            border-radius: 50%;
            /* Membuat gambar menjadi bulat */
            border: 2px solid #fff;
            /* Border putih untuk memisahkan gambar */
            object-fit: cover;
            position: relative;
            margin-left: -10px;
            /* Tumpukan gambar */
            z-index: 1;
        }

        /* Mengatur z-index untuk tumpukan */
        .stack-image:nth-child(1) {
            z-index: 3;
        }

        .stack-image:nth-child(2) {
            z-index: 2;
        }

        .stack-image:nth-child(3) {
            z-index: 1;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>

    <aside>
        <div class="user-card">
            <img src="/images/admin.png" alt="Admin Akademik">
            <strong>Admin Akademik</strong>
            <small>adminakademik@example.com</small>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="/akademikdashboard">
                    <img src="/images/dashboard.png" alt="Dashboard">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/manajemenkelas" class="active">
                    <img src="/images/classroom.png" alt="Manajemen Kelas">
                    Manajemen Kelas
                </a>
            </li>
            <li>
                <a href="/mahasiswa">
                    <img src="/images/profile.png" alt="Mahasiswa">
                    Mahasiswa
                </a>
            </li>
            <li>
                <a href="/akademik">
                    <img src="/images/calendar-event.png" alt="Tahun Akademik">
                    Tahun Akademik
                </a>
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
        <header>
            <div class="title">Manajemen Kelas</div>
            <div class="subtitle">Kelola kelas dengan mudah dan terstruktur</div>
            <div class="search-box">
                <input type="text" placeholder="Cari kelas...">
            </div>
            <div class="action-bar" style="display: flex; justify-content: end; gap: 1rem; margin-bottom: 1rem;">
                <div class="filter-dropdown-wrapper">
                    <button id="filterBtn" class="btn btn-outline">
                        <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                        Filter
                    </button>
                    <div id="filterDropdown">
                        <div style="margin-bottom:1rem;">
                            <label for="filterTahunAjaran">Tahun Ajaran</label>
                            <select id="filterTahunAjaran" class="filter-dropdown">
                                <option value="">Semua Tahun</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div>
                            <label for="filterProgramStudi">Program Studi</label>
                            <select id="filterProgramStudi" class="filter-dropdown">
                                <option value="">Semua Prodi</option>
                                <option value="TI">Teknik Informatika</option>
                                <option value="SI">Sistem Informasi</option>
                            </select>
                        </div>
                        <div style="margin-top:1rem; text-align:right;">
                            <button id="applyFilter" class="btn btn-primary">Terapkan</button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="showPopup()">Tambah</button>
            </div>
        </header>

        <div class="cards-container">
            <div class="card">
                <h3>TI Axioo 2023</h3>
                <p>Teknik Informatika - 2023/2024</p>
                <div class="card-footer">
                    <div class="image-stack">
                        <img src="/images/mahasiswa.png" alt="Student 1" class="stack-image">
                        <img src="/images/mahasiswa.png" alt="Student 2" class="stack-image">
                        <img src="/images/mahasiswa.png" alt="Student 3" class="stack-image">
                    </div>
                    <a href="/detail" class="detail-link">Lihat Detail</a>
                </div>
            </div>
            <div class="card">
                <h3>SI 2023 (A)</h3>
                <p>Sistem Informasi - 2023/2024</p>
                <div class="card-footer">
                    <div class="image-stack">
                        <img src="/images/mahasiswa.png" alt="Student 1" class="stack-image">
                        <img src="/images/mahasiswa.png" alt="Student 2" class="stack-image">
                        <img src="/images/mahasiswa.png" alt="Student 3" class="stack-image">
                    </div>
                    <a href="/detail" class="detail-link">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div id="popupForm" class="popup hidden">
            <div class="popup-content">
                <h2>Form Tambah Kelas</h2>
                <form>
                    <div class="form-group">
                        <label for="namaKelas">Nama Kelas</label>
                        <input type="text" id="namaKelas" placeholder="Masukkan nama kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="tipeKelas">Tipe Kelas</label>
                        <select id="tipeKelas">
                            <option value="">Pilih Tipe Kelas</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Karyawan">Kerja sama</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahunAjaran">Tahun Ajaran</label>
                        <select id="tahunAjaran">
                            <option value="">Pilih Tahun Ajaran</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="programStudi">Program Studi</label>
                        <select id="programStudi">
                            <option value="">Pilih Program Studi</option>
                            <option value="TI">Teknik Informatika</option>
                            <option value="SI">Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="popup-actions">
                        <button type="button" class="btn btn-secondary" onclick="closePopup()">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function showDetailKelas() {
            alert("Detail Kelas akan ditampilkan di sini.");
        }

        function showPopup() {
            document.getElementById('popupForm').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popupForm').classList.add('hidden');
        }

        // Ambil elemen filter
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterTahunAjaran = document.getElementById('filterTahunAjaran');
        const filterProgramStudi = document.getElementById('filterProgramStudi');

        // Tampilkan/sembunyikan dropdown filter
        filterBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            filterDropdown.style.display = filterDropdown.style.display === 'block' ? 'none' : 'block';
        });

        filterDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        document.addEventListener('click', function() {
            filterDropdown.style.display = 'none';
        });

        // Hapus event listener filter otomatis!
        // document.getElementById('filterTahunAjaran').addEventListener('change', filterKelas);
        // document.getElementById('filterProgramStudi').addEventListener('change', filterKelas);

        // Filter hanya saat klik Terapkan
        function filterKelas() {
            const tahunAjaran = filterTahunAjaran.value;
            const programStudi = filterProgramStudi.value;
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                const cardTahunAjaran = card.querySelector('p').textContent.includes(tahunAjaran);
                const cardProgramStudi = card.querySelector('h3').textContent.includes(programStudi);

                if (
                    (tahunAjaran === '' || cardTahunAjaran) &&
                    (programStudi === '' || cardProgramStudi)
                ) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        applyFilter.addEventListener('click', function(e) {
            e.preventDefault();
            filterKelas();
            filterDropdown.style.display = 'none';
        });
    </script>
</body>

</html>
