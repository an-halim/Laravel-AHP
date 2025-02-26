@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Alternatif')

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">AHP / Report /</span> Rekomendasi
</h4>


<div class="card mb-4">
    <h5 class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bx bx-data"></i>Daftar Rekomendasi</span>
        <a class="btn btn-primary d-flex align-items-center" href="/ahp/bobot">
            <i class="bx bx-refresh me-1"></i> Ulang Perhitungan
        </a>
    </h5>

    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover table-bordered">
                <thead class="table-primary">
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Score AHP</th>
                        <th>Model</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Watt</th>
                        <th>Kapasitas</th>
                        <th>Garansi</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @if($results->count() > 0)
                        @foreach($results as $alternative)
                            <tr class="table-row cursor-pointer"
                                data-model="{{ $alternative->model }}"
                                data-nama="{{ $alternative->nama }}"
                                data-harga="{{ number_format($alternative->harga, 0, ',', '.') }}"
                                data-watt="{{ $alternative->watt }}"
                                data-kapasitas="{{ $alternative->kapasitas }}"
                                data-garansi="{{ $alternative->garansi }}"
                                data-keterangan="{{ $alternative->keterangan }}"
                                data-gambar="{{ url('/data_file/'.$alternative->gambar) }}"
                                data-ahp="{{ number_format($alternative->ahp, 4) }}">
                                <th scope="row">
                                    @if ($loop->first)
                                        <span class="badge bg-success">⭐ Rekomendasi Utama</span>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </th>
                                <td><span class="badge bg-info">{{ number_format($alternative->ahp, 4) }}</span></td>
                                <td>{{ $alternative->model }}</td>
                                <td>{{ $alternative->nama }}</td>
                                <td>Rp. {{ number_format($alternative->harga, 0, ',', '.') }}</td>
                                <td>{{ $alternative->watt }} Watt</td>
                                <td>{{ $alternative->kapasitas }}</td>
                                <td>{{ $alternative->garansi }} Tahun</td>
                                <td>{{ Str::limit($alternative->keterangan, 30, '...') }}</td>
                                <td>
                                    <img src="{{ url('/data_file/'.$alternative->gambar) }}"
                                         alt="{{ $alternative->gambar }}"
                                         class="img-thumbnail"
                                         width="200px" height="100px"
                                         onerror="this.onerror=null; this.src='https://placehold.co/400x300?text=No+Image';"
                                         style="object-fit: cover;">
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center text-muted">🚫 Data tidak tersedia</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if($results->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $results->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</div>



<!-- Modal for Detail View -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="detailModalLabel">Detail Alternatif</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="modalImage" src="" alt="Gambar Alternatif" class="img-fluid rounded" onerror="this.onerror=null; this.src='https://placehold.co/400x300?text=No+Image';">
                    </div>
                    <div class="col-md-6">
                        <h4 id="modalNama"></h4>
                        <p><strong>Model:</strong> <span id="modalModel"></span></p>
                        <p><strong>Harga:</strong> Rp. <span id="modalHarga"></span></p>
                        <p><strong>Watt:</strong> <span id="modalWatt"></span> Watt</p>
                        <p><strong>Kapasitas:</strong> <span id="modalKapasitas"></span></p>
                        <p><strong>Garansi:</strong> <span id="modalGaransi"></span> Tahun</p>
                        <p><strong>Score AHP:</strong> <span class="badge bg-info" id="modalAhp"></span></p>
                        <p><strong>Keterangan:</strong> <span id="modalKeterangan"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Auto-scroll on pagination -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.hash === '#tableSection') {
            document.getElementById('tableSection').scrollIntoView({ behavior: 'smooth' });
        }
        document.querySelectorAll('.pagination a').forEach(function(link) {
            link.addEventListener('click', function() {
                const url = new URL(this.href);
                url.hash = 'tableSection';
                this.href = url.toString();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table-row');
        const modal = new bootstrap.Modal(document.getElementById('detailModal'));

        rows.forEach(row => {
            row.addEventListener('click', function() {
                document.getElementById('modalNama').innerText = this.dataset.nama;
                document.getElementById('modalModel').innerText = this.dataset.model;
                document.getElementById('modalHarga').innerText = this.dataset.harga;
                document.getElementById('modalWatt').innerText = this.dataset.watt;
                document.getElementById('modalKapasitas').innerText = this.dataset.kapasitas;
                document.getElementById('modalGaransi').innerText = this.dataset.garansi;
                document.getElementById('modalAhp').innerText = this.dataset.ahp;
                document.getElementById('modalKeterangan').innerText = this.dataset.keterangan;
                document.getElementById('modalImage').src = this.dataset.gambar || 'https://placehold.co/400x300?text=No+Image';
                modal.show();
            });
        });
    });
</script>


@endsection
