# Kode Searching

## System Requirements

-   NPM [(download)](https://nodejs.org/en/download/current)
-   Composer [(Composer-Setup.exe)](https://getcomposer.org/download/)
-   PHP ( 8.1 minimum ) [download](https://www.apachefriends.org/download.html)
- Git -> [download](https://git-scm.com/download/win)
## First Configuration

### - Clone repository
buka git bash di folder yang ingin kalian masukan projek nya, lalu masukan perintah     
> git clone https://github.com/dryladen/Kode-Searching.git
### - Masuk ke folder projek
> cd Kode-Searching
### - Buat file env
buat file .env berdasarkan dari file env.example, caranya jalankan perintah:
>copy .env.example .env
### - Konfigurasi file env
Yang diubah pada file env disini hanyalah nama dari database ``DB_DATABASE=db_templates(dapat diubah)``, jika sudah lalu di ``Save``
### - Install package
 Jalankan perintah berikut di dalam terminal yang mengarah ke folder projek anda:
 > composer install
### - Generate Key
> php artisan key:generate
### - Migrasi Database
> php artisan migrate
### - Data Seeder
Agar tabel users memiliki data awal, dapat jalankan perintah:
> php artisan db:seed UserSeeder
### - Install Package Tailwind
> npm install

## How to run

Untuk menjalankan web memerlukan 2 terminal git bash
### - Terminal 1
jalankan perintah:
> npm run dev
### - Terminal 2
jalankan perintah:
> php artisan serve