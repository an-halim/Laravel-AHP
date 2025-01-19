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
    <a class="btn btn-primary" href="/data-master/alternatif">Normalisasi Data Alternatif</a>
  </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Score AHP</th>
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
      <tbody class="table-border-bottom-0">
        <?php $no = 1; ?>
        @if($results->count() > 0)
        @foreach($results as $alternative)
        <tr>
            <th scope="row">
                @if ($no === 1)
                ⭐ Rekomendasi Utama
                @php
                    $no++;
                @endphp
                @else
                    {{ $no++ }}
                @endif
            </th>
            <td>{{ $alternative->ahp }}</td>
            <td>{{ $alternative->model }}</td>
            <td>{{ $alternative->nama }}</td>
            <td>{{ $alternative->harga }}</td>
            <td>{{ $alternative->watt }}</td>
            <td>{{ $alternative->kapasitas }}</td>
            <td>{{ $alternative->garansi }}</td>
            <td>{{ Str::limit($alternative->keterangan, 30, '') }}...</td>
            <td><img src="{{ url('/data_file/'.$alternative->gambar) }}" alt="{{ $alternative->gambar }}" width="200px" height="100px"></td>
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
