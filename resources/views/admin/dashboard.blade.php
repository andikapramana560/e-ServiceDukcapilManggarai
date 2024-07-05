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
                                            <h6>{{ $countPenduduk }} Orang</h6>
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
                                            <h6>{{ $countKTP }} Pengajuan</h6>
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
                            @foreach ($pengajuanKtp as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $p->jns_pengajuan }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ Carbon\Carbon::parse($p->tgl_pengajuan)->format('d F Y') }}</td>
                                    <td>{{ $p->nama_pend }}</td>
                                    <td>{{ $p->tempat_lahir }},
                                        {{ Carbon\Carbon::parse($p->tgl_lahir)->format('d F Y') }}</td>
                                    <td>
                                        @if ($p->status == 0)
                                            <span class="badge bg-secondary">Diproses</span>
                                        @elseif($p->status == 1)
                                            <span class="badge bg-success">Diterima</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-showPengajuanKtp', $p->id) }}"
                                            class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                                        <a href="{{ route('admin-editPengajuanKtp', $p->id) }}"
                                            class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                                        <form action="{{ route('admin-destroyPengajuanKtp', $p->id) }}"
                                            method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin?')"><i
                                                    class="bx bxs-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
                                            <h6>{{ $countKK }} Pengajuan</h6>
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
                                            <h6>{{ $countAKL }} Pengajuan</h6>
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
                        <a href="{{ route('admin-addPengajuanAktaKelahiran') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
      
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pengajuan</th>
                                <th scope="col">User Pemohon</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama Anak</th>
                                <th scope="col">Anak Ke- </th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($pengajuanAkl as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $p->jns_pengajuan }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ Carbon\Carbon::parse($p->tgl_pengajuan)->format('d F Y') }}</td>
                                    <td>{{ $p->nama_anak }}</td>
                                    <td>{{ $p->anak_ke }}</td>
                                    <td>
                                        @if ($p->status == 0)
                                            <span class="badge bg-secondary">Diproses</span>
                                        @elseif($p->status == 1)
                                            <span class="badge bg-success">Diterima</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-showPengajuanAktaKelahiran', $p->id) }}"
                                            class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                                        <a href="{{ route('admin-editPengajuanAktaKelahiran', $p->id) }}"
                                            class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                                        <form action="{{ route('admin-destroyPengajuanAktaKelahiran', $p->id) }}"
                                            method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin?')"><i
                                                    class="bx bxs-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
                                            <h6>{{ $countAKM }} Pengajuan</h6>
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
                                <th scope="col">Nama Alm</th>
                                <th scope="col">Tanggal Meninggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($pengajuanAkm as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $p->jns_pengajuan }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ Carbon\Carbon::parse($p->tgl_pengajuan)->format('d F Y') }}</td>
                                    <td>{{ $p->nama_alm_pend }}</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($p->tgl_meninggal)->format('d F Y') }}</td>
                                    <td>
                                        @if ($p->status == 0)
                                            <span class="badge bg-secondary">Diproses</span>
                                        @elseif($p->status == 1)
                                            <span class="badge bg-success">Diterima</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-showPengajuanAktaKematian', $p->id) }}"
                                            class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                                        <a href="{{ route('admin-editPengajuanAktaKematian', $p->id) }}"
                                            class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                                        <form action="{{ route('admin-destroyPengajuanAktaKematian', $p->id) }}"
                                            method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin?')"><i
                                                    class="bx bxs-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
