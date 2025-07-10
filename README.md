
# Unit Layanan Terpadu - Politeknik Negeri Banyuwangi 🧑🏻‍🎓

"Selamat datang di Aplikasi Unit Layanan Terpadu! Aplikasi ini dirancang untuk memberikan Anda pengalaman yang lebih baik dalam mengajukan dokumen dan melacak kemajuan pengajuan Anda. Kami mengerti bahwa mengajukan dokumen bisa menjadi proses yang kompleks, oleh karena itu kami hadir untuk membantu Anda melalui setiap langkahnya."


## Application Features or Stack 🤖

Features for Admin :
- Authentication is only available for admin users
- Admin user can access specific division for each user
- CMS (Content Management System) for manage Submission, Unit and Service management

Features for Guest :
- Can submit an application
- Can review a service from Submission
- Can Tracking Submission with Ticket Code
## Preview Landing Page of ULT Web App 🚀

![ULT Landing Page 1](https://i.postimg.cc/ZYdsJqdz/ult-landing-page-1.png)

![ULT Landing Page 2](https://i.postimg.cc/jdYg2rHw/ult-landing-page-2.png)

![ULT Landing Page 3](https://i.postimg.cc/yYhfSrjf/ult-landing-page-3.png)


## Installation Web App 📌

- Start with clone this project
```bash
  git clone https://github.com/tefamagang2023/ult-poliwangi.git
```
- Install composer (*if you dont have artisan)
```bash
  composer install
```
- Install livewire on your terminal project
```bash
  composer require livewire/livewire

```
- Install modal sweet alert
```bash
  composer require realrashid/sweet-alert

```
- Make storage folder link to your public folder
```bash
  php artisan storage:link

```
- Modify file .env - change database and port mysql 
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=ult_poliwangi   

```
- Running migration with seeder to your mysql 
```bash
  php artisan migrate --seed "or" php artisan migrate:fresh --seed

```
- Runing app
```bash
  php artisan serve

```
- For best practice, please rewrite '@livewireStyles' code in the following file :
```bash
  - form-dosen.blade.php
  - form-mahasiswa.blade.php
  - form-umum.blade.php

```
- Congrats Your Application have been run succesfully
## Support and Thanks ✨

For support credit, please email owner of this project : magangti2023@gmail.com. Thanks to our developper by TEFA Team 🎉🎉🎉

