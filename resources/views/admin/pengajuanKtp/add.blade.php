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
                                        Pada form dokumen kartu keluarga, anda scan atau foto dahulu kartu keluarga anda,
                                        kemudian masukkan file hasil scan tadi ke form kartu keluarga
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Pastikan ukuran file yang akan diupload tidak lebih dari 1 Mb
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
                                                <select class="form-select" id="validationCustom04" name="agama" required>
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
                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Dokumen Kartu
                                                    Keluarga</label>
                                                <input type="file" name="dok_fc_kk" class="form-control"
                                                    id="yourPassword" required>
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
