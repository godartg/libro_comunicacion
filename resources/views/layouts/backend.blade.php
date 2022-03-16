<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Proyecto Colegio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/educate-custon-icon.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('/backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('styles')
</head>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{route('home')}}"><img class="main-logo" src="{{ asset('backend/img/logo/logo.png') }}" alt="" /></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                        <a aria-expanded="false" href="{{ route('usuarioIndex')}}">
						  <span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span>
						  <span class="mini-click-non">Usuarios</span>
						</a>
                      </li>
                    @endif
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                          <a aria-expanded="false" href="{{ route('cursoIndex')}}"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Cursos</span></a>
                      </li>
                    @endif
                      @if(Auth::user()->hasRole('docente'))
                      <li>
                          <a aria-expanded="false" href="{{ route('cursoDocenteLista',Auth::user()->id)}}"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Cursos (Docente)</span></a>
                      </li>
                      @endif
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                          <a aria-expanded="false" href="{{ route('salonIndex')}}"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Salones</span></a>
                      </li>
                    @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo-pro">
                      <a href="index.html"><img class="main-logo" src="{{ asset('backend/img/logo/logo.png')}}" alt="" /></a>
                  </div>
              </div>
          </div>
        </div>
        <div class="header-advance-area">
          <div class="header-top-area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="header-top-wraper">
                              <div class="row">
                                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                      <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                          <i class="educate-icon educate-nav"></i>
                                        </button>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                      <div class="header-top-menu tabl-d-n">
                                          <ul class="nav navbar-nav mai-top-nav">
                                              <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">About</a>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                              </li>
                                              <li class="nav-item dropdown res-dis-nn">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                  <div role="menu" class="dropdown-menu animated zoomIn">
                                                      <a href="#" class="dropdown-item">Documentation</a>
                                                      <a href="#" class="dropdown-item">Expert Backend</a>
                                                      <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                      <a href="#" class="dropdown-item">Contact Support</a>
                                                  </div>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                      <div class="header-right-info">
                                          <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                              <li class="nav-item dropdown">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                  <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                      <div class="message-single-top">
                                                          <h1>Message</h1>
                                                      </div>
                                                      <ul class="message-menu">
                                                          <li>
                                                              <a href="#">
                                                                  <div class="message-img">
                                                                      <img src="{{ asset('backend/img/contact/1.jpg')}}" alt="">
                                                                  </div>
                                                                  <div class="message-content">
                                                                      <span class="message-date">16 Sept</span>
                                                                      <h2>Advanda Cro</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="message-img">
                                                                      <img src="{{ asset('backend/img/contact/4.jpg')}}" alt="">
                                                                  </div>
                                                                  <div class="message-content">
                                                                      <span class="message-date">16 Sept</span>
                                                                      <h2>Sulaiman din</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="message-img">
                                                                      <img src="{{ asset('backend/img/contact/3.jpg')}}" alt="">
                                                                  </div>
                                                                  <div class="message-content">
                                                                      <span class="message-date">16 Sept</span>
                                                                      <h2>Victor Jara</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="message-img">
                                                                      <img src="{{ asset('backend/img/contact/2.jpg')}}" alt="">
                                                                  </div>
                                                                  <div class="message-content">
                                                                      <span class="message-date">16 Sept</span>
                                                                      <h2>Victor Jara</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                      </ul>
                                                      <div class="message-view">
                                                          <a href="#">View All Messages</a>
                                                      </div>
                                                  </div>
                                              </li>
                                              <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                  <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                      <div class="notification-single-top">
                                                          <h1>Notifications</h1>
                                                      </div>
                                                      <ul class="notification-menu">
                                                          <li>
                                                              <a href="#">
                                                                  <div class="notification-icon">
                                                                      <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                  </div>
                                                                  <div class="notification-content">
                                                                      <span class="notification-date">16 Sept</span>
                                                                      <h2>Advanda Cro</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="notification-icon">
                                                                      <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                  </div>
                                                                  <div class="notification-content">
                                                                      <span class="notification-date">16 Sept</span>
                                                                      <h2>Sulaiman din</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="notification-icon">
                                                                      <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                  </div>
                                                                  <div class="notification-content">
                                                                      <span class="notification-date">16 Sept</span>
                                                                      <h2>Victor Jara</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                          <li>
                                                              <a href="#">
                                                                  <div class="notification-icon">
                                                                      <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                  </div>
                                                                  <div class="notification-content">
                                                                      <span class="notification-date">16 Sept</span>
                                                                      <h2>Victor Jara</h2>
                                                                      <p>Please done this project as soon possible.</p>
                                                                  </div>
                                                              </a>
                                                          </li>
                                                      </ul>
                                                      <div class="notification-view">
                                                          <a href="#">View All Notification</a>
                                                      </div>
                                                  </div>
                                              </li>
                                              <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                      <img src="{{ asset('backend/img/product/pro4.jpg')}}" alt="" />
                                                      <span class="admin-name">{{ Auth::user()->name }}</span>
                                                      <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                  <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                      <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                              <span class="edu-icon edu-locked author-log-ic"></span>{{ __('Logout') }}
                                                          </a>
                                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                              @csrf
                                                          </form>
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                  <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                      <ul class="nav nav-tabs custon-set-tab">
                                                          <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                          </li>
                                                          <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                          </li>
                                                          <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                          </li>
                                                      </ul>

                                                      <div class="tab-content custom-bdr-nt">
                                                          <div id="Notes" class="tab-pane fade in active">
                                                              <div class="notes-area-wrap">
                                                                  <div class="note-heading-indicate">
                                                                      <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                      <p>You have 10 new message.</p>
                                                                  </div>
                                                                  <div class="notes-list-area notes-menu-scrollbar">
                                                                      <ul class="notes-menu-list">
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/4.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/1.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/2.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/3.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/4.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/1.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/2.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/1.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/2.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="notes-list-flow">
                                                                                      <div class="notes-img">
                                                                                          <img src="{{ asset('backend/img/contact/3.jpg')}}" alt="" />
                                                                                      </div>
                                                                                      <div class="notes-content">
                                                                                          <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                          <span>Yesterday 2:45 pm</span>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div id="Projects" class="tab-pane fade">
                                                              <div class="projects-settings-wrap">
                                                                  <div class="note-heading-indicate">
                                                                      <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                      <p> You have 20 projects. 5 not completed.</p>
                                                                  </div>
                                                                  <div class="project-st-list-area project-st-menu-scrollbar">
                                                                      <ul class="projects-st-menu-list">
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Web Development</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">1 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content">
                                                                                          <p>Completion with: 28%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-1"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Software Development</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">2 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content project-rating-cl">
                                                                                          <p>Completion with: 68%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 68%;" class="progress-bar hd-tp-2"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Graphic Design</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">3 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content">
                                                                                          <p>Completion with: 78%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 78%;" class="progress-bar hd-tp-3"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Web Design</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">4 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content project-rating-cl2">
                                                                                          <p>Completion with: 38%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 38%;" class="progress-bar progress-bar-danger hd-tp-4"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Business Card</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">5 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content">
                                                                                          <p>Completion with: 28%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-5"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Ecommerce Business</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">6 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content project-rating-cl">
                                                                                          <p>Completion with: 68%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 68%;" class="progress-bar hd-tp-6"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Woocommerce Plugin</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">7 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content">
                                                                                          <p>Completion with: 78%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 78%;" class="progress-bar"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                          <li>
                                                                              <a href="#">
                                                                                  <div class="project-list-flow">
                                                                                      <div class="projects-st-heading">
                                                                                          <h2>Wordpress Theme</h2>
                                                                                          <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                          <span class="project-st-time">9 hours ago</span>
                                                                                      </div>
                                                                                      <div class="projects-st-content project-rating-cl2">
                                                                                          <p>Completion with: 38%</p>
                                                                                          <div class="progress progress-mini">
                                                                                              <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                          </div>
                                                                                          <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                      </div>
                                                                                  </div>
                                                                              </a>
                                                                          </li>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div id="Settings" class="tab-pane fade">
                                                              <div class="setting-panel-area">
                                                                  <div class="note-heading-indicate">
                                                                      <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                      <p> You have 20 Settings. 5 not completed.</p>
                                                                  </div>
                                                                  <ul class="setting-panel-list">
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Show notifications</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                            <label class="onoffswitch-label" for="example">
                                                                                              <span class="onoffswitch-inner"></span>
                                                                                              <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Disable Chat</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                          <label class="onoffswitch-label" for="example3">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Enable history</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                          <label class="onoffswitch-label" for="example4">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Show charts</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                          <label class="onoffswitch-label" for="example7">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Update everyday</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                          <label class="onoffswitch-label" for="example2">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Global search</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                          <label class="onoffswitch-label" for="example6">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                      <li>
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                  <h2>Offline users</h2>
                                                                                  <div class="ts-custom-check">
                                                                                      <div class="onoffswitch">
                                                                                          <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                          <label class="onoffswitch-label" for="example5">
                                                                                            <span class="onoffswitch-inner"></span>
                                                                                            <span class="onoffswitch-switch"></span>
                                                                                          </label>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </li>
                                                                  </ul>

                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu start -->
          <div class="mobile-menu-area">
            <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="mobile-menu">
                          <nav id="dropdown">
                              <ul class="mobile-menu-nav">
                                  <li><a href="{{ route('usuarioIndex')}}">Usuario <span class="admin-project-icon edu-icon "></span></a></li>
                                  <li><a href="#">Salones <span class="admin-project-icon edu-icon "></span></a></li>
                                  <li><a href="{{ route('cursoIndex')}}">Cursos <span class="admin-project-icon edu-icon "></span></a></li>
                                  <li><a href="{{ route('cursoIndex')}}">Cursos <span class="admin-project-icon edu-icon "></span></a></li>
                                  <li><a href="{{ route('salonIndex')}}">Salones <span class="admin-project-icon edu-icon "></span></a></li>
                              </ul>
                          </nav>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        @stack('sidebar')
        @yield('content')
        @yield('footer')
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{ asset('/backend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('/backend/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('/backend/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('/backend/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('/backend/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/backend/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('/backend/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('/backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/backend/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('/backend/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/backend/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('/backend/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/backend/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ asset('/backend/js/sparkline/sparkline-active.js') }}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('backend/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('/backend/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('/backend/js/main.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('/backend/js/tawk-chat.js') }}"></script>
    @stack('scripts')
</body>
</html>