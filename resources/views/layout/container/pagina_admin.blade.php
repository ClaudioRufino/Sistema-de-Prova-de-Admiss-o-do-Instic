@include('layout.componentes.header')
@include('layout.componentes.dashboard_admin')

    <main role="main" class="main-content">
        @yield('conteudo')
    </main>

@include('layout.componentes.footer')