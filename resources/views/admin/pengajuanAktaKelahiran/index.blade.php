@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pengajuan Akta Kelahiran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item">Pengajuan</li>
                    <li class="breadcrumb-item active">Akta Kelahiran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Data Pengajuan</h5>
                            {{-- <a href="{{ route('pend-addPengajuanKtp') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a> --}}
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">User Pemohon</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Nama Anak</th>
                                        <th scope="col">Anak Ke- </th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tempat, Tanggal Lahir</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($pengajuanktp as $p)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ Carbon\Carbon::parse($p->tgl_pengajuan)->format('d F Y') }}</td>
                                            <td>{{ $p->nama_pend }}</td>
                                            <td>{{ $p->jns_kel_pend }}</td>
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
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
