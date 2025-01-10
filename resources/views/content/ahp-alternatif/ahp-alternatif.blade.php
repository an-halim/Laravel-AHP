@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Alternatif')

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">AHP /</span> Alternatif
</h4>

<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header d-flex justify-content-between align-items-center">
    Data Alternatif
    <a class="btn btn-primary" href="/data-master/alternatif">+ Tambah Rice Cooker</a>
  </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Model</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Watt</th>
          <th>Kapasitas</th>
          <th>Daya Tahan</th>
          <th>Keterangan</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1; ?>
        @if($alternatifs->count() > 0)
        @foreach($alternatifs as $DR)
        <tr>
            <th scope="row">
                <?php
                echo $no++;
                ?></th>
            <td>{{ $DR->model }}</td>
            <td>{{ $DR->nama }}</td>
            <td>{{ $DR->harga }}</td>
            <td>{{ $DR->watt }}</td>
            <td>{{ $DR->kapasitas }}</td>
            <td>{{ $DR->dayatahan }}</td>
            <td>{{ Str::limit($DR->keterangan, 30, '') }}...</td>
            <td><img src="{{ url('/data_file/'.$DR->gambar) }}" alt="{{ $DR->gambar }}" width="200px" height="100px"></td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">Data tidak tersedia</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
