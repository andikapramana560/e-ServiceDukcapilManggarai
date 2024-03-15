## Panduan Penggunaan Program

### Requirement

-   Laravel Version 10.10
-   PHP Version 8.2.12
-   Sudah menginstall composer untuk menjalankan laravel

## Cara Instalasi

-   Clone repository ini dengan klik tombol <>code, kemudian pilih "Download ZIP"
-   Kemudian ekstrak file zip yang sudah didownload
-   Buka file yg sudah diekstrak dengan text editor
-   Pada Laravel, harus ada file .env untuk menjalankan laravel dan menghubungkan ke database, hapus .remove pada .env.remove, kemudian save
-   Stlh itu jalankan migration => 'php artisan migrate'
-   Karena pada sistem ini terdapat manajemen file, jalankan juga perintah => 'php artisan storage:link'
-   Jika semuanya sudah, jalankan laravel dengan perintah 'php artisan serve'
-   Kalau ada error yg muncul setelah menjalankan perintah 'php artisan serve', coba jalankan perintah 'composer install', jika sudah selesai coba kembali perintah 'php artisan serve'
