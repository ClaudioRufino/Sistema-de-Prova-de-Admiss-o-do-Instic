@extends('layout.container.pagina_admin')
@section('title', 'Cadastro de Perguntas')


@section('conteudo')

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">

          <h2 class="h5 page-title">Cadastrar Perguntas</h2>
          <p class="text-muted">Para cada pergunta, a cotação vale 1 valor</p>
           
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

                        
                        <form action="{{route('pergunta.update')}}" method="POST"> 
                          @csrf
                    
                        @php
                            $cont = 1;
                        @endphp

                      @for ($i = 1; $i <= 10; $i++)
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
                                    <div class="card-body">
                                      <textarea 
                                          type="text"
                                          class="form-control" 
                                          id="input_perguntas" 
                                          name="<?php echo "pergunta_".$cont;?>"
                                          value="{{1}}"
                                          required
                                          >
                                        </textarea>
                                          <input class="form-control mt-2" 
                                                 type="text" name="<?php echo "resposta_".$cont;?>" placeholder="Resposta do sistema">

                                    </div>
                                    
                                  </div>

                                </div>
                               
                              </div>
                            </div>
                          </div>

                          @php
                              $cont++;
                          @endphp
                    @endfor

                        

                      </div> 
                    </div> 
                  </div>

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
                        @endphp
                        @for ($i = 1; $i <= 10; $i++)
                        
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
                                    <div class="card-body">
                                      <textarea 
                                          type="text"
                                          class="form-control" 
                                          id="input_perguntas"
                                          value="2" 
                                          name="<?php echo "pergunta_".$cont;?>"
                                          required>
                                      </textarea>
                                      <input class="form-control mt-2" 
                                              type="text" 
                                              value="{{$perguntas[0]->questao}}"
                                              name="<?php echo "resposta_".$cont;?>" 
                                              placeholder="Resposta do sistema">

                                    </div>
                                  </div>
                                </div>
                               
                              </div>
                            </div>
                          </div> <!-- end section -->

                          @php
                              $cont++;
                          @endphp

                      @endfor

                    
                  </div> 
                </div> 
              </div>
              
              
            </div>
          </div>
        </div>

          <input type="hidden" name="id_candidato" value="1" id="id_candidato">

          <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
              <span aria-hidden="true">×</span>
            </button>
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body text-center">
                  <h2>Deseja Avançar?</h2>
                    <input type="submit" class="btn btn-primary btn-lg mb-2 my-2 my-sm-0" value="Enviar">
                </div>
              </div>
            </div>
          </div> <!-- small modal -->

        </form>
        <div style="display:flex; justify-content:center">
              <button  class="btn btn-primary" data-toggle="modal" data-target=".modal-full">Enviar Perguntas</button>
        </div>

    </div> <!-- .container-fluid -->

@endsection