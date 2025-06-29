<!-- filepath: c:\laragon\www\login-project\resources\views\akademiks\detail.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kelas</title>
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

        .kelas-info {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .kelas-info .info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .kelas-info .action-buttons {
            display: flex;
            gap: 10px;
        }

        .kelas-info .action-buttons button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            gap: 1rem;
        }

        .search-box {
            width: 350px;
            margin-bottom: 0;
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

        .btn,
        .btn-primary {
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

        .btn-primary {
            background: #1669f2;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: #0057d8;
        }

        .student-list {
            background: white;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .student-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }

        .student-item:last-child {
            border-bottom: none;
        }

        .student-item img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 1rem;
        }

        .pagination {
            text-align: right;
            margin-top: 1rem;
        }

        .pagination button {
            background: #eee;
            border: none;
            padding: 6px 10px;
            margin: 0 2px;
            border-radius: 4px;
        }

        .pagination button.active {
            background: #1669f2;
            color: #fff;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

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

        .btn-secondary {
            background: #fff;
            color: #d00;
            border: 1px solid #d00;
        }

        .btn-secondary:hover {
            background: #ffe5e5;
        }

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

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <aside>
        <div class="user-card">
            <img src="/images/admin.png" alt="Admin Akademik">
            <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
        </div>
        <ul class="nav-menu">
            <li>
                <a href="/akademik/dashboard">
                    <img src="/images/dashboard.png" alt="Dashboard">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/akademik/manajemenkelas" class="active">
                    <img src="/images/classroom.png" alt="Manajemen Kelas">
                    Manajemen Kelas
                </a>
            </li>
            <li>
                <a href="/akademik/mahasiswa">
                    <img src="/images/profile.png" alt="Mahasiswa">
                    Mahasiswa
                </a>
            </li>
            <li>
                <a href="/akademik/akademik">
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
        <div class="title">Detail Kelas</div>

        <div class="kelas-info">
            <div class="info">
                <div>Nama Kelas: <strong>TI SI 2023 (A)</strong></div>
                <div>Tahun Akademik: <strong>2023/2024</strong></div>
                <div>Program Studi: <strong>Sistem Informatika</strong></div>
            </div>
            <div class="action-buttons">
                <button title="Edit">
                    <img src="/images/edit.png" width="24">
                </button>
                <button title="Hapus">
                    <img src="/images/delete.png" width="24">
                </button>
            </div>
        </div>

        <div class="action-bar">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari mahasiswa...">
            </div>
            <button class="btn btn-primary" onclick="showPopup()">Tambah</button>
        </div>

        <div class="student-list" id="studentList">
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Guardian Fuad Verstappen</strong></div>
                    <small>C030323127</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Raisa Andriana</strong></div>
                    <small>C030323128</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Fahri Ramadhan</strong></div>
                    <small>C030323129</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Putri Ayu Lestari</strong></div>
                    <small>C030323130</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Bagas Saputra</strong></div>
                    <small>C030323131</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Intan Permata</strong></div>
                    <small>C030323132</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Rizky Maulana</strong></div>
                    <small>C030323133</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Sarah Azzahra</strong></div>
                    <small>C030323134</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Yusuf Hamzah</strong></div>
                    <small>C030323135</small>
                </div>
            </div>
            <div class="student-item">
                <img src="/images/mahasiswa.png">
                <div>
                    <div><strong>Melati Kusuma</strong></div>
                    <small>C030323136</small>
                </div>
            </div>
        </div>

        <div id="popupForm" class="popup hidden">
            <div class="popup-content">
                <h2 style="font-size:2rem;font-weight:bold;margin-bottom:0.5rem;">Metode Pembuatan</h2>
                <div style="font-size:1.1rem;margin-bottom:2rem;color:#222;">Pilih Mahasiswa dengan Cepat dan Mudah
                </div>
                <hr style="margin-bottom:1.5rem;">
                <div style="background:#e0efff;padding:1rem 1.2rem;border-radius:8px;margin-bottom:1.5rem;">
                    <div style="font-weight:600;color:#1669f2;margin-bottom:2px;">Pilih Metode Pemilihan Mahasiswa</div>
                    <div style="font-size:14px;color:#333;">
                        Tentukan apakah ingin memilih seluruh mahasiswa atau memilih sebagian saja.
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:2rem;">
                    <label for="mahasiswaSelect"
                        style="font-weight:500;margin-bottom:0.5rem;display:block;">Mahasiswa</label>
                    <div id="multiselect-container"
                        style="border:1px solid #ccc;border-radius:6px;padding:8px 12px;min-height:44px;cursor:pointer;position:relative;background:#fff;display:flex;align-items:center;">
                        <span id="multiselect-placeholder" style="color:#888;">Pilih Mahasiswa yang kamu inginkan</span>
                        <div id="multiselect-selected" style="display:flex;flex-wrap:wrap;gap:6px;margin-left:8px;"></div>
                        <svg style="margin-left:auto;pointer-events:none;" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="#888" d="M7 10l5 5 5-5z" />
                        </svg>
                    </div>
                </div>

                <!-- Modal Multi Select Mahasiswa -->
                <div id="multiselect-modal" class="hidden"
                    style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:10001;background:rgba(0,0,0,0.4);display:flex;align-items:center;justify-content:center;">
                    <div
                        style="background:#fff;border-radius:10px;box-shadow:0 4px 24px rgba(0,0,0,0.18);padding:24px 20px;min-width:320px;max-width:95vw;">
                        <div style="font-weight:600;font-size:18px;margin-bottom:12px;">Pilih Mahasiswa</div>
                        <div
                            style="padding:8px 0;border-bottom:1px solid #eee;margin-bottom:10px;">
                            <label style="cursor:pointer;">
                                <input type="checkbox" id="selectAllMahasiswa" style="margin-right:6px;">
                                <strong>Pilih Semua</strong>
                            </label>
                        </div>
                        <div style="max-height:220px;overflow-y:auto;">
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Guardian Fuad Verstappen"
                                    style="margin-right:6px;">
                                Guardian Fuad Verstappen
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Raisa Andriana"
                                    style="margin-right:6px;">
                                Raisa Andriana
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Fahri Ramadhan"
                                    style="margin-right:6px;">
                                Fahri Ramadhan
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Putri Ayu Lestari"
                                    style="margin-right:6px;">
                                Putri Ayu Lestari
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Bagas Saputra"
                                    style="margin-right:6px;">
                                Bagas Saputra
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Intan Permata"
                                    style="margin-right:6px;">
                                Intan Permata
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Rizky Maulana"
                                    style="margin-right:6px;">
                                Rizky Maulana
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Sarah Azzahra"
                                    style="margin-right:6px;">
                                Sarah Azzahra
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Yusuf Hamzah"
                                    style="margin-right:6px;">
                                Yusuf Hamzah
                            </label>
                            <label style="display:block;padding:8px 0;cursor:pointer;">
                                <input type="checkbox" class="mahasiswa-option" value="Melati Kusuma"
                                    style="margin-right:6px;">
                                Melati Kusuma
                            </label>
                        </div>
                        <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:18px;">
                            <button type="button" id="multiselect-cancel" class="btn btn-secondary">Batal</button>
                            <button type="button" id="multiselect-ok" class="btn btn-primary">Pilih</button>
                        </div>
                    </div>
                </div>

                <div class="popup-actions" style="margin-top:2.5rem;">
                    <button type="button" class="btn btn-secondary" onclick="closePopup()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>

        <div class="pagination">
            <button>&lt;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&gt;</button>
        </div>
    </main>
    <script>
        // Search mahasiswa berdasarkan nama
        document.getElementById('searchInput').addEventListener('input', function() {
            const keyword = this.value.toLowerCase();
            const items = document.querySelectorAll('.student-item');
            items.forEach(item => {
                const nama = item.querySelector('strong').textContent.toLowerCase();
                if (nama.includes(keyword)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        function showPopup() {
            document.getElementById('popupForm').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popupForm').classList.add('hidden');
        }

        // --- Multi Select Mahasiswa Modal ---
        const multiselectContainer = document.getElementById('multiselect-container');
        const multiselectModal = document.getElementById('multiselect-modal');
        const multiselectPlaceholder = document.getElementById('multiselect-placeholder');
        const multiselectSelected = document.getElementById('multiselect-selected');
        const mahasiswaOptions = document.querySelectorAll('.mahasiswa-option');
        const selectAllMahasiswa = document.getElementById('selectAllMahasiswa');
        const btnMultiselectOk = document.getElementById('multiselect-ok');
        const btnMultiselectCancel = document.getElementById('multiselect-cancel');

        // State untuk menyimpan pilihan sementara
        let selectedMahasiswa = [];

        // Tampilkan modal saat klik container
        multiselectContainer.addEventListener('click', function(e) {
            multiselectModal.classList.remove('hidden');
            // Set checkbox sesuai selectedMahasiswa
            mahasiswaOptions.forEach(opt => {
                opt.checked = selectedMahasiswa.includes(opt.value);
            });
            selectAllMahasiswa.checked = mahasiswaOptions.length > 0 && Array.from(mahasiswaOptions).every(opt => opt.checked);
        });

        // Tutup modal jika klik batal
        btnMultiselectCancel.addEventListener('click', function() {
            multiselectModal.classList.add('hidden');
        });

        // Pilih Semua
        selectAllMahasiswa.addEventListener('change', function() {
            mahasiswaOptions.forEach(opt => {
                opt.checked = selectAllMahasiswa.checked;
            });
        });

        // Update "Pilih Semua" jika ada perubahan pada opsi
        mahasiswaOptions.forEach(opt => {
            opt.addEventListener('change', function() {
                selectAllMahasiswa.checked = Array.from(mahasiswaOptions).every(opt => opt.checked);
            });
        });

        // Simpan pilihan ke tampilan utama
        btnMultiselectOk.addEventListener('click', function() {
            selectedMahasiswa = Array.from(mahasiswaOptions).filter(opt => opt.checked).map(opt => opt.value);
            updateSelectedDisplay();
            multiselectModal.classList.add('hidden');
        });

        // Update badge di tampilan utama
        function updateSelectedDisplay() {
            multiselectSelected.innerHTML = '';
            if (selectedMahasiswa.length > 0) {
                multiselectPlaceholder.style.display = 'none';
                selectedMahasiswa.forEach(name => {
                    const span = document.createElement('span');
                    span.textContent = name;
                    span.style.background = '#e0efff';
                    span.style.color = '#1669f2';
                    span.style.padding = '2px 8px';
                    span.style.margin = '2px 4px 2px 0';
                    span.style.borderRadius = '4px';
                    span.style.fontSize = '13px';
                    span.style.display = 'inline-block';
                    multiselectSelected.appendChild(span);
                });
            } else {
                multiselectPlaceholder.style.display = '';
            }
        }

        // Inisialisasi tampilan
        updateSelectedDisplay();

        // Tutup modal jika klik di luar modal
        multiselectModal.addEventListener('mousedown', function(e) {
            if (e.target === multiselectModal) {
                multiselectModal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
