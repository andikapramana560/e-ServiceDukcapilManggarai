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

                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Surat Keterangan
                                                        Lahir</label>
                                                    <input type="file" name="dok_surat_ket_lahir" class="form-control"
                                                        id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Akta Pernikahan
                                                        Orang Tua</label>
                                                    <input type="file" name="dok_fc_akta_nikah_ortu"
                                                        class="form-control" id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu
                                                        Keluarga</label>
                                                    <input type="file" name="dok_fc_kk" class="form-control"
                                                        id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                        Penduduk Suami/Istri</label>
                                                    <input type="file" name="dok_fc_ktp_suami_istri"
                                                        class="form-control" id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                        Penduduk Saksi</label>
                                                    <input type="file" name="dok_fc_ktp_saksi" class="form-control"
                                                        id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Ijazah</label>
                                                    <input type="file" name="dok_fc_ijazah" class="form-control"
                                                        id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Surat Keterangan
                                                        Sekolah</label>
                                                    <input type="file" name="dok_surat_ket_sekolah"
                                                        class="form-control" id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Akta Anak
                                                        Sebelumnya</label>
                                                    <input type="file" name="dok_akta_anak_sblmnya"
                                                        class="form-control" id="yourPassword"
                                                        placeholder="Masukkan scan file surat keterangan lahir">
                                                    <div class="invalid-feedback">Please enter your password!</div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="yourPassword" class="form-label">Dokumen Surat Keterangan
                                                        Kematian</label>
                                                    <input type="file" name="dok_surat_ket_kematian"
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
