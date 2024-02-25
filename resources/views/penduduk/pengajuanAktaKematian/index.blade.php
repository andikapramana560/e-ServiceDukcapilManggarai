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
                    <th scope="col">NIK Pemohon</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach ($penduduk as $p)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->tmp_lahir }}, {{ $p->tgl_lahir }}</td>
                    <td>{{ $p->jns_kelamin }}</td>
                    <td>
                      @if($p->status_aktivasi == 1)
                        <span class="badge bg-success">Aktif</span>
                      @else
                        <span class="badge bg-secondary">Belum Aktif</span>
                      @endif
                    </td>
                    <td>
                        <a href="{{ route('admin-showPenduduk', $p->id) }}" class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                        <a href="{{ route('admin-editPenduduk', $p->id) }}" class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                        <form action="{{ route('admin-destroyPenduduk', $p->id) }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')"><i class="bx bxs-trash"></i></button>
                        </form>
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