@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Alternatif')


@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">AHP /</span> Perhitungan Matriks
</h4>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card">
    @foreach ($results as $criteriaName => $result)
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Hasil Sub-Kriteria untuk {{ $criteriaName }}
        </h5>
        <h6 class="card-header d-flex justify-content-between align-items-center">
            Matriks Awal
        </h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    @foreach (array_keys($result['matrix']) as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($result['matrix'] as $row => $values)
                    <tr>
                        <td>{{ $row }}</td>
                        @foreach ($values as $value)
                            <td>{{ number_format($value, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h6 class="card-header d-flex justify-content-between align-items-center">
            Normalisasi Matriks
        </h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    @foreach (array_keys($result['normalizedMatrix']) as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($result['normalizedMatrix'] as $row => $values)
                    <tr>
                        <td>{{ $row }}</td>
                        @foreach ($values as $value)
                            <td>{{ number_format($value, 4) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h6 class="card-header d-flex justify-content-between align-items-center">
            Priority Vector
        </h6>
        <ul>
            @foreach ($result['priorityVector'] as $key => $value)
                <li>{{ $key }}: {{ number_format($value, 4) }}</li>
            @endforeach
        </ul>
    @endforeach
</div>

<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection
