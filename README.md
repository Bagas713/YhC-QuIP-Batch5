# YhC QuIP Batch5

Tentu, berikut adalah contoh README untuk kode aplikasi CRUD kursus:

# Aplikasi Manajemen Kursus

Aplikasi ini adalah sebuah aplikasi web sederhana yang digunakan untuk mengelola kursus dan materi. Aplikasi ini memiliki fitur CRUD (Create, Read, Update, Delete) untuk kursus dan materi yang memungkinkan pengguna untuk membuat, melihat, mengedit, dan menghapus kursus serta menambahkan, melihat, mengedit, dan menghapus materi dalam kursus.

## Teknologi dan Bahasa Pemrograman

Aplikasi ini dikembangkan menggunakan PHP dan menggunakan database MySQL untuk menyimpan data kursus dan materi. Berikut adalah teknologi yang digunakan:

- PHP: Bahasa pemrograman yang digunakan untuk mengembangkan logika backend aplikasi.
- MySQL: Database yang digunakan untuk menyimpan data kursus dan materi.
- PDO (PHP Data Objects): Digunakan untuk menghubungkan aplikasi dengan database dan menjalankan query.

## Cara Menjalankan Aplikasi

Berikut adalah langkah-langkah untuk menjalankan aplikasi ini di lingkungan lokal:

1. Pastikan Anda memiliki server web (seperti Apache) dan database MySQL yang sudah terinstall di komputer Anda.
2. Buatlah database baru dengan nama `msib` di MySQL.
3. Buat tabel `courses` dan `materials` dengan struktur yang sesuai seperti di dalam kode (silakan lihat file `db.sql`).
4. Download atau clone repository ini ke direktori web server Anda (misalnya `htdocs` untuk XAMPP).
5. Buka file `index.php` dan sesuaikan pengaturan koneksi database dengan konfigurasi MySQL Anda (host, username, password, dan nama database).
6. Buka aplikasi di web browser dengan mengakses `http://localhost/course-management-app/` (sesuaikan dengan direktori dan alamat server web Anda).

## Fitur Aplikasi

Aplikasi ini memiliki fitur-fitur berikut:

1. Menambahkan kursus baru dengan judul, deskripsi, dan durasi.
2. Melihat daftar kursus beserta detailnya.
3. Mengedit informasi kursus seperti judul, deskripsi, dan durasi.
4. Menghapus kursus yang tidak relevan.
5. Menambahkan materi ke dalam kursus dengan judul, deskripsi, dan link embed materi.
6. Melihat daftar materi dalam sebuah kursus.
7. Mengedit informasi materi seperti judul, deskripsi, dan link embed materi.
8. Menghapus materi yang tidak relevan dalam sebuah kursus.

## Kontribusi

Anda dipersilakan untuk melakukan kontribusi terhadap pengembangan aplikasi ini. Jika Anda menemukan masalah atau memiliki saran perbaikan, silakan buat *issue* baru di repositori ini. Jika Anda ingin berkontribusi langsung, silakan buat *pull request* dengan perubahan yang diusulkan.

## Lisensi

Aplikasi ini dilisensikan di bawah Lisensi MIT. Silakan merujuk ke file `LICENSE` untuk informasi lebih lanjut.

---
Sesuaikan bagian-bagian yang perlu disesuaikan, seperti langkah-langkah untuk menjalankan aplikasi pada lingkungan lokal Anda dan pengaturan koneksi database. Juga, pastikan untuk menyertakan struktur tabel dalam file `db.sql` agar pengguna dapat membuat tabel dengan benar sebelum menjalankan aplikasi.

Perlu diingat bahwa readme dapat disesuaikan dengan kebutuhan dan preferensi Anda, jadi pastikan untuk menyesuaikannya sesuai dengan informasi dan panduan yang Anda anggap relevan untuk pengguna aplikasi ini.

## Tampilan

Menambahkan Kursus Baru

![image](https://github.com/Bagas713/YhC-QuIP-Batch5/assets/109123174/d54ab95e-53e1-4245-8629-19193b63b0a7)

Menambahkan Materi Baru

![image](https://github.com/Bagas713/YhC-QuIP-Batch5/assets/109123174/bd05205e-6c39-43bc-bd96-9c8e300bfb34)

Form Edit

![image](https://github.com/Bagas713/YhC-QuIP-Batch5/assets/109123174/79234653-d053-40ce-8bd7-efbac136308c)


