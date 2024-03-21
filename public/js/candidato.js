function Candidato(){
    this.nome;
    this.email;
}

Candidato.prototype={

    index: async function(){

		try{
            var mgs = "Erro ao acessar o Banco de dados";
            const resposta = await fetch('http://localhost:8000/api/usuarios');
            const usuarios = await resposta.json();
            return usuarios;
        }catch(error){
            return error + mgs;
        }
	}
    ,
    store: async function(dados){
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/usuarios',
            {
                method:'post',
                headers: {
                    'Accept': 'application/json'
                },
                body: JSON.stringify(dados)
            });
            const usuarios = await resposta.json();
            return usuarios;
        }catch(error){
            return error;
        }
    }
    ,
    show: async function(id){
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/usuarios/'+ id,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const usuarios = await resposta.json();
            return usuarios;
        }catch(e){
            console.log(mgs);
        }
    }
    ,
    update: function(){
        alert("Atualizando...");
    }
    ,
    destroy: function(){
        alert("Apagando...")
    }
    , 
    existeCampo: async function(campo, valor){
        try{
            var mgs = 'Erro ao acessar o Banco de dados';
            const resposta = await fetch('http://localhost:8000/api/procurar/'+ campo + "/" + valor,
            {
                method:'get',
                headers: {
                    'Accept': 'application/json'
                }
            });
            const usuarios = await resposta.json();
            return usuarios;
        }catch(e){
            console.log(mgs);
        }
    }



}

