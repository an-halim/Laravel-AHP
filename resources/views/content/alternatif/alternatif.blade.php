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
    <span class="text-muted fw-light">Data Master /</span> Rice Cooker
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



<!-- Modal Create-->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('create-user') }}" method="post">
         @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="xxxx@xxx.xx">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="col mb-0">
                <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Customer">User</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/data-master/user" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="userId" name="id">

                        <div class="mb-3">
                            <label for="userName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="userName" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <input type="text" class="form-control" id="userRole" name="role" required>
                        </div>

                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password (Leave blank to keep current)</label>
                            <input type="password" class="form-control" id="userPassword" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form id="deleteForm" method="POST" action="" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
        <span>Data Rice Cooker</span>
        <div class="d-flex align-items-center gap-2">
            <!-- Search Form -->
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                       value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </form>

            <!-- Add Button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                + Tambah
            </button>
        </div>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
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
          <th>Garansi</th>
          <th>Keterangan</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = ($alternatifs->currentPage() - 1) * $alternatifs->perPage() + 1; ?>
        @if($alternatifs->count() > 0)
        @foreach($alternatifs as $DR)
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $DR->model }}</td>
            <td>{{ $DR->nama }}</td>
            <td>{{ $DR->harga }}</td>
            <td>{{ $DR->watt }}</td>
            <td>{{ $DR->kapasitas }}</td>
            <td>{{ $DR->dayatahan }}</td>
            <td>{{ $DR->garansi }}</td>
            <td>{{ Str::limit($DR->keterangan, 30, '') }}...</td>
            <td>
                <img src="{{ url('/data_file/'.$DR->gambar) }}" alt="{{ $DR->gambar }}" style="width: 200px; height: 100px; object-fit: cover;">
            </td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editModal" >
                        <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="bx bx-trash me-1"></i> Delete
                    </a>
                </div>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">Data tidak tersedia</td>
        </tr>
        @endif
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $alternatifs->appends(request()->input())->links('pagination::bootstrap-4') !!}
    </div>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
