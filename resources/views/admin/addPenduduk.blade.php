@extends('layout.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Penduduk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin-penduduk') }}">Data Penduduk</a></li>
          <li class="breadcrumb-item active">Tambah Data Penduduk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          
          <div class="card">
            <div class="card-body pt-3">
              <form class="needs-validation" method="POST" action=""> 
                @csrf
              <div class="tab-content pt-3">
                <div class="tab-pane fade show active data-pribadi" id="data-pribadi">
                  <div class="row g-3">
                    <div class="col-12">
                        <label for="yourEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="yourEmail" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="yourPassword" value="{{ old('nik') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="yourPassword" value="{{ old('nama') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control" id="yourPassword" value="{{ old('tmp_lahir') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="yourPassword" value="{{ old('tgl_lahir') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Alamat</label>
                        {{-- <input type="text" name="password" class="form-control" id="yourPassword" required> --}}
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="4">{{ old('alamat') }}</textarea>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jns_kelamin" aria-label="Default select example">
                          <option selected disabled>Pilih Jenis Kelamin Anda</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Agama</label>
                        <select class="form-select" name="agama" aria-label="Default select example">
                          <option selected disabled>Pilih Agama Anda</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Kristen Katolik">Kristen Katolik</option>
                          <option value="Budha">Budha</option>
                          <option value="Kong Hu Chu">Kong Hu Chu</option>
                        </select>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Status Perkawinan</label>
                        <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                          <option selected disabled>Pilih Status Perkawinan Anda</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Pekerjaan</label>
                        <select class="form-select" name="pekerjaan" aria-label="Default select example">
                          <option selected disabled>Pilih Pekerjaan Anda</option>
                          <option value="PNS">PNS</option>
                          <option value="Pegawai Swasta">Pegawai Swasta</option>
                          <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
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