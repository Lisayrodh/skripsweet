@extends('klinik.klinik_master')
@section('about')

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Khitan Care</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset ('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medilab
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>


  <body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
      <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope"></i> <a href="mailto:khitancare@gmail.com">khitancare@gmail.com</a>
          <i class="bi bi-phone"></i> +62 815 7204 6281
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
          {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> --}}
          <a href="https://www.instagram.com/lisay.rodh/" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.linkedin.com/in/lisayiharodhiatun/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">KhitanCare</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
            <li><a class="nav-link scrollto" href="#">Metode</a></li>
            <li class="dropdown"><a href="#"><span class="appointment-btn scrollto">Nama_user</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ route('klinik_about') }}">About</a></li>
                <li><a href="{{ route('home') }}">Log out</a></li>
              </ul>
          </li>
            {{-- <li><a class="nav-link scrollto" href="#">Location</a></li>
            <li><a class="nav-link scrollto" href="#">Contact</a></li> --}}
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> --}}

      </div>
    </header><!-- End Header -->

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <h1> Create About </h1>
          {{-- <h2>Kami merupakan platform penyedia layanan khitanan yang siap membantu Anda!</h2> --}}
          {{-- <a href="#" class="btn-get-started scrollto">Created</a> --}}
        </div>
      </section><!-- End Hero -->


        <form action="{{ route('klinikabout.store') }}" method="POST">
            @csrf
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <p class="text-uppercase text-sm" style="font-weight: bold; text-align: center;">Profile</p>
                                            {{-- <div class="btn-group" role="group">
                                                <button class="btn btn-primary btn-sm" style="font-weight: bold; margin-right: 10px;" onclick="window.location.href='{{ route('klinikabout.create') }}'">Create</button>
                                                <button class="btn btn-primary btn-sm" style="font-weight: bold;" onclick="window.location.href='#'">Edit</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm" style="font-weight: bold;">Informasi User</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Username</label>
                                            <input class="form-control" type="text" value="" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat Email</label>
                                            <input class="form-control" type="email" value="" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Klinik</label>
                                            <input class="form-control" type="text" value="" name="nama_klinik">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Last name</label>
                                            <input class="form-control" type="text" value="">
                                        </div>
                                    </div> --}}
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm" style="font-weight: bold;">Location</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat Lengkap</label>
                                            <input class="form-control" type="text"
                                                value="" name="alamat_lengkap">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                            <input class="form-control" type="text" value="" name="kecamatan">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kabupaten</label>
                                            <input class="form-control" type="text" value="" name="kabupaten">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Kode Pos</label>
                                            <input class="form-control" type="text" value="" name="kode_pos">
                                        </div>
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm" style="font-weight: bold;">Kontak dan Media Sosial</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Whatsapp</label>
                                            <input class="form-control" type="text" value="" name="whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Telephone</label>
                                            <input class="form-control" type="text" value="" name="telephone">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Instagram</label>
                                            <input class="form-control" type="text" value="" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Facebook</label>
                                            <input class="form-control" type="text" value="" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Website Klinik</label>
                                            <input class="form-control" type="text" value="" name="website_klinik">
                                        </div>
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm" style="font-weight: bold;">Tentang Kami</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tentang Kami</label>
                                            <input class="form-control" type="text"
                                                value="" name="tentang_klinik">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <img src="{{ asset('assets/img/bgprofile.jpg') }}" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4 order-lg-2">
                                    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0 text-center position-relative">
                                        <label for="upload-image">
                                            <img src="{{ asset('assets/img/avatarprofile.jpeg') }}"
                                                class="rounded-circle img-fluid border border-2 border-white" id="image-preview">
                                        </label>
                                        <input type="file" id="upload-image" style="display: none;">
                                        <label for="update-mage">
                                        <span class="position-absolute bottom-0 start-50 translate-middle badge bg-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </label>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                <div class="d-flex justify-content-between">

                                    <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                            class="ni ni-collection"></i></a>
                                            <div class="form-group">
                                                <label for="clinic_photo">Clinic Photo:</label>
                                                <input type="file" name="clinic_photo" class="form-control-file">
                                            </div>
                                    <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                            class="ni ni-email-83"></i></a>
                                </div>
                            </div> --}}
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">

                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <h5>
                                        Nama_user<span class="font-weight-light"></span>
                                    </h5>
                                    <div class="h6 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>Alamat
                                    </div>
                                    <div class="h6 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>Tentang Klinik
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>


</body>
@endsection
