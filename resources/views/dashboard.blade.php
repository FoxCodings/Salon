<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gold System Vit</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/cremita/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/cremita/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="https://api.w.org/" href="/admin/assets/media/bg/hhva_sombra.png" /><link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
    <link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="/cremita/img/ICONO LOGO.png" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/cremita/css/style.css" rel="stylesheet">

</head>

<body style="background-image: url('/cremita/img/fondo.png');background-size:100% 200%; background-repeat:no-repeat;">
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">

        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><img src="/cremita/img/GOLD SISTEM VIT .png" width="200" ></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0" >
                        <!-- <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="product.html" class="nav-item nav-link">Product</a> -->

                    </div>
                    <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><img src="/cremita/img/GOLD SISTEM VIT .png" width="500" ></h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('logout') }}" class="nav-item nav-link" style="font-size:12px;" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><span class="navi-text"><i class="fas fa-power-off"></i> Cerrar Sesión</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>

                    </div>
                </div>
            </nav>
        </div>
    </div>


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
<!--             <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5">Best Services We Provide For Our Clients</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div> -->
            <div class="row">
                <div class="col-md-6">
                    <!-- <div class="owl-carousel service-carousel"> -->
                        <div class="service-item">
                            <div class="service-img mx-auto">
                                <img class="rounded-circle w-100 h-100 bg-light p-3" src="/cremita/img/LOGO PINK AND GOLD.png"  style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                                <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">PINK AND GOLD</h5>
                                <!-- <p>Dolor nonumy sed eos sed lorem diam amet eos magna. Dolor kasd lorem duo stet kasd justo</p> -->
                                @if(Auth::user()->tipo_usuario == 1 || Auth::user()->tipo_usuario == 3)
                                <!-- <a href="" class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a> -->
                                <a href="/dashboard_uno" class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a>
                                @elseif(Auth::user()->tipo_usuario == 2 && Auth::user()->modulo == 1 || Auth::user()->tipo_usuario == 4 && Auth::user()->modulo == 1)
                                <a href="/dashboard_uno" class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a>
                                <!-- <a href="/ventas" class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a> -->
                                @else
                                <br>
                                @endif

                            </div>
                        </div>

                </div>
                <div class="col-md-6">

                        <div class="service-item">
                            <div class="service-img mx-auto">
                                <img class="rounded-circle w-100 h-100 bg-light p-3" src="/cremita/img/LOGO SPA.png"  style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                                <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">SPA VIT & lIFE</h5>
                                @if(Auth::user()->tipo_usuario == 1 || Auth::user()->tipo_usuario == 3)
                                <a href="/dashboard_dos" disabled class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a>
                                @elseif(Auth::user()->tipo_usuario == 2 && Auth::user()->modulo == 2)
                                <a href="/dashboard_dos" class="border-bottom border-secondary text-decoration-none text-secondary">Entrar</a>
                                @else
                                <br>
                                @endif

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->




    <!-- Footer Start -->
    <!-- <div class="container-fluid footer bg-light py-5" >
        <div class="container text-center py-5">
            <div class="row">

                <div class="col-12">
                    <p class="m-0">&copy; <a>Gold System Vit</a>. Todos los Derechos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/cremita/lib/easing/easing.min.js"></script>
    <script src="/cremita/lib/waypoints/waypoints.min.js"></script>
    <script src="/cremita/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/cremita/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/cremita/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/cremita/mail/jqBootstrapValidation.min.js"></script>
    <script src="/cremita/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/cremita/js/main.js"></script>
</body>

</html>
