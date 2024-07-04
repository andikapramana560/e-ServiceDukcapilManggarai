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
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h3 class="card-title">Selamat Datang</h3>
                                    <p>Sistem Informasi E-service Dinas Kependudukan dan Pencatatan Sipil Kabupaten
                                        Manggarai.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        </div>
                    </div>
                </div>
                
                {{-- Card Pengajuan KTP --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengajuan KTP</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Pengajuan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
      
                      <div class="card-body">
                        <h5 class="card-title">Pengajuan KTP</h5>
                        <a href="{{ route('admin-addPengajuanKtp') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
      
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pengajuan</th>
                                <th scope="col">User Pemohon</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                {{-- Card Pengajuan KTP --}}

                {{-- Card Pengajuan KK --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengajuan KK</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Pengajuan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
      
                      <div class="card-body">
                        <h5 class="card-title">Pengajuan KK</h5>
                        <a href="{{ route('admin-addPengajuanKtp') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
      
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pengajuan</th>
                                <th scope="col">User Pemohon</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                {{-- Card Pengajuan KK --}}
                
                {{-- Card Pengajuan Akta Kelahiran --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengajuan Akta Kelahiran</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Pengajuan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
      
                      <div class="card-body">
                        <h5 class="card-title">Pengajuan Akta Kelahiran</h5>
                        <a href="{{ route('admin-addPengajuanKtp') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
      
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pengajuan</th>
                                <th scope="col">User Pemohon</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                {{-- Card Pengajuan Akta Kelahiran --}}

                {{-- Card Pengajuan Akta Kematian --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengajuan Akta Kematian</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145 Pengajuan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
      
                      <div class="card-body">
                        <h5 class="card-title">Pengajuan Akta Kematian</h5>
                        <a href="{{ route('admin-addPengajuanKtp') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
      
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pengajuan</th>
                                <th scope="col">User Pemohon</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                {{-- Card Pengajuan Akta Kematian --}}
            </div>
        </section>

    </main><!-- End #main -->
@endsection
