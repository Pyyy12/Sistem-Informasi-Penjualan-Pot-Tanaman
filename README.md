# 🪴 TerraFlora - E-Commerce Pot Presisi & Media Tanam Khusus

Aplikasi web berbasis **Laravel 11** untuk katalog dan pemesanan pot tanaman hias premium. Sistem ini dirancang untuk mencocokkan ukuran diameter pot serta formulasi jenis tanah (media tanam berporos/drainase tinggi) yang spesifik terhadap kebutuhan tanaman koleksi seperti Aroid, Monstera, Kaktus, Sukulen, Calathea, dan Bonsai.

---

## 🌿 Fitur Utama

- **Filter Dimensi & Aerasi**: Filter produk berdasarkan rentang diameter pot (`Size S`, `Size M`, `Size L`).
- **Spesialisasi Media Tanam**: Pengelompokan jenis tanah khusus (misal: *Aroid Mix*, *Desert Sandy Mix*, *Humus Fermentasi*).
- **Rekomendasi Tanaman Spesifik**: Setiap paket pot dilengkapi informasi tanaman yang paling cocok untuk menghindari risiko busuk akar (*root rot*).
- **Pencarian Cepat**: Filter pencarian real-time berdasarkan nama produk, bahan pot (terracotta, keramik glaze, semen teraso), atau target tanaman.
- **WhatsApp Direct Checkout**: Integrasi tombol pesan langsung ke WhatsApp dengan template pesan otomatis berisi nama produk, ID, dan total harga.
- **UI Responsif & Modern**: Menggunakan Tailwind CSS dengan palet warna natural bertema botani.

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11.x
- **Bahasa**: PHP >= 8.2
- **Database**: MySQL / MariaDB / PostgreSQL
- **Styling**: Tailwind CSS (CDN / Vite)
- **Komponen Interaktif**: Blade Templating

---

## 📋 Struktur Database

Aplikasi menggunakan relasi multi-tabel:

1. `pot_sizes`
   - Menyimpan kategori dimensi pot (`name`, `slug`, `diameter_range`, `description`).
2. `soil_types`
   - Menyimpan karakteristik media tanam (`name`, `slug`, `texture_drainage`, `best_for_plants`).
3. `products`
   - Data produk utama dengan relasi `belongsTo` ke `pot_sizes` dan `soil_types`. Menyimpan spesifikasi bahan, peruntukan tanaman, harga, stok, gambar, dan status unggulan.

---

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal:

### 1. Clone Repositori
```bash
git clone [https://github.com/username/terraflora.git](https://github.com/username/terraflora.git)
cd terraflora
