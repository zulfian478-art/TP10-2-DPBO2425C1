#  SynthSphere - Manajemen Alat Musik, Artis, Album, dan Track

##  Janji

Saya Zulfian Rais Almanshur dengan **NIM 2400325** mengerjakan Tugas Praktikum 9 dalam mata kuliah **Desain dan Pemrograman Berorientasi Objek** untuk keberkahanNya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.



##  Desain Program

Program ini dibuat menggunakan arsitektur **Model–View–Controller (MVC)**, meskipun beberapa implementasi Controller bertindak sebagai Presenter yang sederhana. Struktur utama program meliputi:

* **Model (`models/`)**: Berfungsi berinteraksi dengan database (**CRUD** untuk Album, Artist, Track, Instrument, dan Category). Contoh: `Album.php`, `Artist.php`, `Track.php`, `Instrument.php`, `Category.php`, `InstrumentModel.php`.
* **View (`views/`)**: Bagian yang menampilkan form dan tabel ke pengguna (HTML + CSS minimal). Terdapat subfolder untuk setiap entitas: `albums`, `artists`, `tracks`, `instruments`, `categories`, dan `template`.
* **Controller (`controllers/`)**: Jembatan antara View dan Model, mengatur alur logika, memproses input POST/GET, dan memanggil fungsi Model yang sesuai. Contoh: `AlbumController.php`, `ArtistController.php`, `TrackController.php`, `InstrumentController.php`, `CategoryController.php`.
* **Database**: MySQL (`synthsphere`), terdiri dari tabel **`albums`**, **`artists`**, **`tracks`**, **`instruments`**, dan **`categories`**.
* **Router Manual**: Mengatur menu dan aksi CRUD berdasarkan parameter **`page`** dan **`action`** dari `$_GET`/`$_POST` (terletak di `index.php` utama).


## Deskripsi Program

Program ini merupakan aplikasi manajemen data musik (Artis, Album, Track) dan alat musik (Instrument, Category) menggunakan arsitektur **MVC** dengan koneksi database **PDO**. Fokus utama adalah menyediakan fungsionalitas CRUD lengkap untuk setiap entitas.

Program ini memuat:

* **CRUD** untuk **Artis, Album, Track, Instrument, dan Category**.
* Form input berbasis HTML + CSS sederhana dengan gaya *neon/synthwave* yang konsisten.
* **Routing manual** menggunakan parameter `page` dan `action` untuk mengarahkan ke Controller dan View yang tepat.
* Integrasi database MySQL menggunakan kelas **`Database.php`** untuk koneksi terpusat.
* Semua operasi (tambah, lihat, ubah, hapus) dijalankan melalui Controller/Model.


## Fitur Program

### 1. CRUD Artist (Artis)
* Tambah Artist (`index.php?page=artists&action=form`)
* Edit Artist
* Hapus Artist
* Tampilkan daftar Artist

### 2. CRUD Album
* Tambah Album (Memilih Artist)
* Edit Album (Memilih Artist)
* Hapus Album
* Tampilkan daftar Album

### 3. CRUD Track (Lagu)
* Tambah Track (Memilih Album)
* Edit Track (Memilih Album)
* Hapus Track
* Tampilkan daftar Track (dengan join ke tabel Album)

### 4. CRUD Instrument (Alat Musik)
* Tambah Instrument
* Edit Instrument
* Hapus Instrument
* Tampilkan daftar Instrument
* **Fitur Tambahan:** Filter Alat Musik Berdasarkan Kategori menggunakan **AJAX/Data Binding** di `views/instruments/list.php` dan endpoint `public/bind_instruments.php`.

### 5. CRUD Category (Kategori Alat Musik)
* Tambah Category
* Edit Category
* Hapus Category
* Tampilkan daftar Category

### 6. Struktur & Keamanan
* **Konfigurasi Database Terpusat**: Koneksi database melalui `config/database.php`.
* **Prepared Statement**: Semua operasi CRUD di Model menggunakan *prepared statement* untuk mencegah serangan SQL Injection.
* **Layout Konsisten**: Menggunakan template `header.php` dan `footer.php` untuk konsistensi tampilan.

---

##  Alur Program

1.  **Akses Awal**: Program dibuka melalui `index.php`.
2.  **Routing**: Router di `index.php` membaca parameter `page` (`artists`, `albums`, `tracks`, `instruments`, `categories`) dan `action` (`index`, `form`, `store`, `update`, `delete`).
3.  **Pemanggilan Controller**: Berdasarkan `page`, Router memanggil *Controller* yang sesuai (misal, `ArtistController.php`) dan menginstansiasinya dengan koneksi `$db`.
4.  **Aksi *Index***: Jika `action=index`, Controller memanggil metode `index()` yang mengambil semua data dari Model dan menyertakan View yang menampilkan daftar (misal, `views/artists/index.php`).
5.  **Aksi *Store*/** *Update***:
    * *Form View*: Jika `action=form`, Controller memuat View form. Untuk Edit, Controller memanggil `edit($id)` untuk mendapatkan data entitas.
    * *Submit*: Setelah form disubmit via POST, Router memanggil aksi `store` atau `update` pada Controller, yang kemudian memanggil fungsi `create()` atau `update()` pada Model untuk berinteraksi dengan database.
    * *Redirect*: Setelah operasi, Controller mengarahkan kembali ke halaman daftar (`header("Location: index.php?page=...")`).
6.  **Aksi *Delete***: Jika `action=delete`, Controller memanggil `delete($id)` pada Model dan mengarahkan kembali ke halaman daftar.

---

## Dokumentasi


https://github.com/user-attachments/assets/0a409247-9b03-470e-aef0-159797e29985


