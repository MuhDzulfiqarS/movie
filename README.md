# Aplikasi Daftar Film

Ini adalah aplikasi daftar film yang dibuat menggunakan **Laravel 9**. Aplikasi ini memungkinkan pengguna untuk mencari film, melihat detail film, dan mengelola film favorit mereka. Selain itu, aplikasi ini memiliki fitur gulir tak terbatas dan pemuatan lambat untuk pengalaman pengguna yang lebih baik.

## Fitur
- **Autentikasi**: Pengguna harus masuk sebelum mengakses daftar film dan detailnya.
- **Pencarian Film**: Pengguna dapat mencari film menggunakan parameter yang berbeda.
- **Detail Film**: Mengklik film akan menampilkan informasi terperinci yang diambil dari API OMDb.
- **Favorit**: Pengguna dapat menambahkan film ke favorit mereka dan melihat atau menghapusnya nanti.
- **Dukungan Multibahasa**: Pengguna dapat beralih antara Bahasa Inggris dan Bahasa Indonesia (fitur opsional).
- **Gulir Tak Terbatas**: Daftar film dimuat terus-menerus saat pengguna menggulir ke bawah.
- **Pemuatan Lambat**: Poster film dimuat dengan lambat untuk meningkatkan kinerja halaman.
- **Integrasi API OMDb**: Data film diambil dari API OMDb.

## Library

- **Laravel 9**: Kerangka kerja PHP yang digunakan untuk membangun backend dan perutean.
- **OMDb API**: Digunakan untuk mengambil data film seperti judul, poster, dan deskripsi.
- **jQuery**: Digunakan untuk menangani permintaan Infinite Scroll dan AJAX.
- **Bootstrap 5**: Kerangka kerja frontend untuk membangun UI responsif.
- **AOS (Animate on Scroll)**: Untuk menambahkan animasi halus saat elemen digulir ke tampilan.
- **Font Awesome**: Untuk menambahkan ikon seperti ikon hati untuk tombol "Tambahkan ke Favorit".

## Arsitektur Aplikasi

Aplikasi ini mengikuti arsitektur **MVC (Model-View-Controller)**, yang merupakan pola desain yang digunakan untuk memisahkan hal-hal yang menjadi perhatian aplikasi.

- **Model**: Struktur data aplikasi, penanganan interaksi basis data, dan logika.

Contoh: Model `User`, `FavoriteMovie` untuk mengelola data pengguna dan favorit.

- **View**: Bagian depan, tempat antarmuka pengguna dirender.

Contoh: Template blade untuk halaman seperti login, daftar film, dan detail film.

- **Controller**: Menangani permintaan dan respons, menghubungkan model dan tampilan, serta mengelola alur aplikasi.

- Contoh: `MovieController` untuk mengambil data dari API OMDb dan menampilkannya.

Selain itu terdapat Arsitektur yang digunakan :

- **Middleware**

- Contoh: `CekUserLogin` 

- **Kernel**