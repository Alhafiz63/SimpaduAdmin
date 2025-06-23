<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kurikulum</title>
    <style>
        /* Copy all CSS from kurikulum.blade.php */
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

        .kurikulum-detail-box {
            background: #fff;
            border-radius: 10px;
            padding: 28px 32px 18px 32px;
            margin-bottom: 32px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
            max-width: 100%;
        }

        .kurikulum-detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kurikulum-detail-table td {
            padding: 8px 12px 8px 0;
            font-size: 16px;
            color: #222;
            vertical-align: top;
        }

        .kurikulum-detail-table td:first-child {
            font-weight: 600;
            width: 180px;
            color: #222;
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
            padding: 0.6rem 1.2rem;
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

        .matkul-list-container {
            background: #fff;
            border-radius: 10px;
            padding: 24px 24px 18px 24px;
            margin-top: 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .matkul-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            border-bottom: 1px solid #f0f0f0;
            padding: 18px 0 10px 0;
        }

        .matkul-row:last-child {
            border-bottom: none;
        }

        .matkul-info {
            display: flex;
            flex-direction: column;
        }

        .matkul-title {
            font-weight: 600;
            font-size: 16px;
            color: #222;
        }

        .matkul-kode-semester {
            font-size: 13px;
            color: #888;
            margin-top: 2px;
        }

        .matkul-actions {
            display: flex;
            gap: 1px;
        }

        .btn-edit,
        .btn-delete {
            border: none;
            background: transparent;
            padding: 6px 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .btn-edit:hover {
            background: #e3edfa;
        }

        .btn-delete:hover {
            background: #ffeaea;
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
                <a href="/prodi/dashboard">
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
                <a href="/prodi/kurikulum" class="active">
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
                        <a href="/prodi/matkul">
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
                        <a href="/prodi/presensi-mahasiswa">
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
        <div class="title">Detail Kurikulum</div>
        <div class="subtitle">Kelola Kurikulum dengan Mudah dan Terstruktur</div>
        <div class="kurikulum-detail-box">
            <table class="kurikulum-detail-table">
                <tr>
                    <td>Nama Kurikulum :</td>
                    <td><strong>Kurikulum Merdeka</strong></td>
                </tr>
                <tr>
                    <td>Tahun Akademik :</td>
                    <td>2024/2025</td>
                </tr>
                <tr>
                    <td>Program Studi :</td>
                    <td>Sastra Informatika</td>
                </tr>
            </table>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 24px; margin-bottom: 0;">
            <div class="search-box" style="margin-bottom:0; flex:1;">
                <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
            </div>
            <div class="action-bar" style="margin-bottom:0; flex-shrink:0;">
                <button id="filterBtn" class="btn">
                    <img src="/images/filter.png" alt="Filter" style="width:18px;height:18px;">
                    Filter
                </button>
                <button class="btn btn-primary" id="btnTambahMatkul">Tambah</button>
            </div>
        </div>
        <div class="matkul-list-container" id="matkulList">
            <!-- Dummy Data Mata Kuliah -->
            <div class="matkul-row">
                <div class="matkul-info">
                    <span class="matkul-title">Keamanan Jaringan</span>
                    <span class="matkul-kode-semester">KJ238 - Semester 4</span>
                </div>
                <div class="matkul-actions">
                    <button class="btn-edit" title="Edit">
                        <img src="/images/edit.png" alt="Edit" style="width:24px;height:24px;">
                    </button>
                    <button class="btn-delete" title="Delete">
                        <img src="/images/delete.png" alt="Hapus" style="width:24px;height:24px;">
                    </button>
                </div>
            </div>
            <div class="matkul-row">
                <div class="matkul-info">
                    <span class="matkul-title">Keamanan Jaringan</span>
                    <span class="matkul-kode-semester">KJ238 - Semester 4</span>
                </div>
                <div class="matkul-actions">
                    <button class="btn-edit" title="Edit">
                        <img src="/images/edit.png" alt="Edit" style="width:24px;height:24px;">
                    </button>
                    <button class="btn-delete" title="Delete">
                        <img src="/images/delete.png" alt="Hapus" style="width:24px;height:24px;">
                    </button>
                </div>
            </div>
            <div class="matkul-row">
                <div class="matkul-info">
                    <span class="matkul-title">Keamanan Jaringan</span>
                    <span class="matkul-kode-semester">KJ238 - Semester 4</span>
                </div>
                <div class="matkul-actions">
                    <button class="btn-edit" title="Edit">
                        <img src="/images/edit.png" alt="Edit" style="width:24px;height:24px;">
                    </button>
                    <button class="btn-delete" title="Delete">
                        <img src="/images/delete.png" alt="Hapus" style="width:24px;height:24px;">
                    </button>
                </div>
            </div>
            <div class="matkul-row">
                <div class="matkul-info">
                    <span class="matkul-title">Keamanan Jaringan</span>
                    <span class="matkul-kode-semester">KJ238 - Semester 4</span>
                </div>
                <div class="matkul-actions">
                    <button class="btn-edit" title="Edit">
                        <img src="/images/edit.png" alt="Edit" style="width:24px;height:24px;">
                    </button>
                    <button class="btn-delete" title="Delete">
                        <img src="/images/delete.png" alt="Hapus" style="width:24px;height:24px;">
                    </button>
                </div>
            </div>
            <div class="matkul-row">
                <div class="matkul-info">
                    <span class="matkul-title">Keamanan Jaringan</span>
                    <span class="matkul-kode-semester">KJ238 - Semester 4</span>
                </div>
                <div class="matkul-actions">
                    <button class="btn-edit" title="Edit">
                        <img src="/images/edit.png" alt="Edit" style="width:24px;height:24px;">
                    </button>
                    <button class="btn-delete" title="Delete">
                        <img src="/images/delete.png" alt="Hapus" style="width:24px;height:24px;">
                    </button>
                </div>
            </div>
        </div>
        <div id="modalMetodeMatkul"
            style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Metode Penambahan</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Tambah Mata Kuliah dengan Cepat dan Mudah
                </div>
                <hr style="margin-bottom:32px;">
                <div style="background:#cfe5ff;padding:18px 20px;border-radius:8px;margin-bottom:32px;">
                    <span style="font-weight:600;color:#1669f2;">Pilih Metode Penambahan Mata Kuliah</span><br>
                    <span style="color:#222;">Tentukan apakah ingin menyalin dari mata kuliah sebelumnya atau tambah
                        baru.</span>
                </div>
                <div style="display:flex;gap:40px;justify-content:center;margin-bottom:40px;">
                    <div id="btnSalinMatkul"
                        style="flex:1;max-width:300px;cursor:pointer;border:2px solid #222;border-radius:14px;padding:32px 0;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.2s;">
                        <div
                            style="background:#BFDDFF;border-radius:50%;width:54px;height:54px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                            <img src="/images/icon-salin.png" alt="Salin" style="width:32px;height:32px;">
                        </div>
                        <div style="font-weight:700;font-size:20px;color:#1669f2;margin-bottom:6px;">Salin Mata Kuliah
                        </div>
                        <div style="font-size:15px;color:#222;text-align:center;">Gunakan data mata kuliah sebelumnya
                            sebagai dasar</div>
                    </div>
                    <div id="btnTambahBaruMatkul"
                        style="flex:1;max-width:300px;cursor:pointer;border:2px solid #222;border-radius:14px;padding:32px 0;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.2s;">
                        <div
                            style="background:#b6ffc7;border-radius:50%;width:54px;height:54px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                            <img src="/images/icon-tambah.png" alt="Tambah" style="width:32px;height:32px;">
                        </div>
                        <div style="font-weight:700;font-size:20px;color:#22c55e;margin-bottom:6px;">Tambah Mata Kuliah
                            Baru</div>
                        <div style="font-size:15px;color:#222;text-align:center;">Buat data mata kuliah baru dari awal
                        </div>
                    </div>
                </div>
                <div style="text-align:left;">
                    <button type="button" id="btnBatalMetodeMatkul"
                        style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                </div>
            </div>
        </div>

        <!-- Modal Salin Mata Kuliah -->
        <div id="modalSalinMatkul"
            style="display:none;position:fixed;z-index:10000;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);overflow-y:auto;">
            <div
                style="background:#fff;max-width:700px;width:90vw;max-height:90vh;overflow-y:auto;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Form Mata Kuliah</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Buat Mata Kuliah dengan Cepat dan Mudah
                </div>
                <hr style="margin-bottom:32px;">
                <div style="background:#cfe5ff;padding:18px 20px;border-radius:8px;margin-bottom:32px;">
                    <span style="font-weight:600;color:#1669f2;">Jika ingin menggunakan data mata kuliah
                        sebelumnya</span><br>
                    <span style="color:#222;">Pilih tahun akademik dan Program Studi untuk melihat daftar mata
                        kuliah</span>
                </div>
                <form>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Tahun Akademik</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Tahun Akademik yang kamu inginkan</option>
                            <option>2024/2025</option>
                            <option>2023/2024</option>
                        </select>
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
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Mata Kuliah</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Mata Kuliah yang kamu inginkan</option>
                            <option>Keamanan Jaringan</option>
                            <option>Pemrograman Web</option>
                        </select>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:38px;">
                        <button type="button" id="btnBatalSalinMatkul"
                            style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                        <button type="submit"
                            style="padding:12px 38px;border-radius:8px;background:#0057d8;color:#fff;font-size:17px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Tambah Mata Kuliah Baru -->
        <div id="modalTambahMatkulBaru"
            style="display:none;position:fixed;z-index:10000;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;width:90vw;max-height:90vh;overflow-y:auto;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Form Mata Kuliah</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Tambah Mata Kuliah Baru</div>
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
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Semester</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Semester</option>
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
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Keterangan</label>
                        <textarea
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;min-height:90px;"></textarea>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:38px;">
                        <button type="button" id="btnBatalTambahMatkulBaru"
                            style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                        <button type="submit"
                            style="padding:12px 38px;border-radius:8px;background:#0057d8;color:#fff;font-size:17px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
                    </div>
                </form>
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

        // Search filter for mata kuliah
        document.getElementById('searchInput').addEventListener('input', function() {
            const val = this.value.toLowerCase();
            document.querySelectorAll('.matkul-row').forEach(function(row) {
                const title = row.querySelector('.matkul-title').textContent.toLowerCase();
                const kode = row.querySelector('.matkul-kode-semester').textContent.toLowerCase();
                row.style.display = (title.includes(val) || kode.includes(val)) ? '' : 'none';
            });
        });

        // Ganti logika tombol tambah
        const btnTambahMatkul = document.getElementById('btnTambahMatkul');
        const modalMetodeMatkul = document.getElementById('modalMetodeMatkul');
        const btnBatalMetodeMatkul = document.getElementById('btnBatalMetodeMatkul');
        const modalSalinMatkul = document.getElementById('modalSalinMatkul');
        const btnBatalSalinMatkul = document.getElementById('btnBatalSalinMatkul');
        const modalTambahMatkulBaru = document.getElementById('modalTambahMatkulBaru');
        const btnBatalTambahMatkulBaru = document.getElementById('btnBatalTambahMatkulBaru');

        btnTambahMatkul.addEventListener('click', function() {
            modalMetodeMatkul.style.display = 'block';
        });
        btnBatalMetodeMatkul.addEventListener('click', function() {
            modalMetodeMatkul.style.display = 'none';
        });
        modalMetodeMatkul.addEventListener('click', function(e) {
            if (e.target === modalMetodeMatkul) modalMetodeMatkul.style.display = 'none';
        });

        document.getElementById('btnSalinMatkul').onclick = function() {
            modalMetodeMatkul.style.display = 'none';
            modalSalinMatkul.style.display = 'block';
        };
        btnBatalSalinMatkul.addEventListener('click', function() {
            modalSalinMatkul.style.display = 'none';
        });
        modalSalinMatkul.addEventListener('click', function(e) {
            if (e.target === modalSalinMatkul) modalSalinMatkul.style.display = 'none';
        });

        document.getElementById('btnTambahBaruMatkul').onclick = function() {
            modalMetodeMatkul.style.display = 'none';
            modalTambahMatkulBaru.style.display = 'block';
        };
        btnBatalTambahMatkulBaru.addEventListener('click', function() {
            modalTambahMatkulBaru.style.display = 'none';
        });
        modalTambahMatkulBaru.addEventListener('click', function(e) {
            if (e.target === modalTambahMatkulBaru) modalTambahMatkulBaru.style.display = 'none';
        });
    </script>
</body>

</html>
