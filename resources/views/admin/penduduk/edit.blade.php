@extends('layout.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Penduduk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin-penduduk') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item active">Edit Data Penduduk</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <form action="" method="POST" class="needs-validation">
                                @csrf
                                <div class="tab-content pt-3">
                                    <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="yourEmail" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="yourEmail"
                                                    value="{{ $penduduk[0]->email }}" required>
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">NIK</label>
                                                <input type="text" name="nik" class="form-control" id="yourPassword"
                                                    value="{{ $penduduk[0]->nik }}" disabled>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="yourPassword"
                                                    value="{{ $penduduk[0]->nama }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tmp_lahir" class="form-control"
                                                    id="yourPassword" value="{{ $penduduk[0]->tmp_lahir }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control"
                                                    id="yourPassword" value="{{ $penduduk[0]->tgl_lahir }}" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Alamat</label>
                                                {{-- <input type="text" name="password" class="form-control" id="yourPassword" required> --}}
                                                <textarea name="alamat" id="" class="form-control" cols="30" rows="4">{{ $penduduk[0]->alamat }}</textarea>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jns_kelamin"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Jenis Kelamin Anda</option>
                                                    <option value="Laki-Laki"
                                                        @if ($penduduk[0]->jns_kelamin === 'Laki-Laki') selected @endif>Laki-Laki</option>
                                                    <option value="Perempuan"
                                                        @if ($penduduk[0]->jns_kelamin === 'Perempuan') selected @endif>Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Agama</label>
                                                <select class="form-select" name="agama"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Agama Anda</option>
                                                    <option value="Hindu"
                                                        @if ($penduduk[0]->agama === 'Hindu') selected @endif>Hindu</option>
                                                    <option value="Islam"
                                                        @if ($penduduk[0]->agama === 'Islam') selected @endif>Islam</option>
                                                    <option value="Kristen Protestan"
                                                        @if ($penduduk[0]->agama === 'Kristen Protestan') selected @endif>Kristen Protestan
                                                    </option>
                                                    <option value="Kristen Katolik"
                                                        @if ($penduduk[0]->agama === 'Kristen Katolik') selected @endif>Kristen Katolik
                                                    </option>
                                                    <option value="Budha"
                                                        @if ($penduduk[0]->agama === 'Budha') selected @endif>Budha</option>
                                                    <option value="Kong Hu Chu"
                                                        @if ($penduduk[0]->agama === 'Kong Hu Chu') selected @endif>Kong Hu Chu
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Status Perkawinan</label>
                                                <select class="form-select" name="status_perkawinan"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Status Perkawinan Anda</option>
                                                    <option value="Sudah Menikah"
                                                        @if ($penduduk[0]->status_perkawinan === 'Sudah Menikah') selected @endif>Sudah Menikah
                                                    </option>
                                                    <option value="Belum Menikah"
                                                        @if ($penduduk[0]->status_perkawinan === 'Belum Menikah') selected @endif>Belum Menikah
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Pekerjaan</label>
                                                <select class="form-select" name="pekerjaan"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Pekerjaan Anda</option>
                                                    <option value="PNS"
                                                        @if ($penduduk[0]->pekerjaan === 'PNS') selected @endif>PNS</option>
                                                    <option value="Pegawai Swasta"
                                                        @if ($penduduk[0]->pekerjaan === 'Pegawai Swasta') selected @endif>Pegawai Swasta
                                                    </option>
                                                    <option value="Wiraswasta"
                                                        @if ($penduduk[0]->pekerjaan === 'Wiraswasta') selected @endif>Wiraswasta
                                                    </option>
                                                    <option value="Lainnya"
                                                        @if ($penduduk[0]->pekerjaan === 'Lainnya') selected @endif>Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Kewarganegaraan</label>
                                                <input type="text" name="kewarganegaraan" class="form-control"
                                                    id="yourPassword" value="{{ $penduduk[0]->kewarganegaraan }}"
                                                    required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Bordered Tabs -->
                                {{-- button submit here --}}
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
