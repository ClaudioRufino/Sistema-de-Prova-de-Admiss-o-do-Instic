<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="favicon.ico"> --}}
    <title>Editar Exame</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('light/css/simplebar.css')}}">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('light/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('ligh/tcss/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('light/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{url('light/css/app-dark.css')}}" id="darkTheme" disabled>
    <style>
        .erro {
            color: red;
            font-size: 9pt;
            font-family: monospace;
        }
    </style>
  </head>
  <body>
    
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-10">
                <form method="GET" action="{{ route('exame.update') }}" >
                    @csrf
                    <div style="display: flex; justify-content:center">
                        <img src="{{url('light/assets/images/isutic-logo.png')}}" alt="logo_isutic" style="width: 150px;">
                    </div>
                    <h5 class="page-title"></h5>
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Instic - Editar Exame</strong>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="nome">Ano Letivo</label>
                            <select name="ano" class="form-control" id="ano" required>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>

                        

                        <div class="form-group mb-3">

                            <label for="vaga">Número de Vagas</label>
                            <input 
                                type="number" 
                                id="vaga" 
                                class="form-control"
                                name="vaga"
                                value="{{$dados_exame[0]->vagas}}"
                                required 
                                >
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-password">Data do Exame</label>
                            <input 
                                 type="date" 
                                 id="data" 
                                 class="form-control"
                                 name="data"
                                 value="{{$dados_exame[0]->exame_data}}"
                                 required
                                 >
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Preço por Cadeira</label>
                            <input 
                                type="number" 
                                id="preco" 
                                class="form-control" 
                                name="preco"
                                value="{{$dados_exame[0]->preco}}"
                                required
                                >
                        </div>
                        </div> 
                        <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="hora_inicio">Horário de Início</label>
                            <input 
                                type="time" 
                                id="hora_inicio" 
                                class="form-control"
                                name="hora_inicio"
                                value="{{$dados_exame[0]->exame_hora_inicio}}"
                                required 
                                >
                        </div>

                        <div class="form-group mb-3">
                            <label for="hora_termino">Horário de Término</label>
                            <input 
                                type="time" 
                                id="hora_termino" 
                                class="form-control"
                                name="hora_termino"
                                value="{{$dados_exame[0]->exame_hora_termino}}"
                                required 
                                >
                        </div>
                        
                        </div>
                    </div>
                    </div>
                </div> 

                <div class="row">
                    
                    
                </div> <!-- end section -->
                <div class="form-group mb-3" style="display:flex; justify-content:center">
                    <input 
                        type="submit" 
                        id="example-helping" 
                        class="form-control btn btn-primary"
                        value="Atualizar" 
                        style="width: 100px"
                        >
                </div>
            </form>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        

      </main> <!-- main -->
    </div> <!-- .wrapper -->

    <script>
        const senha = document.getElementById('password');
        const confirmar_senha = document.getElementById('confirmar_senha');

        confirmar_senha.addEventListener('blur', function() {

            if (senha.value!==confirmar_senha.value) {
                document.getElementById('texto_confirmar_senha').textContent = 'As senhas devem ser iguais.';
            } 
        });


    </script>
    <script src="{{url('light/js/jquery.min.js')}}"></script>
    <script src="{{url('light/js/popper.min.js')}}"></script>
    <script src="{{url('light/js/moment.min.js')}}"></script>
    <script src="{{url('light/js/bootstrap.min.js')}}"></script>
    <script src="{{url('light/js/simplebar.min.js')}}"></script>
    <script src='{{url('light/js/daterangepicker.js')}}'></script>
    <script src='{{url('light/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{url('light/js/tinycolor-min.js')}}"></script>
    <script src="{{url('light/js/config.js')}}"></script>
    <script src="{{url('light/js/apps.js')}}"></script>
  </body>
</html>