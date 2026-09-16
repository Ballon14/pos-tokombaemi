<div align="center">

# 🛒 Toko Mba Emi

### Sistem Kasir (POS) & Manajemen Toko Ritel Modern

Aplikasi kasir lengkap untuk toko ritel: transaksi **super cepat tanpa reload**, pembayaran **Tunai & QRIS**, mode **offline** yang tersinkron otomatis, dashboard **analitik real-time**, manajemen inventaris, audit log, dan laporan siap cetak.

[![PHP](https://img.shields.io/badge/PHP-%5E8.2-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-4.4-FB70A9?logo=livewire&logoColor=white)](https://livewire.laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3-06B6D4?logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.4-8BC0D0?logo=alpine.js&logoColor=white)](https://alpinejs.dev)
[![Chart.js](https://img.shields.io/badge/Chart.js-4-FF6384?logo=chartdotjs&logoColor=white)](https://www.chartjs.org)
[![Tests](https://img.shields.io/badge/Tests-79%20passed-22c55e)](https://laravel.com/docs/testing)

</div>

---

## 📑 Daftar Isi

- [⚡ Sorotan Fitur](#-sorotan-fitur)
- [✨ Fitur Utama](#-fitur-utama)
- [👥 Peran & Hak Akses](#-peran--hak-akses)
- [🛠️ Teknologi](#️-teknologi)
- [👤 Akun Demo](#-akun-demo)
- [🚀 Instalasi](#-instalasi)
- [🧪 Testing](#-testing)
- [📦 Struktur Direktori](#-struktur-direktori)
- [🌐 Deploy ke Produksi](#-deploy-ke-produksi)
- [🗺️ Roadmap](#️-roadmap)

---

## ⚡ Sorotan Fitur

| | |
|---|---|
| 🧾 **Kasir tanpa reload** | Transaksi penuh dari Livewire — tambah barang, ubah qty, diskon, bayar, selesai. Halaman tidak pernah di-refresh. |
| 📴 **Mode Offline** | Transaksi tersimpan di perangkat saat internet mati, **sinkron otomatis** saat koneksi pulih (IndexedDB + Service Worker). |
| 🖨️ **Struk Thermal 58/80mm** | Template struk yang dioptimalkan untuk printer kasir thermal. |
| 📊 **Dashboard Analitik** | Grafik penjualan harian/bulanan, produk terlaris, ringkasan transaksi, serta peringatan stok menipis. |
| 🔔 **Peringatan Stok Menipis** | Notifikasi otomatis saat stok mencapai batas minimum — di dashboard, sidebar, dan halaman khusus. |
| 🔒 **HTTPS di Jaringan LAN** | Reverse proxy nginx + sertifikat self-signed (CA internal) — PWA & offline cache aktif penuh. |
| 🗄️ **Backup & Restore** | Backup & restore seluruh database dalam format SQL atau ZIP (CSV) langsung dari pengaturan sistem. |
| 📥 **Import/Export Data** | Tambah dan perbarui data produk secara massal menggunakan file Excel/CSV. |
| 💾 **Backup Otomatis** | Dump database terjadwal via systemd tiap pukul 02.30 dengan retensi 14 hari. |
| 📱 **Aplikasi Android** | APK tersedia untuk diunduh langsung dari website — CA internal sudah tertanam, tanpa instal manual. |

---

## ✨ Fitur Utama

### 🧾 Point of Sale (Kasir)

- **Kasir super cepat** berbasis Livewire — input lewat **klik produk, pencarian, atau scanner barcode**
- Pembayaran **Tunai** (dengan hitung kembalian otomatis) & **QRIS statis** (tanpa payment gateway)
- Diskon fleksibel: **nominal (Rp) atau persen (%)** — langsung dihitung ulang secara real-time
- **Mode offline**: transaksi tersimpan di perangkat dan **sinkron otomatis** saat koneksi kembali, lengkap dengan pengecekan stok saat sinkronisasi
- **Keranjang persisten** — isi keranjang tidak hilang walau halaman di-refresh
- **Struk thermal 58mm/80mm** yang dioptimalkan untuk printer kasir
- Konfirmasi transaksi dengan **modal kustom** yang konsisten (bukan dialog bawaan browser)

### 📊 Dashboard Analitik

- Kartu ringkasan: **Penjualan Hari Ini**, **Transaksi Hari Ini**, **Penjualan Bulan Ini**, **Produk Perlu Restock**
- **Grafik penjualan 7 hari terakhir** (bar chart) dan **produk terlaris** (doughnut chart) dengan Chart.js
- Daftar produk yang perlu restock dengan akses cepat ke halaman Stok Menipis

### 📦 Manajemen Inventaris

- Master data lengkap: **Kategori, Produk, Supplier** (produk: harga beli/jual, SKU, barcode, satuan, foto, batas stok)
- **Import & Export Produk** secara massal menggunakan format Excel/CSV
- **Mutasi stok** tercatat lengkap (stok masuk, keluar, retur, penyesuaian) dengan riwayat per produk
- **Perhitungan COGS (Harga Pokok Penjualan)** secara otomatis per transaksi (snapshot harga beli) untuk laporan laba-rugi yang akurat
- **Peringatan stok menipis** otomatis saat stok ≤ batas minimum (dapat diatur per produk)
- **Retur penjualan** yang mengembalikan stok otomatis dan mengurangi pendapatan pada laporan

### 👥 Multi-Role & Hak Akses

- **Multi-role** terintegrasi menggunakan Spatie Permission: **Admin** dan **Kasir**
- Antarmuka (sidebar) akan menyesuaikan menu secara dinamis berdasarkan role pengguna

### 📋 Laporan & Audit

- Laporan: **Penjualan, Laba-Rugi, Mutasi Stok, Perubahan Harga** — dengan filter rentang tanggal, kasir, dan produk
- Ekspor **PDF** (DomPDF) untuk semua laporan
- **Pagination** pada semua halaman berdata banyak (15–31 baris/halaman)
- **Audit log** aktivitas lengkap: login, logout, transaksi, perubahan master data, dan pengaturan sistem

### 🔐 Keamanan & Operasional

- Pendaftaran publik **dinonaktifkan** — akun dibuat langsung melalui Seeder/Database
- **Throttling** pada login & lupa-password (anti brute-force)
- Halaman web **anti-cache** (PreventStaleCache) agar data selalu segar
- **PWA installable** — aplikasi dapat dipasang di layar utama perangkat kasir
- **Backup & Restore Database** mandiri (SQL/CSV) via pengaturan sistem, selain **Backup otomatis** via systemd timer (retensi 14 hari)

---

## 👥 Peran & Hak Akses

| Peran | POS | Dashboard & Laporan | Master Data | Log Aktivitas & Pengaturan |
|---|---|---|---|---|
| 🛡️ **Admin** | ✅ | ✅ | ✅ | ✅ |
| 💵 **Kasir** | ✅ | — | — | — |

---

## 🛠️ Teknologi

| Lapisan | Teknologi |
|---|---|
| **Backend** | Laravel 12 · PHP 8.2+ · Livewire 4.4 |
| **Database** | MySQL 8+ |
| **Frontend** | Blade · Tailwind CSS 3 · Alpine.js · Vite · Chart.js |
| **Autentikasi & Otorisasi** | Laravel Breeze · Spatie Laravel Permission |
| **Ekspor Dokumen** | Barryvdh/Laravel-DomPDF (PDF) · OpenSpout (CSV/Excel) |
| **Offline & PWA** | IndexedDB · LocalStorage · Workbox (Service Worker) |
| **Operasional** | Nginx (reverse proxy + HTTPS) · systemd (service & backup timer) |

---

## 👤 Akun Demo

Seeder menyediakan data awal lengkap (kategori, produk, supplier, dan riwayat transaksi 1 bulan). Akun yang dapat digunakan:

| Role | Email | Password | Hak Akses Utama |
|------|-------|----------|-----------------|
| 🛡️ **Admin** | `admin@tokombaemi.com` | `password` | Akses penuh: semua modul, master data, laporan, pengaturan |
| 💵 **Kasir** | `kasir1@tokombaemi.com` | `password` | Modul POS (transaksi penjualan) |

---

## 🚀 Instalasi

### Prasyarat

- **PHP** ≥ 8.2 (ekstensi: `pdo_mysql`, `mbstring`, `xml`, `zip`, `gd`)
- **Composer**
- **Node.js** ≥ 18 & **npm**
- **MySQL** server

### Langkah Instalasi

```bash
# 1. Install dependency
composer install
npm install

# 2. Siapkan environment
cp .env.example .env
php artisan key:generate

# 3. Atur koneksi database di .env, lalu jalankan migration + seeder
php artisan migrate:fresh --seed
# (Seeder memakan beberapa saat — menghasilkan riwayat transaksi & mutasi stok 1 bulan)

# 4. Konfigurasi QRIS (opsional — untuk pembayaran QRIS statis)
# Isi di .env:
QRIS_STATIC_CODE=00020101021126620012ID.CO.QRIS.WWW-0111TESTQRIS00001
QRIS_HOLDER="Nama Toko Anda"

# 5. Kompilasi asset frontend
npm run build
# atau untuk development: npm run dev

# 6. Jalankan server
php artisan serve
```

Buka aplikasi di browser: **http://localhost:8000**

> 💡 Untuk diakses dari perangkat kasir lain di jaringan LAN:
> `php artisan serve --host=0.0.0.0 --port=8000`

---

## 🧪 Testing

```bash
php artisan test
```

Saat ini **79 test / 208 assertions** lolos, mencakup: POS (diskon Rp & %, validasi stok, pembayaran, struk), transaksi offline & sinkronisasi, retur, mutasi stok, COGS, laporan & pagination, RBAC, dan autentikasi.

Code style dijamin konsisten dengan [Laravel Pint](https://laravel.com/docs/pint):

```bash
vendor/bin/pint
```

---

## 📦 Struktur Direktori

```
app/
├── Http/
│   ├── Controllers/     # Controller per modul (Penjualan, Stok, Laporan, Pengaturan, ...)
│   ├── Middleware/      # Termasuk PreventStaleCache (anti-cache halaman web)
│   └── Requests/        # Form Request Validation
├── Livewire/
│   └── PosTerminal.php  # Komponen kasir (online + offline)
├── Services/            # Business logic layer
│   ├── ReportService.php    # Logika dashboard & seluruh laporan
│   ├── StockService.php     # Logika mutasi stok
│   ├── DatabaseCsvService.php # Layanan kompresi ZIP untuk Export/Import DB
│   └── SaleService.php      # Logika transaksi, retur, dan struk
└── Models/              # Eloquent Models
resources/
├── views/               # Blade + Tailwind + Alpine
└── js/
    ├── pwa/             # offlinePos.js (POS offline) & offline.js (antrian sinkron)
    └── confirm.js       # Modal konfirmasi kustom global
deploy/                  # systemd unit, timer backup, konfigurasi nginx
scripts/backup.sh        # Backup database otomatis
routes/web.php           # Definisi route
```

---

## 🌐 Deploy ke Produksi

> Setup di bawah sudah **diterapkan dan berjalan** di server produksi.

### 1. Jalankan sebagai Service (systemd)

```bash
sudo cp deploy/tokombaemi.service deploy/tokombaemi-backup.service deploy/tokombaemi-backup.timer /etc/systemd/system/
sudo systemctl daemon-reload
sudo systemctl enable --now tokombaemi.service tokombaemi-backup.timer
```

### 2. HTTPS di Jaringan LAN (Nginx + CA Internal)

Aplikasi berjalan di belakang **nginx** sebagai reverse proxy dengan sertifikat **self-signed** (CA internal) — port HTTP dialihkan ke HTTPS (443) secara otomatis.

```bash
# Sertifikat & CA (CN = IP server)
mkdir -p /etc/ssl/tokombaemi
openssl genrsa -out /etc/ssl/tokombaemi/ca.key 2048
openssl req -x509 -new -nodes -key ca.key -sha256 -days 3650 \
  -subj "/CN=Toko Mba Emi CA/O=Toko Mba Emi/C=ID" -out /etc/ssl/tokombaemi/tokombaemi-ca.crt
```

**Mempercayai CA di perangkat klien** (PC kasir, HP):
1. Salin `tokombaemi-ca.crt` ke perangkat.
2. **Windows**: Instal ke *Trusted Root Certification Authorities*.
3. **Android**: Pengaturan → Keamanan → Instal sertifikat CA.

### 3. Backup Database

```bash
./scripts/backup.sh   # kapan saja secara manual
```

Dump disimpan di `storage/backups/tokombaemi-<timestamp>.sql.gz` dan file lebih dari 14 hari dihapus otomatis.

### 4. Aplikasi Android (APK)

Aplikasi web dibungkus menjadi APK dengan **Capacitor** (WebView native). APK bisa diunduh langsung dari website — CA internal sudah tertanam di dalam APK sehingga tidak perlu instal sertifikat manual di HP kasir.

```bash
./scripts/build-apk.sh   # membangun APK & menyalin ke public/downloads/tokombaemi.apk
```

---

## 🗺️ Roadmap

- [x] Import/Ekspor data Produk (Excel/CSV)
- [x] Backup & Restore seluruh Database (SQL & CSV) via antarmuka web
- [ ] Ekspor semua Laporan ke **Excel** (OpenSpout — sudah terpasang)
- [ ] Lupa Password (Breeze) dengan SMTP Email
- [ ] Cetak struk otomatis saat transaksi selesai (auto-print)
- [ ] Continuous Integration (GitHub Actions) & Larastan
- [ ] Pencetakan ulang struk transaksi lama

---

<div align="center">

**Toko Mba Emi** — dibangun dengan ❤️ untuk efisiensi bisnis Anda.

</div>
