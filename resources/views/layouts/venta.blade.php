
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!--begin::Head-->
    <head><base href="">
      <meta charset="utf-8"/>
      <title>Gold System Vit</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

      <!--begin::Page Vendors Styles(used by this page)-->
      <link href="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!--end::Page Vendors Styles-->


      <!--begin::Global Theme Styles(used by all pages)-->
      <link href="/admin/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!--end::Global Theme Styles-->

      <!--begin::Layout Themes(used by all pages)-->

      <link href="/admin/assets/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <!-- <link href="/admin/assets/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="/admin/assets/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>    -->
      <!--end::Layout Themes-->
      <link href="/admin/assets/css/themes/layout/brand/light.css?v=7.0.6" rel="stylesheet" type="text/css">
      <link href="/admin/assets/css/themes/layout/aside/light.css?v=7.0.6" rel="stylesheet" type="text/css">

      <link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
      <link href="/admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script> -->
     <script src="/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
     <script src="/admin/assets/js/scripts.bundle.js?v=7.0.6"></script>
     <style media="screen">
        .btn.btn-clean:not(:disabled):not(.disabled):active:not(.btn-text), .btn.btn-clean:not(:disabled):not(.disabled).active, .show > .btn.btn-clean.dropdown-toggle, .show .btn.btn-clean.btn-dropdown {
        color: #ec5a93;
        background-color: #4c9391;
        border-color: transparent;
        }

        .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean.focus:not(.btn-text) {
          color: #ec5a93;
          background-color: #4c9391;
          border-color: transparent;
        }
        body {width: 100%;}

        .dataTables_wrapper .dataTable td.sorting_desc, .dataTables_wrapper .dataTable th.sorting_desc {
        color: #000 !important;
        }



        .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean.focus:not(.btn-text) {
        color: #C9A94E;
        background-color: #C9A94E;
        border-color: transparent;
        }

        .btn.btn-default {
          color: #fff;
          background-color: #C9A94E;
          border-color: #C9A94E;
        }

        .btn.btn-default.focus:not(.btn-text), .btn.btn-default:focus:not(.btn-text), .btn.btn-default:hover:not(.btn-text):not(:disabled):not(.disabled) {
          color: #fff;
          background-color: #C9A94E;
          border-color: #C9A94E;
        }

        .btn.btn-clean i {
        color: #fff;
        }

        .symbol.symbol-light-primary .symbol-label {
          background-color: #C9A94E;
          color: #fff !important;
        }

     </style>
    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"   class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading"  style="background-image: url('/cremita/img/fondo.png');background-repeat: no-repeat;background-size: 1950px 950px;"  >

    	<!--begin::Main-->
	<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed " >
	<!--begin::Logo-->
	<a href="/dashboard">
		<img alt="Logo" src="/cremita/img/PINK AND GOLD EN BLANCO.png" width="100"/>
	</a>
	<!--end::Logo-->

	<!--begin::Toolbar-->
	<div class="d-flex align-items-center">
      <!--begin::Aside Mobile Toggle-->
      <!-- <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
      <span></span>
      </button> -->
      <!--end::Aside Mobile Toggle-->

      <!--begin::Header Menu Mobile Toggle-->
      <!-- <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
      <span></span>
      </button> -->
      <!--end::Header Menu Mobile Toggle-->

      <!--begin::Topbar Mobile Toggle-->
      <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
      <span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <polygon points="0 0 24 0 24 24 0 24"/>
      <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
      <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
      </g>
      </svg><!--end::Svg Icon--></span>		</button>
      <!--end::Topbar Mobile Toggle-->
	</div>
	<!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->


<!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid " style="padding-top: 60px;" id="kt_wrapper" >
    				<!--begin::Header-->
            <div id="kt_header" class="header  header-fixed " style="background:#ec5a93;">
            	<!--begin::Container-->
            	<div class=" container-fluid  d-flex align-items-stretch justify-content-between" >
            					<!--begin::Header Menu Wrapper-->
          			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                  <div class="header-logo">
                    @if(Auth::user()->tipo_usuario == 1 || Auth::user()->tipo_usuario == 3)
                    <a href="/dashboard_uno">
        							<img alt="Logo" src="/cremita/img/PINK AND GOLD EN BLANCO.png" width="120" height=""/>
        						</a>
                    @else
                    <a href="/ventas">
        							<img alt="Logo" src="/cremita/img/PINK AND GOLD EN BLANCO.png" width="120" height=""/>
        						</a>
                    @endif

        					</div>


          			</div>

            		<div class="topbar" style="color: #fff;
                background-color: #ec5a93;
                border-color: #ec5a93;">

                <div class="dropdown">
                  <div class="topbar-item" data-toggle="dropdown" data-offset="50px,0px" aria-expanded="false">
                      <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"  >
            		         <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"><span style="color:white;">Hola,</span>  </span>
                          <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><span style="color:white;">{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</span></span>
                          <span class="symbol symbol-lg-35 symbol-25 symbol-light-primary">
                              <span class="symbol-label font-size-h5 font-weight-bold"><i class="far fa-id-badge"></i></span>
                          </span>
                      </div>
                  </div>
                  <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right" style="">
                      <!--begin::Nav-->
                      <ul class="navi navi-hover py-4">
                          <!--begin::Item-->
                          @if ( session('idOriginal') )
                          <li class="navi-item">
                            <a class="navi-link" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" style="cursor: pointer;" onclick="as2({{ session('idOriginal') }})">
                              <span class="navi-text" style="font-size:7.5pt;"><i class="fas fa-user-check"></i> Regresar a mi usuario</span>
                            </a>
                          </li>
                          @endif
                          <li class="navi-item">

                              <a href="{{ route('logout') }}" class="navi-link" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><span class="navi-text"><i class="fas fa-power-off"></i> Cerrar Sesión</span></a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>


                              <!-- <a href="#" class="navi-link">
                                  <span class="symbol symbol-20 mr-3">
                                      <img src="/admin/assets/media/svg/flags/226-united-states.svg" alt="">
                                  </span>
                                  <span class="navi-text">English</span>
                              </a> -->
                          </li>
                          <!--end::Item-->

                      </ul>
                  <!--end::Nav-->
                  </div>
                </div>
            		</div>
            		<!--end::Topbar-->
            	</div>
            	<!--end::Container-->
            </div>
            <!--end::Header-->

    				<!--begin::Content-->
            <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
              <!-- -->

                @yield('content')

    <!--end::Entry-->
    				</div>
    				<!--end::Content-->

    									<!--begin::Footer-->
          <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
          	<!--begin::Container-->
          	<div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
          		<!--begin::Copyright-->
          		<div class="text-dark order-2 order-md-1">
          			<span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?>&copy;</span>
          			<a href="" target="_blank" class="text-dark-75 text-hover-primary">FOXCODINGS</a>
          		</div>
          		<!--end::Copyright-->

          		<!--begin::Nav-->
          		<div class="nav nav-dark">
          			<!-- <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
          			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
          			<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a> -->
          		</div>
          		<!--end::Nav-->
          	</div>
          	<!--end::Container-->
          </div>
          <!--end::Footer-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->

<!--end::Chat Panel-->

                            <!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->



<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
	<!--begin::Item-->
	<li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Nuevos Clientes">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" data-toggle="modal" data-target="#cliente_nuevo">
			<i class="flaticon-users-1"></i>
		</a>
	</li>
	<!--end::Item-->

	<!--begin::Item-->
	<!-- <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Agendar Cita">
      <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes"  data-toggle="modal" data-target="#agendar_cita"  target="_blank">
			<i class="flaticon-calendar-1"></i>
		</a>
	</li> -->
	<!--end::Item-->

	<!--begin::Item-->
	<li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Promoción Mensual">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" data-toggle="modal" data-target="#promocion_mensual" >
			<i class="flaticon-price-tag"></i>
		</a>
	</li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Promoción Cumpleaños">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" data-toggle="modal" data-target="#promocion_cumpleanos" >
      <i class="flaticon-price-tag"></i>
    </a>
  </li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Agendar Cita">
      <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes"  href="/agendas"  target="_blank">
			<i class="flaticon-calendar-1"></i>
		</a>
	</li>
	<!--end::Item-->

			<!--begin::Item-->
		<!-- <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="left" data-original-title="Preventas">
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" onclick="tablapreventas()">
				<i class="flaticon-bag "></i>
			</a>
		</li> -->
		<!--end::Item-->

    <!--begin::Item-->
  <!-- <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="left" data-original-title="Cumpleaños del Mes">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" onclick="cumpleanosMes()">
      <i class="flaticon-event-calendar-symbol"></i>
    </a>
  </li> -->
  <!--end::Item-->
	</ul>





  <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4" style="left: 0;">
  	<!--begin::Item-->
  	<!-- <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Venta Servicio">
  		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" onclick="ventaServicio()">
  			<i class="flaticon2-shopping-cart"></i>
  		</a>
  	</li> -->
  	<!--end::Item-->

  	<!--begin::Item-->
  	<li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="left" data-original-title="Venta Productos">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" onclick="ventaProducto()">
  			<i class="flaticon2-shopping-cart"></i>
  		</a>
  	</li>
  	<!--end::Item-->
  	</ul>



        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };



            function as2(id) {

              $.ajax({

               type:"POST",
                 url:"/usuarios/loginAs",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
                id : id,
               },

                success:function(data){

                  if (data == 1) {
                    location.href ="/dashboard_dos";
                  }

                }
              });

            }
        </script>



        <script src="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
    <!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
        <script src="/admin/assets/js/pages/widgets.js?v=7.0.6"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Vendors(used by this page)-->
            <script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
            </body>
    <!--end::Body-->
</html>
