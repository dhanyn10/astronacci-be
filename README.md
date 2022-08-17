# Astronacci

Project ini menggunakan laravel 9

### Database
konfigurasi database, App id dan App key untuk setiap Oauth sosial media tersedia di file `.env`  auto create database bisa dilakukan dengan command:
```
php artisan migrate
```
lalu bisa dilanjutkan dengan seeder khusus data admin:
```
php artisan db:seed
```
informasi login sebagai admin adalah sebagai berikut:
```
email       : admin@web
password    : admin
```
untuk user biasa, bisa melakukan login sederhana yang tidak membutuhkan konfirmasi email. Atau bisa lebih cepat dengan menggunakan register/login dengan media sosial google atau facebook.
