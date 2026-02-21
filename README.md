# SSB Digital Management Portal

Aplikasi manajemen Sekolah Sepak Bola berbasis Laravel.

## Fitur
- Authentication (Laravel Breeze)
- Dashboard statistik
- CRUD SSB
- CRUD Siswa
- Filter data siswa
- Export PDF daftar pemain

## Tech Stack
- Laravel 10
- Tailwind CSS
- MySQL
- DomPDF

## AI Help
- Perancangan struktur migrasi dan relasi database
- Penyempurnaan query filtering
- Refactor struktur controller agar lebih clean
- Penyempurnaan tampilan UI berbasis Tailwind supaya responsive

## Kendala yang dialami
1. Error instalasi DomPDF (Windows file locking issue)
Masalah: Composer gagal menghapus file di folder vendor.
Solusi: Menghapus folder vendor dan composer.lock, lalu menjalankan ulang composer install sebagai administrator.

2. Tampilan tabel tidak rapi (flex pada <td>)
Masalah: Layout tabel rusak karena penggunaan flex di elemen tabel.
Solusi: Memindahkan flex ke dalam tag div ke dalam tag td agar struktur HTML tetap valid.

3. Route Model Binding tidak sinkron
Masalah: Parameter route tidak sesuai dengan nama variabel controller.
Solusi: Menyesuaikan parameter resource route dengan signature method controller.
