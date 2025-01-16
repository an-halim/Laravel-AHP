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
        Nilai Perbandingan Matriks
    </h5>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                @foreach($matrix as $row => $values)
                    <th>{{ $row }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($matrix as $row => $values)
                <tr>
                    <td>{{ $row }}</td>
                    @foreach($values as $col => $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<form action="{{ route('postmatriks2') }}" method="post">
    @csrf
    <div class="card my-4">
       <h5 class="card-header d-flex justify-content-between align-items-center">
          Nilai Perbandingan Matriks Normalisasi
       </h5>
       <table class="table">
          <thead>
             <tr>
                <th></th>
                @foreach($normalizedMatrix as $row => $values)
                <th>{{ $row }}</th>
                @endforeach
             </tr>
          </thead>
          <tbody>
             @foreach($normalizedMatrix as $row => $values)
             <tr>
                <td>{{ $row }}</td>
                @foreach($values as $col => $value)
                <td>
                   <input type="number" name="normalizedMatrix[{{ $row }}][{{ $col }}]" value="{{ number_format($value, 4) }}" readonly class="border-0 shadow-none" />
                </td>
                @endforeach
             </tr>
             @endforeach
          </tbody>
       </table>
    </div>
    <div class="card my-4">
       <h5 class="card-header d-flex justify-content-between align-items-center">
          Priority Vector
       </h5>
       <table class="table">
          <thead>
             <tr>
                <th>Criteria</th>
                <th>Priority</th>
             </tr>
          </thead>
          <tbody>
             @foreach($priorityVector as $row => $priority)
             <tr>
                <td>{{ $row }}</td>
                <td>
                   <input type="number" name="priorityVector[{{ $row }}]" value="{{ number_format($priority, 4) }}" readonly class="border-0 shadow-none" />
                </td>
             </tr>
             @endforeach
          </tbody>
       </table>
       <div class="row justify-content-between m-4">
          <div class="col-md-6 d-grid">
             <button type="submit" class="btn btn-primary">Hitung</button>
          </div>
          <div class="col-md-6 d-grid">
             <button type="button" class="btn btn-warning" onclick="kembalibobot();">Cancel</button>
          </div>
       </div>
    </div>
 </form>

<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection
