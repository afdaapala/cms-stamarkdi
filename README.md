cms template bmkg author https://github.com/bimatriariyanto & https://github.com/rofifzm

## Installation & Setup

Jalankan perintah berikut pada directory project: <br>
<strong>- composer install</strong> <br>
<strong>- npm install && npm run dev</strong> <br>
<strong>- cp .env.example .env</strong><br><br>
Lakukan pembuatan database pada mysql server.
Sesuaikan pengaturan environment (di file .env) dengan user dan password database.<br>
<strong>- php artisan key:generate</strong><br>
<strong>- php artisan migrate</strong>
<strong>- php artisan storage:link</strong>
