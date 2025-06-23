<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kurikulum</title>
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
            position: relative;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #1669f2;
        }

        .card .status-badge {
            position: absolute;
            top: 18px;
            right: 18px;
            font-size: 12px;
            padding: 2px 12px;
            border-radius: 12px;
            font-weight: 600;
            color: #fff;
        }

        .card .status-aktif {
            background: #22c55e;
        }

        .card .status-tidak-aktif {
            background: #f87171;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .card .detail-link {
            font-size: 14px;
            color: #1669f2;
            text-decoration: none;
            font-weight: 500;
            float: right;
        }

        .card .detail-link:hover {
            text-decoration: underline;
        }

        .card .matkul-info {
            font-size: 13px;
            color: #888;
            margin-top: 18px;
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
        <div class="title">Kurikulum</div>
        <div class="subtitle">Kelola Kurikulum dengan Mudah dan Terstruktur</div>
        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?">
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
                        <label for="filterTahunAjaran" style="font-size:13px;color:#444;">Tahun Akademik</label>
                        <select id="filterTahunAjaran" class="filter-dropdown"
                            style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                            <option value="">Semua Tahun</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2023/2024">2023/2024</option>
                        </select>
                    </div>
                    <div>
                        <label for="filterProgramStudi" style="font-size:13px;color:#444;">Program Studi</label>
                        <select id="filterProgramStudi" class="filter-dropdown"
                            style="width:100%;padding:6px;margin-top:4px;border-radius:5px;border:1px solid #ccc;">
                            <option value="">Semua Prodi</option>
                            <option value="Sistem Informatika">Sistem Informatika</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                        </select>
                    </div>
                    <div style="margin-top:1rem; text-align:right;">
                        <button id="applyFilter" class="btn btn-primary" style="margin-top:8px;">Terapkan</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="btnTambahKurikulum">Tambah</button>
        </div>
        <div class="cards-container">
            <div class="card">
                <h3>Kurikulum Merdeka</h3>
                <span class="status-badge status-tidak-aktif">Tidak Aktif</span>
                <p>2024/2025 - Ganjil</p>
                <div class="matkul-info">123 Mata Kuliah - Sistem Informatika</div>
                <a href="#" class="detail-link">Lihat Detail &rarr;</a>
            </div>
            <div class="card">
                <h3>Kurikulum Nusantara</h3>
                <span class="status-badge status-aktif">Aktif</span>
                <p>2024/2025 - Genap</p>
                <div class="matkul-info">334 Mata Kuliah - Sistem Informatika</div>
                <a href="#" class="detail-link">Lihat Detail &rarr;</a>
            </div>
        </div>

        <!-- Modal Form Kurikulum -->
        <div id="modalMetodeKurikulum"
            style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Metode Pembuatan</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Buat Kurikulum dengan Cepat dan Mudah</div>
                <hr style="margin-bottom:32px;">
                <div style="background:#cfe5ff;padding:18px 20px;border-radius:8px;margin-bottom:32px;">
                    <span style="font-weight:600;color:#1669f2;">Pilih Metode Pembuatan Kurikulum</span><br>
                    <span style="color:#222;">Tentukan apakah ingin menyalin seluruh kurikulum atau mengambil sebagian
                        saja.</span>
                </div>
                <div style="display:flex;gap:40px;justify-content:center;margin-bottom:40px;">
                    <div id="btnSalinKurikulum"
                        style="flex:1;max-width:300px;cursor:pointer;border:2px solid #222;border-radius:14px;padding:32px 0;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.2s;">
                        <div
                            style="background:#BFDDFF;border-radius:50%;width:54px;height:54px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                            <img src="/images/icon-salin.png" alt="Salin" style="width:32px;height:32px;">
                        </div>
                        <div style="font-weight:700;font-size:20px;color:#1669f2;margin-bottom:6px;">Salin Kurikulum
                        </div>
                        <div style="font-size:15px;color:#222;text-align:center;">Gunakan Kurikulum sebelumnya sebagai
                            dasar</div>
                    </div>
                    <div id="btnTambahBaruKurikulum"
                        style="flex:1;max-width:300px;cursor:pointer;border:2px solid #222;border-radius:14px;padding:32px 0;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.2s;">
                        <div
                            style="background:#b6ffc7;border-radius:50%;width:54px;height:54px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                            <img src="/images/icon-tambah.png" alt="Tambah" style="width:32px;height:32px;">
                        </div>
                        <div style="font-weight:700;font-size:20px;color:#22c55e;margin-bottom:6px;">Tambah Kurikulum
                            Baru</div>
                        <div style="font-size:15px;color:#222;text-align:center;">Buat Kurikulum baru dari awal</div>
                    </div>
                </div>
                <div style="text-align:left;">
                    <button type="button" id="btnBatalMetodeKurikulum"
                        style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                </div>
            </div>
        </div>

        <div id="modalSalinKurikulum"
            style="display:none;position:fixed;z-index:10000;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Form Kurikulum</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Buat Kurikulum dengan Cepat dan Mudah</div>
                <hr style="margin-bottom:32px;">
                <div style="background:#cfe5ff;padding:18px 20px;border-radius:8px;margin-bottom:32px;">
                    <span style="font-weight:600;color:#1669f2;">Jika ingin menggunakan Kurikulum sebelumnya</span><br>
                    <span style="color:#222;">Pilih tahun akademik dan Program Studi untuk melihat detail
                        kurikulum</span>
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
                            <option>Sistem Informatika</option>
                            <option>Teknik Informatika</option>
                        </select>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:38px;">
                        <button type="button" id="btnBatalSalinKurikulum"
                            style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                        <button type="submit"
                            style="padding:12px 38px;border-radius:8px;background:#0057d8;color:#fff;font-size:17px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="modalTambahKurikulumBaru"
            style="display:none;position:fixed;z-index:10000;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
            <div
                style="background:#fff;max-width:700px;width:90vw;max-height:90vh;overflow-y:auto;margin:60px auto 0 auto;border-radius:12px;padding:36px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
                <div style="font-size:32px;font-weight:bold;margin-bottom:8px;">Form Kurikulum</div>
                <div style="font-size:22px;color:#222;margin-bottom:32px;">Buat Kurikulum dengan Cepat dan Mudah</div>
                <hr style="margin-bottom:32px;">
                <form>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Nama Kurikulum</label>
                        <input type="text"
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                    </div>
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Tahun Akademik</label>
                        <select
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
                            <option>Pilih Tahun yang kamu inginkan</option>
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
                    <div style="margin-bottom:28px;">
                        <label style="font-weight:600;display:block;margin-bottom:10px;">Keterangan</label>
                        <textarea
                            style="width:100%;padding:14px 16px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;min-height:90px;"></textarea>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:38px;">
                        <button type="button" id="btnBatalTambahKurikulumBaru"
                            style="padding:12px 38px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:17px;font-weight:500;cursor:pointer;">Batal</button>
                        <button type="submit"
                            style="padding:12px 38px;border-radius:8px;background:#0057d8;color:#fff;font-size:17px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
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

        // Modal logic untuk Metode Pembuatan Kurikulum
        const btnTambah = document.getElementById('btnTambahKurikulum');
        const modalMetode = document.getElementById('modalMetodeKurikulum');
        const btnBatalMetode = document.getElementById('btnBatalMetodeKurikulum');
        const modalKurikulum = document.getElementById('modalKurikulum');

        btnTambah.addEventListener('click', function() {
            modalMetode.style.display = 'block';
        });
        btnBatalMetode.addEventListener('click', function() {
            modalMetode.style.display = 'none';
        });
        modalMetode.addEventListener('click', function(e) {
            if (e.target === modalMetode) modalMetode.style.display = 'none';
        });

        // Klik Salin Kurikulum atau Tambah Kurikulum Baru
        document.getElementById('btnSalinKurikulum').onclick = function() {
            modalMetode.style.display = 'none';
            modalKurikulum.style.display = 'block';
        };
        document.getElementById('btnTambahBaruKurikulum').onclick = function() {
            modalMetode.style.display = 'none';
            modalKurikulum.style.display = 'block';
        };

        const modalSalinKurikulum = document.getElementById('modalSalinKurikulum');
        const btnBatalSalinKurikulum = document.getElementById('btnBatalSalinKurikulum');

        document.getElementById('btnSalinKurikulum').onclick = function() {
            modalMetode.style.display = 'none';
            modalSalinKurikulum.style.display = 'block';
        };
        btnBatalSalinKurikulum.addEventListener('click', function() {
            modalSalinKurikulum.style.display = 'none';
        });
        modalSalinKurikulum.addEventListener('click', function(e) {
            if (e.target === modalSalinKurikulum) modalSalinKurikulum.style.display = 'none';
        });

        // Untuk tombol tambah kurikulum baru tetap pakai modalKurikulum
        document.getElementById('btnTambahBaruKurikulum').onclick = function() {
            modalMetode.style.display = 'none';
            modalKurikulum.style.display = 'block';
        };

        const modalTambahKurikulumBaru = document.getElementById('modalTambahKurikulumBaru');
        const btnBatalTambahKurikulumBaru = document.getElementById('btnBatalTambahKurikulumBaru');

        document.getElementById('btnTambahBaruKurikulum').onclick = function() {
            modalMetode.style.display = 'none';
            modalTambahKurikulumBaru.style.display = 'block';
        };
        btnBatalTambahKurikulumBaru.addEventListener('click', function() {
            modalTambahKurikulumBaru.style.display = 'none';
        });
        modalTambahKurikulumBaru.addEventListener('click', function(e) {
            if (e.target === modalTambahKurikulumBaru) modalTambahKurikulumBaru.style.display = 'none';
        });

        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFilter = document.getElementById('applyFilter');
        const filterTahunAjaran = document.getElementById('filterTahunAjaran');
        const filterProgramStudi = document.getElementById('filterProgramStudi');

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

        function filterKurikulum() {
            const tahunAjaran = filterTahunAjaran.value;
            const programStudi = filterProgramStudi.value;
            const cards = document.querySelectorAll('.cards-container .card');

            cards.forEach(card => {
                const cardTahun = card.querySelector('p').textContent.includes(tahunAjaran);
                const cardProdi = card.querySelector('.matkul-info').textContent.includes(programStudi);

                if (
                    (tahunAjaran === '' || cardTahun) &&
                    (programStudi === '' || cardProdi)
                ) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        applyFilter.addEventListener('click', function(e) {
            e.preventDefault();
            filterKurikulum();
            filterDropdown.style.display = 'none';
        });

        document.querySelectorAll('.detail-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = '/prodi/detail-kurikulum';
            });
        }); 
    </script>
</body>

</html>
