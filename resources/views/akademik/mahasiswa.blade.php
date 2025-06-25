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
            margin: 0;
            padding: 0;
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
            margin-left: 240px;
            padding: 32px;
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

        td img.avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 0.5rem;
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
                <a href="/akademik/mahasiswa" class="active">
                    <img src="/images/profile.png" alt="Mahasiswa" style="width:20px;height:20px;margin-right:8px;">
                    Mahasiswa
                </a>
            </li>
            <li>
                <a href="/akademik/akademik">
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
        <h1>Mahasiswa</h1>
        <p class="subtitle">Kelola Mahasiswa dengan Mudah dan Terstruktur</p>

        <div class="search-box">
            <input type="text" placeholder="Cari Sesuatu ?" id="searchInput">
        </div>

        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Profil Mahasiswa</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="studentTable">
                <!-- Baris mahasiswa akan diisi oleh JavaScript -->
            </tbody>
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
        // Data mahasiswa
        const mahasiswa = Array.from({
            length: 8
        }, (_, i) => ({
            nama: 'Guardian Fuad Verstappen',
            nim: 'C030323127',
            email: 'fuadguardianvers123@example.com',
            tgl_lahir: '12-05-2005',
            kelamin: 'Pria',
            alamat: 'Jl. Sutoyo S No. 23, Kel. Teluk Dalam, Kec. Banjarmasin Tengah'
        }));

        // Fungsi render tabel mahasiswa
        function renderTable(filter = '') {
            const tbody = document.getElementById('studentTable');
            tbody.innerHTML = '';
            const filterLower = filter.toLowerCase();

            mahasiswa.forEach((mhs, i) => {
                if (mhs.nama.toLowerCase().includes(filterLower)) {
                    const namaPendek = mhs.nama.length > 11 ? mhs.nama.substring(0, 11) + '...' : mhs.nama;
                    const row = document.createElement('tr');

                    row.innerHTML = `
            <td><input type="checkbox" class="row-checkbox"></td>
            <td style="vertical-align:middle;">
              <div style="display:flex;align-items:center;">
                <img src="/images/mahasiswa.png" class="avatar">
                <div>
                  <div style="font-weight:500;">${namaPendek}</div>
                  <div style="font-size:13px;color:#888;margin-top:2px;">${mhs.nim}</div>
                </div>
              </div>
            </td>
            <td>${mhs.email}</td>
            <td>${mhs.tgl_lahir}</td>
            <td>${mhs.kelamin}</td>
            <td>${mhs.alamat}</td>
            <td class="action-buttons">
              <button class="btn-edit" title="Edit">
                <img src="/images/edit.png" alt="Edit" style="width:25px;height:25px;vertical-align:middle;">
              </button>
              <button class="btn-delete" title="Delete">
                <img src="/images/delete.png" alt="Delete" style="width:25px;height:25px;vertical-align:middle;">
              </button>
            </td>
          `;

                    tbody.appendChild(row);
                }
            });
        }

        // Inisialisasi tabel
        renderTable();

        // Event search box
        document.getElementById('searchInput').addEventListener('input', function() {
            renderTable(this.value);
        });

        // Select all logic
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('selectAll');

            // Event untuk select all
            selectAll.addEventListener('change', function() {
                document.querySelectorAll('.row-checkbox').forEach(cb => {
                    cb.checked = selectAll.checked;
                });
            });

            // Jika salah satu checkbox di-uncheck, uncheck selectAll
            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('row-checkbox')) {
                    const all = document.querySelectorAll('.row-checkbox');
                    const checked = document.querySelectorAll('.row-checkbox:checked');
                    selectAll.checked = all.length === checked.length;
                }
            });
        });
    </script>

    @include('edit')
</body>

</html>
