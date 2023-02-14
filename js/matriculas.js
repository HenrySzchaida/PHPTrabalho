/* JavaScript para a interface de matricula */

function buscarAnos() {
    var xhttp = new XMLHttpRequest();

    //Função para ser executada após a resposta da requisição
    xhttp.onload = function() {
        var anos = this.responseText;
        var anosArray = JSON.parse(anos); //Cria array JS do JSON

        var somAno = document.getElementById('somAno');
        for(var i=0; i<anosArray.length; i++) {
            var option = document.createElement('option');
            option.text = anosArray[i];
            option.value = anosArray[i];
            somAno.add(option);
        }
        
        buscarTurmas();
    }

    xhttp.open('GET', 'turmas_anos.php', true);
    xhttp.send();
}

function buscarTurmas() {
    var idAluno = document.getElementById("txtIdAluno").value;
    var ano = document.getElementById("somAno").value;
    //console.log(idAluno + " - " + ano);

    carregarTurmasDisponiveis(idAluno, ano);
    carregarTurmasMatriculado(idAluno, ano);
}

function carregarTurmasDisponiveis(idAluno, ano) {
    var url = 'matriculas_turmas_disp.php?id_aluno=' + idAluno + '&ano=' + ano;
    var xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
        //Esconde mensagem de erro
        exibeMsgErro('divMsgErro', null);

        var resposta = this.responseText;
        if(resposta.charAt(0) == '[' || resposta.charAt(0) == '{') { //Verifica se é um JSON
            var turmas = JSON.parse(resposta); 
            
            //Busca a tabela
            var tabela = document.getElementById('tabTurmasDisponiveis');
            
            //Elimina o corpa da tabela se existir
            var corpo = tabela.getElementsByTagName('tbody');
            if(corpo && corpo.length > 0)
                tabela.removeChild(corpo[0]);
            
            //Cria o body na tabela
            corpo = document.createElement('tbody');
            tabela.appendChild(corpo);

            //Cria as linhas com os clientes
            var i;
            for(i=0; i<turmas.length; i++) {
                var linha = corpo.insertRow();
                linha.insertCell().innerHTML = turmas[i].idTurma;
                linha.insertCell().innerHTML = turmas[i].codDisciplina + ' - ' + turmas[i].nomeDisciplina;
                linha.insertCell().appendChild(criarBotaoMatricular("Matricular", "btn btn-success", 
                                                    idAluno, turmas[i].idTurma));
            }

        } else { //Se não for um JSON, exibe a mensagem de erro
            exibeMsgErro('divErroTurmaDisp', resposta);
        }
    }
    
    xhttp.open("GET", url, true);
    xhttp.send();
}

function carregarTurmasMatriculado(idAluno, ano) {
    var url = 'matriculas_turmas_mat.php?id_aluno=' + idAluno + '&ano=' + ano;
    var xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
        //Esconde mensagem de erro
        exibeMsgErro('divMsgErro', null);

        var resposta = this.responseText;
        //console.log(resposta);
        if(resposta.charAt(0) == '[' || resposta.charAt(0) == '{') { //Verifica se é um JSON
            var matriculas = JSON.parse(resposta); 
            
            //Busca a tabela
            var tabela = document.getElementById('tabMatriculado');
            
            //Elimina o corpa da tabela se existir
            var corpo = tabela.getElementsByTagName('tbody');
            if(corpo && corpo.length > 0)
                tabela.removeChild(corpo[0]);
            
            //Cria o body na tabela
            corpo = document.createElement('tbody');
            tabela.appendChild(corpo);

            //Cria as linhas com os clientes
            var i;
            for(i=0; i<matriculas.length; i++) {
                var linha = corpo.insertRow();
                linha.insertCell().innerHTML = matriculas[i].turma.idTurma;
                linha.insertCell().innerHTML = matriculas[i].turma.codDisciplina + ' - ' + matriculas[i].turma.nomeDisciplina;
                linha.insertCell().appendChild(criarBotaoRemover("Remover", "btn btn-danger", 
                                                    matriculas[i].idMatricula));
            }

        } else { //Se não for um JSON, exibe a mensagem de erro
            exibeMsgErro('divMsgErro', resposta);
        }
    }

    xhttp.open("GET", url);
    xhttp.send();
}

function criarBotaoMatricular(texto, classeEstilo, idAluno, idTurma) {
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.innerHTML = texto;
    btn.className = classeEstilo;
    btn.addEventListener("click", function() {
        matricularAluno(idAluno, idTurma);
      });
    return btn;
}

function matricularAluno(idAluno, idTurma) {
    //Esconde mensagem de erro
    exibeMsgErro('divMsgErro', null);
    
    var dados =  new FormData();
    dados.append("id_aluno", idAluno);
    dados.append("id_turma", idTurma);
    
    var url = 'matriculas_inc.php';
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url, false);
    xhttp.send(dados);

    var retorno = xhttp.responseText; 
    if(retorno == '')
        buscarTurmas();
    else
        exibeMsgErro('divMsgErro', retorno);
}

function criarBotaoRemover(texto, classeEstilo, idMatricula) {
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.innerHTML = texto;
    btn.className = classeEstilo;
    btn.addEventListener("click", function() {
        removerMatricula(idMatricula);
      });
    return btn;
}

function removerMatricula(idMatricula) {
    //Esconde mensagem de erro
    exibeMsgErro('divMsgErro', null);

    //Exibe mensagem para confirmar a exclusão
    if(! confirm("Confirma a exclusão da matrícula?"))
        return;

    var dados =  new FormData();
    dados.append("id_matricula", idMatricula);
    
    var url = 'matriculas_del.php';
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url, false);
    xhttp.send(dados);

    var retorno = xhttp.responseText; 
    if(retorno == '')
        buscarTurmas();
    else
        exibeMsgErro('divMsgErro', retorno);
}

function exibeMsgErro(idDiv, mensagem) {
    var divErro = document.getElementById(idDiv);
    if(mensagem) {
        divErro.innerHTML = mensagem;
        divErro.style.display = 'block';
    } else
        divErro.style.display = 'none';
}