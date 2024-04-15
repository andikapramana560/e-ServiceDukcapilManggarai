@extends('layout.penduduk')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pengajuan Akta Kematian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
                    <li class="breadcrumb-item">Pengajuan</li>
                    <li class="breadcrumb-item active">Akta Kematian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Data Pengajuan</h5>
                            <a href="{{ route('pend-addPengajuanAkm') }}" class="btn btn-primary mb-4">Tambah Pengajuan</a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Pengajuan</th>
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
                                            <td>{{ Carbon\Carbon::parse($p->tgl_pengajuan)->format('d F Y') }}</td>
                                            <td>{{ $p->nama_alm_pend }}</td>
                                            <td>
                                                {{ Carbon\Carbon::parse($p->tgl_meninggal)->format('d F Y') }}</td>
                                            </td>
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
                                                <a href="{{ route('pend-showPengajuanAkm', $p->id) }}"
                                                    class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                                                @if ($p->status == 2)
                                                    <a href="{{ route('pend-editPengajuanAkm', $p->id) }}"
                                                        class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                                                @endif
                                                <form action="{{ route('pend-destroyPengajuanAkm', $p->id) }}"
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
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
