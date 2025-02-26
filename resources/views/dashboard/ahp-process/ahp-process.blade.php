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


<form action="{{ route('ahp.recommendation') }}" method="post">
   @csrf
   <input type="hidden" name="priorityVectorSubCriteria" value="{{ json_encode($priorityVectorSubCriteria) }}">
   <input type="hidden" name="priorityVectorCriteria" value="{{ json_encode($criteriaResult->priorityVector) }}">

   <div class="card my-4">
      <h5 class="card-header d-flex justify-content-between align-items-center">
         Hasil Kriteria
      </h5>
      <h6 class="card-header d-flex justify-content-between align-items-center">
         Matriks Awal
      </h6>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th></th>
               @foreach (array_keys($criteriaResult->matrix) as $col)
               <th>{{ $col }}</th>
               @endforeach
            </tr>
         </thead>
         <tbody>
            @foreach ($criteriaResult->matrix as $row => $values)
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
         Normalisasi Matriks & Bobot Prioritas
      </h6>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th></th>
               @foreach (array_keys($criteriaResult->normalizedMatrix) as $col)
               <th>{{ $col }}</th>
               @endforeach
               <th>Bobot Prioritas</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($criteriaResult->normalizedMatrix as $row => $values)
            <tr>
               <td>{{ $row}}</td>
               @foreach ($values as $value)
               <td>{{ number_format($value, 4) }}</td>
               @endforeach
                <td>{{ number_format($criteriaResult->priorityVector[$row], 4) }}</td>
            </tr>
            @endforeach
            {{-- sum on each column --}}
         </tbody>
      </table>

      <h6 class="card-header d-flex justify-content-between align-items-center">
        Mencari konsistensi Matrix
     </h6>
     <table class="table table-bordered">
        <thead>
           <tr>
              <th></th>
              @foreach (array_keys($criteriaResult->weightedSumMatrix) as $col)
              <th>{{ $col }}</th>
              @endforeach
              <th>CM</th>
           </tr>
        </thead>
        <tbody>
           @foreach ($criteriaResult->weightedSumMatrix as $row => $values)
           <tr>
              <td>{{ $row}}</td>
              @foreach ($values as $value)
              <td>{{ number_format($value, 4) }}</td>
              @endforeach
               <td>{{ number_format($criteriaResult->weightedSumVector[$row], 4) }}</td>
           </tr>
           @endforeach
           {{-- sum on each column --}}
        </tbody>
     </table>

      <h6 class="card-header d-flex justify-content-between align-items-center">
        Consistency Check
      </h6>
      <ul>
         <li>Lambda Max: {{ $criteriaResult->lambdaMax }}</li>
         <li>CI: {{ $criteriaResult->ci }}</li>
         <li>CR: {{ $criteriaResult->cr }}</li>
         {{-- status consitensi --}}
        @if ($criteriaResult->cr < 0.1)
        <li class="badge bg-success">Consistent</li>
        @else
        <li class="badge bg-danger">Inconsistent</li>
        @endif
      </ul>
   </div>
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
         Normalisasi Matriks & Bobot Prioritas
      </h6>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th></th>
               @foreach (array_keys($result['normalizedMatrix']) as $col)
               <th>{{ $col }}</th>
               @endforeach
               <th>Bobot Prioritas</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($result['normalizedMatrix'] as $row => $values)
            <tr>
               <td>{{ $row }}</td>
               @foreach ($values as $value)
               <td>{{ number_format($value, 4) }}</td>
               @endforeach
               <td>{{ number_format($result['priorityVector'][$row], 4) }}</td>
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
   <div class="card my-4">
      {{-- <h5 class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center">
         <span>Lambda Max: <strong>{{ number_format($criteriaResult->lambdaMax, 4) }}</strong></span>
         <span>Consistency Index (CI): <strong>{{ number_format($criteriaResult->ci, 4) }}</strong></span>
         <span>Consistency Ratio (CR): <strong>{{ number_format($criteriaResult->cr, 4) }}</strong></span>
      </h5> --}}
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
