@extends('layout.penduduk')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Pengajuan KTP</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pend-pengajuanKtp') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Update Pengajuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content pt-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Nama</label>
                                                <input type="text" name="nama_pend" class="form-control"
                                                    id="yourPassword" value="{{ old('nama_pend', $ktp[0]->nama_pend) }}"
                                                    required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jns_kel_pend" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Laki-Laki"
                                                        @if ($ktp[0]->jns_kel_pend === 'Laki-Laki') selected @endif>
                                                        Laki-Laki</option>
                                                    <option value="Perempuan"
                                                        @if ($ktp[0]->jns_kel_pend === 'Perempuan') selected @endif>
                                                        Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Gender/jenis Kelamin harus dipilih!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    id="yourPassword"
                                                    value="{{ old('tempat_lahir', $ktp[0]->tempat_lahir) }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control"
                                                    id="yourPassword" value="{{ old('tgl_lahir', $ktp[0]->tgl_lahir) }}"
                                                    required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="" cols="30" rows="4" class="form-control">{{ $ktp[0]->alamat }}</textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Agama</label>
                                                <select class="form-select" id="validationCustom04" name="agama" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Hindu"
                                                        @if ($ktp[0]->agama === 'Hindu') selected @endif>
                                                        Hindu</option>
                                                    <option value="Islam"
                                                        @if ($ktp[0]->agama === 'Islam') selected @endif>
                                                        Islam</option>
                                                    <option value="Kristen Protestan"
                                                        @if ($ktp[0]->agama === 'Kristen Protestan') selected @endif>Kristen Protestan
                                                    </option>
                                                    <option value="Kristen Katolik"
                                                        @if ($ktp[0]->agama === 'Kristen Katolik') selected @endif>Kristen Katolik
                                                    </option>
                                                    <option value="Budha"
                                                        @if ($ktp[0]->agama === 'Budha') selected @endif>
                                                        Budha</option>
                                                    <option value="Kong Hu Chu"
                                                        @if ($ktp[0]->agama === 'Kong Hu Chu') selected @endif>Kong Hu Chu
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Pilih Agama anda!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Status
                                                    Pernikahan</label>
                                                <select class="form-select @error('status_pernikahan') is-invalid @enderror"
                                                    id="validationCustom04" name="status_pernikahan" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Sudah Menikah"
                                                        @if ($ktp[0]->status_pernikahan === 'Sudah Menikah') selected @endif>Sudah Menikah
                                                    </option>
                                                    <option value="Belum Menikah"
                                                        @if ($ktp[0]->status_pernikahan === 'Belum Menikah') selected @endif>Belum Menikah
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Status pernikahan harus dipilih!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Pekerjaan</label>
                                                <select class="form-select @error('pekerjaan') is-invalid @enderror"
                                                    id="validationCustom04" name="pekerjaan" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Pelajar/Mahasiswa"
                                                        @if ($ktp[0]->pekerjaan === 'Pelajar/Mahasiswa') selected @endif>
                                                        Pelajar/Mahasiswa
                                                    </option>
                                                    <option value="PNS"
                                                        @if ($ktp[0]->pekerjaan === 'PNS') selected @endif>
                                                        PNS</option>
                                                    <option value="Pegawai Swasta"
                                                        @if ($ktp[0]->pekerjaan === 'Pegawai Swasta') selected @endif>Pegawai Swasta
                                                    </option>
                                                    <option value="Wiraswasta"
                                                        @if ($ktp[0]->pekerjaan === 'Wiraswasta') selected @endif>Wiraswasta
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Kewarganegaraan</label>
                                                <input type="text" name="kewarganegaraan" class="form-control"
                                                    id="yourPassword"
                                                    value="{{ old('kewarganegaraan', $ktp[0]->kewarganegaraan) }}"
                                                    required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk) }}" target="_blank"
                                                    rel="noopener noreferrer" class="btn btn-secondary">File Dokumen
                                                    KK</a>
                                            </div>
                                            @if ($ktp[0]->jns_pengajuan === 'Penerbitan KTP Baru')
                                                <b>Dokumen Pengajuan Penerbitan KTP Baru</b>
                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu
                                                        Keluarga</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk) }}" target="_blank"
                                                        rel="noopener noreferrer" class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_fc_kk" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            @elseif ($ktp[0]->jns_pengajuan === 'Penerbitan KTP Hilang/Rusak')
                                                <b>Dokumen Pengajuan Penerbitan KTP Hilang/Rusak</b>
                                                <div class="col-4">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu
                                                        Keluarga</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk2) }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_fc_kk2" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="yourPassword" class="form-label">Surat Keterangan
                                                        Hilang</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_srt_ket_hilang) }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_srt_ket_hilang" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="yourPassword" class="form-label">Dokumen KTP
                                                        Rusak</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_ktp_rusak) }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_ktp_rusak" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            @elseif ($ktp[0]->jns_pengajuan === 'Penerbitan Perubahan Data KTP')
                                                <b>Dokumen Pengajuan Perubahan Data KTP</b>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu
                                                        Keluarga</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk3) }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_fc_kk3" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen KTP</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_ktp) }}" target="_blank"
                                                        rel="noopener noreferrer" class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_ktp" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            @else
                                                <b>Dokumen KTP Penduduk Pindahan</b>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu
                                                        Keluarga</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_fc_kk4) }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_fc_kk4" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen KTP</label> <br>
                                                    <a href="{{ asset('storage/' . $ktp[0]->dok_ktp2) }}" target="_blank"
                                                        rel="noopener noreferrer" class="btn btn-secondary mb-3">Dokumen
                                                        Sebelumnya</a>
                                                    <input type="file" name="dok_ktp2" class="form-control"
                                                        id="yourPassword">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            @endif
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"
                                                    placeholder="Kosongkan jika tidak ada keterangan"></textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
