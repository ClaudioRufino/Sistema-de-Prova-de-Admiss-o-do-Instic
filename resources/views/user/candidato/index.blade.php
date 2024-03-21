@extends('layout.container.pagina')
@section('title', 'Candidatos')


@section('conteudo')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title" style="color:rgb(46, 89, 230)"></i><em>{{$nome}}</em></h2>
          </div>
          <div class="col-auto">
            <form class="form-inline">
              <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Date Ranges</label>
                <div id="reportrange" class="px-2 py-2 text-muted">
                  <span class="small"></span>
                </div>
              </div>
              
            </form>
          </div>
        </div>

        <div class="mb-2 align-items-center">

          <div class="row">
          <!-- Bootstrap carousel -->
          <div class="col-md">

            <div id="meuCarrocel" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#meuCarrocel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#meuCarrocel" data-bs-slide-to="1"></li>
                <li data-bs-target="#meuCarrocel" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" style="height:500px">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{url('light/assets/images/isutic-3.jpg')}}" alt="First slide" />
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{url('light/assets/images/isutic-home.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{url('light/assets/images/isutic-4.jpg')}}" alt="Third slide" />
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#meuCarrocel" onclick="retroceder()" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#meuCarrocel" onclick="avancar()" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>
            </div>
          </div>
          <!-- Fim Bootstrap carousel -->
          </div>

          <script>
            function avancar(){
              $('.carousel').carousel('next');
            }

            function retroceder(){
              $('.carousel').carousel('prev');
            }
          </script>

        </div>

        <div class="row items-align-baseline">
          <div class="col-md-12 col-lg-4">
            <div class="card shadow eq-card mb-4">
              <div class="card-body mb-n3">
                <div class="row items-align-baseline h-100">
                  <div class="col-md-6 my-3">
                    <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Inscrição</strong></p>
                      @php
                          $ano = date("Y");
                      @endphp
                    <h3> @php echo $ano . "/" .($ano + 1) @endphp</h3>
                    
                    <p class="text-muted">É permitido se inscrever no máximo dois cursos</p>
                  </div>
                  <div class="col-md-6 my-4 text-center"> </div>
                  
                  <div class="col-md-6 border-top py-3">
                    <p class="mb-1"><strong class="text-muted">Preço</strong></p>
       
                   <h4 class="mb-0">5000</h4>
                  </div> <!-- .col -->
                  <div class="col-md-6 border-top py-3">
                    <p class="mb-1"><strong class="text-muted">Vagas</strong></p>
                    <h4 class="mb-0">200</h4>
                  </div> <!-- .col -->
                </div>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col -->
          <div class="col-md-12 col-lg-4">
            <div class="card shadow eq-card mb-4">
              <div class="card-body">

                <div class="chart-widget mb-2">
                  <div id="radialbar"></div>
                </div>

                <div class="row items-align-center">
                  <div class="col-4 text-center">
                    <p class="text-muted mb-1">Inscritos</p>
                    <h6 class="mb-1">{{($candidatos->total-1)}}</h6>
                  </div>
                  <div class="col-4 text-center">
                    <p class="text-muted mb-1">Informática</p>
                    <h6 class="mb-1">{{$candidatos->informaticos}}</h6>
                  </div>
                  <div class="col-4 text-center">
                    <p class="text-muted mb-1">Telecom</p>
                    <h6 class="mb-1">{{$candidatos->telecom}}</h6>
                  </div>
                </div>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col -->
          <div class="col-md-12 col-lg-4">
            <div class="card shadow eq-card mb-4">
              <div class="card-body">
                <div class="d-flex mt-3 mb-4">
                  <div class="flex-fill pt-2">
                    <p class="mb-0 text-muted">Total Inscritos Diário</p>
                    {{-- <h4 class="mb-0">108</h4> --}}
                    {{-- <span class="small text-muted">+37.7%</span> --}}
                  </div>
                  <div class="flex-fill chart-box mt-n2">
                    <div id="barChartWidget"></div>
                  </div>
                </div> <!-- .d-flex -->
                <div class="row border-top">
                  <div class="col-md-6 pt-4">
                    <h6 class="mb-0">{{($candidatos->total-1)}}<span class="small text-muted"></span></h6>
                    <p class="mb-0 text-muted">Total Inscrito</p>
                  </div>
                  <div class="col-md-6 pt-4">
                    <h6 class="mb-0">{{$candidatos->cadastrados_hoje}}<span class="small text-muted"></span></h6>
                    <p class="mb-0 text-muted">Hoje</p>
                  </div>
                </div> <!-- .row -->
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col-md -->
        </div> <!-- .row -->

      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->

@endsection