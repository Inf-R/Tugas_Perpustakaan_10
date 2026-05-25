<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Accessor & Scope - Tugas 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .section-card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); margin-bottom: 2rem; }
        .section-card .card-header { border-radius: 12px 12px 0 0 !important; font-weight: 600; }
        .table thead th { background: #343a40; color: #fff; border: none; }
        .badge-label { font-size: 0.75rem; padding: 4px 10px; border-radius: 20px; }
        h1 { font-weight: 700; }
    </style>
</head>
<body>
<div class="container py-5">

    <div class="text-center mb-5">
        <h1><i class="bi bi-journal-code text-primary me-2"></i>Testing Accessor & Scope</h1>
        <p class="text-muted">Tugas Pertemuan 10 — Model Accessor & Scope Laravel</p>
        <hr>
    </div>

    {{-- =============================================
         SECTION 1: Semua Buku + Accessor
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-primary text-white py-3">
            <i class="bi bi-book me-2"></i>1. Semua Buku — Accessor: status_stok_badge & tahun_label
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Tahun Label</th>
                            <th>Stok</th>
                            <th>Status Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semuaBuku as $i => $buku)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $buku->judul }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>
                                <span class="badge {{ $buku->tahun_terbit >= 2024 ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $buku->tahun_label }}
                                </span>
                            </td>
                            <td>{{ $buku->stok }}</td>
                            <td>{!! $buku->status_stok_badge !!}</td>
                            <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =============================================
         SECTION 2: Scope Terbaru
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-success text-white py-3">
            <i class="bi bi-stars me-2"></i>2. Scope: terbaru() — Buku dengan tahun_terbit >= 2024
            <span class="badge bg-white text-success ms-2">{{ $bukuTerbaru->count() }} buku</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Status Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bukuTerbaru as $i => $buku)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $buku->judul }}</td>
                            <td><span class="badge bg-success">{{ $buku->tahun_terbit }}</span></td>
                            <td>{{ $buku->stok }}</td>
                            <td>{!! $buku->status_stok_badge !!}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =============================================
         SECTION 3: Scope Stok Menipis
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-warning text-dark py-3">
            <i class="bi bi-exclamation-triangle me-2"></i>3. Scope: stokMenipis() — Buku dengan stok < 5
            <span class="badge bg-dark ms-2">{{ $stokMenipis->count() }} buku</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Judul</th>
                            <th>Stok</th>
                            <th>Status Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stokMenipis as $i => $buku)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $buku->judul }}</td>
                            <td>{{ $buku->stok }}</td>
                            <td>{!! $buku->status_stok_badge !!}</td>
                            <td>Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-3">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =============================================
         SECTION 4: Scope Harga Range
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-info text-dark py-3">
            <i class="bi bi-currency-dollar me-2"></i>4. Scope: hargaRange(150.000, 200.000)
            <span class="badge bg-dark ms-2">{{ $hargaRange->count() }} buku</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Judul</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hargaRange as $i => $buku)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $buku->judul }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                            <td>{{ $buku->stok }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =============================================
         SECTION 5: Semua Anggota + Accessor
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-dark text-white py-3">
            <i class="bi bi-people me-2"></i>5. Semua Anggota — Accessor: status_badge & kategori_usia
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>JK</th>
                            <th>Umur</th>
                            <th>Kategori Usia</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semuaAnggota as $i => $anggota)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $anggota->nama }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td>
                                <span class="badge {{ $anggota->jenis_kelamin === 'L' ? 'bg-primary' : 'bg-pink' }}" style="{{ $anggota->jenis_kelamin === 'P' ? 'background:#e91e8c!important' : '' }}">
                                    {{ $anggota->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td>{{ $anggota->umur }} thn</td>
                            <td>
                                @php
                                    $usiaColor = match($anggota->kategori_usia) {
                                        'Remaja' => 'bg-info text-dark',
                                        'Dewasa' => 'bg-primary',
                                        'Senior' => 'bg-secondary',
                                        default  => 'bg-light text-dark',
                                    };
                                @endphp
                                <span class="badge {{ $usiaColor }}">{{ $anggota->kategori_usia }}</span>
                            </td>
                            <td>{!! $anggota->status_badge !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =============================================
         SECTION 6: Scope Terdaftar Bulan Ini
         ============================================= --}}
    <div class="card section-card">
        <div class="card-header bg-secondary text-white py-3">
            <i class="bi bi-calendar-check me-2"></i>6. Scope: terdaftarBulanIni() — Anggota daftar bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}
            <span class="badge bg-white text-secondary ms-2">{{ $terdaftarBulanIni->count() }} anggota</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Terdaftar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terdaftarBulanIni as $i => $anggota)
                        <tr>
                            <td class="ps-4">{{ $i + 1 }}</td>
                            <td class="fw-semibold">{{ $anggota->nama }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td>{{ $anggota->created_at->format('d M Y') }}</td>
                            <td>{!! $anggota->status_badge !!}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-3">Belum ada anggota terdaftar bulan ini</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 text-muted">
        <small>Tugas Pertemuan 10 — Inf-R &copy; {{ date('Y') }}</small>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
