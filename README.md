
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

- Install library terlebih dahulu
    - [Library laravel dompdf](https://github.com/barryvdh/laravel-dompdf#laravel)
        ```bash
        composer require barryvdh/laravel-dompdf
        ```
    - [Library laravel excel](https://docs.laravel-excel.com/3.1/getting-started/installation.html)
        ```bash
        composer require maatwebsite/excel
        ```
    - [Library laravel gd text](https://github.com/stil/gd-text#installation-via-composer)
        ```bash
        composer require stil/gd-text
        ```

- Menjalankan development server
    ```bash
    php artisan serve
    ```
## Feedback

If you have any feedback, please reach out to us at hermawanarby2@gmail.com

