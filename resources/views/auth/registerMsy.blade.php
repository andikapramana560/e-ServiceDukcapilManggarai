<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/new-logo.png') }}" rel="icon">
  {{-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    @include('sweetalert::alert')
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/new-logo.png" width="100" height="100" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-2 pb-3">
                    <h5 class="card-title text-center pb-0 fs-4">Registrasi Masyarakat</h5>
                    {{-- <p class="text-center small">Enter your personal details to create account</p> --}}
                  </div>

                  <form class="row g-3 needs-validation" method="POST" novalidate>
                    @csrf
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
                        <option selected>Pilih Jenis Kelamin Anda</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Agama</label>
                      <select class="form-select" name="agama" aria-label="Default select example">
                        <option selected>Pilih Agama Anda</option>
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
                        <option selected>Pilih Status Perkawinan Anda</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                      </select>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Pekerjaan</label>
                      <select class="form-select" name="pekerjaan" aria-label="Default select example">
                        <option selected>Pilih Pekerjaan Anda</option>
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

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Daftar</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>