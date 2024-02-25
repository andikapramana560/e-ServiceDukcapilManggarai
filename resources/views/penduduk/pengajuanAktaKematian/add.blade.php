@extends('layout.penduduk')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Pengajuan Akta Kematian</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
            <li class="breadcrumb-item">Pengajuan</li>
            <li class="breadcrumb-item active">Akta Kematian</li>
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
                    <form action="" method="post">
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Nama Almarhum</label>
                        <input type="text" name="nik" class="form-control" id="yourPassword" value="{{ old('nik') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="validationCustom04" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jns_kel" required>
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
                        <input type="text" name="nik" class="form-control" id="yourPassword" value="{{ old('nik') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                        
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="yourPassword" value="{{ old('tgl_lahir') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Tanggal Meninggal</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="yourPassword" value="{{ old('tgl_lahir') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Surat Keterangan Kematian</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Surat Akta Kelahiran Suami/Istri</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda Penduduk Alm</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Akta Kelahiran Alm</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda Penduduk Ahli Waris</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Kartu Keluarga Alm</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Dokumen Kartu Tanda Penduduk Saksi</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Keterangan</label>
                        <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Kosongkan jika tidak ada keterangan"></textarea>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </form>
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