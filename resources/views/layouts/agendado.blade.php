
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

      <link rel="https://api.w.org/" href="/cremita/img/ICONO LOGO.png" /><link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
      <link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
      <link rel="apple-touch-icon" href="/cremita/img/ICONO LOGO.png" />
      <link href="/admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="/admin/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
     <script src="/admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
     <script src="/admin/assets/js/scripts.bundle.js?v=7.0.6"></script>
     <style media="screen">
        .btn.btn-clean:not(:disabled):not(.disabled):active:not(.btn-text), .btn.btn-clean:not(:disabled):not(.disabled).active, .show > .btn.btn-clean.dropdown-toggle, .show .btn.btn-clean.btn-dropdown {
        color: #f8bbd0;
        background-color: #4c9391;
        border-color: transparent;
        }

        .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean.focus:not(.btn-text) {
          color: #f8bbd0;
          background-color: #4c9391;
          border-color: transparent;
        }
        body {width: 100%;}
        .fc-unthemed .fc-toolbar .fc-button {
          color: #000;
          background: transparent;
          border: 1px solid #EBEDF3;
          text-shadow: none !important;
          -webkit-box-shadow: none !important;
          box-shadow: none !important;
        }

        .fc-unthemed .fc-toolbar .fc-button.fc-button-active, .fc-unthemed .fc-toolbar .fc-button:active, .fc-unthemed .fc-toolbar .fc-button:focus {
          background: #fff;
          color: #000;
          border: 1px solid #EBEDF3;
          -webkit-box-shadow: none;
          box-shadow: none;
          text-shadow: none;
        }



        .fc-unthemed td.fc-past {
          background: #ccc;
        }

        .fc-unthemed td.fc-today {
          background: green;
        }

        .aside-menu .menu-nav > .menu-item.menu-item-active > .menu-heading, .aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link {
        background-color: #f8bbd0;
        }

        .aside-menu .menu-nav > .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover > .menu-heading, .aside-menu .menu-nav > .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover > .menu-link {
        background-color: #f8bbd0;
        border-radius: 0.5rem;
        margin: 10px;
        padding: 9px 25px;
        }

        .aside-menu .menu-nav > .menu-item.menu-item-open > .menu-heading, .aside-menu .menu-nav > .menu-item.menu-item-open > .menu-link {
        background-color: #f8bbd0;
        border: 0.0625rem solid #f8bbd0;
        border-radius: 0.5rem;
        }

        .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean.focus:not(.btn-text) {
          color: #f8bbd0;
          background-color: #f8bbd0;
          border-color: transparent;
        }

        .aside-menu .menu-nav > .menu-item > .menu-heading .menu-icon.svg-icon svg g [fill], .aside-menu .menu-nav > .menu-item > .menu-link .menu-icon.svg-icon svg g [fill] {
          -webkit-transition: fill 0.3s ease;
          transition: fill 0.3s ease;
          fill: #fff;
        }

        .btn.btn-light-primary:hover:not(.btn-text):not(:disabled):not(.disabled) {
          color: #FFFFFF;
          background-color: #f8bbd0;
          border-color: transparent;
        }

        .btn.btn-light-primary {
          color: #fff;
          background-color: #f8bbd0;
          border-color: transparent;
        }

        .btn.btn-default {
          color: #fff;
          background-color: #f8bbd0;
          border-color: #f8bbd0;
        }

        .btn.btn-default.focus:not(.btn-text), .btn.btn-default:focus:not(.btn-text), .btn.btn-default:hover:not(.btn-text):not(:disabled):not(.disabled) {
          color: #fff;
          background-color: #f8bbd0;
          border-color: #f8bbd0;
        }

        .btn.btn-clean i {
        color: #fff;
        }

        .symbol.symbol-light-primary .symbol-label {
          background-color: #f8bbd0;
          color: #fff !important;
        }

        .brand {
            background-color: rgb(173, 20, 87);
            -webkit-box-shadow: none;
            box-shadow: none;
          }

     </style>
    </head>
    <!--end::Head-->

    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading"  style="background-image: url('/cremita/img/fondo.png');background-repeat: no-repeat;background-size: cover;background-size: 1950px 1050px;" >

    	<!--begin::Main-->
	<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed " >
	<!--begin::Logo-->
	<a href="/dashboard_dos">
		<img alt="Logo" src="/cremita/img/pgl_blanco.png" width="170" height="40"/>
	</a>
	<!--end::Logo-->

	<!--begin::Toolbar-->
	<div class="d-flex align-items-center">
					<!--begin::Aside Mobile Toggle-->
			<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
				<span></span>
			</button>
			<!--end::Aside Mobile Toggle-->

					<!--begin::Header Menu Mobile Toggle-->
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<!--end::Header Menu Mobile Toggle-->

		<!--begin::Topbar Mobile Toggle-->
		<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto"  id="kt_aside">
	<!--begin::Brand-->
	<div class="brand flex-column-auto " id="kt_brand">
		<!--begin::Logo-->
    <a href="/dashboard_dos" class="brand-logo">
      <img alt="Logo" src="/cremita/img/pgl_blanco.png" width="170" height="40"/>
    </a>
    <!-- @if(Auth::user()->tipo_usuario == 1)

    @else -->
    <!-- <a href="dashboard_dos" class="brand-logo">
      <img alt="Logo" src="/cremita/img/VIT & LIVE.png"/>
    </a> -->
    <!-- @endif -->

		<!--end::Logo-->

					<!--begin::Toggle-->
			<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
    </g>
</svg><!--end::Svg Icon--></span>			</button>
			<!--end::Toolbar-->
			</div>
	<!--end::Brand-->

	<!--begin::Aside Menu-->
  <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper" style="background-color:rgb(173, 20, 87);">

    <!--begin::Menu Container-->
    <div
      id="kt_aside_menu"
      class="aside-menu my-4 "
      data-menu-vertical="1"
       data-menu-scroll="1" data-menu-dropdown-timeout="500" 		style="background-color:rgb(173, 20, 87);"	>
      <!--begin::Menu Nav-->
      <ul class="menu-nav ">
        <li class="menu-item " aria-haspopup="true" ><a  href="/dashboard_dos" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
    </g>
  </svg><!--end::Svg Icon--></span><span class="menu-text">Dashboard</span></a></li>

  <li class="menu-section ">
    <h4 class="menu-text" style="color:#fff;">Menú</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
  </li>
  @foreach (obtenerModulosActivos() as $key => $value)
    @php
    $alias = $value->get('alias');
    @endphp
    @foreach(obtenerModulo() as $values)
       @php
       $aliast = $values->modulo;
       @endphp
      <!--//////////////////// reportes //////////////////////////////////////// -->
      @if($alias == $aliast)
      <li @if($value->get("contenido")) class="menu-item  menu-item-submenu" aria-haspopup="true"  data-menu-toggle="hover" @else class="menu-item " aria-haspopup="true"  @endif>
        <a   @if($value->get("contenido"))  class="menu-link menu-toggle" @else class="menu-link "  @endif  href="@if($value->get('contenido')) javascript:; @else /{{ $alias }} @endif"  >
            <i class="{{ $value->get('icono') }}"></i>
            <span class="menu-text">{{ $value->get('titulo') ? $value->get('titulo') : $value->get('name') }}</span>
              @if ( $value->get('contenido') )
              <!-- <span class="ml-auto sidebar-menu-toggle-icon"></span> -->
              <i class="menu-arrow"></i>
              @endif
        </a>
        @if ( $value->get('contenido') )
          @php $array_usuarios = $value->get('contenido'); @endphp
          <div class="menu-submenu ">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              @foreach ($array_usuarios as $key => $value)

                <li class="menu-item " aria-haspopup="true" >
                  <a  href="{{ $value['enlace'] }}" class="menu-link "><i class="menu-bullet menu-bullet-line"><span></span></i><span class="menu-text">{{ $key }}</span></a>
                </li>
              @endforeach
            </ul>
          </div>
        </li>
        @endif
      @endif
      <!--///////////////// FIN reportes ////////////////////////////-->
    @endforeach
  @endforeach






  		</ul>
      <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
  </div>
	<!--end::Aside Menu-->
</div>
<!--end::Aside-->

			<!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid " style="padding-top: 60px;" id="kt_wrapper" >
    				<!--begin::Header-->
            <div id="kt_header" class="header  header-fixed " style="background:#f8bbd0;">
            	<!--begin::Container-->
            	<div class=" container-fluid  d-flex align-items-stretch justify-content-between" >
            					<!--begin::Header Menu Wrapper-->
          			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                  <div class="header-logo">
                    <!-- @if(Auth::user()->tipo_usuario == 1)
                    <a href="/dashboard_dos">
        							<img alt="Logo" src="/cremita/img/PINK AND GOLD EN BLANCO.png" width="120" height=""/>
        						</a>
                    @else
                    <a href="/ventas">
        							<img alt="Logo" src="/cremita/img/PINK AND GOLD EN BLANCO.png" width="120" height=""/>
        						</a>
                    @endif -->

        					</div>


          			</div>

            		<div class="topbar" style="color: #fff;
                background-color: #f8bbd0;
                border-color: #f8bbd0;">

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
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:/admin/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>

<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">

    <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="left" data-original-title="Venta Productos">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" onclick="ventaProductos()">
        <i class="flaticon2-shopping-cart"></i>
      </a>
    </li>
    <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="left" data-original-title="Agenda">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-succes" onclick="citas()">
        <i class="far fa-calendar-alt "></i>
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
        </script>
        <!--end::Global Config-->
<script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
    	<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <!-- <script src="assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
		    	   <script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
		    	   <script src="assets/js/scripts.bundle.js?v=7.0.6"></script>

                            <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
                            <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.6"></script>
                            <script src="assets/plugins/custom/gmaps/gmaps.js?v=7.0.6"></script>

                            <script src="assets/js/pages/widgets.js?v=7.0.6"></script> -->
                        <!--end::Page Scripts-->
            </body>
</html>
