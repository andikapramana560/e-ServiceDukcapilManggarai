@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h3 class="card-title">Selamat Datang</h3>
                                    <p>Sistem Informasi E-service Dinas Kependudukan dan Pencatatan Sipil Kabupaten
                                        Manggarai.</p>
                                    {{-- 
                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-cart"></i>
                                      </div>
                                      <div class="ps-3">
                                          <h6>145</h6>
                                          <span class="text-success small pt-1 fw-bold">12%</span> <span
                                              class="text-muted small pt-2 ps-1">increase</span>

                                      </div>
                                  </div> --}}
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                    </div>
                </div><!-- End Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Penduduk</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Orang</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengajuan</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Orang</h6>
                                            <span class="text-primary small pt-1 fw-bold">10</span> <span
                                                class="text-muted small pt-2 ps-1">Pengajuan KTP</span><br>
                                            <span class="text-secondary small pt-1 fw-bold">10</span> <span
                                                class="text-muted small pt-2 ps-1">Pengajuan KK</span><br>
                                            <span class="text-success small pt-1 fw-bold">10</span> <span
                                                class="text-muted small pt-2 ps-1">Pengajuan Akta Kelahiran</span><br>
                                            <span class="text-warning small pt-1 fw-bold">10</span> <span
                                                class="text-muted small pt-2 ps-1">Pengajuan Akta Kematian</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
