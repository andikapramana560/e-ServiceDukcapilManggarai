@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Pengajuan Akta Kematian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin-pengajuanAkm') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Akta Kematian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-6">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Petunjuk Pengisian Form</h5>

                            <div class="activity">

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Pada form yang berisikan input file / dokumen, anda dapat meng-scan dahulu dokumen
                                        yang asli menjadi dokumen berformat pdf
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        File yang diupload maksimal berukuran 1 Mb
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Semua Dokumen pendukung <b>Wajib</b> diisi
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Form keterangan dapat diisi jika ada keterangan tambahan mengenai pengajuan
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika semua form telah terisi, silahkan klik tombol submit
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
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content pt-3">
                                    <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Nama Almarhum</label>
                                                <input type="text" name="nama_alm_pend" class="form-control"
                                                    id="yourPassword" value="{{ old('nama_alm_pend') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jns_kel_alm" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Gender/jenis Kelamin harus dipilih!
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tmp_lahir_alm" class="form-control"
                                                    id="yourPassword" value="{{ old('tmp_lahir_alm') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir_alm" class="form-control"
                                                    id="yourPassword" value="{{ old('tgl_lahir_alm') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tanggal Meninggal</label>
                                                <input type="date" name="tgl_meninggal" class="form-control"
                                                    id="yourPassword" value="{{ old('tgl_meninggal') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Surat Keterangan
                                                    Kematian</label>
                                                <input type="file" name="dok_surat_ket_kematian" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Surat Akta
                                                    Kelahiran Suami/Istri</label>
                                                <input type="file" name="dok_akta_kel_suami_istri"
                                                    class="form-control" id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                    Penduduk Alm</label>
                                                <input type="file" name="dok_fc_ktp_alm" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Akta Kelahiran
                                                    Alm</label>
                                                <input type="file" name="dok_fc_akta_kel_alm" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                    Penduduk Ahli Waris</label>
                                                <input type="file" name="dok_fc_ktp_ahli_waris" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu Keluarga
                                                    Alm</label>
                                                <input type="file" name="dok_fc_kk" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu Tanda
                                                    Penduduk Saksi</label>
                                                <input type="file" name="dok_fc_ktp_saksi" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

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
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                                {{-- form end here --}}
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
