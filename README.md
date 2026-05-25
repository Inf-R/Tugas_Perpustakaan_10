# Tugas Pertemuan 10 — Migration, Model Accessor & Scope

**Nama:** Inf-R  
**Mata Kuliah:** Pemrograman Web  

---

## 📋 Daftar Isi
- [Tugas 1: Migration Tabel Kategori](#tugas-1-migration-tabel-kategori)
- [Tugas 2: Model Accessor & Scope](#tugas-2-model-accessor--scope)
- [Cara Menjalankan](#cara-menjalankan)
- [Struktur File](#struktur-file)

---

## Tugas 1: Migration Tabel Kategori (40%)

### Struktur Tabel `kategori`

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| id | bigint, PK, auto increment | Primary key |
| nama_kategori | string(50), unique | Nama kategori, tidak boleh duplikat |
| deskripsi | text, nullable | Deskripsi kategori |
| icon | string(50), nullable | Nama icon Bootstrap Icons |
| warna | string(20), nullable | Warna badge Bootstrap |
| created_at | timestamp | Otomatis oleh Laravel |
| updated_at | timestamp | Otomatis oleh Laravel |

### Data Seeder (5 Kategori)

| Nama Kategori | Icon | Warna |
|--------------|------|-------|
| Programming | code-slash | primary |
| Database | database | success |
| Web Design | palette | info |
| Networking | wifi | warning |
| Data Science | graph-up | danger |

---

## Tugas 2: Model Accessor & Scope (60%)

### A. Model Buku

**Accessor:**
- `status_stok_badge` → Badge HTML berdasarkan stok (Habis/Menipis/Sedang/Aman)
- `tahun_label` → "Buku Baru" (>= 2024) atau "Buku Lama" (< 2024)

**Scope:**
- `scopeStokMenipis()` → Filter stok < 5
- `scopeHargaRange($min, $max)` → Filter harga antara min dan max
- `scopeTerbaru()` → Filter tahun_terbit >= 2024

### B. Model Anggota

**Accessor:**
- `status_badge` → Badge HTML Aktif/Nonaktif
- `kategori_usia` → Remaja (< 20) / Dewasa (20-50) / Senior (> 50)

**Scope:**
- `scopeJenisKelamin($jk)` → Filter berdasarkan 'L' atau 'P'
- `scopeTerdaftarBulanIni()` → Filter anggota daftar bulan ini

---

## Cara Menjalankan

### 1. Clone & Setup
```bash
git clone https://github.com/Inf-R/Tugas_Perpustakaan_10.git
cd perpustakaan_laravel
```

### 2. Copy File ke Project Laravel
Copy semua file dari repo ini ke project Laravel Anda:
- `database/migrations/` → ke folder migrations Laravel
- `database/seeders/` → ke folder seeders Laravel
- `app/Models/` → ke folder Models Laravel
- `routes/web.php` → ganti routes/web.php Laravel
- `resources/views/` → ke folder views Laravel

### 3. Jalankan Migration & Seeder
```bash
php artisan migrate
php artisan db:seed
```

### 4. Jalankan Server
```bash
php artisan serve
```

### 5. Buka Route Testing
```
http://localhost:8000/test-accessor-scope
```

---

## Struktur File

```
├── app/
│   └── Models/
│       ├── Kategori.php        # Model + fillable
│       ├── Buku.php            # Model + Accessor + Scope
│       └── Anggota.php         # Model + Accessor + Scope
├── database/
│   ├── migrations/
│   │   ├── ..._create_kategori_table.php
│   │   ├── ..._create_buku_table.php
│   │   └── ..._create_anggota_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── KategoriSeeder.php
│       ├── BukuSeeder.php
│       └── AnggotaSeeder.php
├── resources/views/
│   └── test-accessor-scope.blade.php
└── routes/
    └── web.php
```
