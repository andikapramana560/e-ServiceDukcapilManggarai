@extends('layout.penduduk')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Pengajuan Akta Kelahiran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pend-pengajuanAkl') }}">Pengajuan</a></li>
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
                                                    <label for="yourPassword" class="form-label">Jenis Pengajuan</label>
                                                    <select class="form-select @error('jns_pengajuan') is-invalid @enderror"
                                                        id="validationCustom04" name="jns_pengajuan" disabled>
                                                        <option selected disabled value="">Pilih...</option>
                                                        <option value="Penerbitan Akta Kelahiran Baru"
                                                            @if ($akl[0]->jns_pengajuan === 'Penerbitan Akta Kelahiran Baru') selected @endif>Penerbitan
                                                            Akta Kelahiran Baru
                                                        </option>
                                                        <option value="Penerbitan Akta Kelahiran Hilang/Rusak"
                                                            @if ($akl[0]->jns_pengajuan === 'Penerbitan Akta Kelahiran Hilang/Rusak') selected @endif>Penerbitan
                                                            Akta Kelahiran
                                                            Hilang/Rusak</option>
                                                        <option value="Penerbitan Perubahan Data Akta Kelahiran"
                                                            @if ($akl[0]->jns_pengajuan === 'Penerbitan Perubahan Data Akta Kelahiran') selected @endif>Penerbitan
                                                            Akta Kelahiran
                                                            Hilang/Rusak</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Nama Anak</label>
                                                    <input type="text" name="nama_anak" class="form-control"
                                                        id="yourPassword" value="{{ old('nama_anak', $akl[0]->nama_anak) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Anak Ke-</label>
                                                    <input type="text" name="anak_ke" class="form-control"
                                                        id="yourPassword" value="{{ old('anak_ke', $akl[0]->anak_ke) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" name="jns_kel_anak" required>
                                                        <option selected disabled value="">Pilih...</option>
                                                        <option value="Laki-Laki"
                                                            @if ($akl[0]->jns_kel_anak === 'Laki-Laki') selected @endif>
                                                            Laki-Laki</option>
                                                        <option value="Perempuan"
                                                            @if ($akl[0]->jns_kel_anak === 'Perempuan') selected @endif>
                                                            Perempuan</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Gender/jenis Kelamin harus dipilih!
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Tempat Lahir Anak</label>
                                                    <input type="text" name="tmp_lahir_anak" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('tmp_lahir_anak', $akl[0]->tmp_lahir_anak) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Tanggal Lahir Anak</label>
                                                    <input type="date" name="tgl_lahir_anak" class="form-control"
                                                        id="yourPassword"
                                                        value="{{ old('tgl_lahir_anak', $akl[0]->tgl_lahir_anak) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" class="form-control"
                                                        id="yourPassword" value="{{ old('nama_ayah', $akl[0]->nama_ayah) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" class="form-control"
                                                        id="yourPassword" value="{{ old('nama_ibu', $akl[0]->nama_ibu) }}"
                                                        required>
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                @if ($akl[0]->jns_pengajuan === 'Penerbitan Akta Kelahiran Baru')
                                                    <b>Dokumen Pengajuan Penerbitan Akta Kelahiran Baru</b>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Lahir</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_lahir) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_lahir"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta
                                                            Pernikahan
                                                            Orang Tua</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_akta_nikah_ortu) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download
                                                            File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_akta_nikah_ortu"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu
                                                            Keluarga</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_kk) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_kk" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Suami/Istri</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_suami_istri) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download
                                                            File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_suami_istri"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Saksi</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_saksi) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_saksi"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen
                                                            Ijazah</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ijazah) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File
                                                            Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ijazah" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Sekolah</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_sekolah) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download
                                                            File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_sekolah"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta Anak
                                                            Sebelumnya</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_akta_anak_sblmnya) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download
                                                            File Sebelumnya</a>
                                                        <input type="file" name="dok_akta_anak_sblmnya"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Kematian</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_kematian) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download
                                                            File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_kematian"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                @elseif($akl[0]->jns_pengajuan === 'Penerbitan Akta Kelahiran Hilang/Rusak')
                                                    <b>Dokumen Penerbitan Akta Kelahiran Hilang/Rusak</b>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Surat
                                                            Keterangan
                                                            Kehilangan</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_surat_ket_hilang) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_surat_ket_hilang"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta Yang
                                                            Hilang</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_akta_hilang) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_akta_hilang"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu
                                                            Keluarga</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_kk_terbaru) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya
                                                        </a>
                                                        <input type="file" name="dok_fc_kk_terbaru"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Suami/Istri</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_suami_istri2) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_suami_istri2"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Saksi</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_saksi2) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_saksi2"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                @else
                                                    <b>Dokumen Perubahan Data Akta Kelahiran</b>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Akta
                                                            Kelahiran
                                                            Asli</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_akta_asli) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_akta_asli" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen KTP</label>
                                                        <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_ktp) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_ktp" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen KK</label>
                                                        <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_kk) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_kk" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen
                                                            Ijazah</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_ijazah) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File
                                                            Sebelumnya</a>
                                                        <input type="file" name="dok_ijazah" class="form-control"
                                                            id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                            Penduduk Saksi</label> <br>
                                                        <a href="{{ asset('storage/' . $akl[0]->dok_fc_ktp_saksi3) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn btn-secondary mb-3">Download File Sebelumnya</a>
                                                        <input type="file" name="dok_fc_ktp_saksi3"
                                                            class="form-control" id="yourPassword"
                                                            placeholder="Masukkan scan file surat keterangan lahir">
                                                        <div class="invalid-feedback">Please enter your password!</div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="yourPassword" class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" id="" cols="30" rows="4" class="form-control"
                                                            placeholder="Kosongkan jika tidak ada keterangan"></textarea>
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
