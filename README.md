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

   Contoh: `MovieController` untuk mengambil data dari API OMDb dan menampilkannya.

Selain itu terdapat Arsitektur yang digunakan :

- **Middleware** : Middleware adalah lapisan perantara yang berfungsi untuk memproses permintaan (request) yang masuk sebelum diteruskan ke aplikasi atau setelah aplikasi memproses respons. 

  Contoh: 
  `CekUserLogin` : Middleware ini berfungsi untuk  memeriksa status autentikasi pengguna
  `SetLocale` : Middleware SetLocale bertanggung jawab untuk mengatur bahasa yang digunakan oleh aplikasi sesuai dengan preferensi pengguna atau pengaturan default

- **Kernel** : Kernel di Laravel bertugas untuk mendaftarkan dan mengatur urutan eksekusi middleware. Dalam aplikasi ini menambahkan HTTP Kernel dari SetLocale

   Contoh: ` \App\Http\Middleware\SetLocale::class` : Kernel ini bertanggung jawab untuk memproses setiap permintaan HTTP yang masuk khususnya Middleware SetLocale.


## Cara Kerjanya

1. **Login**: Pengguna harus login untuk mengakses daftar film dan detailnya. Kredensial divalidasi, dan jika berhasil, pengguna diarahkan ke halaman daftar film.

2. **Daftar Film**: Saat pengguna mengunjungi halaman daftar film, serangkaian rekomendasi film default akan ditampilkan. Pengguna dapat mencari film tertentu menggunakan bilah pencarian. Poster film dimuat secara lambat untuk mengoptimalkan kinerja, dan lebih banyak film dimuat saat pengguna menggulir ke bawah (gulir tak terbatas).

3. **Detail Film**: Mengeklik film akan membuka tampilan terperinci yang menampilkan informasi lebih lanjut tentang film yang dipilih, seperti alur cerita, peringkat, dan tahun.

4. **Favorit**: Pengguna dapat menambahkan film ke daftar favorit mereka baik dari daftar film maupun halaman detail. Favorit dapat dikelola (ditonton dan dihapus) dari halaman terpisah.


## Screenshots

### 1. Halaman Login
 <img src="{{ asset ('assets/img/login_aldmic.png') }}">

### 2. Halaman Daftar Film

### 3. Halaman Detail Film


### 4. Halaman Film Favorit
