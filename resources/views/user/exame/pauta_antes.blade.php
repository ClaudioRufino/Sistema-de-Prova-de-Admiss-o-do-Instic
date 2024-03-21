<link rel="stylesheet" href="{{url('light/css/feather.css')}}">
<link rel="stylesheet" href="{{url('light/css/app-light.css')}}" id="lightTheme">

<div class="wrapper vh-100">
    <div class="align-items-center h-100 d-flex w-50 mx-auto">
      <div class="mx-auto text-center">
        <h1 class="display-1 m-0 font-weight-bolder text-muted" style="font-size:80px;"><i class="fe fe-eye-off"></i></h1>
        <h1 class="mb-1 text-muted font-weight-bold">Pauta não disponível!</h1>
        <h6 class="mb-3 text-muted">Os resultados finais só estarão disponíveis depois das provas serem realizados!</h6>
        
        <a href="{{route('candidato.index')}}" class="btn btn-lg btn-primary px-5">Voltar na Home</a>
      </div>
    </div>
  </div>

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

    setTimeout(() => {
        window.location.href = '/pauta';
    }, segundos);

  </script>
