<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="favicon.ico"> --}}
    <title>Cadastramento - Candidatos</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('light/css/simplebar.css')}}">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('light/css/feather.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('light/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{url('light/css/app-dark.css')}}" id="darkTheme" disabled>
    <style>
        
        .error-message {
            color: #ff0000;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 8pt;
            margin-left: 5px;
        }

    </style>
  </head>
  <body>
    
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-10">
                <form method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div style="display: flex; justify-content:center">
                        <img src="{{url('light/assets/images/isutic-logo.png')}}" alt="logo_isutic" style="width: 150px;">
                    </div>
                    <h5 class="page-title"></h5>
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Instic - Cadastramento</strong>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" 
                                id="nome" 
                                class="form-control"
                                name="nome"
                                required>
                                <span id="nome_mensagem" class="error-message"></span>
                                <br>
                        </div>
                        <div class="form-group mb-3">

                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                class="form-control"
                                name="email"
                                required 
                                >
                                <span id="email_mensagem" class="error-message"></span>
                                <br>
                        </div>
                        <div class="form-group mb-3">
                            <label for="telefone">Telefone</label>
                            <input 
                                 type="number" 
                                 id="telefone" 
                                 class="form-control"
                                 name="telefone"
                                 required
                                 >
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">B.I</label>
                            <input 
                                type="text" 
                                id="bi" 
                                class="form-control" 
                                name="bi"
                                required
                                >
                        </div>
                        </div> 
                        <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input 
                                type="date" 
                                id="example-helping" 
                                class="form-control"
                                name="data_nascimento"
                                required 
                                >
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-select">Selecione o curso</label>
                            <select class="form-control" id="example-select" name="curso">
                            <option value="informatica" selected>Informática</option>
                            <option value="telecomunicacao">Telecomunicacao</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input 
                                type="password" 
                                id="password" 
                                class="form-control"
                                name="password"
                                required 
                                >
                        </div>

                        <div class="form-group mb-3">
                            <label for="confirmar_senha">Confirmar Senha</label>
                            <input 
                                type="password" 
                                id="confirmar_senha" 
                                class="form-control"
                                name="confirmar_senha"
                                required 
                                >
                                <p id="texto_confirmar_senha" class="error-message"></p>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="example-textarea">Descreva suas qualidades</label>
                            <textarea 
                                    class="form-control" 
                                    id="example-textarea" rows="4" 
                                    name="qualidades"
                                    required>
                                </textarea>
                        </div>
                        </div> 
                    </div> 
                    </div>

                    <div class="col-md-6 mb-4">
                    <div class="card shadow" style="background-color:#fff; height:182px; display:flex; justify-content:center">
                        <div class="card-body">
                        <div class="form-group mb-3">

                            <div class="form-group mb-3">
                                <label for="naccionalidade">Nacionalidade</label>
                                
                                    <select class="form-control" name="nacionalidade" id="nacionalidade">
                                        <option value="angola" selected>Angola</option>
                                    </select>
                            </div>
                            
                            <p class="mb-2"><strong>Sexo</strong></p>
                            <div class="custom-control custom-radio">
                                <input 
                                       type="radio" 
                                       id="customRadio1" 
                                       name="sexo"
                                       value="Masculino" 
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input 
                                      type="radio" 
                                      id="customRadio2" 
                                      name="sexo"
                                      value="Feminino" 
                                      class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio2">Feminino</label>
                            </div>
                            
                        </div>
                        </div> 
                    </div> 
                    </div>

                    
                </div> <!-- end section -->
                <div class="form-group mb-3" style="display:flex; justify-content:right">
                    <input 
                        type="submit" 
                        id="cadastrar" 
                        class="form-control btn btn-primary"
                        value="cadastrar" 
                        style="width: 100px"
                        >
                </div>
            </form>
            </div> 
          </div>
        </div>
        
        <script type='text/javascript' src='js/candidato.js'></script>
      </main> <!-- main -->
    </div> <!-- .wrapper -->

    <script>

        /* VALIDAÇÃO DO FORMULÁRIO */

        const candidato = new Candidato();
        const btn_cadastrar = document.getElementById('cadastrar');

         /* Validação de Nome */

        const nomeRegex = /^[a-zA-ZÀ-ÿ][a-zA-ZÀ-ÿ\s]{1,}$/;
        const nome = document.getElementById('nome');
        const nome_mgs = document.getElementById('nome_mensagem');

        nome.addEventListener('blur', (e)=>{

            /* 1- Verifique se está no formato de nome */
            if(nome.value === ""){

            }
            else if(!nomeRegex.test(nome.value)){
                nome_mgs.innerHTML = "Nome não pode começar com número, simbolo especial ou ter um só caracter";
            }
            else{
                nome_mgs.innerHTML = "";
            }
        });

        /* Validação de EMAIL */

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const email = document.getElementById('email');
        const email_mgs = document.getElementById('email_mensagem');

        // const btn_enviar =  document.getElementById('enviar');   

        email.addEventListener('blur', (e)=>{

            /* 1- Verifique se está no formato de email */
            if(emailRegex.test(email.value)){
                const valor = candidato.existeCampo('email', email.value);

                valor.then(
                valor =>{
                    if(valor.existe === true){ // Verifique se o email já existe no banco de dados
                        email_mgs.innerHTML = "Email já existe!";
                        btn_cadastrar.disabled = true;
                    }
                    else{
                        email_mgs.innerHTML = "";
                        btn_cadastrar.disabled = false;
                    }
                })
            }
            else{
                email_mgs.innerHTML = "Formato aceite nome@servico.com";
            }
        });


        const senha = document.getElementById('password');
        const confirmar_senha = document.getElementById('confirmar_senha');

        confirmar_senha.addEventListener('blur', function() {

            if (senha.value!==confirmar_senha.value) {
                document.getElementById('texto_confirmar_senha').textContent = 'As senhas devem ser iguais.';
            } 
        });

        const select_nacionalidade = document.getElementById('nacionalidade');

        async function paises(){
            const response = await fetch('https://restcountries.com/v3.1/all',
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const all = await response.json();
            return all;
        }

        const nacionalidad = paises();

        nacionalidad.then(
            all=>{
                    for (let i = 0; i < all.length; i++) {
                        const option = document.createElement("option");
                        option.value = all[i].name.common; // Valor da opção (pode ser diferente do texto de exibição)
                        option.text = all[i].name.common; // Texto de exibição da opção
                        select_nacionalidade.appendChild(option);
                    }
            }
        )
       


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