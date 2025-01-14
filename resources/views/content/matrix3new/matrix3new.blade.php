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
    <h5 class="card-header d-flex justify-content-between align-items-center">
        Hasil Perbandingan
    </h5>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                @foreach($weightedMatrix as $row => $values)
                    <th>{{ $row }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($weightedMatrix as $row => $values)
                <tr>
                    <td>{{ $row }}</td>
                    @foreach($values as $col => $value)
                        <td>{{ number_format($value, 4) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center">
        <span>Lambda Max: <strong>{{ number_format($lambdaMax, 4) }}</strong></span>
        <span>Consistency Index (CI): <strong>{{ number_format($ci, 4) }}</strong></span>
        <span>Consistency Ratio (CR): <strong>{{ number_format($cr, 4) }}</strong></span>
    </h5>


    <form action="{{ route('posthasilrekomendasi') }}" method="post">
        @csrf

        <!-- Pass the values of weightedMatrix, lambdaMax, ci, and cr to the next action -->
        <input type="hidden" name="weightedMatrix" value="{{ json_encode($weightedMatrix) }}">
        <input type="hidden" name="lambdaMax" value="{{ $lambdaMax }}">
        <input type="hidden" name="ci" value="{{ $ci }}">
        <input type="hidden" name="cr" value="{{ $cr }}">

        <div class="row justify-content-between m-4">
            <div class="col-md-6 d-grid">
                <button type="submit" class="btn btn-primary">Hitung</button>
            </div>
            <div class="col-md-6 d-grid">
                <button type="button" class="btn btn-warning" onclick="kembalibobot();">Cancel</button>
            </div>
        </div>
    </form>
  </div>
<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection
