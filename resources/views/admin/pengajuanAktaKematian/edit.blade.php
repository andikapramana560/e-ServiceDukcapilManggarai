@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Pengajuan Akta Kematian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin-pengajuanAktaKematian') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Update Pengajuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <form class="needs-validation" method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label for="validationCustom04" class="form-label">Pilih Penduduk yang
                                                        Mengajukan</label>
                                                    <select class="form-select" name="id_penduduk" disabled>
                                                        <option selected disabled value="">Pilih...</option>
                                                        @foreach ($penduduk as $p)
                                                            <option value="{{ $p->id }}"
                                                                @if ($akm[0]->id_penduduk == $p->id) selected @endif>
                                                                {{ $p->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Jenis Pengajuan</label>
                                                    <select class="form-select @error('jns_pengajuan') is-invalid @enderror"
                                                        id="validationCustom04" name="jns_pengajuan" disabled>
                                                        <option selected disabled value="">Pilih...</option>
                                                        <option value="Penerbitan Akta Kematian Baru"
                                                            @if ($akm[0]->jns_pengajuan === 'Penerbitan Akta Kematian Baru') selected @endif>Penerbitan
                                                            Akta Kematian Baru
                                                        </option>
                                                        <option value="Penerbitan Akta Kematian Hilang/Rusak"
                                                            @if ($akm[0]->jns_pengajuan === 'Penerbitan Akta Kematian Hilang/Rusak') selected @endif>Penerbitan
                                                            Akta Kematian
                                                            Hilang/Rusak</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Nama Almarhum</label>
                                                    <input type="text" name="nama_alm_pend" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('nama_alm_pend', $akm[0]->nama_alm_pend) }}" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" name="jns_kel_alm" required>
                                                        <option selected disabled value="">Pilih...</option>
                                                        <option value="Laki-Laki"
                                                            @if ($akm[0]->jns_kel_alm === 'Laki-Laki') selected @endif>
                                                            Laki-Laki</option>
                                                        <option value="Perempuan"
                                                            @if ($akm[0]->jns_kel_alm === 'Perempuan') selected @endif>
                                                            Perempuan</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Gender/jenis Kelamin harus dipilih!
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Tempat Lahir</label>
                                                    <input type="text" name="tmp_lahir_alm" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('tmp_lahir_alm', $akm[0]->tmp_lahir_alm) }}" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" name="tgl_lahir_alm" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('tgl_lahir_alm', $akm[0]->tgl_lahir_alm) }}" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Tanggal Meninggal</label>
                                                    <input type="date" name="tgl_meninggal" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('tgl_meninggal', $akm[0]->tgl_meninggal) }}" required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                @if ($akm[0]->jns_pengajuan === 'Penerbitan Akta Kematian Baru')
                                                    <b>Dokumen Pengajuan Penerbitan Akta Kematian Baru</b>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Kematian</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_surat_ket_kematian) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_kematian"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat Akta
                                                            Kelahiran Suami/Istri</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_akta_kel_suami_istri) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_akta_kel_suami_istri"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Alm</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_alm) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_alm" class="form-control"
                                                            id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta
                                                            Kelahiran
                                                            Alm</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_akta_kel_alm) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_akta_kel_alm"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Ahli Waris</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_ahli_waris) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_ahli_waris"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu
                                                            Keluarga
                                                            Alm</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_kk) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_kk" class="form-control"
                                                            id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Saksi</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_saksi) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_saksi"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                @else
                                                    <b>Dokumen Penerbitan Akta Kematian Hilang/Rusak</b>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Kehilangan</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_surat_ket_hilang) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_hilang"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta yang
                                                            Hilang</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_akta_hilang) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_akta_hilang"
                                                            class="form-control" id="yourPassword">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen KTP
                                                            Alm</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_alm2) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_alm2" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Saksi</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_ktp_saksi2) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_saksi2"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu
                                                            Keluarga</label> <br>
                                                        <a href="{{ asset('storage/' . $akm[0]->dok_fc_kk2) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_kk2" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                @endif
                                                <div class="col-12">
                                                    <label for="yourPassword" class="form-label">Keterangan</label>
                                                    <textarea name="" id="" cols="30" rows="4" class="form-control"
                                                        placeholder="Kosongkan jika tidak ada keterangan"></textarea>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Bordered Tabs -->
                                    {{-- button submit here --}}
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                    {{-- form end here --}}
                                </form>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
