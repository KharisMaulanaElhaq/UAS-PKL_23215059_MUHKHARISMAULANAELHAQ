# Sistem Pakar Diagnosa Penyakit & Hama Padi

- **Nama**: Muh.Kharis Maulana Elhaq
- **NIM**: 23215059
- **Tempat PKL**: Dinas Pertanian Dan Ketahanan Pangan Kab. Brebes
- **Judul Sistem**: Sistem Pakar Diagnosa Penyakit & Hama Padi

Backend admin panel berbasis **Laravel 11 + Bootstrap 5** untuk mengelola data
sistem pakar diagnosa penyakit dan hama padi dengan metode **Certainty Factor (CF)**.

## Teknologi

- Laravel 11
- Blade Template (layout inheritance + component)
- Bootstrap 5 (compiled dari template `inapp` — assets lokal, tanpa CDN)
- Laravel Breeze (Blade stack, sudah di-restyle pakai Bootstrap)
- MySQL / MariaDB (XAMPP)

## Struktur Penting

```
app/
├── Http/
│   ├── Controllers/Admin/   # DashboardController, GejalaController, ...
│   ├── Middleware/RoleMiddleware.php
│   └── Requests/            # Form Request validation
└── Models/                  # User, Gejala, Penyakit, Hama, Rule, RuleDetail

public/assets/               # CSS, JS, fonts, gambar dari template (lokal)
resources/views/
├── template_backend/        # layout.blade.php + partials (navbar/sidebar/footer)
├── components/              # <x-page-header>, <x-stat-card>
├── admin/                   # dashboard + CRUD (gejala, penyakit, hama, rules, users)
├── auth/                    # login, register, dsb (sudah pakai Bootstrap)
└── profile/                 # halaman profil
```

## Instalasi (untuk environment baru)

```bash
composer install
cp .env.example .env
php artisan key:generate
# Sesuaikan DB_DATABASE / DB_USERNAME / DB_PASSWORD di .env
php artisan migrate:fresh --seed
php artisan serve
```

Setting MySQL XAMPP di `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_pakar_padi
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
```

> `DB_COLLATION` di-set ke `utf8mb4_unicode_ci` karena MariaDB di XAMPP tidak
> mendukung default `utf8mb4_0900_ai_ci` milik Laravel 11.

## Akun Default (hasil seeder)

| Role     | Email                   | Password   |
| -------- | ----------------------- | ---------- |
| Admin    | `admin@sipakar.test`    | `password` |
| Petugas  | `petugas@sipakar.test`  | `password` |

## Role & Akses

- **Admin** — akses penuh termasuk manajemen user.
- **Petugas** — CRUD gejala, penyakit, hama, dan rules. Tidak bisa kelola user.

Middleware: `role:admin` atau `role:admin,petugas` (lihat `routes/web.php`).

## Skema Database

- `users` — `name`, `email`, `password`, **`role` (admin|petugas)**
- `gejala` — `kode_gejala`, `nama_gejala`
- `penyakit` — `kode_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`
- `hama` — `kode_hama`, `nama_hama`, `deskripsi`, `solusi`
- `rules` — `jenis (penyakit|hama)`, `target_id`
- `rule_details` — `rule_id`, `gejala_id`, `nilai_cf (0..1)`

## Akses Aplikasi (XAMPP)

Proyek berada di `c:\xampp\htdocs\PKL`, sehingga document root Laravel ada di
`http://localhost/PKL/public`. Pastikan Apache & MySQL XAMPP berjalan.

Alternatif: `php artisan serve` lalu buka `http://127.0.0.1:8000`.

## Template Assets

Semua aset Bootstrap (CSS, JS, font tabler-icons, gambar) sudah dipre-compile
dari template `inapp` dan tersedia di `public/assets/`. Diakses dengan
`{{ asset('assets/...') }}` (tidak menggunakan CDN).

Jika perlu rebuild template SCSS, gunakan source aslinya secara terpisah dan
salin ulang hasil `dist/assets/*` ke `public/assets/`.
