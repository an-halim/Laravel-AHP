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
    <div class="card">
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
