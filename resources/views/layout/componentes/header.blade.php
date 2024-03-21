<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>@yield('title', 'padrao')</title>

    <!-- Nosso Css3 -->
    <link rel="stylesheet" href="{{url('light/css/principal.css')}}">

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('light/css/simplebar.css')}}">

    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('light/css/feather.css')}}">
    <link rel="stylesheet" href="{{url('light/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('light/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('light/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{url('light/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{url('light/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('light/css/quill.snow.css')}}">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="{{url('light/css/fullcalendar.css')}}">
    <link rel="stylesheet" href="{{url('light/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('light/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('light/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{url('light/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{url('light/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('light/css/quill.snow.css')}}">


    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('light/css/daterangepicker.css')}}">

    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('light/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{url('light/css/app-dark.css')}}" id="darkTheme" disabled>
  </head>
  <body class="vertical  light">
    <div class="wrapper">

<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
      <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Pesquise algo..." aria-label="Search">
    </form>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item nav-notif">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
          <span class="fe fe-bell fe-16"></span>
          <span class="dot dot-md bg-success"></span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="avatar avatar-sm mt-2">
            <img class="avatar-img rounded-circle"
             src="{{url('light/assets/avatars/avatar-1.PNG')}}" alt="Avatar representado o Usuário Activo">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">Sair</button>
        </form>
        </div>
      </li>
    </ul>
  </nav>

  <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="defaultModalLabel">Atalhos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <div class="row align-items-center">
            <div class="col-6 text-center">
              <div class="squircle bg-success justify-content-center">
                <i class="fe fe-home fe-32 align-self-center text-white"></i>
              </div>
              <p>Home</p>
            </div>
            <div class="col-6 text-center">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-user fe-32 align-self-center text-white"></i>
              </div>
              <p>Perfil</p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-6 text-center">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-file fe-32 align-self-center text-white"></i>
              </div>
              <p>Prova</p>
            </div>
            <div class="col-6 text-center">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-layers fe-32 align-self-center text-white"></i>
              </div>
              <p>Ver Pauta</p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-6 text-center">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-calendar fe-32 align-self-center text-white"></i>
              </div>
              <p>Calendario</p>
            </div>
            <div class="col-6 text-center">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
              </div>
              <p>definições</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

