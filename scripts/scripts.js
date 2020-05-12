/**
    Autor: Jean Michel Deschamps
    Data: 11/05/2020
    Descrição: Arquivo de script javascript
*/

/**
  * Função para validação do formulário de inclusão dos dados
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function validaForm(){

    //Recebe os valores dos campos nos formulários
    var dscTarefa  = $("#txtDscTarefa").val();
    var dscConteudo = $("#txtDscConteudo").val();
    var idSituacao = $("#slcSituacao").val();

    if($.trim(dscTarefa) == '' || $.trim(dscTarefa) == undefined){ // Valida o nome da tarefa
        alert("Informe o nome da tarefa.");
        $("#txtDscTarefa").focus();
        return;
    }else if($.trim(dscConteudo) == '' || $.trim(dscConteudo) == undefined) { // Valida a descrição da tarefa
        alert("Informe a descrição nome da tarefa.");
        $("#txtDscConteudo").focus();
        return;
    }else if($.trim(idSituacao) == 0 || $.trim(idSituacao) == undefined || $.trim(idSituacao) == null) { // Valida o status da tarefa
        alert("Informe o status da tarefa.");
        $("#slcSituacao").focus();
        return;
    }else{
        // Caso a validação esteja correta a função para adicionar os dados executada
        addTarefa();
    }
 }

 /**
  * Função para adicionar registros de tarefas na lista de exibição para o usuário
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function addTarefa() {

    //Recebe os valores dos campos nos formulários
    var dscTarefa   = $("#txtDscTarefa").val();
    var dscConteudo = $("#txtDscConteudo").val();
    var idSituacao  = $("#slcSituacao").val();
   
    $.ajax({
        url: 'view/incluirTarefa.php',
        type: 'POST',
        data : {
            dscTarefa: dscTarefa,
            dscConteudo: dscConteudo,
            idSituacao: idSituacao
       },
        dataType: "html",
        success: function(){
            // Atualiza listagem de tarefas   
            carregaListaTarefa(); 
        }
    });    

    //Limpar o form após inclusão de dados na tabela 
    $('#frmTarefas')[0].reset();
}
 /**
  * Função utilizada para listar as tarefas cadastradas
  * @author: Jean Michel
  * Data: 12/05/2020
  **/
 function carregaListaTarefa(){
    $.ajax({
        url: 'view/listaTarefa.php',
        type: 'POST',
        dataType: "html",
        success: function(data){
            $('#divListaTarefas').html(data); 
        }
    });
 }

 /**
  * Função para remover registros de tarefas na lista de exibição do usuário
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function removeTarefa(idTarefa) {
    if(confirm("Deseja realmente excluir esta tarefa?")){
        $.ajax({
            url: 'view/excluirTarefa.php',
            type: 'POST',
            data : {
                idTarefa: idTarefa
           },
            dataType: "html",
            success: function(){
                // Atualiza listagem de tarefas   
                carregaListaTarefa(); 
            }
        });
    }
}

/**
  * Função para edição das tarefas
  * @author: Jean Michel
  * Data: 12/05/2020
  **/
function infoTarefa(idTarefa) {

    $("#btnModal").click();

    $.ajax({
        url: "view/edicaoTarefa.php",
        type: "POST",
        data: {
            idTarefa: idTarefa
        },
        dataType: "html",
        success: function(data){
            $("#conteudoTarefa").html(data);
        }
    });   
}

/**
  * Função para atualizar informações da tarefa
  * @author: Jean Michel
  * Data: 12/05/2020
  **/
 function atualizaTarefa() {

    var idTarefa    = $("#hdnIdTarefa").val();
    var dscTarefa   = $("#txtDscTarefaUpdate").val();
    var idSituacao  = $("#slcSituacaoUpdate").val();
    var dscConteudo = $("#txtDscConteudoUpdate").val();

    $.ajax({
        url: "view/atualizaTarefa.php",
        type: "POST",
        data: {
            idTarefa   : idTarefa,
            dscTarefa  : dscTarefa,
            idSituacao : idSituacao,
            dscConteudo: dscConteudo
        },
        dataType: "html",
        success: function(data){
            // Atualiza listagem de tarefas   
            carregaListaTarefa(); 
        }
    });  

}