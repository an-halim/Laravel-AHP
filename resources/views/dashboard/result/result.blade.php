@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Alternatif')

@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script>
    function openEditModal(userId, userName, userEmail, userRole) {
        document.getElementById('userId').value = userId;
        document.getElementById('userName').value = userName;
        document.getElementById('userEmail').value = userEmail;
        document.getElementById('userRole').value = userRole;
    }
    function openDeleteModal(userId) {
        // Set the action URL for the form to delete the specific user
        const form = document.getElementById('deleteForm');
        form.action = '/data-master/user/' + userId;

        // Show the modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
@endsection

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">AHP / Report /</span> {{ request()->route('id') }}
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


<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
        <span>Hasil Rekomendasi</span>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>Rangking</th>
          <th>Nilai AHP</th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'model', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'model' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Model
                @if(request('sort_by') === 'model')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'nama', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'nama' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Nama
                @if(request('sort_by') === 'nama')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'watt', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'watt' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Watt
                @if(request('sort_by') === 'watt')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'dayatahan', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'dayatahan' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Daya Tahan
                @if(request('sort_by') === 'dayatahan')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'harga', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'harga' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Harga
                @if(request('sort_by') === 'harga')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>
            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'kapasitas', 'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'kapasitas' ? 'desc' : 'asc']) }}" class="d-flex align-items-center gap-1">
                Kapasitas
                @if(request('sort_by') === 'kapasitas')
                    @if(request('sort_direction') === 'asc')
                        <i class="bx bx-chevron-up"></i>
                    @else
                        <i class="bx bx-chevron-down"></i>
                    @endif
                @endif
            </a>
          </th>
          <th>Garansi</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1 ?>
        @if($results->count() > 0)
        @foreach($results as $DH)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $DH->ahp }}</td>
            <td>{{ $DH->model }}</td>
            <td>{{ $DH->nama }}</td>
            <td>{{ $DH->watt }}</td>
            <td>{{ $DH->dayatahan }}</td>
            <td>Rp. {{ $DH->harga }}</td>
            <td>{{ $DH->kapasitas }}</td>
            <td>{{ $DH->nama }}</td>
            <td><img src="{{ url('/data_file/'.$DH->gambar) }}" alt="{{ $DH->gambar }}" width="200px" height="100px" margin="auto"></td>
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
