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
    {{-- <h5 class="card-header d-flex justify-content-between align-items-center">
        Nilai Perbandingan Matriks
    </h5>
    <div class="table-responsive text-nowrap">
        <form action="{{ route('postbobot') }}" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Kriteria 1</th>
                        <th>Nilai Banding</th>
                        <th>Nama Kriteria 2</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                        <tr>
                            <td>Harga</td>
                            <td>
                                <select class="form-control" name="cbhg">
                                    <option value="1">Harga Sama Penting dengan Garasi (Nilai = 1)</option>
                                    <option value="2">Harga Lebih Penting daripada Garasi (Nilai = 2)</option>
                                    <option value="3">Harga Sangat Penting daripada Garasi (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Garasi</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <select class="form-control" name="cbhs">
                                    <option value="1">Harga Sama Penting dengan Luas (Nilai = 1)</option>
                                    <option value="2">Harga Lebih Penting daripada Luas (Nilai = 2)</option>
                                    <option value="3">Harga Sangat Penting daripada Luas (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Luas</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <select class="form-control" name="cbhk">
                                    <option value="1">Harga Sama Penting dengan Kamar (Nilai = 1)</option>
                                    <option value="2">Harga Lebih Penting daripada Kamar (Nilai = 2)</option>
                                    <option value="3">Harga Sangat Penting daripada Kamar (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Kamar</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <select class="form-control" name="cbhl">
                                    <option value="1">Harga Sama Penting dengan Lantai (Nilai = 1)</option>
                                    <option value="2">Harga Lebih Penting daripada Lantai (Nilai = 2)</option>
                                    <option value="3">Harga Sangat Penting daripada Lantai (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Lantai</td>
                        </tr>
                        <tr>
                            <td>Garasi</td>
                            <td>
                                <select class="form-control" name="cbgh">
                                    <option value="1">Garasi Sama Penting dengan Harga (Nilai = 1)</option>
                                    <option value="2">Garasi Lebih Penting daripada Harga (Nilai = 2)</option>
                                    <option value="3">Garasi Sangat Penting daripada Harga (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Harga</td>
                        </tr>
                        <tr>
                            <td>Garasi</td>
                            <td>
                                <select class="form-control" name="cbgs">
                                    <option value="1">Garasi Sama Penting dengan Luas (Nilai = 1)</option>
                                    <option value="2">Garasi Lebih Penting daripada Luas (Nilai = 2)</option>
                                    <option value="3">Garasi Sangat Penting daripada Luas (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Luas</td>
                        </tr>
                        <tr>
                            <td>Garasi</td>
                            <td>
                                <select class="form-control" name="cbgk">
                                    <option value="1">Garasi Sama Penting dengan Kamar (Nilai = 1)</option>
                                    <option value="2">Garasi Lebih Penting daripada Kamar (Nilai = 2)</option>
                                    <option value="3">Garasi Sangat Penting daripada Kamar (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Kamar</td>
                        </tr>
                        <tr>
                            <td>Garasi</td>
                            <td>
                                <select class="form-control" name="cbgl">
                                    <option value="1">Garasi Sama Penting dengan Lantai (Nilai = 1)</option>
                                    <option value="2">Garasi Lebih Penting daripada Lantai (Nilai = 2)</option>
                                    <option value="3">Garasi Sangat Penting daripada Lantai (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Lantai</td>
                        </tr>
                        <tr>
                            <td>Luas</td>
                            <td>
                                <select class="form-control" name="cbsh">
                                    <option value="1">Luas Sama Penting dengan Harga (Nilai = 1)</option>
                                    <option value="2">Luas Lebih Penting daripada Harga (Nilai = 2)</option>
                                    <option value="3">Luas Sangat Penting daripada Harga (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Harga</td>
                        </tr>
                        <tr>
                            <td>Luas</td>
                            <td>
                                <select class="form-control" name="cbsg">
                                    <option value="1">Luas Sama Penting dengan Garasi (Nilai = 1)</option>
                                    <option value="2">Luas Lebih Penting daripada Garasi (Nilai = 2)</option>
                                    <option value="3">Luas Sangat Penting daripada Garasi (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Garasi</td>
                        </tr>
                        <tr>
                            <td>Luas</td>
                            <td>
                                <select class="form-control" name="cbsk">
                                    <option value="1">Luas Sama Penting dengan Kamar (Nilai = 1)</option>
                                    <option value="2">Luas Lebih Penting daripada Kamar (Nilai = 2)</option>
                                    <option value="3">Luas Sangat Penting daripada Kamar (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Kamar</td>
                        </tr>
                        <tr>
                            <td>Luas</td>
                            <td>
                                <select class="form-control" name="cbsl">
                                    <option value="1">Luas Sama Penting dengan Lantai (Nilai = 1)</option>
                                    <option value="2">Luas Lebih Penting daripada Lantai (Nilai = 2)</option>
                                    <option value="3">Luas Sangat Penting daripada Lantai (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Lantai</td>
                        </tr>
                        <tr>
                            <td>Kamar</td>
                            <td>
                                <select class="form-control" name="cbkh">
                                    <option value="1">Kamar Sama Penting dengan Harga (Nilai = 1)</option>
                                    <option value="2">Kamar Lebih Penting daripada Harga (Nilai = 2)</option>
                                    <option value="3">Kamar Sangat Penting daripada Harga (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Harga</td>
                        </tr>
                        <tr>
                            <td>Kamar</td>
                            <td>
                                <select class="form-control" name="cbkg">
                                    <option value="1">Kamar Sama Penting dengan Garasi (Nilai = 1)</option>
                                    <option value="2">Kamar Lebih Penting daripada Garasi (Nilai = 2)</option>
                                    <option value="3">Kamar Sangat Penting daripada Garasi (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Garasi</td>
                        </tr>
                        <tr>
                            <td>Kamar</td>
                            <td>
                                <select class="form-control" name="cbks">
                                    <option value="1">Kamar Sama Penting dengan Luas (Nilai = 1)</option>
                                    <option value="2">Kamar Lebih Penting daripada Luas (Nilai = 2)</option>
                                    <option value="3">Kamar Sangat Penting daripada Luas (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Luas</td>
                        </tr>
                        <tr>
                            <td>Kamar</td>
                            <td>
                                <select class="form-control" name="cbkl">
                                    <option value="1">Kamar Sama Penting dengan Lantai (Nilai = 1)</option>
                                    <option value="2">Kamar Lebih Penting daripada Lantai (Nilai = 2)</option>
                                    <option value="3">Kamar Sangat Penting daripada Lantai (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Lantai</td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>
                                <select class="form-control" name="cblh">
                                    <option value="1">Lantai Sama Penting dengan Harga (Nilai = 1)</option>
                                    <option value="2">Lantai Lebih Penting daripada Harga (Nilai = 2)</option>
                                    <option value="3">Lantai Sangat Penting daripada Harga (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Harga</td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>
                                <select class="form-control" name="cblg">
                                    <option value="1">Lantai Sama Penting dengan Garasi (Nilai = 1)</option>
                                    <option value="2">Lantai Lebih Penting daripada Garasi (Nilai = 2)</option>
                                    <option value="3">Lantai Sangat Penting daripada Garasi (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Garasi</td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>
                                <select class="form-control" name="cblk">
                                    <option value="1">Lantai Sama Penting dengan Kamar (Nilai = 1)</option>
                                    <option value="2">Lantai Lebih Penting daripada Kamar (Nilai = 2)</option>
                                    <option value="3">Lantai Sangat Penting daripada Kamar (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Kamar</td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>
                                <select class="form-control" name="cbls">
                                    <option value="1">Lantai Sama Penting dengan Luas (Nilai = 1)</option>
                                    <option value="2">Lantai Lebih Penting daripada Luas (Nilai = 2)</option>
                                    <option value="3">Lantai Sangat Penting daripada Luas (Nilai = 3)</option>
                                </select>
                            </td>
                            <td>Luas</td>
                        </tr>
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
        </form>
    </div> --}}

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Nilai Perbandingan Matriks
        </h5>
        <div class="table-responsive text-nowrap">
            <form action="{{ route('postbobot') }}" method="post">
                @csrf
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
                                        <td>{{ $crit1->name }}</td>
                                        <td>
                                            <select class="form-control" name="comparison[{{ $crit1->name }}][{{ $crit2->name }}]">
                                                <option value="1" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 1) ? 'selected' : '' }}>
                                                    {{ $crit1->name }} Sama Penting dengan {{ $crit2->name }} (Nilai = 1)
                                                </option>
                                                <option value="2" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 2) ? 'selected' : '' }}>
                                                    {{ $crit1->name }} Lebih Penting daripada {{ $crit2->name }} (Nilai = 2)
                                                </option>
                                                <option value="3" {{ (isset($comparison[$crit1->name][$crit2->name]) && $comparison[$crit1->name][$crit2->name] == 3) ? 'selected' : '' }}>
                                                    {{ $crit1->name }} Sangat Penting daripada {{ $crit2->name }} (Nilai = 3)
                                                </option>
                                            </select>
                                        </td>
                                        <td>{{ $crit2->name }}</td>
                                    </tr>
                                @endif
                            @endforeach
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
            </form>
        </div>
    </div>

</div>
<script>
    function kembalibobot() {
        window.location.href = "/admin/alternative";
    }
</script>

@endsection
