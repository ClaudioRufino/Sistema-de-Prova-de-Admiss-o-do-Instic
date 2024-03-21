@extends('layout.container.pagina')
@section('title', 'Prova')


@section('conteudo')

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">

          <h2 class="h5 page-title">Prova</h2>
          <p class="text-muted">Para cada pergunta, a cotação vale 1 valor <br>
            OBS:Clique na pergunta desejada</p>
            <div class="text-right" id="tempo_prova"></div>
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="card shadow">
                  <div class="card-header">
                    <strong class="card-title mb-0" style="color:#007bff">Matemática</strong>
                    <div class="dropdown float-right">
                      <button class="btn bt p-0" type="button" id="rangeDropdown"> 10 Valores </button>
                    </div>
                  </div>
                  <div class="card-body">
                    
                        <form action="{{route('prova.store')}}" method="POST">
                          @csrf
                    
                        @php
                            $cont = 1;
                        @endphp
                        @foreach ($perguntas_mat as $pergunta)

                        <div class="row">  <!-- seção Pergunta -->
                            <div class="col-md-12 mb-4">
                              <div class="accordion w-100" 
                              @php
                                  $id1 = "accordion".$cont;
                                  $id2 = "heading".$cont;
                                  $data_target = "#collapse".$cont;
                                  $aria_controls = "collapse".$cont;
                                  $href = "#collapse".$cont;
                                  $data_parent="#accordion".$cont;
                              @endphp
                               id= @php echo $id1 @endphp>
                                <div class="card shadow">
                                  <div class="card-header" id=@php echo $id2; @endphp>
                                    <a role="button" href=@php echo $href; @endphp data-toggle="collapse" data-target=@php echo $data_target @endphp aria-expanded="false" aria-controls=@php echo $aria_controls; @endphp>
                                      <strong>Pergunta @php echo $cont; @endphp</strong>
                                    </a>
                                  </div>
                                  <div id=@php echo $aria_controls; @endphp class="collapse" aria-labelledby=@php echo $id2; @endphp data-parent=@php echo $data_parent; @endphp>
                                    <div class="card-body"> {{$pergunta->questao}}
                                      <br>
                                      <input
                                      id="input_perguntas" 
                                      type="text" 
                                      placeholder="Resposta" 
                                      name= @php echo "resposta_".$cont; @endphp> 
                                    </div>
                                    
                                  </div>

                                </div>
                               
                              </div>
                            </div>
                          </div> <!-- end section -->

                          @php
                              $cont++;
                          @endphp
                    @endforeach

                      </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                  </div> <!-- /. col -->

                  <div class="col-md-6 mb-4">
                    <div class="card shadow">
                      <div class="card-header">
                        <strong class="card-title mb-0" style="color:#007bff">Física</strong>
                            <div class="dropdown float-right">
                            <button class="btn bt p-0" type="button" id="rangeDropdown"> 10 Valores </button>
                            </div>
                      </div>
                      <div class="card-body">

                        @php
                            $cont = 11;
                            $i = 1;
                        @endphp
                        @foreach ($perguntas_fisica as $pergunta)

                        <div class="row">  <!-- seção Pergunta -->
                            <div class="col-md-12 mb-4">
                              <div class="accordion w-100" 
                              @php
                                  $id1 = "accordion".$cont;
                                  $id2 = "heading".$cont;
                                  $data_target = "#collapse".$cont;
                                  $aria_controls = "collapse".$cont;
                                  $href = "#collapse".$cont;
                                  $data_parent="#accordion".$cont;
                              @endphp
                               id= @php echo $id1 @endphp>
                                <div class="card shadow">
                                  <div class="card-header" id=@php echo $id2; @endphp>
                                    <a role="button" href=@php echo $href; @endphp data-toggle="collapse" data-target=@php echo $data_target @endphp aria-expanded="false" aria-controls=@php echo $aria_controls; @endphp>
                                      <strong>Pergunta @php echo $i; @endphp</strong>
                                    </a>
                                  </div>
                                  <div id=@php echo $aria_controls; @endphp class="collapse" aria-labelledby=@php echo $id2; @endphp data-parent=@php echo $data_parent; @endphp>
                                    <div class="card-body">{{$pergunta->questao}}
                                      <br>

                                      <input 
                                      id="input_perguntas"
                                      type="text" 
                                      placeholder="Resposta" 
                                      name= @php echo "resposta_".$cont; @endphp> 

                                    </div>
                                  </div>
                                </div>
                               
                              </div>
                            </div>
                          </div> <!-- end section -->

                          @php
                              $cont++;
                              $i++;
                          @endphp
                    @endforeach

                    
                  </div> <!-- /.card -->
                </div> <!-- /. col -->
              </div> <!-- end section -->
              
              
              
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div>

          <input type="hidden" name={{$usuario_id}} value="{{$usuario_id}}" id="usuario_id">

          <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
              <span aria-hidden="true">×</span>
            </button>
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body text-center">
                  <p>Tens a certeza de que desejas prosseguir? Certifica-se de verificar as suas respostas porque uma vez enviada
                    o processo não poderá ser revertido! </p>
                    <input type="submit" class="btn btn-primary btn-lg mb-2 my-2 my-sm-0" value="Enviar">
                </div>
              </div>
            </div>
          </div> <!-- small modal -->

        </form>
        <div style="display:flex; justify-content:center">
              <button  class="btn btn-primary" data-toggle="modal" data-target=".modal-full">Enviar Respostas </button>
        </div>

    </div> <!-- .container-fluid -->

    <input type="hidden" name="data_exame" id="data_exame" value="{{$data}}">
    <input type="hidden" name="tempo_inicial" id="tempo_inicial" value="{{$hora_inicial}}">
    <input type="hidden" name="tempo_inicial" id="tempo_final" value="{{$hora_final}}">

    <script>
      window.onload = function(){
            startTimer();
        }

        const data_exame = document.getElementById('data_exame').value;
        const hora_inicial = document.getElementById('tempo_inicial').value;
        const hora_final = document.getElementById('tempo_final').value;

        const deadline = ""+data_exame+"T"+hora_final;
        // alert("Chegou no tempo final");
        let targetDate = new Date(deadline); // Defina a data e hora alvo aqui
        let interval;

        const atual = new Date();

        const segundos = Math.floor(targetDate - atual);

        function startTimer() {
            interval = setInterval(updateTimer, 1000);
        }

        function updateTimer() {
            const currentDate = new Date();
            const timeRemaining = targetDate - currentDate;

            if (timeRemaining <= 0) {
                clearInterval(interval);
                updateDisplay(0, 0, 0, 0);
                return;
            }

            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            updateDisplay(days, hours, minutes, seconds);
        }

        function updateDisplay(days, hours, minutes, seconds) {
            const timerDisplay = document.getElementById('tempo_prova');
            let span = document.createElement('span');
            let i = document.createElement('i');
            i.classList.add("fe", "fe-16", "fe-clock", "text-warning");
            span.appendChild(i);
            timerDisplay.innerHTML = span.innerHTML + `  ${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
        }

        function formatTime(time) {
            return time < 10 ? `0${time}` : time;
        }
        
        var id = document.getElementById('usuario_id').value;
        setTimeout(() => {
            window.location.href = '/prova_depois/' + encodeURIComponent(id);
        }, segundos);

    </script>


@endsection