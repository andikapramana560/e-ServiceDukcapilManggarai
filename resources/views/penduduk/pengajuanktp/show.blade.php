@extends('layout.penduduk')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail Pengajuan KTP</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pend-pengajuanKtp') }}">Pengajuan</a></li>
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
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_pend', $ktp[0]->nama_pend) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="jns_kel_pend" disabled>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Laki-Laki" @if ($ktp[0]->jns_kel_pend === 'Laki-Laki') selected @endif>
                                            Laki-Laki</option>
                                        <option value="Perempuan" @if ($ktp[0]->jns_kel_pend === 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ $ktp[0]->tempat_lahir }}, {{ Carbon\Carbon::parse($ktp[0]->tgl_lahir)->format('d F Y') }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control" disabled>{{ $ktp[0]->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="validationCustom04" name="agama" disabled>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Hindu" @if ($ktp[0]->agama === 'Hindu') selected @endif>
                                            Hindu</option>
                                        <option value="Islam" @if ($ktp[0]->agama === 'Islam') selected @endif>
                                            Islam</option>
                                        <option value="Kristen Protestan" @if ($ktp[0]->agama === 'Kristen Protestan') selected @endif>
                                            Kristen Protestan
                                        </option>
                                        <option value="Kristen Katolik" @if ($ktp[0]->agama === 'Kristen Katolik') selected @endif>
                                            Kristen Katolik
                                        </option>
                                        <option value="Budha" @if ($ktp[0]->agama === 'Budha') selected @endif>
                                            Budha</option>
                                        <option value="Kong Hu Chu" @if ($ktp[0]->agama === 'Kong Hu Chu') selected @endif>Kong
                                            Hu Chu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Status Pernikahan</label>
                                <div class="col-sm-8">
                                    <select class="form-select @error('status_pernikahan') is-invalid @enderror"
                                        id="validationCustom04" name="status_pernikahan" disabled>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Sudah Menikah" @if ($ktp[0]->status_pernikahan === 'Sudah Menikah') selected @endif>
                                            Sudah Menikah
                                        </option>
                                        <option value="Belum Menikah" @if ($ktp[0]->status_pernikahan === 'Belum Menikah') selected @endif>
                                            Belum Menikah
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Pekerjaan</label>
                                <div class="col-sm-8">
                                    <select class="form-select @error('pekerjaan') is-invalid @enderror"
                                        id="validationCustom04" name="pekerjaan" required>
                                        <option selected disabled value="">Pilih...</option>
                                        <option value="Pelajar/Mahasiswa"
                                            @if ($ktp[0]->pekerjaan === 'Pelajar/Mahasiswa') selected @endif>Pelajar/Mahasiswa
                                        </option>
                                        <option value="PNS" @if ($ktp[0]->pekerjaan === 'PNS') selected @endif>
                                            PNS</option>
                                        <option value="Pegawai Swasta" @if ($ktp[0]->pekerjaan === 'Pegawai Swasta') selected @endif>
                                            Pegawai Swasta
                                        </option>
                                        <option value="Wiraswasta" @if ($ktp[0]->pekerjaan === 'Wiraswasta') selected @endif>
                                            Wiraswasta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputText"
                                        value="{{ old('nama_pend', $ktp[0]->kewarganegaraan) }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Dokumen Pendukung</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk) }}" target="_blank"
                                        rel="noopener noreferrer" class="btn btn-secondary">Download File KK</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control" disabled>{{ $ktp[0]->keterangan }}</textarea>
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
                                                <option value="0" @if ($ktp[0]->status == 0) selected @endif>
                                                    Diproses
                                                </option>
                                                <option value="1" @if ($ktp[0]->status == 1) selected @endif>
                                                    Diterima
                                                </option>
                                                <option value="2" @if ($ktp[0]->status == 2) selected @endif>
                                                    Ditolak</option>
                                            </select>
                                        </div>
                                        @if ($ktp[0]->status == 2)
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Catatan</label>
                                                <textarea name="catatan" id="" cols="30" rows="4" class="form-control" disabled>{{ $ktp[0]->catatan }}</textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <a href="{{ route('pend-editPengajuanKtp', $ktp[0]->id) }}"
                                                    class="btn btn-primary">Update Pengajuan</a>
                                            </div>
                                        @elseif($ktp[0]->status == 1)
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Catatan</label>
                                                <textarea name="catatan" id="" cols="30" rows="4" class="form-control" disabled>{{ $ktp[0]->catatan }}</textarea>
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
