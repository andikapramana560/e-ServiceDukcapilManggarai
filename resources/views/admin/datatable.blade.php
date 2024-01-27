@extends('layout.admin')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pegawai</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Admin</a></li>
        <li class="breadcrumb-item">Tabel</li>
        <li class="breadcrumb-item active">Data Pegawai</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body table-responsive">
            <h5 class="card-title">Data Pegawai</h5>
            <a href="" class="btn btn-primary mb-4">Tambah Pegawai</a>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NPP</th>
                  <th scope="col">Jenis Pegawai</th>
                  <th scope="col">Unit Penempatan</th>
                  <th scope="col">Gol</th>
                  <th scope="col">Pendidikan</th>
                  <th scope="col">Usia</th>
                  <th scope="col">Lama Kerja</th>
                  <th scope="col">Pensiun</th>
                  <th scope="col">Status Aktivasi</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach ($pgw as $d)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $d->nama_pgw }}</td>
                  <td>{{ $d->npp }}</td>
                  <td>{{ $d->jns_pgw }}</td>
                  <td>{{ $d->unit_penempatan }}</td>
                  <td>{{ $d->golongan }}</td>
                  <td>{{ $d->pendidikan }}</td>
                  <td>{{ $d->usia }} Tahun</td>
                  <td>{{ $d->lama_kerja }} Tahun</td>
                  <td>Tahun {{ $d->prediksi_thn_pensiun }}</td>
                  <td>{{ $d->status_aktivasi }}</td>
                  <td>
                      <a href="{{ route('admin-showPegawai', ['id_pgw' => $d->id_pgw]) }}" class="btn btn-sm btn-info"> <i class="bx bxs-info-circle"></i></a>
                      <a href="{{ route('admin-editPegawai', ['id_pgw' => $d->id_pgw]) }}" class="btn btn-sm btn-warning"> <i class="bx bxs-edit"></i></a>
                      <form action="{{ route('admin-destroyPegawai', ['id_pgw' => $d->id_pgw]) }}" method="POST" class="d-inline">
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