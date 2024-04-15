@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Pengajuan KTP</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin-pengajuanKtp') }}">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Tambah Pengajuan</li>
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
                                        Untuk form dokumen, anda hanya perlu mengisi sesuai dengan <b>Jenis Pengajuan</b>
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
                                        Jika semua form telah terisi sesuai dengan <b>Jenis Pengajuan</b>, silahkan klik
                                        tombol submit
                                    </div>
                                </div><!-- End activity item-->

                            </div>

                        </div>
                    </div><!-- End Recent Activity -->
                </div>
                <div class="col-6">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Catatan Untuk Masing - Masing Jenis Pengajuan</h5>

                            <div class="activity">

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika anda memilih pengajuan <b>Penerbitan KTP Baru</b>, anda hanya perlu melengkapi
                                        data
                                        pada
                                        Dokumen Pengajuan <b>Penerbitan KTP Baru</b>, yaitu <b>dokumen kartu keluarga</b>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika anda memilih pengajuan Penerbitan KTP Hilang/Rusak, anda hanya perlu melengkapi
                                        data pada
                                        Dokumen Pengajuan Penerbitan KTP Hilang/Rusak, yaitu <b>Dokumen Kartu
                                            Keluarga</b>, <b>Surat Penyataan Penyebab Hilang/Rusak dari Kepolisian</b>, dan
                                        <b>Dokumen KTP-el yang Rusak</b>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika anda memilih pengajuan Perubahan Data KTP, anda hanya perlu melengkapi data
                                        pada
                                        Dokumen Pengajuan Perubahan Data KTP, yaitu <b>Dokumen Kartu Keluarga yang
                                            Baru</b> dan <b>Dokumen KTP asli</b>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Jika anda memilih pengajuan KTP Penduduk Pindahan, anda hanya perlu melengkapi data
                                        pada
                                        Dokumen Pengajuan KTP Penduduk Pindahan, yaitu <b>Dokumen Kartu Keluarga</b> dan
                                        <b>KTP-el dari daerah asal</b>
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
                                                <label for="validationCustom04" class="form-label">Pilih Penduduk yang
                                                    Mengajukan</label>
                                                <select class="form-select" name="id_penduduk" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    @foreach ($penduduk as $p)
                                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Jenis Pengajuan</label>
                                                <select class="form-select @error('jns_pengajuan') is-invalid @enderror"
                                                    id="validationCustom04" name="jns_pengajuan" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Penerbitan KTP Baru">Penerbitan KTP Baru</option>
                                                    <option value="Penerbitan KTP Hilang/Rusak">Penerbitan KTP Hilang/Rusak
                                                    </option>
                                                    <option value="Penerbitan Perubahan Data KTP">Penerbitan Perubahan Data
                                                        KTP</option>
                                                    <option value="Penerbitan KTP Penduduk Pindah">Penerbitan KTP Penduduk
                                                        Pindah</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Nama</label>
                                                <input type="text" name="nama_pend" class="form-control"
                                                    id="yourPassword" value="{{ old('nama_pend') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jns_kel_pend" required>
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
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    id="yourPassword" value="{{ old('tempat_lahir') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control"
                                                    id="yourPassword" value="{{ old('tgl_lahir') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="" cols="30" rows="4" class="form-control"></textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Agama</label>
                                                <select class="form-select" id="validationCustom04" name="agama"
                                                    required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Pilih Agama anda!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Status
                                                    Pernikahan</label>
                                                <select
                                                    class="form-select @error('status_pernikahan') is-invalid @enderror"
                                                    id="validationCustom04" name="status_pernikahan" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
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
                                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Kewarganegaraan</label>
                                                <input type="text" name="kewarganegaraan" class="form-control"
                                                    id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <b>Dokumen Pengajuan Penerbitan KTP Baru</b>
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu
                                                    Keluarga</label>
                                                <input type="file" name="dok_fc_kk" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <b>Dokumen Pengajuan Penerbitan KTP Hilang/Rusak</b>
                                            <div class="col-4">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu
                                                    Keluarga</label>
                                                <input type="file" name="dok_fc_kk2" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-4">
                                                <label for="yourPassword" class="form-label">Surat Keterangan
                                                    Hilang</label>
                                                <input type="file" name="dok_srt_ket_hilang" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-4">
                                                <label for="yourPassword" class="form-label">Dokumen KTP Rusak</label>
                                                <input type="file" name="dok_ktp_rusak" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <b>Dokumen Pengajuan Perubahan Data KTP</b>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu
                                                    Keluarga</label>
                                                <input type="file" name="dok_fc_kk3" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen KTP</label>
                                                <input type="file" name="dok_ktp" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <b>Dokumen KTP Penduduk Pindahan</b>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu
                                                    Keluarga</label>
                                                <input type="file" name="dok_fc_kk4" class="form-control"
                                                    id="yourPassword">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Dokumen KTP</label>
                                                <input type="file" name="dok_ktp2" class="form-control"
                                                    id="yourPassword">
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
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                                {{-- form end here --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
