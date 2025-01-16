@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - Rating')

@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script>
    function openEditModal(id, caption, value) {
        document.getElementById('id').value = id;
        document.getElementById('caption').value = caption;
        document.getElementById('value').value = value;
    }
    function openDeleteModal(id) {
        // Set the action URL for the form to delete the specific user
        const form = document.getElementById('deleteForm');
        form.action = '/data-master/rating/' + id;

        // Show the modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Data Master /</span> Rating
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
        <form action="{{ route('data-master-rating') }}" method="post">
         @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Tambah Rating</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="caption" class="form-label">caption</label>
                <input type="text" id="caption" caption="caption" class="form-control" placeholder="Enter caption">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="email" class="form-label">value</label>
                <input type="text" id="value" caption="value" class="form-control" placeholder="Enter Critaria value">
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
                    <h5 class="modal-title" id="editModalLabel">Edit Rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/data-master/rating" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="ratingId" caption="id">

                        <div class="row">
                            <div class="col mb-3">
                            <label for="caption" class="form-label">caption</label>
                            <input type="text" id="caption" caption="caption" class="form-control" placeholder="Enter caption">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="email" class="form-label">value</label>
                            <input type="text" id="value" caption="value" class="form-control" placeholder="Enter Critaria value">
                            </div>
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
        Rating Scale
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">+ Tambah rating</button>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Value</th>
          <th>Caption</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1; ?>
        @if($ratings->count() > 0)
        @foreach($ratings as $rating)
        <tr>
            <th scope="row">
                <?php
                echo $no++;
                ?></th>
            <td>{{ $rating->value }}</td>
            <td>{{ $rating->caption }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editModal" onclick="openEditModal({{ $rating->id }}, '{{ $rating->caption }}', '{{ $rating->value }}')">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="openDeleteModal({{ $rating->id }})">
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
  </div>
</div>
<!--/ Basic Bootstrap Table -->
@endsection
