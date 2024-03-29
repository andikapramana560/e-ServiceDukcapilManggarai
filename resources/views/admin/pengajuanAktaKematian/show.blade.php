@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Pengajuan Akta Kematian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin-pengajuanAktaKematian') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Detail Pengajuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-6">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Petunjuk Pemrosesan Pengajuan</h5>

                            <div class="activity">

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Periksa terlebih dahulu data yang sudah diajukan oleh penduduk
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika ingin melihat dokumen pendukung, klik tombol <b>Download File</b> pada form
                                        dokumen
                                        pendukung
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Anda dapat memproses pengajuan pada card bagian kanan, yang berjudul <b>Proses
                                            Pengajuan</b>
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Anda dapat <b>menerima</b> atau <b>menolak</b> pengajuan pada form status pengajuan,
                                        kemudian
                                        berikan catatan jika ada
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Klik tombol <b>submit</b> jika sudah selesai memproses
                                    </div>
                                </div><!-- End activity item-->

                            </div>

                        </div>
                    </div><!-- End Recent Activity -->
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pengajuan</h5>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Almarhum</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_alm_pend', $akm[0]->nama_alm_pend) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="jns_kel_alm" disabled>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Laki-Laki" @if ($akm[0]->jns_kel_alm === 'Laki-Laki') selected @endif>
                                            Laki-Laki</option>
                                        <option value="Perempuan" @if ($akm[0]->jns_kel_alm === 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ $akm[0]->tmp_lahir_alm }}, {{ Carbon\Carbon::parse($akm[0]->tgl_lahir_alm)->format('d F Y') }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Meninggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ Carbon\Carbon::parse($akm[0]->tgl_meninggal)->format('d F Y') }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Surat Keterangan
                                    Kematian</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_surat_ket_kematian) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Surat Akta
                                    Kelahiran Suami/Istri</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_akta_kel_suami_istri) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Tanda
                                    Penduduk Alm</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_alm) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Akta Kelahiran
                                    Alm</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_fc_akta_kel_alm) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Tanda
                                    Penduduk Ahli Waris</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_ahli_waris) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Keluarga
                                    Alm</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_fc_kk) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Tanda
                                    Penduduk Saksi</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_saksi) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control" disabled>{{ $akm[0]->keterangan }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        @if ($akm[0]->status != 1)
                            <div class="card-body">
                                <h5 class="card-title">Proses Pengajuan</h5>
                                <form class="needs-validation" method="POST" action="">
                                    @csrf
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Status Pengajuan</label>
                                                    <select class="form-select" id="validationCustom04" name="status"
                                                        required>
                                                        <option selected disabled value="">Pilih...</option>
                                                        <option value="1">Diterima</option>
                                                        <option value="2">Ditolak</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Catatan</label>
                                                    <textarea name="catatan" id="" cols="30" rows="4" class="form-control"
                                                        placeholder="Kosongkan jika tidak ada catatan"></textarea>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Bordered Tabs -->
                                    {{-- button submit here --}}
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                    {{-- form end here --}}
                                </form>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
        </section>
    </main>
@endsection
