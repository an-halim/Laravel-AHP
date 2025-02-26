@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
            <h5 class="card-title text-primary">Congratulations, {{ $auth->name ?? 'Guest' }} 🎉</h5>
            <p class="mb-4">You have achieved <span class="fw-medium">{{ $resultPercentage }}</span> improvement in your AHP test results today!</p>
            <a href="/ahp/report" class="btn btn-sm btn-outline-primary">View Results</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="https://static.vecteezy.com/system/resources/previews/048/918/207/non_2x/an-illustration-of-a-cooking-pot-vector.jpg" alt="chart success" class="rounded">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Data Rice Cooker</span>
            <h3 class="card-title mb-2">{{ $alternativeCount }}</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="https://cdn-icons-png.flaticon.com/512/8347/8347453.png" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span>Criteria</span>
            <h3 class="card-title text-nowrap mb-1">{{ $criteriaCount }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Revenue -->
  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-12">
          <h5 class="card-header m-0 me-2 pb-3">Top Rice Cooker</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr class="text-nowrap">
                  <th>#</th>
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
                  <th>Gambar</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php $no =1 ?>
                @if($topRiceCooker->count() > 0)
                @foreach($topRiceCooker as $DR)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $DR->nama }}</td>
                    <td>{{ $DR->model }}</td>
                    <td>{{ $DR->harga }}</td>
                    <td>
                        <div class="image-wrapper">
                            <img
                            src="{{ url('/data_file/'.$DR->gambar) }}"
                            alt="{{ $DR->gambar }}"
                            class="img-fluid rounded shadow-sm"
                            onerror="this.onerror=null; this.src='https://placehold.co/400x300?text=No+Image';"
                            style="width: 200px; height: 100px; object-fit: cover;">
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
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
    <div class="row">
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="https://cdn-icons-png.flaticon.com/512/8347/8347453.png" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span class="d-block mb-1">Sub Criteria</span>
            <h3 class="card-title text-nowrap mb-2">{{ $subCriteriaCount }}</h3>
          </div>
        </div>
      </div>
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRN3iENGwkXmgA8xjCVXjuCFSeo2ed9DYgiog&s" alt="Credit Card" class="rounded">
              </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="fw-semibold me-2">Users</span>
                <small class="text-success fw-semibold fs-12"><i class='bx bx-up-arrow-alt'></i> +28.14%</small>
            </div>
            <h3 class="card-title mb-2">{{ $userCount }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
