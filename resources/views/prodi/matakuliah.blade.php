<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Mata Kuliah</title>
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

        /* Table Mata Kuliah */
        .matkul-table-container {
            background: #fff;
            border-radius: 10px;
            padding: 32px 24px 18px 24px;
            margin-top: 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .matkul-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .matkul-table th,
        .matkul-table td {
            padding: 12px 10px;
            text-align: left;
            font-size: 15px;
        }

        .matkul-table th {
            background: #f5f7fa;
            font-weight: 700;
            color: #222;
            border-bottom: 2px solid #e5e5e5;
        }

        .matkul-table td {
            border-bottom: 1px solid #f0f0f0;
            color: #222;
        }

        .matkul-table tr:last-child td {
            border-bottom: none;
        }

        .matkul-table td.actions {
            display: flex;
            gap: 8px;
        }

        .btn-edit,
        .btn-delete {
            border: none;
            background: transparent;
            padding: 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            background: #ffffff;
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

        .pagination button:hover {
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
                <a href="#mata-kuliah" class="dropdown-toggle active">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/folder.png" alt="Mata Kuliah">
                        Mata Kuliah
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu">
                    <li>
                        <a href="/matkul" class="active">
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
                        <a href="/presensi-mahasiswa">
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
        <div class="title">Manajemen Mata Kuliah</div>
        <div class="subtitle">Kelola Kelas dengan Mudah dan Terstruktur</div>
        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
        </div>
        <div class="action-bar">
            <div class="filter-dropdown-wrapper" style="position:relative;">
                <button id="filterBtn" class="btn">
                    <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                    Filter
                </button>
                <div id="filterDropdown"
                    style="display:none;position:absolute;right:0;top:110%;background:#fff;border:1px solid #ddd;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.07);padding:1rem;min-width:220px;z-index:10;">
                    <div style="margin-bottom:1rem;">
                        <label for="filterProdi" style="font-size:13px;color:#444;">Program Studi</label>
                        <select id="filterProdi" class="filter-dropdown"
                            style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                            <option value="">Semua Prodi</option>
                            <option value="Sastra Informatika">Sastra Informatika</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                        </select>
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label for="filterSemester" style="font-size:13px;color:#444;">Semester</label>
                        <select id="filterSemester" class="filter-dropdown"
                            style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                            <option value="">Semua Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div style="text-align:right;">
                        <button id="applyFilter" class="btn btn-primary" style="margin-top:8px;">Terapkan</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="btnTambahMatkul">Tambah</button>
        </div>
        <div class="matkul-table-container">
            <table class="matkul-table" id="matkulTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>Nama</th>
                        <th>Kode Matkul</th>
                        <th>Program Studi</th>
                        <th>Semester</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                            <td><input type="checkbox" class="row-check"></td>
                            <td>Logika Sastra</td>
                            <td>CH239</td>
                            <td>Sastra Informatika</td>
                            <td>2</td>
                            <td class="actions" style="justify-content:center;">
                                <button class="btn-edit" title="Edit">
                                    <img src="/images/edit.png" alt="Edit">
                                </button>
                                <button class="btn-delete" title="Delete">
                                    <img src="/images/delete.png" alt="Delete">
                                </button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

        </div>

        <div class="pagination">
            <button>&lt;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&gt;</button>
        </div>

        <div id="modalMatkul"
            style="display:none;position:fixed;z-index:10000;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;width:90vw;max-height:90vh;overflow-y:auto;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Form Mata Kuliah</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Buat Mata Kuliah dengan Cepat dan Mudah
                </div>
                <hr style="margin-bottom:32px;">
                <form>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Nama Mata Kuliah</label>
                        <input type="text"
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                    </div>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Kode Mata Kuliah</label>
                        <input type="text"
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                    </div>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Program Studi</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Program Studi yang kamu inginkan</option>
                            <option>Sastra Informatika</option>
                            <option>Teknik Informatika</option>
                        </select>
                    </div>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Semester</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Semester yang kamu inginkan</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:38px;">
                        <button type="button" id="btnBatalMatkul"
                            style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                        <button type="submit"
                            style="padding:12px 38px;border-radius:8px;background:#0057d8;color:#fff;font-size:17px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
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

        // Filter logic
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterProdi = document.getElementById('filterProdi');
        const filterSemester = document.getElementById('filterSemester');
        const searchInput = document.getElementById('searchInput');
        const matkulTable = document.getElementById('matkulTable').getElementsByTagName('tbody')[0];

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

        function filterMatkul() {
            const prodi = filterProdi.value;
            const semester = filterSemester.value;
            const search = searchInput.value.toLowerCase();
            Array.from(matkulTable.rows).forEach(row => {
                const rowProdi = row.cells[3].textContent;
                const rowSemester = row.cells[4].textContent;
                const rowNama = row.cells[1].textContent.toLowerCase();
                const rowKode = row.cells[2].textContent.toLowerCase();
                let show = true;
                if (prodi && rowProdi !== prodi) show = false;
                if (semester && rowSemester !== semester) show = false;
                if (search && !(rowNama.includes(search) || rowKode.includes(search))) show = false;
                row.style.display = show ? '' : 'none';
            });
        }

        applyFilter.addEventListener('click', function(e) {
            e.preventDefault();
            filterMatkul();
            filterDropdown.style.display = 'none';
        });

        searchInput.addEventListener('input', function() {
            filterMatkul();
        });

        const btnTambahMatkul = document.getElementById('btnTambahMatkul');
        const modalMatkul = document.getElementById('modalMatkul');
        const btnBatalMatkul = document.getElementById('btnBatalMatkul');

        btnTambahMatkul.addEventListener('click', function() {
            modalMatkul.style.display = 'block';
        });
        btnBatalMatkul.addEventListener('click', function() {
            modalMatkul.style.display = 'none';
        });
        modalMatkul.addEventListener('click', function(e) {
            if (e.target === modalMatkul) modalMatkul.style.display = 'none';
        });

        const checkAll = document.getElementById('checkAll');
        const rowChecks = document.querySelectorAll('.row-check');

        checkAll.addEventListener('change', function() {
            rowChecks.forEach(cb => cb.checked = checkAll.checked);
        });

        // Jika semua dicentang manual, centang juga yang atas
        rowChecks.forEach(cb => {
            cb.addEventListener('change', function() {
                checkAll.checked = Array.from(rowChecks).every(cb => cb.checked);
            });
        });
    </script>
</body>

</html>
