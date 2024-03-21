@extends('layout.container.pagina_admin')
@section('title', 'Perfil')


@section('conteudo')
    
<div class="row" style="display:flex; justify-content:center">
<div class="col-12">
    <div class="card card-fill timeline">
      <div class="card-header">
        <strong class="card-title">Exames</strong>
        <a class="float-right small text-muted" href="{{route('exame.create')}}">Cadastrar</a>
        <a class="float-right small text-muted mr-2" href="{{route('exame.edit')}}" >Editar</a>
      </div>
      <div class="card-body">

          <!-- Lista de perguntas de Física-->
          <h6 class="text-uppercase text-muted mb-4">Dados Referente ao Exame</h6>
        <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Ano</th>
                <th class="text-center">Vagas</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Data do Exame</th>
                <th class="text-center">Hora de Início</th>
                <th class="text-center">Hora de Término</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($exames as $exame)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <th class="text-center">{{$exame->ano}}</th>
                <th class="text-center">{{$exame->vagas}}</th>
                <th class="text-center">{{$exame->preco}}</th>
                <th class="text-center">{{$exame->exame_data}}</th>
                <th class="text-center">{{$exame->exame_hora_inicio}}</th>
                <th class="text-center">{{$exame->exame_hora_termino}}</th>
              </tr>
            @endforeach
                     
            </tbody>
          </table>

        
          
      </div> <!-- / .card-body -->
    </div> <!-- / .card -->
  </div> <!-- .col-12 -->
</div>
@endsection