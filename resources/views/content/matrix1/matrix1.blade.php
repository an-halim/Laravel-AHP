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
    <div class="table-responsive text-nowrap">
        <form action="{{ route('postmatriks') }}" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        @foreach(array_keys($matrix) as $criterion)
                            <th>{{ $criterion }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($matrix as $rowCriterion => $rowValues)
                        <tr>
                            <td>{{ $rowCriterion }}</td>
                            @foreach($rowValues as $columnCriterion => $value)
                                <td>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="comparison[{{ $rowCriterion }}][{{ $columnCriterion }}]"
                                        class="form-control"
                                        value="{{ $value }}"
                                        required
                                    >
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 class="card-footer d-flex justify-content-between align-items-center">
                Bobot Kriteria
            </h5>
            @if(!empty($weights))
                <ul>
                    @foreach($weights as $criterion => $weight)
                        <li>{{ $criterion }}: {{ number_format($weight, 4) }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Belum ada hasil. Silakan hitung untuk melihat bobot kriteria.</p>
            @endif

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
</div>

<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection


{{-- <tr>
                        <td>Lantai</td>
                        <td><input type="number" name="k1" value="{{ $k1 }}" readonly></td>
                        <td><input type="number" name="k2" value="{{ $k2 }}" readonly></td>
                        <td><input type="number" name="k3" value="{{ $k3 }}" readonly></td>
                        <td><input type="number" name="k4" value="{{ $k4 }}" readonly></td>
                        <td><input type="number" name="k5" value="{{ $k5 }}" readonly></td>
                        <!-- <td>{{ $k1 }}</td>
                    <td>{{ $k2 }}</td>
                    <td>{{ $k3 }}</td>
                    <td>{{ $k4 }}</td>
                    <td>{{ $k5 }}</td> -->
                    </tr>
                    <tr>
                        <td>Kamar</td>
                        <td><input type="number" name="k6" value="{{ $k6 }}" readonly></td>
                        <td><input type="number" name="k7" value="{{ $k7 }}" readonly></td>
                        <td><input type="number" name="k8" value="{{ $k8 }}" readonly></td>
                        <td><input type="number" name="k9" value="{{ $k9 }}" readonly></td>
                        <td><input type="number" name="k10" value="{{ $k10 }}" readonly></td>
                        <!-- <td>{{ $k6 }}</td>
                    <td>{{ $k7 }}</td>
                    <td>{{ $k8 }}</td>
                    <td>{{ $k9 }}</td>
                    <td>{{ $k10 }}</td> -->
                    </tr>
                    <tr>
                        <td>Luas</td>
                        <td><input type="number" name="k11" value="{{ $k11 }}" readonly></td>
                        <td><input type="number" name="k12" value="{{ $k12 }}" readonly></td>
                        <td><input type="number" name="k13" value="{{ $k13 }}" readonly></td>
                        <td><input type="number" name="k14" value="{{ $k14 }}" readonly></td>
                        <td><input type="number" name="k15" value="{{ $k15 }}" readonly></td>
                        <!-- <td>{{ $k11 }}</td>
                    <td>{{ $k12 }}</td>
                    <td>{{ $k13 }}</td>
                    <td>{{ $k14 }}</td>
                    <td>{{ $k15 }}</td> -->
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="k16" value="{{ $k16 }}" readonly></td>
                        <td><input type="number" name="k17" value="{{ $k17 }}" readonly></td>
                        <td><input type="number" name="k18" value="{{ $k18 }}" readonly></td>
                        <td><input type="number" name="k19" value="{{ $k19 }}" readonly></td>
                        <td><input type="number" name="k20" value="{{ $k20 }}" readonly></td>
                        <!-- <td>{{ $k16 }}</td>
                    <td>{{ $k17 }}</td>
                    <td>{{ $k18 }}</td>
                    <td>{{ $k19 }}</td>
                    <td>{{ $k20 }}</td> -->
                    </tr>
                    <tr>
                        <td>Garasi</td>
                        <td><input type="number" name="k21" value="{{ $k21 }}" readonly></td>
                        <td><input type="number" name="k22" value="{{ $k22 }}" readonly></td>
                        <td><input type="number" name="k23" value="{{ $k23 }}" readonly></td>
                        <td><input type="number" name="k24" value="{{ $k24 }}" readonly></td>
                        <td><input type="number" name="k25" value="{{ $k25 }}" readonly></td>
                        <!-- <td>{{ $k21 }}</td>
                    <td>{{ $k22 }}</td>
                    <td>{{ $k23 }}</td>
                    <td>{{ $k24 }}</td>
                    <td>{{ $k25 }}</td> -->
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><input type="number" name="k26" value="{{ $k26 }}" readonly></td>
                        <td><input type="number" name="k27" value="{{ $k27 }}" readonly></td>
                        <td><input type="number" name="k28" value="{{ $k28 }}" readonly></td>
                        <td><input type="number" name="k29" value="{{ $k29 }}" readonly></td>
                        <td><input type="number" name="k30" value="{{ $k30 }}" readonly></td>
                        <!-- <td>{{ $k26 }}</td>
                    <td>{{ $k27 }}</td>
                    <td>{{ $k28 }}</td>
                    <td>{{ $k29 }}</td>
                    <td>{{ $k30 }}</td> -->
                    </tr> --}}
