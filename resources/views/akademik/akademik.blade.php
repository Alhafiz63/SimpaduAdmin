<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Tahun Akademik</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            min-height: 100vh;
            background: #f4f4f4;
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
            /* Optional: tambahkan overflow-y jika sidebar lebih tinggi dari layar */
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
        }

        .nav-menu li a.active,
        .nav-menu li a:hover {
            background-color: #1669f2;
            color: white;
        }

        .nav-menu li a svg {
            margin-right: 0.5rem;
        }

        .bottom-menu {
            margin-top: auto;
        }

        main {
            flex: 1;
            padding: 2rem;
            background: #e5e5e5;
            margin-left: 240px;

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

        .action-buttons {
            display: flex;
            gap: 4px;
        }

        .action-buttons button {
            background: none;
            border: none;
            padding: 0;
            margin: 0 2px;
            cursor: pointer;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .action-buttons button:focus {
            outline: 1px solid #1669f2;
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

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-content {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.18);
            padding: 32px 32px 28px 32px;
            min-width: 380px;
            max-width: 95vw;
            width: 100%;
            animation: fadeIn 0.2s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.97);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .hidden {
            display: none !important;
        }

        .filter-dropdown-wrapper select {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Status badge */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
            font-weight: 500;
        }

        .status-active {
            background-color: #4ade80;
        }

        .status-inactive {
            background-color: #f87171;
        }

        /* Button styles */
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn.btn-outline {
            border: 1.5px solid #1669f2;
            background: #fff;
            color: #1669f2;
            font-size: 14px;
            font-weight: 500;
            padding: 0.6rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            box-shadow: none;
        }

        .btn.btn-outline:hover,
        .btn.btn-outline:focus {
            background: #f0f4ff;
            border-color: #1669f2;
            color: #1669f2;
        }

        .btn-primary {
            background: #1669f2;
            color: white;
            border: none;
        }
    </style>
</head>

<body>
    <aside>
        <div class="user-profile">
            <div class="user-card">
                <img src="/images/admin.png" alt="Admin Akademik">
                <strong>Admin Akademik</strong>
                <small>adminakademik@example.com</small>
            </div>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="/akademik/dashboard">
                    <img src="/images/dashboard.png" alt="Dashboard" style="width:20px;height:20px;margin-right:8px;">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/akademik/manajemenkelas">
                    <img src="/images/classroom.png" alt="Manajemen Kelas"
                        style="width:20px;height:20px;margin-right:8px;">
                    Manajemen Kelas
                </a>
            </li>
            <li>
                <a href="/akademik/mahasiswa">
                    <img src="/images/profile.png" alt="Mahasiswa" style="width:20px;height:20px;margin-right:8px;">
                    Mahasiswa
                </a>
            </li>
            <li>
                <a href="/akademik/akademik" class="active">
                    <img src="/images/calendar-event.png" alt="Tahun Akademik"
                        style="width:20px;height:20px;margin-right:8px;">
                    Tahun Akademik
                </a>
            </li>
        </ul>

        <div class="bottom-menu">
            <ul class="nav-menu">
                <li>
                    <a href="/help">
                        <img src="/images/help-circle.png" alt="Help me"
                            style="width:20px;height:20px;margin-right:8px;">
                        Help me
                    </a>
                </li>
                <li>
                    <a href="/login">
                        <img src="/images/logout.png" alt="Keluar" style="width:20px;height:20px;margin-right:8px;">
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <h1>Tahun Akademik</h1>
        <p class="subtitle">Kelola Kelas dengan Mudah dan Terstruktur</p>

        <div class="search-box">
            <input type="text" placeholder="Cari tahun akademik..." id="searchInput">
        </div>

        <div class="action-bar" style="display: flex; justify-content: end; gap: 1rem; margin-bottom: 1rem;">
            <div class="filter-dropdown-wrapper">
                <button id="filterBtn" class="btn btn-outline">
                    <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                    Filter
                </button>
                <div id="filterDropdown">
                    <div style="margin-bottom:1rem;">
                        <label for="filterTahun">Tahun Akademik</label>
                        <select id="filterTahun">
                            <option value="">Semua Tahun</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div>
                        <label for="filterStatus">Status</label>
                        <select id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div style="margin-top:1rem; text-align:right;">
                        <button id="applyFilter" class="btn btn-primary">Terapkan</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">
                Tambah
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Nama Tahun Akademik</th>
                    <th>Awal Perkuliahan</th>
                    <th>Akhir Perkuliahan</th>
                    <th>Status</th>
                    <th>Aksi</th>
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

    <div id="popupFormAkademik" class="popup hidden">
        <div class="popup-content" style="max-width:540px;width:100%;">
            <h2 style="font-size:2rem;font-weight:700;margin-bottom:0.5rem;">Form Tahun Akademik</h2>
            <div style="font-size:1.1rem;margin-bottom:2rem;color:#222;">Buat Tahun Akademik dengan Cepat dan Mudah
            </div>
            <hr style="margin-bottom:2.5rem;">
            <form>
                <div class="form-group" style="margin-bottom:1.5rem;">
                    <label for="kodeTahunAkademik" style="font-weight:600;margin-bottom:0.5rem;display:block;">Kode
                        Tahun Akademik</label>
                    <input type="text" id="kodeTahunAkademik" placeholder="Masukkan kode Tahun Akademik"
                        style="width:100%;padding:12px 14px;border-radius:6px;border:1px solid #bbb;font-size:16px;">
                </div>
                <div class="form-group" style="margin-bottom:1.5rem;">
                    <label for="namaTahunAkademik" style="font-weight:600;margin-bottom:0.5rem;display:block;">Nama
                        Tahun Akademik</label>
                    <input type="text" id="namaTahunAkademik" placeholder="Masukkan nama Tahun Akademik"
                        style="width:100%;padding:12px 14px;border-radius:6px;border:1px solid #bbb;font-size:16px;">
                </div>
                <div class="form-group" style="margin-bottom:1.5rem;">
                    <label for="statusTahunAkademik" style="font-weight:600;margin-bottom:0.5rem;display:block;">Status
                        Tahun Akademik</label>
                    <select id="statusTahunAkademik"
                        style="width:100%;padding:12px 14px;border-radius:6px;border:1px solid #bbb;font-size:16px;color:#888;">
                        <option value="">Pilih Status yang kamu inginkan</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:2.2rem;">
                    <label style="font-weight:600;margin-bottom:0.5rem;display:block;">Periode Tahun Akademik</label>
                    <div style="display:flex;gap:16px;">
                        <input type="text" id="awalTahunAkademik" placeholder="Masukkan awal Tahun Akademik"
                            style="flex:1;padding:12px 14px;border-radius:6px;border:1px solid #bbb;font-size:16px;">
                        <input type="text" id="akhirTahunAkademik" placeholder="Masukkan akhir Tahun Akademik"
                            style="flex:1;padding:12px 14px;border-radius:6px;border:1px solid #bbb;font-size:16px;">
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:2.5rem;">
                    <button type="button" class="btn btn-secondary"
                        style="border:1.5px solid #d00;color:#d00;background:#fff;padding:0.8rem 2.5rem;font-size:1.1rem;font-weight:500;"
                        onclick="closePopupAkademik()">Batal</button>
                    <button type="submit" class="btn btn-primary"
                        style="background:#1669f2;color:#fff;padding:0.8rem 2.5rem;font-size:1.1rem;font-weight:500;border:none;">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        // Data tahun akademik
        const tahunAkademik = [{
                nama: 'Tahun 2024-2025 Ganjil',
                awal: '23-02-2024',
                akhir: '23-07-2024',
                aktif: true
            },
            {
                nama: 'Tahun 2023-2024 Genap',
                awal: '01-08-2023',
                akhir: '15-01-2024',
                aktif: false
            },
            {
                nama: 'Tahun 2022-2023 Ganjil',
                awal: '10-02-2022',
                akhir: '20-07-2022',
                aktif: false
            }
        ];

        // DOM Elements
        const searchInput = document.getElementById('searchInput');
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterTahun = document.getElementById('filterTahun');
        const filterStatus = document.getElementById('filterStatus');
        const selectAll = document.getElementById('selectAll');
        const academicTable = document.getElementById('academicTable');

        // Render academic year table
        function renderAcademicTable(filter = '', tahun = '', status = '') {
            academicTable.innerHTML = '';
            const filterLower = filter.toLowerCase();

            tahunAkademik.forEach(item => {
                const tahunItem = item.nama.match(/\d{4}/)?.[0] || '';
                const statusItem = item.aktif ? 'Aktif' : 'Tidak Aktif';

                if (
                    item.nama.toLowerCase().includes(filterLower) &&
                    (tahun === '' || tahunItem === tahun) &&
                    (status === '' || statusItem === status)
                ) {
                    const row = document.createElement('tr');
                    const statusClass = item.aktif ? 'status-active' : 'status-inactive';

                    row.innerHTML = `
            <td><input type="checkbox" class="row-checkbox"></td>
            <td>${item.nama}</td>
            <td>${item.awal}</td>
            <td>${item.akhir}</td>
            <td><span class="status-badge ${statusClass}">${statusItem}</span></td>
            <td class="action-buttons">
              <button class="btn-edit" title="Edit">
                <img src="/images/edit.png" alt="Edit" style="width:25px;height:25px;">
              </button>
              <button class="btn-delete" title="Delete">
                <img src="/images/delete.png" alt="Delete" style="width:25px;height:25px;">
              </button>
            </td>
          `;
                    academicTable.appendChild(row);
                }
            });

            // Update select all checkbox state
            updateSelectAllState();
        }

        // Update select all checkbox state
        function updateSelectAllState() {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            const checked = document.querySelectorAll('.row-checkbox:checked');
            selectAll.checked = checkboxes.length > 0 && checkboxes.length === checked.length;
        }

        // Event listeners
        function initEventListeners() {
            // Toggle filter dropdown
            filterBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                filterDropdown.style.display = filterDropdown.style.display === 'block' ? 'none' : 'block';
            });

            // Prevent dropdown from closing when clicking inside
            filterDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                filterDropdown.style.display = 'none';
            });

            // Apply filters
            applyFilter.addEventListener('click', function() {
                renderAcademicTable(
                    searchInput.value,
                    filterTahun.value,
                    filterStatus.value
                );
                filterDropdown.style.display = 'none';
            });

            // Search input
            searchInput.addEventListener('input', function() {
                renderAcademicTable(
                    this.value,
                    filterTahun.value,
                    filterStatus.value
                );
            });

            // Select all checkbox
            selectAll.addEventListener('change', function() {
                document.querySelectorAll('.row-checkbox').forEach(cb => {
                    cb.checked = this.checked;
                });
            });

            // Individual row checkboxes
            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('row-checkbox')) {
                    updateSelectAllState();
                }
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderAcademicTable();
            initEventListeners();
        });

        // Popup Form Tahun Akademik
        const popupFormAkademik = document.getElementById('popupFormAkademik');
        const btnTambahAkademik = document.querySelector('.btn.btn-primary:not([id])'); // Ambil tombol tambah utama

        btnTambahAkademik.addEventListener('click', function(e) {
            e.preventDefault();
            popupFormAkademik.classList.remove('hidden');
        });

        function closePopupAkademik() {
            popupFormAkademik.classList.add('hidden');
        }

        // Tutup popup jika klik di luar konten
        popupFormAkademik.addEventListener('mousedown', function(e) {
            if (e.target === popupFormAkademik) {
                closePopupAkademik();
            }
        });
    </script>

    @include('edit')
</body>

</html>
