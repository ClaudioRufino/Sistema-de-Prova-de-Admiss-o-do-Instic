@extends('layout.container.pagina')
@section('title', 'Nota Individual')


@section('conteudo')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title" style="color:#6c757d; font-size:10pt">{{ $candidato->nome }}<br/>BI:{{ $candidato->bi }}</h2>
          </div>
          <div class="col-auto">
            <form action="{{route('notaFinal_imprimir', $candidato->id)}}" method="get">
                <button type="submit" class="btn" style="background-color: #007bff; color:white">Gerar pdf</button>
            </form>
          </div>
        </div>
        <div class="card shadow" style="height:500px; overflow: auto">
          <div class="card-body p-5">
            <div class="row mb-1">
              <div class="col-12 text-center mb-4">
                <img src="{{url('light/assets/images/logo.svg')}}" class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                <h2 class="mb-0 text-uppercase">Nota Final</h2>
                <p style="font-size:20pt;">{{$nota}}</p> 
              </div>
            </div> <!-- /.row -->

            <table class="table table-borderless table-striped">
              <thead>
                <tr>
                  <th style="color:#007bff" scope="col">Nº</th>
                  <th scope="col" style="color:#007bff">Pergunta</th>
                  <th scope="col" class="text-right" style="color:#007bff">Sistema</th>
                  <th scope="col" class="text-right" style="color:#007bff">Candidato</th>
                  <th scope="col" class="text-right" style="color:#007bff">Estado</th>
                </tr>
              </thead>
              <tbody>
                
                @php
                    $cont = 1;
                @endphp
                @foreach ($perguntas_mat as $mat)
                    
                    <tr>
                        <th scope="row" style="font-size: 10pt"> @php echo $cont @endphp</th>
                        <td> 
                            <span class="small" style="color:black"> {{$mat->questao}}</span>
                        </td>
                        <td class="text-center" style="font-size: 10pt; color:black">{{ $mat->sistema_resposta}}</td>
                        <td class="text-center" style="font-size: 10pt; color:black">{{ $c_respostas[$cont-1]->candidato_resposta}}</td>

                        @if (strcasecmp($mat->sistema_resposta, $c_respostas[$cont-1]->candidato_resposta) == 0)
                            <td class="text-center" style="font-size: 10pt; color:rgb(12, 241, 12)"><i class="fe fe-check fe-16"></i></td>
                        @else
                            <td class="text-center" style="font-size: 10pt; color:rgb(236, 11, 11)"><i class="fe fe-x fe-16"></i></td>
                        @endif
                    </tr>

                    @php
                        $cont++;
                    @endphp
                @endforeach

                @php
                    $cont = 11;
                @endphp

                @foreach ($perguntas_fisica as $fisica)
                    
                    <tr>
                        <th scope="row" style="font-size: 10pt;"> @php echo $cont @endphp</th>
                        <td> 
                            <span class="small" style="color:black"> {{$fisica->questao}}</span>
                        </td>
                        <td class="text-center" style="font-size: 10pt; color:black">{{ $fisica->sistema_resposta}}</td>
                        <td class="text-center" style="font-size: 10pt; color:black">{{ $c_respostas[$cont-1]->candidato_resposta}}</td>

                        @if (strcasecmp($fisica->sistema_resposta, $c_respostas[$cont-1]->candidato_resposta) == 0)
                            <td class="text-center" style="font-size: 10pt; color:rgb(12, 241, 12)"><i class="fe fe-check fe-16"></i></td>
                        @else
                            <td class="text-center" style="font-size: 10pt; color:rgb(236, 11, 11)"><i class="fe fe-x fe-16"></i></td>
                        @endif
                    </tr>

                    @php
                        $cont++
                    @endphp

                @endforeach

                
              </tbody>
            </table>
           
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->

@endsection



