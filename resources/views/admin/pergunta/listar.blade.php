@extends('layout.container.pagina_admin')
@section('title', 'Perfil')


@section('conteudo')
    
<div class="row" style="display:flex; justify-content:center">
<div class="col-12">
    <div class="card card-fill timeline">
      <div class="card-header">
        <strong class="card-title">Todas as perguntas</strong>
        <a class="float-right small text-muted" href="{{route('pergunta.edit')}}">Editar Perguntas</a>
      </div>
      <div class="card-body">

        <h6 class="text-uppercase text-muted mb-4">Perguntas de Matemática</h6>
        <!-- Lista de Matemátrica-->
        <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Questão</th>
                <th>Cotação</th>
                <th>Disciplina</th>
                <th>Resposta do sistema</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($perguntas_de_matematica as $mat)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <th>{{$mat->id}}</th>
                <th>{{$mat->questao}}</th>
                <th class="text-center">{{$mat->cotacao}}</th>
                <th class="text-center">{{$mat->disciplina}}</th>
                <th class="text-center">{{$mat->sistema_resposta}}</th>
              </tr>
            @endforeach
                     
            </tbody>
          </table>
          
          <!-- Lista de perguntas de Física-->
          <h6 class="text-uppercase text-muted mb-4">Perguntas de Física</h6>
        <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Questão</th>
                <th>Cotação</th>
                <th>Disciplina</th>
                <th>Resposta do sistema</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($perguntas_de_fisica as $fisica)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <th>{{$fisica->id}}</th>
                <th>{{$fisica->questao}}</th>
                <th class="text-center">{{$fisica->cotacao}}</th>
                <th class="text-center">{{$fisica->disciplina}}</th>
                <th class="text-center">{{$fisica->sistema_resposta}}</th>
              </tr>
            @endforeach
                     
            </tbody>
          </table>

        
          
      </div> <!-- / .card-body -->
    </div> <!-- / .card -->
  </div> <!-- .col-12 -->
</div>
@endsection