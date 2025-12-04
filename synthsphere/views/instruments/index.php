<?php 
// Perlu dipastikan variabel $instruments dan $categories tersedia
include __DIR__.'/../template/header.php'; 
?>

<h2 class="h1">Instruments</h2>
<a href="index.php?page=instruments&action=form" class="btn">+ Add Instrument</a>

<table class="table">
<tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th><th>Category</th><th>Actions</th></tr>
<?php foreach($instruments as $i): ?>
<tr>
  <td><?= $i['instrument_id']?></td>
  <td><?= htmlspecialchars($i['name'])?></td>
  <td><?= htmlspecialchars($i['type'])?></td>
  <td>Rp<?= number_format($i['price'],0,',','.')?></td>
  <td><?= htmlspecialchars($i['category_name'] ?? 'N/A')?></td>
  <td class="actions">
    <a class="btn-ghost" href="index.php?page=instruments&action=form&id=<?= $i['instrument_id']?>">Edit</a>
    <a class="btn-ghost" href="index.php?page=instruments&action=delete&id=<?= $i['instrument_id']?>" onclick="return confirm('Delete instrument?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<hr style="border-color: rgba(255, 255, 255, 0.05); margin-top: 25px; margin-bottom: 25px;">

<h3>Filter Berdasarkan Kategori (Data Binding)</h3>

<select id="categorySelect" class="form-control" style="width: 200px;">
    <option value="0">Semua</option>
    <?php foreach($categories as $cat): ?>
        <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
    <?php endforeach ?>
</select>

<br>

<table class="table" style="width: 400px;">
    <thead>
        <tr>
            <th style="width: 60%">Nama Alat Musik</th>
            <th style="width: 40%">Harga</th>
        </tr>
    </thead>
    <tbody id="instrumentTable">
        <tr><td colspan="2" style="text-align: center;">Pilih kategori atau Semua untuk melihat data binding.</td></tr>
    </tbody>
</table>

<script>
// Data Binding: update tabel sesuai kategori
document.getElementById("categorySelect").addEventListener("change", function() {
    let cat = this.value;
    const tableBody = document.getElementById("instrumentTable");
    tableBody.innerHTML = '<tr><td colspan="2" style="text-align: center;">Loading...</td></tr>';
    
    // Panggil bind_instruments.php
    fetch("bind_instruments.php?category_id=" + cat)
        .then(res => res.json())
        .then(data => {

            let html = "";
            
            if (data.length === 0) {
                html = '<tr><td colspan="2" style="text-align: center;">Tidak ada instrumen dalam kategori ini.</td></tr>';
            } else {
                data.forEach(item => {
                    const price = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(item.price).replace('IDR', 'Rp');
                    html += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${price}</td>
                        </tr>`;
                });
            }
            
            tableBody.innerHTML = html;
        })
        .catch(err => {
            console.error("Fetch error:", err);
            tableBody.innerHTML = '<tr><td colspan="2" style="text-align: center;">Gagal memuat data.</td></tr>';
        });
});
</script>

<?php include __DIR__.'/../template/footer.php'; ?>