<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Mahasiswa</title>

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
            padding: 32px 32px 32px 32px;
            min-height: 100vh;
            background: #e5e5e5;
            max-width: calc(100vw - 240px);
            overflow-x: hidden;
            box-sizing: border-box;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 0.25rem;
        }

        p.subtitle {
            color: #666;
            margin-bottom: 1.5rem;
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            text-align: left;
            padding: 0.75rem;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f9f9f9;
            font-weight: bold;
            font-size: 14px;
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

        .filter-dropdown-wrapper {
            position: relative;
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

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-outline {
            border: 1px solid #1669f2;
            background: white;
            color: #1669f2;
        }

        .btn-primary {
            background: #1669f2;
            color: white;
            border: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            text-align: center;
            min-width: 70px;
        }

        .status-aktif {
            background-color: #22c55e;
        }

        .status-sp1 {
            background-color: #facc15;
        }

        .status-sp2 {
            background-color: #fbbf24;
        }

        .status-sp3 {
            background-color: #f87171;
        }

        .status-terminal {
            background-color: #1f2937;
        }

        .status-tidak-aktif {
            background-color: #9ca3af;
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
                <a href="/prodi/dashboard">
                    <img src="/images/dashboard.png" alt="Dashboard">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/prodi/nilai" class="active">
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
        <h1>Mahasiswa</h1>
        <p class="subtitle">Kelola Mahasiswa dengan Mudah dan Terstruktur</p>

        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
        </div>

        <div class="action-bar" style="display: flex; justify-content: end; gap: 1rem; margin-bottom: 1rem;">
            <div class="filter-dropdown-wrapper">
                <button id="filterBtn" class="btn btn-outline">
                    <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                    Filter
                </button>
                <div id="filterDropdown">
                    <div style="margin-bottom:1rem;">
                        <label for="filterProdi">Prodi</label>
                        <select id="filterProdi">
                            <option value="">Semua Prodi</option>
                            <option value="TI Axioo 21">TI Axioo 21</option>
                            <option value="TI Axioo 22">TI Axioo 22</option>
                        </select>
                    </div>
                    <div style="margin-bottom:1rem;">
                        <label for="filterSemester">Semester</label>
                        <select id="filterSemester">
                            <option value="">Semua Semester</option>
                            <option value="18">18</option>
                            <option value="17">17</option>
                            <option value="16">16</option>
                        </select>
                    </div>
                    <div>
                        <label for="filterStatus">Status</label>
                        <select id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="SP1">SP1</option>
                            <option value="SP2">SP2</option>
                            <option value="SP3">SP3</option>
                            <option value="Terminal">Terminal</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div style="margin-top:1rem; text-align:right;">
                        <button id="applyFilter" class="btn btn-primary">Terapkan</button>
                    </div>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Profil Mahasiswa</th>
                    <th>Kelas</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody id="academicTable"></tbody>
        </table>

        <div class="pagination">
            <button>&lt;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&gt;</button>
        </div>
    </main>

    <script>
        const dataMahasiswa = [{
                nama: 'Jonathan Alexander Prasetyo Wicaksana',
                nim: 'C030321293',
                kelas: 'TI Axioo 21',
                sks: 22,
                semester: 18,
                status: 'Aktif',
                ipk: 3.23,
                foto: '/images/mahasiswa.png'
            },
            {
                nama: 'Siti Nurhaliza',
                nim: 'C030321294',
                kelas: 'TI Axioo 22',
                sks: 20,
                semester: 17,
                status: 'SP1',
                ipk: 2.95,
                foto: '/images/mahasiswa.png'
            },
            {
                nama: 'Budi Santoso',
                nim: 'C030321295',
                kelas: 'TI Axioo 21',
                sks: 21,
                semester: 16,
                status: 'SP2',
                ipk: 2.70,
                foto: '/images/mahasiswa.png'
            },
            {
                nama: 'Agus Wijaya',
                nim: 'C030321296',
                kelas: 'TI Axioo 22',
                sks: 19,
                semester: 18,
                status: 'SP3',
                ipk: 2.40,
                foto: '/images/mahasiswa.png'
            },
            {
                nama: 'Dewi Lestari',
                nim: 'C030321297',
                kelas: 'TI Axioo 21',
                sks: 18,
                semester: 17,
                status: 'Terminal',
                ipk: 2.10,
                foto: '/images/mahasiswa.png'
            },
            {
                nama: 'Rizky Ramadhan',
                nim: 'C030321298',
                kelas: 'TI Axioo 22',
                sks: 17,
                semester: 16,
                status: 'Tidak Aktif',
                ipk: 1.90,
                foto: '/images/mahasiswa.png'
            }
        ];

        const searchInput = document.getElementById('searchInput');
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterProdi = document.getElementById('filterProdi');
        const filterSemester = document.getElementById('filterSemester');
        const filterStatus = document.getElementById('filterStatus');
        const selectAll = document.getElementById('selectAll');
        const academicTable = document.getElementById('academicTable');

        function renderMahasiswaTable() {
            academicTable.innerHTML = '';
            const searchValue = searchInput.value.toLowerCase();
            const prodiValue = filterProdi.value;
            const semesterValue = filterSemester.value;
            const statusValue = filterStatus.value;

            dataMahasiswa.forEach(mhs => {
                if (searchValue && !mhs.nama.toLowerCase().includes(searchValue)) return;
                if (prodiValue && mhs.kelas !== prodiValue) return;
                if (semesterValue && String(mhs.semester) !== semesterValue) return;
                if (statusValue && mhs.status !== statusValue) return;

                let statusClass = '';
                switch (mhs.status.toLowerCase()) {
                    case 'aktif':
                        statusClass = 'status-aktif';
                        break;
                    case 'sp1':
                        statusClass = 'status-sp1';
                        break;
                    case 'sp2':
                        statusClass = 'status-sp2';
                        break;
                    case 'sp3':
                        statusClass = 'status-sp3';
                        break;
                    case 'terminal':
                        statusClass = 'status-terminal';
                        break;
                    case 'tidak aktif':
                        statusClass = 'status-tidak-aktif';
                        break;
                }

                const row = document.createElement('tr');
                row.innerHTML = `
          <td><input type="checkbox" class="row-checkbox"></td>
          <td>
            <div style="display:flex; align-items:center; gap:10px;">
              <img src="${mhs.foto}" alt="${mhs.nama}" style="width:36px;height:36px;border-radius:50%;">
              <div>
                <strong style="font-size:14px;">${mhs.nama}</strong><br>
                <small style="color:#777;">${mhs.nim}</small>
              </div>
            </div>
          </td>
          <td>${mhs.kelas}</td>
          <td>${mhs.sks}</td>
          <td>${mhs.semester}</td>
          <td><span class="status-badge ${statusClass}">${mhs.status}</span></td>
          <td>${mhs.ipk}</td>
        `;
                academicTable.appendChild(row);
            });
        }

        function updateSelectAllState() {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            const checked = document.querySelectorAll('.row-checkbox:checked');
            selectAll.checked = checkboxes.length > 0 && checkboxes.length === checked.length;
        }

        function initEventListeners() {
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

            applyFilter.addEventListener('click', function() {
                renderMahasiswaTable();
                filterDropdown.style.display = 'none';
            });

            searchInput.addEventListener('input', renderMahasiswaTable);

            selectAll.addEventListener('change', function() {
                document.querySelectorAll('.row-checkbox').forEach(cb => {
                    cb.checked = this.checked;
                });
            });

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('row-checkbox')) {
                    updateSelectAllState();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderMahasiswaTable();
            initEventListeners();
        });

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
    </script>


</body>

</html>
