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
<form method="POST" action="{{ route('ahp.calculate') }}">
    @csrf
    {{-- <input type="hidden" name="weightedMatrix" value="{{ json_encode($weightedMatrix) }}"> --}}
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kriteria 1</th>
                    <th>Nilai Banding</th>
                    <th>Nama Kriteria 2</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($criteria as $index1 => $crit1)
                    @foreach ($criteria as $index2 => $crit2)
                        @if ($index1 < $index2) {{-- Avoid duplicates and self-comparison --}}
                            <tr>
                                <td>{{ $crit1->name }}</td> <!-- Display the criteria name (key) -->
                                <td>
                                    {{-- <select class="form-control" name="comparison[{{ $crit1->name }}][{{ $crit2->name }}]">
                                        <option value="1" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 1) ? 'selected' : '' }}>
                                            {{ $crit1->name }} Sama Penting dengan {{ $crit2->name }} (Nilai = 1)
                                        </option>
                                        <option value="2" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 2) ? 'selected' : '' }}>
                                            {{ $crit1->name }} Lebih Penting daripada {{ $crit2->name }} (Nilai = 2)
                                        </option>
                                        <option value="3" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 3) ? 'selected' : '' }}>
                                            {{ $crit1->name }} Sangat Penting daripada {{ $crit2->name }} (Nilai = 3)
                                        </option>
                                    </select> --}}
                                    <select class="form-control" name="comparison[{{ $crit1->name }}][{{ $crit2->name }}]">
                                        <option value="1" selected>{{ $crit1->name }} Sama Penting dengan {{ $crit2->name }} (Nilai = 1)</option>
                                        <option value="2">{{ $crit1->name }} Lebih Penting daripada {{ $crit2->name }} (Nilai = 2)</option>
                                        <option value="3">{{ $crit1->name }} Sangat Penting daripada {{ $crit2->name }} (Nilai = 3)</option>
                                    </select>
                                </td>
                                <td>{{ $crit2->name }}</td> <!-- Display the comparison criteria (key) -->
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>


        </table>
        @foreach ($subCriteria as $criteriaName => $subCrits)
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Sub-Kriteria untuk {{ $criteriaName }}
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sub-Kriteria 1</th>
                        <th>Perbandingan</th>
                        <th>Sub-Kriteria 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subCrits as $index1 => $sub1)
                        @foreach ($subCrits as $index2 => $sub2)
                            @if ($index1 < $index2) {{-- Hindari duplikasi dan perbandingan diri sendiri --}}
                                <tr>
                                    <td>{{ $sub1 }}</td>
                                    <td>
                                        <select class="form-control" name="subComparison[{{ $criteriaName }}][{{ $sub1 }}][{{ $sub2 }}]">
                                            <option value="1" selected>{{ $sub1 }} Sama Penting dengan {{ $sub2 }} (Nilai = 1)</option>
                                            <option value="2">{{ $sub1 }} Lebih Penting daripada {{ $sub2 }} (Nilai = 2)</option>
                                            <option value="3">{{ $sub1 }} Sangat Penting daripada {{ $sub2 }} (Nilai = 3)</option>
                                        </select>
                                    </td>
                                    <td>{{ $sub2 }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
    <div class="card my-4">
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
