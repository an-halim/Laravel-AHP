@extends('layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">Welcome to <span>SPK AHP</span></h2>
        <p class="animate__animated fanimate__adeInUp">Sistem pendukung keputusan berbasis website yang menggunakan tampilan bootstrap dan framework laravel, siap membantu anda dalam melakukan pengambilan keputusan</p>
        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">SPK AHP</h2>
        <p class="animate__animated animate__fadeInUp">Sistem pendukung keputusan ini mendukung untuk membuat keputusan dalam pemilihan rice cooker sesuai dengan kriteria yang anda inginkan</p>
        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">SPK AHP</h2>
        <p class="animate__animated animate__fadeInUp">Metode yang digunakan sistem ini dalam menghitung hasil kalkulasi adalah metode AHP</p>
        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
      </div>
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title" >
        <h2>About</h2>
        <p>Apa saja yang bisa dilakukan ?</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Sistem Pendukung Keputusan dalam pemilihan rice cooker ini merupakan sistem informasi berbasis website yang dibangun menggunakan framework laravel.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Sistem ini bisa membantu anda dalam menentukan rice cooker yang anda inginkan </li>
            <li><i class="ri-check-double-line"></i> Sistem ini juga memiliki akurasi yang akurat dalam memberikan rekomendasi rice cooker yang anda inginkan </li>
            <li><i class="ri-check-double-line"></i> Sistem ini menyajikan ribuan data rice cooker terbaru yang diambil melalui database terpercaya</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Aplikasi ini dibuat untuk memudahkan pengguna dalam membuat keputusan atau sebagai alat referensi
            dalam pemilihan rice cooker yang diinginkan berdasarkan kriteria dan nilai yang bisa ditentukan sesuka hati
          </p>
          <a href="#" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container">

      <ul class="nav nav-tabs row d-flex">
        <li class="nav-item col-3">
          <a class="nav-link active show" data-toggle="tab" href="#tab-1">
            <i class="ri-gps-line"></i>
            <h4 class="d-none d-lg-block">Dapat diakses dimana saja kapan saja</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-toggle="tab" href="#tab-2">
            <i class="ri-body-scan-line"></i>
            <h4 class="d-none d-lg-block">Data rice cooker lebih dari 15 model</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-toggle="tab" href="#tab-3">
            <i class="ri-sun-line"></i>
            <h4 class="d-none d-lg-block">Lebih ringan dengan tampilan sederhana</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-toggle="tab" href="#tab-4">
            <i class="ri-store-line"></i>
            <h4 class="d-none d-lg-block">Mudah digunakan</h4>
          </a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active show" id="tab-1">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Dapat akses kapanpun dan dimanapun anda berada</h3>
              <p class="font-italic">
                Sistem informasi ini dibangun dalam bentuk website yang menggunakan framework laravel dan juga tampilan bootstrap.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i>Sistem ini memiliki antarmuka yang user-friendly dan responsif, memudahkan penggunanya dalam navigasi dan penggunaan berbagai fitur yang ada di dalamnya.</li>
                <li><i class="ri-check-double-line"></i>Menawarkan kemudahan dalam pengelolaan data dan penyajian informasi secara real-time, serta dilengkapi dengan fitur keamanan yang tinggi untuk melindungi data yang dikelola.</li>
                <li><i class="ri-check-double-line"></i>Dengan integrasi sistem berbasis web, pengguna dapat melakukan analisis dan perencanaan keputusan dengan lebih efisien, berbasis data yang akurat dan relevan.</li>
              </ul>
              <p>
                Sistem pendukung keputusan berbasis website yang menggunakan
                tampilan bootstrap dan framework laravel, siap membantu anda dalam melakukan pengambilan keputusan
              </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/features-1.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab-2">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Memiliki berbagai pilihan rice cooker lebih dari 15 model</h3>
              <p>
                sehingga Anda bisa menentukan pilihan sesuai dengan kebutuhan dan preferensi Anda.
              </p>
              <p class="font-italic">
                Dilengkapi dengan gambar yang menarik, membuat tampilan rice cooker terlihat lebih jelas dan nyata.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i>Terdapat berbagai pilihan model rice cooker</li>
                <li><i class="ri-check-double-line"></i>Setiap model dilengkapi dengan fitur-fitur canggih yang memudahkan memasak nasi dengan kualitas terbaik.</li>
                <li><i class="ri-check-double-line"></i>Setiap rice cooker memiliki gambar dan informasi spesifikasi yang sesuai dengan kenyataan.</li>
              </ul>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/features-2.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab-3">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Menggunakan tampilan sederhana</h3>
              <p>
                Dengan menggunakan tampilan sederhana membuat proses
                untuk membuka laman website semakin lebih cepat dan ringan
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Menggunakan tampilan sederhana</li>
                <li><i class="ri-check-double-line"></i> Tidak menggunakan banyak tampilan gambar</li>
                <li><i class="ri-check-double-line"></i> Tidak terdapat iklan</li>
              </ul>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/features-3.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab-4">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Mudah dalam proses penggunanaannya</h3>
              <p>
                Kami membuat tampilan dan struktur proses yang mudah dan berurutan sehingga
                dapat memudahkan pengguna dalam menggunakan sistem yang kami buat.
              </p>
              <p class="font-italic">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos, ad?
                Quae officiis quod asperiores. At omnis tempora error totam nulla.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Urutan alur proses sistem yang sederhana</li>
                <li><i class="ri-check-double-line"></i> </li>
                <li><i class="ri-check-double-line"></i> </li>
              </ul>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/features-4.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3>Coba Sekarang ?</h3>
          <p>Lakukan uji coba sistem pendukung keputusan dalam pemilihan rice cooker hasil kalkulasi menggunakan metode ahp</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="/login">Try It Now !</a>
        </div>
      </div>
    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Alternative</h2>
        <p>What we've recommend for you</p>
      </div>

      <div class="row portfolio-container">
        @if($alternatives->count() > 0)
        @foreach($alternatives as $alternative)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="{{ url('/data_file/'.$alternative->gambar) }}" class="img-fluid" alt="{{ $alternative->gambar }}"></div>
          <div class="portfolio-info">
            <h4>{{ $alternative->nama }} <span>({{ $alternative->model }})</span></h4>
            <p>Rp. {{ $alternative->harga }}</p>
            <a href="{{ url('/data_file/'.$alternative->gambar) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            <!-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
          </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <h5>Data tidak ada</h5>
        </div>
        @endif
      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">
    <div class="container">

      <div class="section-title">
        <h2>Batasan Aplikasi</h2>
        <p>Ruang Lingkup Aplikasi</p>
      </div>

      <ul class="faq-list">

        <li>
          <a data-toggle="collapse" class="" href="#faq1">Data rice cooker tidak terintegrasi<i class="icofont-simple-up"></i></a>
          <div id="faq1" class="collapse show" data-parent=".faq-list">
            <p>
              Data yang digunakan adalah data rice cooker yang dijual pada wilayah kota Yogyakarta.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq2" class="collapsed">Data Kriteria yang tidak dinamis<i class="icofont-simple-up"></i></a>
          <div id="faq2" class="collapse" data-parent=".faq-list">
            <p>
              Data kriteria yang tersedia telah ditetapkan oleh pengembang aplikasi.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq3" class="collapsed">Daftar Alternatif yang tidak dinamis <i class="icofont-simple-up"></i></a>
          <div id="faq3" class="collapse" data-parent=".faq-list">
            <p>
              Alternatif yang tersedia untuk Sistem Pendukung Keputusan ini adalah beberapa daftar rice cooker yang direkomendasikan.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq4" class="collapsed">Metode Pendukung Keputusan <i class="icofont-simple-up"></i></a>
          <div id="faq4" class="collapse" data-parent=".faq-list">
            <p>
              Sistem ini dirancang menggunakan metode Analytical Hierarchy Process.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq5" class="collapsed"> Sistem terintegrasi dengan database<i class="icofont-simple-up"></i></a>
          <div id="faq5" class="collapse" data-parent=".faq-list">
            <p>
              Sistem berbasis website sehingga proses pengolahan data akan selalu real time, cepat, dan akurat.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section><!-- End F.A.Q Section -->

</main><!-- End #main -->
@endsection
