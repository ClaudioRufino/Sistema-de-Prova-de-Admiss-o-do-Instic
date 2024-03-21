<style>
    .error-message {
        color: #ff0000;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 10pt;
    }
    #results{
        margin-left: 93px;
        margin-top:2px;
        padding: 4px;
        width: 175px;
        border: 1px sollid #ddd;
    }
</style>
<script type='text/javascript' src='js/candidato.js'></script>
<h2>View Teste</h2>


<form action="" method="post">
    <input 
          type="text" 
          id="nome" 
          placeholder="Entre com nome" 
          required>
    <span id="nome_mensagem" class="error-message"></span>
    <br>
    

    {{-- id="nacionalidade" --}}
    
    <input type="submit" id="enviar">
</form>
{{-- <div class="alert alert-danger" role="alert"><span id="nome_mensagem"></span></div> --}}




{{-- <label for="countrySearch">Procurar país:</label>
<input type="text" id="countrySearch" placeholder="Digite o nome do país..."> <br>  
<select name="nacionalidade" id="results"> </select>  --}}
{{-- <ul id="results"></ul> --}}
{{-- <div ></div> --}}

<script>
const regex = /^9\d{8}$/; /* Regra de número */


    // const candidato = new Candidato();

    // const select_nacionalidade = document.getElementById('results');
        //   select_nacionalidade.innerHTML = ""; 

    // for (let i = 0; i < 3; i++) {
    //     const option = document.createElement("option");
    //     option.value = 'testeValor'; // Valor da opção (pode ser diferente do texto de exibição)
    //     option.text = 'testeNome'; // Texto de exibição da opção
    //     select_nacionalidade.appendChild(option);
    // }

    async function paisesA(){
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

    const teste = paisesA();

    teste.then(
        all=>{
            for (let i = 0; i < all.length; i++) {
                const option = document.createElement("option");
                option.value = all[i].name.common; // Valor da opção (pode ser diferente do texto de exibição)
                option.text = all[i].name.common; // Texto de exibição da opção
                select_nacionalidade.appendChild(option);
            }
        }
    )


    const paises = ["Brasil", "Estados Unidos", "Canadá", "França", "Alemanha", 'Portugal', 'Piru', "Angola"];

    const input = document.getElementById("countrySearch");
    const resultsList = document.getElementById("results");
        

    // Função para filtrar os países com base na entrada do usuário
    function filtrarPaises(palavraChave) {
        return paises.filter(pais => pais.toLowerCase().startsWith(palavraChave.toLowerCase()));
    }

    // Função para atualizar a lista de resultados
    function atualizarResultados() {
    const entrada = input.value;
    const paisesFiltrados = filtrarPaises(entrada);

    // Limpa a lista antes de atualizar
    resultsList.innerHTML = "";

  // Adiciona os resultados filtrados à lista
  paisesFiltrados.forEach(pais => {
    // const li = document.createElement("li");
    // li.textContent = pais;
    const option = document.createElement("option");
          option.value = pais; // Valor da opção (pode ser diferente do texto de exibição)
          option.text = pais;
    resultsList.appendChild(option);
  });
}

// Adiciona um evento de escuta para o campo de entrada
input.addEventListener("input", atualizarResultados);








    // const nomeRegex = /^[a-zA-ZÀ-ÿ][a-zA-ZÀ-ÿ\s]{1,}$/;
    // const nome = document.getElementById('nome');
    // const nome_mgs = document.getElementById('nome_mensagem');

    // const btn_enviar =  document.getElementById('enviar');   

    // nome.addEventListener('blur', (e)=>{

    //     /* 1- Verifique se está no formato de nome */
    //     if(!nomeRegex.test(nome.value)){
    //         nome_mgs.innerHTML = "Nome não pode começar com número ou simbolo especial ou ter um só caracter";
    //     }
    // });


    // const nomeRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    // const nome = document.getElementById('nome');
    // const nome_mgs = document.getElementById('nome_mensagem');

    // const btn_enviar =  document.getElementById('enviar');   

    // nome.addEventListener('blur', (e)=>{

    //         /* 1- Verifique se está no formato de nome */
    //         if(nomeRegex.test(nome.value)){
    //             const valor = candidato.existeCampo('nome', nome.value);

    //             valor.then(
    //             valor =>{
    //                 if(valor.existe === true){ // Verifique se o nome já existe no banco de dados
    //                     nome_mgs.innerHTML = "nome já existe!";
    //                 }
    //             })
    //         }
    //         else{
    //             nome_mgs.innerHTML = "Formato aceite nome@servico.com";
    //         }

            
    //         // console.log(error)
    // });




    
    // const dados ={
    //     nome:'testeJOSN',
    //     nome:'teste@gmail.com',
    //     password:123456789,
    //     telefone:'909999304',
    //     curso:'TesteInformatica',
    //     data_nascimento:'2023-12-12',
    //     bi:'12323',
    //     sexo:'M',
    //     nacionalidade:'Teste',
    //     qualidades:'Amoroso',
    //     exame_id:1
    // }
    

    

</script>