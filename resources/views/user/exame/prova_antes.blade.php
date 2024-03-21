@extends('layout.container.pagina');
@section('title', 'prova');

    @section('conteudo')

    <div id="corpo_cronometro">
            <div class="card-body" style="">
                <div class="row align-items-center">
                
                <div class="col">
                    <div id="timer"></div>
                </div>
                
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

        const deadline = ""+data_exame+"T"+hora_inicial;
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
            const timerDisplay = document.getElementById('timer');
            timerDisplay.textContent = `Faltam ${formatTime(days)} dia ${formatTime(hours)}:${formatTime(minutes)}:${formatTime(seconds)}`;
        }

        function formatTime(time) {
            return time < 10 ? `0${time}` : time;
        }

        setTimeout(() => {
            window.location.href = "prova/create";
        }, segundos);

    </script>

    @endsection
   
   
