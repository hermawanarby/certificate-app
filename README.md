
## Certificate App

Certificate App adalah aplikasi web yang berguna untuk memvalidasi kode keaslian dari sertifikat.


## Installation

Berikut ini cara instalasi dari project:

- Clone repo terlebih dahulu
    ```bash
    git clone https://github.com/hermawanarby/certificate-app.git
    ```

- Masuk ke repo
    ```bash
    cd certificate-app
    ```

- Mendownload vendor Laravel
    ```bash
    composer install
    ```

- Membuat file .env
    ```bash
    cp .env.example .env
    ```

- Membuat APP_KEY pada file .env
    ```bash
    php artisan key:generate
    ```

- Membuat database

    - Pada file `.env` ubah jadi `DB_DATABASE= certificate_app`
    - Lalu buat database pada `phpMyAdmin` dengan nama `certificate_app`

- Membuat tabel-tabel pada database
    ```bash
    php artisan migrate:fresh
    ```

- Menjalankan development server
    ```bash
    php artisan serve
    ```
## Feedback

If you have any feedback, please reach out to us at hermawanarby2@gmail.com

