<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presensi Mahasiswa</title>
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
            padding: 32px;
            min-height: 100vh;
            background: #e5e5e5;
            max-width: calc(100vw - 240px);
            overflow-x: hidden;
            box-sizing: border-box;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 24px;
        }

        .search-box {
            width: 100%;
            margin-bottom: 1.5rem;
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
            justify-content: flex-end;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .btn {
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

        .btn:hover {
            background: #f0f4ff;
            border-color: #1669f2;
            color: #1669f2;
        }

        .btn-primary {
            background: #1669f2;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: #0057d8;
        }

        /* Table Presensi Mahasiswa */
        .presensi-table-container {
            background: #fff;
            border-radius: 10px;
            padding: 32px 24px 18px 24px;
            margin-top: 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .presensi-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .presensi-table th,
        .presensi-table td {
            padding: 12px 10px;
            text-align: left;
            font-size: 15px;
        }

        .presensi-table th {
            background: #f5f7fa;
            font-weight: 700;
            color: #222;
            border-bottom: 2px solid #e5e5e5;
        }

        .presensi-table td {
            border-bottom: 1px solid #f0f0f0;
            color: #222;
        }

        .presensi-table tr:last-child td {
            border-bottom: none;
        }

        .presensi-table td.actions {
            text-align: center;
        }

        .presensi-table td .lihat-link {
            color: #1669f2;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: text-decoration 0.2s;
        }

        .presensi-table td .lihat-link:hover {
            text-decoration: underline;
        }

        .pagination {
            text-align: right;
            padding: 1rem 0.5rem;
        }

        .pagination button {
            background: #eee;
            border: none;
            padding: 6px 10px;
            margin: 0 2px;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination button.active {
            background: #1669f2;
            color: #fff;
        }

        .pagination button:hover:not(.active) {
            background: #ccc;
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
                <a href="/prodidashboard">
                    <img src="/images/dashboard.png" alt="Dashboard">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/nilai">
                    <img src="/images/report.png" alt="Nilai">
                    Nilai
                </a>
            </li>
            <li>
                <a href="/kurikulum">
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
                        <a href="/matkul">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Buat Mata Kuliah
                        </a>
                    </li>
                    <li>
                        <a href="/dosen">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Pilih Dosen
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-dropdown open">
                <a href="#presensi" class="dropdown-toggle active">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/person-badge.png" alt="Presensi">
                        Presensi
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu" style="display:block;">
                    <li>
                        <a href="/presensi-mahasiswa" class="active">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="/presensi-dosen">
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
                    <a href="/logout">
                        <img src="/images/logout.png" alt="Keluar">
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="title">Presensi Mahasiswa</div>
        <div class="subtitle">Kelola Presensi Mahasiswa dengan Mudah dan Terstruktur</div>
        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
        </div>
        <div class="action-bar" style="position:relative;">
            <button id="filterBtn" class="btn">
                <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                Filter
            </button>
            <div id="filterDropdown"
                style="display:none;position:absolute;right:0;top:110%;background:#fff;border:1px solid #ddd;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.07);padding:1rem;min-width:220px;z-index:10;">
                <div style="margin-bottom:1rem;">
                    <label for="filterKelas" style="font-size:13px;color:#444;">Kelas</label>
                    <select id="filterKelas"
                        style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                        <option value="">Semua Kelas</option>
                        <option value="TI Axioo 2023">TI Axioo 2023</option>
                        <option value="TI Reguler 2022">TI Reguler 2022</option>
                    </select>
                </div>
                <div style="margin-bottom:1rem;">
                    <label for="filterMatkul" style="font-size:13px;color:#444;">Mata Kuliah</label>
                    <select id="filterMatkul"
                        style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                        <option value="">Semua Mata Kuliah</option>
                        <option value="Pemrograman Perangkat Bergerak">Pemrograman Perangkat Bergerak</option>
                        <option value="Basis Data">Basis Data</option>
                        <option value="Jaringan Komputer">Jaringan Komputer</option>
                    </select>
                </div>
                <div style="text-align:right;">
                    <button id="applyFilter" class="btn btn-primary" style="margin-top:8px;">Terapkan</button>
                </div>
            </div>
        </div>
        <div class="presensi-table-container">
            <table class="presensi-table" id="presensiTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Pegawai</th>
                        <th>Pertemuan</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Axioo 2023</td>
                        <td>Pemrograman Perangkat Bergerak</td>
                        <td>ARIFIN NOOR ASYIKIN, ST., MT</td>
                        <td>Pertemuan 1</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Reguler 2022</td>
                        <td>Basis Data</td>
                        <td>RINA SARI, S.Kom., M.Kom</td>
                        <td>Pertemuan 2</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Axioo 2023</td>
                        <td>Jaringan Komputer</td>
                        <td>ARIFIN NOOR ASYIKIN, ST., MT</td>
                        <td>Pertemuan 3</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Reguler 2022</td>
                        <td>Pemrograman Perangkat Bergerak</td>
                        <td>RINA SARI, S.Kom., M.Kom</td>
                        <td>Pertemuan 4</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Axioo 2023</td>
                        <td>Basis Data</td>
                        <td>ARIFIN NOOR ASYIKIN, ST., MT</td>
                        <td>Pertemuan 5</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-check"></td>
                        <td>TI Reguler 2022</td>
                        <td>Jaringan Komputer</td>
                        <td>RINA SARI, S.Kom., M.Kom</td>
                        <td>Pertemuan 6</td>
                        <td class="actions">
                            <a href="#" class="lihat-link">Lihat Mahasiswa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <button disabled>&lt;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&gt;</button>
        </div>
    </main>

    <script>
        // Dropdown sidebar
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

        // Filter logic hanya untuk Kelas dan Mata Kuliah
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterKelas = document.getElementById('filterKelas');
        const filterMatkul = document.getElementById('filterMatkul');
        const searchInput = document.getElementById('searchInput');
        const presensiTable = document.getElementById('presensiTable').getElementsByTagName('tbody')[0];

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

        function filterPresensi() {
            const kelas = filterKelas.value.toLowerCase();
            const matkul = filterMatkul.value.toLowerCase();
            const search = searchInput.value.toLowerCase();
            Array.from(presensiTable.rows).forEach(row => {
                const rowKelas = row.cells[1].textContent.toLowerCase();
                const rowMatkul = row.cells[2].textContent.toLowerCase();
                const rowPegawai = row.cells[3].textContent.toLowerCase();
                const rowPertemuan = row.cells[4].textContent.toLowerCase();
                let show = true;
                if (kelas && rowKelas !== kelas) show = false;
                if (matkul && rowMatkul !== matkul) show = false;
                if (
                    search &&
                    !(
                        rowKelas.includes(search) ||
                        rowMatkul.includes(search) ||
                        rowPegawai.includes(search) ||
                        rowPertemuan.includes(search)
                    )
                ) show = false;
                row.style.display = show ? '' : 'none';
            });
        }

        applyFilter.addEventListener('click', function(e) {
            e.preventDefault();
            filterPresensi();
            filterDropdown.style.display = 'none';
        });

        searchInput.addEventListener('input', function() {
            filterPresensi();
        });

        const checkAll = document.getElementById('checkAll');
        const rowChecks = document.querySelectorAll('.row-check');

        checkAll.addEventListener('change', function() {
            rowChecks.forEach(cb => cb.checked = checkAll.checked);
        });

        rowChecks.forEach(cb => {
            cb.addEventListener('change', function() {
                checkAll.checked = Array.from(rowChecks).every(cb => cb.checked);
            });
        });

        document.querySelectorAll('.lihat-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = '/detail-mahasiswa';
            });
        });
    </script>
</body>

</html>
