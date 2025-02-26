@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Alternatif')

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">AHP /</span> Alternatif
</h4>

<div class="card">
  <h5 class="card-header d-flex justify-content-between align-items-center">
    <span><i class="bx bx-data"></i>Data Alternatif</span>
    <a class="btn btn-primary d-flex align-items-center" href="/data-master/alternatif">
        <i class="bx bx-plus me-1"></i> Tambah Data
    </a>
  </h5>

  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-primary">
        <tr class="text-nowrap">
          <th>#</th>
          <th>Model</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Watt</th>
          <th>Kapasitas</th>
          <th>garansi</th>
          <th>Keterangan</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @if($alternatives->count() > 0)
        @foreach($alternatives as $alternative)
        <tr>
            <th scope="row">
                <?php
                echo $no++;
                ?></th>
            <td>{{ $alternative->model }}</td>
            <td>{{ $alternative->nama }}</td>
            <td>{{ $alternative->harga }}</td>
            <td>{{ $alternative->watt }}</td>
            <td>{{ $alternative->kapasitas }}</td>
            <td>{{ $alternative->garansi }}</td>
            <td>{{ Str::limit($alternative->keterangan, 30, '') }}...</td>
            <td>
                <img
                src="{{ url('/data_file/'.$alternative->gambar) }}"
                alt="{{ $alternative->gambar }}"
                width="200px" height="100px"
                onerror="this.onerror=null; this.src='https://placehold.co/400x300?text=No+Image';"
                style="object-fit: cover;">
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">Data tidak tersedia</td>
        </tr>
        @endif
      </tbody>
    </table>

    @if($alternatives->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $alternatives->withQueryString()->links('pagination::bootstrap-4') }}
        </div>
    @endif
  </div>
</div>
<!--/ Responsive Table -->
@endsection
