## Janji
Saya Muhamad Raditya Novandrian dengan NIM 2508283 mengerjakan TP-7 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

### Desain Class 
*   **Atribut Private:** Properti koneksi database (`$db`) pada setiap class model (`Expansion`, `Card`, `Order`) dibuat `private` untuk menjaga integritas koneksi dan memastikan database tidak diakses secara acak dari luar class.
*   **Dependency Injection:** Akses dan modifikasi database dilakukan melalui metode CRUD `public` pada setiap class. Object koneksi PDO dikirim melalui constructor saat class diinisialisasi sehingga sistem hanya menggunakan satu koneksi database yang efisien.

## Penjelasan Atribut dan Methods
### Class Database (Config)
*   **Deskripsi:** Mengatur koneksi utama ke database MySQL `db_tcg` menggunakan lapisan abstraksi PHP Data Objects (PDO).
*   **Atribut:**
    *   `host`, `username`, `password`, `dbname` (private): Kredensial server dan nama database.
    *   `conn` (public): Menyimpan object PDO yang berhasil terkoneksi.
*   **Methods Utama:** 
    *   `__construct()`: Melakukan inisialisasi koneksi `new PDO()` dan mengatur atribut Error Mode ke Exception untuk mempermudah debugging.

### Class Expansion, Card, & Order (Model)
*   **Deskripsi:** Merepresentasikan entitas-entitas tabel di dalam database dan menangani semua logika SQL.
*   **Atribut (`private`):**
    *   `$db`: Menyimpan instance object PDO untuk mengeksekusi query.
*   **Methods Utama:**
    *   `add...()` (contoh: `addCard`): Memasukkan data baru menggunakan (`prepare()` dan `execute()`) untuk menjamin keamanan dari serangan *SQL Injection*.
    *   `getAll...()`: Mengambil daftar data menggunakan sintaks `SELECT`. Pada class `Card` dan `Order`, method ini mengaplikasikan relasi `JOIN` agar *foreign key* dapat ditampilkan sebagai nama asli, bukan sekadar ID.
    *   `delete...()`: Menghapus baris data yang dituju menggunakan parameter binding *ID* yang aman.

## Penjelasan Alur Program

1. **HTTP Request & Routing (Entry Point):** Saat web diakses, file `index.php` menerima *request* dari *client browser*. File ini mengimpor koneksi database dan menggunakan `spl_autoload_register()` untuk memanggil class yang dibutuhkan. Sistem *routing* kemudian menangkap parameter dari URL untuk menentukan halaman GUI mana yang akan dimuat (misalnya `cards`, `expansions`, atau `orders`).
2. **Penanganan Input Form (Logic & Database):** Sebelum HTML dirender ke layar, `index.php` mengecek apakah *user* mengirimkan form. Jika fungsi `isset($_POST['...'])` terpenuhi (misal `add_card`), sistem memanggil method class terkait untuk mengeksekusi ke database secara real-time.
3. **View Rendering (Frontend GUI):** Setelah pemrosesan database selesai, PHP menggabungkan komponen antarmuka. `header.php` dimuat pertama kali, diikuti oleh logika routing yang menyisipkan view utama (misal `view/cards.php`), dan diakhiri dengan `footer.php`.
4. **Menampilkan Data (Read):** Di dalam file view HTML, sistem melakukan perulangan `foreach` yang memanggil method baca seperti `$card->getAllCards()`. Data array dari database PDO otomatis dipecah dan ditampilkan ke dalam tabel antarmuka agar *user* bisa melihat inventaris TCG.

## Dokumentasi (Video)



https://github.com/user-attachments/assets/35d5e61c-3e0a-46a4-80ee-9ee2d9314669

