<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Presensi Mahasiswa</title>
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

        .detail-header {
            display: flex;
            gap: 24px;
            margin-bottom: 0;
        }

        .detail-info {
            background: none;
            border-radius: 10px;
            padding: 0;
            font-size: 16px;
            min-width: 340px;
            box-shadow: none;
        }

        .detail-info table {
            width: 100%;
        }

        .detail-info td {
            padding: 4px 8px 4px 0;
            vertical-align: top;
        }

        .detail-side {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-left: auto;
        }

        .detail-box {
            background: #fff;
            border-radius: 8px;
            padding: 16px 24px;
            font-size: 16px;
            min-width: 180px;
            text-align: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .presensi-list {
            width: 100%;
        }

        .presensi-count-group {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .presensi-count {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 15px;
            font-weight: 500;
            min-width: 36px;
            background: #f5f7fa;
            border-radius: 8px;
            padding: 8px 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        .presensi-hadir .count-label {
            color: #22c55e;
        }

        .presensi-sakit .count-label {
            color: #f59e42;
        }

        .presensi-ijin .count-label {
            color: #1669f2;
        }

        .presensi-alpa .count-label {
            color: #e74c3c;
        }

        .count-label {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .count-value {
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }

        .presensi-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .presensi-item:last-child {
            border-bottom: none;
        }

        .mhs-info {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mhs-info img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }

        .mhs-detail {
            display: flex;
            flex-direction: column;
        }

        .mhs-name {
            font-weight: 600;
            font-size: 16px;
            color: #222;
        }

        .mhs-nim {
            font-size: 14px;
            color: #666;
        }

        .presensi-radio-group {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .presensi-radio-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 13px;
            color: #222;
            gap: 2px;
        }

        .presensi-radio-label input[type="radio"] {
            margin-bottom: 2px;
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
            <strong>Admin Prodi</strong>
            <small>adminakademik@example.com</small>
        </div>
        <ul class="nav-menu">
            <li>
<<<<<<< HEAD
                <a href="/prodi">
=======
                <a href="/prodi/dashboard">
>>>>>>> main
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
                <a href="/mata-kuliah" class="dropdown-toggle">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/folder.png" alt="Mata Kuliah">
                        Mata Kuliah
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu">
                    <li>
<<<<<<< HEAD
                        <a href="/mata-kuliah/create">
=======
                        <a href="/prodi/matkul">
>>>>>>> main
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Buat Mata Kuliah
                        </a>
                    </li>
                    <li>
                        <a href="/prodi/dosen">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Pilih Dosen
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-dropdown open">
                <a href="/presensi" class="dropdown-toggle active">
                    <span style="display: flex; align-items: center;">
                        <img src="/images/person-badge.png" alt="Presensi">
                        Presensi
                    </span>
                    <img src="/images/chevron-down.png" alt="Dropdown" class="chevron">
                </a>
                <ul class="submenu" style="display:block;">
                    <li>
                        <a href="/prodi/presensi-mahasiswa" class="active">
                            <img src="/images/arrows-up-right.png" alt="" class="submenu-arrow default-arrow">
                            <img src="/images/arrow-ramp-right-3.png" alt="" class="submenu-arrow active-arrow">
                            Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="/prodi/presensi-dosen">
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
        <div class="title" style="margin-bottom:0;">TI Axioo 2023</div>
        <div style="display: flex; gap: 24px; margin-bottom: 24px; align-items: flex-start;">
            <div
                style="background:#fff;border-radius:10px;padding:24px 32px;min-width:340px;box-shadow:0 1px 4px rgba(0,0,0,0.07);">
                <table style="width:auto;">
                    <tr>
                        <td style="padding:4px 12px 4px 0;color:#666;">Nama Pegawai :</td>
                        <td style="font-weight:600;color:#222;">Arifin Noor Asyikin, ST, MT.</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 12px 4px 0;color:#666;">Mata Kuliah :</td>
                        <td style="color:#222;">Pemrograman Perangkat Bergerak</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 12px 4px 0;color:#666;">Kurikulum :</td>
                        <td style="color:#222;">Kurikulum Merdeka</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 12px 4px 0;color:#666;">Pertemuan :</td>
                        <td style="color:#222;">1</td>
                    </tr>
                </table>
            </div>
            <div
                style="background:#fff;border-radius:8px;padding:50px 14px;display:flex;gap:20px;align-items:center;box-shadow:0 1px 4px rgba(0,0,0,0.07);min-width:260px;max-height:54px;position:relative;left:0;">
                <div style="text-align:center;min-width:48px;">
                    <div style="font-size:12px;color:#22c55e;font-weight:600;">Hadir</div>
                    <div style="font-size:12px;color:#222;">23 dari 23</div>
                </div>
                <div style="text-align:center;min-width:48px;">
                    <div style="font-size:12px;color:#f59e42;font-weight:600;">Sakit</div>
                    <div style="font-size:12px;color:#222;">0 dari 23</div>
                </div>
                <div style="text-align:center;min-width:48px;">
                    <div style="font-size:12px;color:#1669f2;font-weight:600;">Ijin</div>
                    <div style="font-size:12px;color:#222;">0 dari 23</div>
                </div>
                <div style="text-align:center;min-width:48px;">
                    <div style="font-size:12px;color:#e74c3c;font-weight:600;">Tidak Hadir</div>
                    <div style="font-size:12px;color:#222;">0 dari 23</div>
                </div>
            </div>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
        </div>
        <div class="presensi-table-container">
            <div class="presensi-list" id="presensiList">
                @for ($i = 0; $i < 7; $i++)
                    <div class="presensi-item">
                        <div class="mhs-info">
                            <img src="/images/admin.png" alt="Foto Mahasiswa">
                            <div class="mhs-detail">
                                <span class="mhs-name">Guardian Fuad Verstappen</span>
                                <span class="mhs-nim">C030323127</span>
                            </div>
                        </div>
                        <div class="presensi-radio-group">
                            <label class="presensi-radio-label" style="color:#22c55e;">
                                <input type="radio" name="presensi{{ $i }}" value="H" disabled>
                                H
                            </label>
                            <label class="presensi-radio-label" style="color:#f59e42;">
                                <input type="radio" name="presensi{{ $i }}" value="S" disabled>
                                S
                            </label>
                            <label class="presensi-radio-label" style="color:#1669f2;">
                                <input type="radio" name="presensi{{ $i }}" value="I" disabled>
                                I
                            </label>
                            <label class="presensi-radio-label" style="color:#e74c3c;">
                                <input type="radio" name="presensi{{ $i }}" value="A" disabled>
                                A
                            </label>
                        </div>
                    </div>
                @endfor
            </div>
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
        // Search Mahasiswa
        const searchInput = document.getElementById('searchInput');
        const presensiList = document.getElementById('presensiList');
        searchInput.addEventListener('input', function() {
            const search = this.value.toLowerCase();
            Array.from(presensiList.children).forEach(item => {
                const nama = item.querySelector('.mhs-name').textContent.toLowerCase();
                const nim = item.querySelector('.mhs-nim').textContent.toLowerCase();
                item.style.display = (nama.includes(search) || nim.includes(search)) ? '' : 'none';
            });
        });

        // Dropdown sidebar
        document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.closest('.has-dropdown');
                parent.classList.toggle('open');
                // Optional: tutup dropdown lain
                document.querySelectorAll('.has-dropdown').forEach(function(item) {
                    if (item !== parent) item.classList.remove('open');
                });
            });
        });
    </script>


</body>

</html>
o
