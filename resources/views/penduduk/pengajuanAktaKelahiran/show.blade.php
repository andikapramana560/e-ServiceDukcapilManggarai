@extends('layout.penduduk')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Pengajuan Akta Kelahiran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pend-pengajuanAkl') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Detail Pengajuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pengajuan</h5>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_anak', $akl[0]->nama_anak) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Anak Ke-</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('anak_ke', $akl[0]->anak_ke) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="jns_kel_anak" disabled>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Laki-Laki" @if ($akl[0]->jns_kel_anak === 'Laki-Laki') selected @endif>
                                            Laki-Laki</option>
                                        <option value="Perempuan" @if ($akl[0]->jns_kel_anak === 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ $akl[0]->tmp_lahir_anak }}, {{ Carbon\Carbon::parse($akl[0]->tgl_lahir_anak)->format('d F Y') }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_ayah', $akl[0]->nama_ayah) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_ibu', $akl[0]->nama_ibu) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Surat Keterangan
                                    Lahir</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_lahir) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Akta Pernikahan
                                    Orang Tua</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_fc_akta_nikah_ortu) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu
                                    Keluarga</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_fc_kk) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Tanda
                                    Penduduk Suami/Istri</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_suami_istri) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Kartu Tanda
                                    Penduduk Saksi</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_saksi) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Ijazah</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_fc_ijazah) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Surat Keterangan
                                    Sekolah</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_sekolah) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Akta Anak
                                    Sebelumnya</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_akta_anak_sblmnya) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download
                                        File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Surat Keterangan
                                    Kematian</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_kematian) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download
                                        File</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control" disabled>{{ $akl[0]->keterangan }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Proses Pengajuan</h5>
                            <div class="tab-content">
                                <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Status Pengajuan</label>
                                            <select class="form-select" id="validationCustom04" name="status" disabled>
                                                <option selected disabled value="">Pilih...</option>
                                                <option value="0" @if ($akl[0]->status == 0) selected @endif>
                                                    Diproses
                                                </option>
                                                <option value="1" @if ($akl[0]->status == 1) selected @endif>
                                                    Diterima
                                                </option>
                                                <option value="2" @if ($akl[0]->status == 2) selected @endif>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                        @if ($akl[0]->status == 2)
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Catatan</label>
                                                <textarea name="catatan" id="" cols="30" rows="4" class="form-control" disabled>{{ $akl[0]->catatan }}</textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <a href="{{ route('pend-editPengajuanAkl', $akl[0]->id) }}"
                                                    class="btn btn-primary">Update Pengajuan</a>
                                            </div>
                                        @elseif($akl[0]->status == 1)
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Catatan</label>
                                                <textarea name="catatan" id="" cols="30" rows="4" class="form-control" disabled>{{ $akl[0]->catatan }}</textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
