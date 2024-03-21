@extends('layout.container.pagina')
@section('title', 'Perfil')


@section('conteudo')
    
<div class="row" style="display:flex; justify-content:center">
<div class="col-8">
    <div class="card card-fill timeline">
      <div class="card-header">
        <strong class="card-title">Perfil</strong>
        <a class="float-right small text-muted" href="#!" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Editar Perfil</a>
      </div>
      <div class="card-body">
        <h6 class="text-uppercase text-muted mb-4">Dados Pessoais</h6>
        <div class="pb-3 timeline-item item-primary">
          <div class="pl-5">
            <div class="mb-1"><strong>Nome</strong><span class="text-muted small mx-2">{{$candidato_dados->nome}}</span>
            <p class="small text-muted"></p>
          </div>
        </div>
        </div>

        <div class="pb-3 timeline-item item-warning">
          <div class="pl-5">
            <div class="mb-3"><strong>Email</strong><span class="text-muted small mx-2">{{$candidato_dados->email}}</span> 
            <p class="small text-muted"></span></p>
          </div>
        </div>
        </div>

        <div class="pb-3 timeline-item item-success">
          <div class="pl-5">
            <div class="mb-3"><strong>Curso</strong><span class="text-muted small mx-2">{{$candidato_dados->curso}}</span>
                <p class="small text-muted"></span></p>
            </div>
           
          </div>
        </div>

        <div class="pb-3 timeline-item item-primary">
            <div class="pl-5">
              <div class="mb-1"><strong>Telefone</strong><span class="text-muted small mx-2">{{$candidato_dados->telefone}}</span>
              <p class="small text-muted"></p>
            </div>
          </div>
        </div>

        <div class="pb-3 timeline-item item-primary">
            <div class="pl-5">
              <div class="mb-1"><strong>Nacionalidade</strong><span class="text-muted small mx-2">{{$candidato_dados->nacionalidade}}</span>
              <p class="small text-muted"></p>
            </div>
          </div>
        </div>

        <div class="pb-3 timeline-item item-primary">
            <div class="pl-5">
              <div class="mb-1"><strong>Data de nascimento</strong><span class="text-muted small mx-2">{{$candidato_dados->data_nascimento}}</span>
              <p class="small text-muted"></p>
            </div>
          </div>
        </div>

        <div class="pb-3 timeline-item item-success">
          <div class="pl-5">
            <div class="mb-3"><strong>Descrição das tuas qualidades</strong></div>
            <div class="card d-inline-flex mb-2">
              <div class="card-body bg-light py-2 px-3"> {{$candidato_dados->qualidades}}. </div>
            </div>
            </p>
          </div>
        </div>

        {{-- Criação do Modal --}}
        <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true" style="height:550px; overflow: auto">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="{{route('candidato.update', 4)}}" method="POST">
                @method('PUT')
                @csrf
        
              <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">Editar Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" value="{{$candidato_dados->nome}}" name="nome">
                  </div>
                  <div class="form-group">
                    <label for="recipient-email" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="recipient-email" value="{{$candidato_dados->email}}" name="email">
                  </div>
                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Curso</label>
                    <select class="form-control" id="message-text" name="curso">
                      <option value="informatica" selected>Informática</option>
                      <option value="telecom">Telecomunicação</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="message-text" name="data_nascimento" value="{{$candidato_dados->data_nascimento}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Nacionalidade</label>
                    <input type="text" class="form-control" id="message-text" value="{{$candidato_dados->nacionalidade}}" name="nacionalidade">
                  </div>
                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Telefone:</label>
                    <input class="form-control" id="message-text" value="{{$candidato_dados->telefone}}" name="telefone">
                  </div>
                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição das tuas qualidades:</label>
                    <textarea class="form-control" id="message-text" name="descricao"></textarea>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn mb-2 btn-primary">Atualizar</button>
                </div>
              </div>
            </form>

            </div>
          </div>
          
      </div> <!-- / .card-body -->
    </div> <!-- / .card -->
  </div> <!-- .col-12 -->
</div>
@endsection