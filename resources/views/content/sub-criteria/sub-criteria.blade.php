@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

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
  <span class="text-muted fw-light">Data Master /</span> Sub Criteria
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
            <h5 class="modal-title" id="modalCenterTitle">Tambah Sub Criteria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="cbname" class="form-label">Criteria Name</label>
                <select class="form-control" name="cbname">
                    @if($criterias->count() > 0)
                    @foreach($criterias as $criteria)
                    <option value="{{ $criteria->name }}">{{ $criteria->name }}</option>
                    @endforeach
                    @else
                    <option value="none" disabled>Data kriteria tidak tersedia</option>
                    @endif
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nilaik" class="form-label">Criteria Value</label>
                <input type="text" id="nilaik" name="nilaik" class="form-control" placeholder="Enter Value">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="role" class="form-label">Nilai Bobot Criteria</label>
                <select class="form-select" id="role" name="cbnilaib">
                    <option value="1">Rendah (Nilai = 1)</option>
                    <option value="2">Rata-Rata (Nilai = 2)</option>
                    <option value="3">Tinggi (Nilai = 3)</option>
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


<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
        Sub Criteria
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">+ Tambah Sub Criteria</button>
    </h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Sub Criteria</th>
                    <th>Nama Criteria</th>
                    <th>Nilai Criteria</th>
                    <th>Bobot Criteria</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $no = ($subCriterias->currentPage() - 1) * $subCriterias->perPage() + 1; ?>
                @if($subCriterias->count() > 0)
                    @foreach($subCriterias as $criteria)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $criteria->code }}</td>
                            <td>{{ $criteria->name }}</td>
                            <td>{{ $criteria->nilaik }}</td>
                            <td>{{ $criteria->nilaib }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editModal">
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
                        <td colspan="6" class="text-center">Data tidak tersedia</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $subCriterias->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>


<!--/ Basic Bootstrap Table -->
@endsection
