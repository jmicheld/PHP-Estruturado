/**
    Autor: Jean Michel Deschamps
    Data: 11/05/2020
    Descrição: Arquivo de script javascript
*/

var vr_count = 0;

/**
  * Função para validação do formulário de inclusão dos dados
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function validaForm(){

    //Recebe os valores dos campos nos formulários
    var nmTarefa  = $("#txtTarefa").val();
    var dscTarefa = $("#txtDescricao").val();
    var intStatus = $("#slcStatus").val();

    if($.trim(nmTarefa) == '' || $.trim(nmTarefa) == undefined){ // Valida o nome da tarefa
        alert("Informe o nome da tarefa.");
        $("#txtTarefa").focus();
        return;
    }else if($.trim(dscTarefa) == '' || $.trim(dscTarefa) == undefined) { // Valida a descrição da tarefa
        alert("Informe a descrição nome da tarefa.");
        $("#txtDescricao").focus();
        return;
    }else if($.trim(intStatus) == 0 || $.trim(intStatus) == undefined || $.trim(intStatus) == null) { // Valida o status da tarefa
        alert("Informe o status da tarefa.");
        $("#slcStatus").focus();
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
    var nmTarefa  = $("#txtTarefa").val();
    var dscTarefa = $("#txtDescricao").val();
    var dscStatus = $("#slcStatus option:selected").html();
    var intStatus = $("#slcStatus").val();

    vr_count += 1;
   
    // Informações adicionados que serão incluídas na tabela para exibição ao usuário
    linha = '<tr id=tr'+vr_count+'><td>';
    linha += vr_count;
    linha += '</td><td>';
    linha += nmTarefa;
    linha += '</td><td>';
    linha += dscStatus;
    linha += '</td><td>';
    linha += '<img src="images/add.jpg" onClick="infoTarefa(' + vr_count + ');" style="cursor: pointer;" />';
    linha += '</td><td>';	
	linha += '<svg class="bi bi-x-octagon-fill" style="cursor: pointer;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">';
    linha += '<path fill-rule="evenodd" d="M11.46.146A.5.5 0 0011.107 0H4.893a.5.5 0 00-.353.146L.146 4.54A.5.5 0 000 4.893v6.214a.5.5 0 00.146.353l4.394 4.394a.5.5 0 00.353.146h6.214a.5.5 0 00.353-.146l4.394-4.394a.5.5 0 00.146-.353V4.893a.5.5 0 00-.146-.353L11.46.146zm.394 4.708a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd" onclick="removeTarefa(this);" />';
    linha += '</svg>';
    linha += '</td></tr>';

    // ATribui as informações a tabela que contém as tarefas    
    $('#tblTarefas').append(linha);

    //Limpar o form após inclusão de dados na tabela 
    $('#frmTarefas')[0].reset();

}

 /**
  * Função para remover registros de tarefas na lista de exibição do usuário
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function removeTarefa(obj) {
    if(confirm("Deseja realmente excluir esta tarefa?")){
        $(obj).closest('tr').remove();
    }
}

/**
  * Função para exibir informações complementares das tarefas
  * @author: Jean Michel
  * Data: 11/05/2020
  **/
function infoTarefa(linha) {
    vr_conteudo = null;
    $("#btnModal").click();
    vr_nomeTarefa = $("#tr" + linha + " td:nth-child(2)").text();
    vr_statusTarefa = $("#tr" + linha + " td:nth-child(3)").text();
    $("#telaModalLabel").html(vr_nomeTarefa);

    vr_conteudo  = 'Descrição: <input id="txtDescricaoTarefa" name="txtDescricaoTarefa" type="text" class="form-control" placeholder="Descrição da Tarefa..." aria-label="Add an item" aria-describedby="basic-addon2">';  
    vr_conteudo += '<br>Status: ' + vr_statusTarefa;
    vr_conteudo += '<br>Data de Entrega: <input type="text" id="datepicker">'; 
    vr_conteudo += '<script>$("#datepicker" ).datepicker();</script>';
    

    $("#conteudoTarefa").html(vr_conteudo);

}