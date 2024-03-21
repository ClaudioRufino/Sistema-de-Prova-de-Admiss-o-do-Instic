{{-- <link rel="stylesheet" href="{{url('light/css/principal.css')}}"> --}}

<aside class="sidebar-left border-right bg-light shadow" id="leftSidebar" data-simplebar> <!-- bg-primary Light para primary-->
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light"> <!-- Light para primary-->
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('candidato.index')}}">
          <img src="{{url('light/assets/images/isutic-logo.png')}}" alt="logotipo" style="position: relative; right:40px; width:150px">
        </a>
      </div>

      <ul class="navbar-nav flex-fill w-100 mb-2">

        <li class="nav-item">
          <a class="nav-link" href="{{route('candidato.index')}}">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Home</span>
          </a>
        </li>


      </ul>
      <p class="text-muted nav-heading mt-4 mb-1 menu-item">
        <span>Componentes</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">

        <li class="nav-item">
          <a class="nav-link" href="{{route('candidato_perfil')}}">
            <i class="fe fe-user fe-16"></i>
            <span class="ml-3 item-text">Perfil</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('prova_antes')}}">
            <i class="fe fe-file fe-16"></i>
            <span class="ml-3 item-text">Prova</span>
          </a>
        </li>

        @php
            $i = 0;
        @endphp
        
        @if ($i == 1
        )
        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('pauta_antes')}}">
            <i class="fe fe-layers fe-16"></i>
            <span class="ml-3 item-text">Pergunta</span>
          </a>
        </li>

        @endif

        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('pauta_antes')}}">
            <i class="fe fe-layers fe-16"></i>
            <span class="ml-3 item-text">Ver Pauta</span>
          </a>
        </li>

        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('calendar')}}">
            <i class="fe fe-calendar fe-16"></i>
            <span class="ml-3 item-text">Calendário</span>
          </a>
        </li>
       
    </nav>
  </aside>