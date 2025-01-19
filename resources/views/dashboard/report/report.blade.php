@extends('layouts/contentNavbarLayout')

@section('title', 'Data Master - report')

@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script>
    function openEditModal(id, name, code) {
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('code').value = code;
    }
    function openDeleteModal(id) {
        // Set the action URL for the form to delete the specific user
        const form = document.getElementById('deleteForm');
        form.action = '/data-master/report/' + id;

        // Show the modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">AHP /</span> Report
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
        Data Uji AHP
       <a type="button" class="btn btn-primary" href="{{ route('ahp.compare-criteria') }}" >+ Tambah report</a>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>ID report</th>
          @if (strtoupper(Auth::user()->role) == 'ADMIN')
            <th>Created By</th>
          @endif
          <th>Tanggal uji AHP</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1; ?>
        @if($reports->count() > 0)
        @foreach($reports as $report)
        <tr onclick="window.location='{{ route('ahp.report', ['id' => $report->id]) }}';" class="cursor-pointer">
            <th scope="row">
                <?php
                echo $no++;
                ?></th>
            <td>{{ $report->id }}</td>
            @if (strtoupper(Auth::user()->role) == 'ADMIN')
                <td>{{ $report->user->name }}</td>
            @endif
            <td>{{ $report->created_at }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('ahp.report', ['id' => $report->id]) }}">
                        <i class="bx bx-edit-alt me-1"></i> View
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="openDeleteModal({{ $report->id }})">
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
