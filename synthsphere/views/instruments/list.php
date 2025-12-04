<?php include __DIR__.'/../template/header.php'; ?>
<?php 
require_once "controllers/InstrumentController.php";
$controller = new InstrumentController($db);

$instruments = $controller->index();
$categories = $controller->categories(); // Ambil kategori
?>

<h2 class="h1">Instruments</h2>
<a href="index.php?page=instruments&action=form" class="btn">+ Add Instrument</a>

<table class="table">
<tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th><th>Actions</th></tr> <?php foreach($instruments as $i): ?>
<tr>
  <td><?= $i['instrument_id']?></td>
  <td><?= htmlspecialchars($i['name'])?></td>
  <td><?= htmlspecialchars($i['type'])?></td>
  <td><?= number_format($i['price'],0,',','.')?></td> <td>
    <a class="btn-ghost" href="index.php?page=instruments&action=form&id=<?= $i['instrument_id']?>">Edit</a>
    <a class="btn-ghost" href="index.php?page=instruments&action=delete&id=<?= $i['instrument_id']?>" onclick="return confirm('Delete instrument?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<hr>

<h3>Filter Berdasarkan Kategori (Data Binding)</h3>

<select id="categorySelect">
    <option value="0">Semua</option>
    <?php foreach($categories as $cat): ?>
        <option value="<?= $cat['category_id'] ?>"><?= $cat['name'] ?></option>
    <?php endforeach ?>
</select>

<br><br>

<table border="1">
    <thead>
        <tr>
            <th>Nama Alat Musik</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody id="instrumentTable"></tbody>
</table>

<script>
// Data Binding: update tabel sesuai kategori
document.getElementById("categorySelect").addEventListener("change", function() {
    let cat = this.value; // Nilainya adalah '0', '1', '2', dst.

    // Panggil bind_instruments.php. Pastikan jalur file sudah benar.
    // Jika bind_instruments.php berada di folder utama (public/), path ini sudah benar.
    fetch("bind_instruments.php?category_id=" + cat)
        .then(res => {
            if (!res.ok) {
                // Tampilkan pesan error jika response status bukan 200 OK
                console.error("Fetch failed with status:", res.status);
                document.getElementById("instrumentTable").innerHTML = '<tr><td colspan="2">Gagal memuat data. Periksa konsol untuk detail error.</td></tr>';
                return Promise.reject('Fetch failed');
            }
            return res.json();
        })
        .then(data => {
            let html = "";
            
            if (data.length === 0) {
                 html = '<tr><td colspan="2">Tidak ada data alat musik untuk kategori ini.</td></tr>';
            } else {
                data.forEach(item => {
                    // Pastikan kunci item.name dan item.price cocok dengan SELECT di Model!
                    html += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(item.price)}</td>
                        </tr>
                    `;
                });
            }

            document.getElementById("instrumentTable").innerHTML = html;
        })
        .catch(error => {
            console.error("Error memproses data:", error);
            document.getElementById("instrumentTable").innerHTML = '<tr><td colspan="2">Terjadi kesalahan saat memproses data.</td></tr>';
        });
});

// ⭐ PENTING: Panggil fungsi filter secara manual saat halaman dimuat (untuk load awal) ⭐
// Ini akan memuat data pertama kali (nilai default '0')
document.addEventListener('DOMContentLoaded', () => {
    // Memicu event 'change' pada elemen select setelah DOM dimuat
    document.getElementById("categorySelect").dispatchEvent(new Event('change'));
});

</script>