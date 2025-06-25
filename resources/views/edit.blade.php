<div id="modalEditData"
    style="display:none;position:fixed;z-index:10001;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);">
    <div
        style="background:#fff;max-width:420px;width:95vw;margin:60px auto 0 auto;border-radius:12px;padding:32px 28px;box-shadow:0 8px 32px rgba(0,0,0,0.08);position:relative;">
        <div style="font-size:22px;font-weight:bold;margin-bottom:8px;">Edit Data</div>
        <form id="formEditData">
            {{-- Contoh field, backend bisa ubah sesuai kebutuhan --}}
            <div style="margin-bottom:18px;">
                <label style="font-weight:600;display:block;margin-bottom:8px;">Nama</label>
                <input type="text" id="editNama"
                    style="width:100%;padding:12px 14px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
            </div>
            <div style="margin-bottom:18px;">
                <label style="font-weight:600;display:block;margin-bottom:8px;">NIM</label>
                <input type="text" id="editNim"
                    style="width:100%;padding:12px 14px;border-radius:7px;border:1.5px solid #bbb;font-size:16px;">
            </div>
            {{-- Tambahkan field lain sesuai kebutuhan --}}
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:28px;">
                <button type="button" id="btnBatalEditData"
                    style="padding:10px 32px;border-radius:8px;border:2px solid #e74c3c;background:#fff;color:#e74c3c;font-size:16px;font-weight:500;cursor:pointer;">Batal</button>
                <button type="submit"
                    style="padding:10px 32px;border-radius:8px;background:#1669f2;color:#fff;font-size:16px;font-weight:500;border:none;cursor:pointer;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi popup edit generik (akan tetap jalan walau field berbeda)
    function openEditPopupGeneric(data) {
        // Coba isi field yang ada, jika tidak ada tidak error
        if (document.getElementById('editNama')) document.getElementById('editNama').value = data.nama || '';
        if (document.getElementById('editNim')) document.getElementById('editNim').value = data.nim || '';
        if (document.getElementById('editNamaTahun')) document.getElementById('editNamaTahun').value = data.nama || '';
        if (document.getElementById('editAwal')) document.getElementById('editAwal').value = data.awal || '';
        if (document.getElementById('editAkhir')) document.getElementById('editAkhir').value = data.akhir || '';
        if (document.getElementById('editStatus')) document.getElementById('editStatus').value = data.status || '';
        document.getElementById('modalEditData').style.display = 'block';
    }

    // Tutup popup jika klik batal atau klik luar modal
    document.getElementById('btnBatalEditData').onclick = function() {
        document.getElementById('modalEditData').style.display = 'none';
    };
    document.getElementById('modalEditData').addEventListener('click', function(e) {
        if (e.target === this) this.style.display = 'none';
    });

    // Submit form edit (dummy)
    document.getElementById('formEditData').onsubmit = function(e) {
        e.preventDefault();
        document.getElementById('modalEditData').style.display = 'none';
        alert('Data berhasil disimpan (dummy)');
    };

    // Binding tombol edit pada semua tabel (mahasiswa, akademik, dll)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-edit')) {
            const row = e.target.closest('tr');
            // Ambil data generik (bisa diubah backend)
            const nama = row.children[1]?.textContent.trim() || '';
            const nim = row.children[2]?.textContent.trim() || '';
            const awal = row.children[2]?.textContent.trim() || '';
            const akhir = row.children[3]?.textContent.trim() || '';
            const statusText = row.children[4]?.textContent.trim() || '';
            openEditPopupGeneric({
                nama: nama,
                nim: nim,
                awal: awal,
                akhir: akhir,
                status: statusText
            });
        }
    });
</script>
