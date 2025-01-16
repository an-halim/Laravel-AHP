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

<form method="POST" action="{{ route('postSubCriterias') }}">
    @csrf
    <input type="hidden" name="weightedMatrix" value="{{ json_encode($weightedMatrix) }}">
    <input type="hidden" name="weightedMatrix" value="{{ json_encode($weightedMatrix) }}">
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
            <li>Lambda Max: {{ $result['lambdaMax'] }}</li>
            <li>CI: {{ $result['ci'] }}</li>
            <li>CR: {{ $result['cr'] }}</li>
        </ul>
    @endforeach
</div>
<div class="mt-3">
    <button type="submit" class="btn btn-primary">Kirim</button>
</div>
</form>

<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection
