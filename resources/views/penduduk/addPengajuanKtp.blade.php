@extends('layout.penduduk')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Pengajuan KTP</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pend-dashboard') }}">Penduduk</a></li>
            <li class="breadcrumb-item">Pengajuan</li>
            <li class="breadcrumb-item active">KTP</li>
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
                        <label for="yourPassword" class="form-label">NIK Pemohon</label>
                        <input type="text" name="nik" class="form-control" id="yourPassword" value="{{ old('nik') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                        
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Tanggal Pengajuan</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="yourPassword" value="{{ old('tgl_lahir') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Dokumen Pendukung</label>
                        <input type="file" name="kewarganegaraan" class="form-control" id="yourPassword" value="{{ old('kewarganegaraan') }}" required>
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