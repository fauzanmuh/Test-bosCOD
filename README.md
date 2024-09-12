<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Dokumentasi API

- API Login
![](https://github.com/fauzanmuh/Test-bosCOD/raw/master/dokumentasiAPI/login.png)

- API Update Token
![](https://github.com/fauzanmuh/Test-bosCOD/raw/master/dokumentasiAPI/updateToken.png)

- API Create Transfer
![](https://github.com/fauzanmuh/Test-bosCOD/raw/master/dokumentasiAPI/createTransfer.png)

## Panduan Menjalankan & Install Aplikasi

Clone project 

``` $ git clone https://github.com/fauzanmuh/Test-bosCOD.git ```

Buka Kode editor → Terminal.
  
Masukkan perintah di bawah ini satu per satu (Tanpa $),
  ```
  $ composer update
  $ composer install
  $ cp .env.example .env
  $ php artisan key:generate
  ```

Edit the .env file like this,
  ```
  DB_CONNECTION = mysql
  DB_HOST = 127.0.0.1 // change to Host your database
  DB_PORT = 3306
  DB_DATABASE = test-boscod // change to the name of the database table that you created
  DB_USERNAME = root // change to be your database username, default root
  DB_PASSWORD =    // change to your databse password, null default 
  ```

Import Database yang telah disediakan,
  
Done 😉, untuk menjalankannya:
  ```$ php artisan serve```
  
Thank you 😁
