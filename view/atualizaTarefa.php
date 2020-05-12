<?php
    /**
    *Autor: Jean Michel Deschamps
    *Data: 12/05/2020
    *Descrição: Arquivo para atualização de tarefas
    */

    // Arquivo de conexão padrão com o bd
    include_once("../includes/connection.php");
  
    // Recebe variável enviada    
    $idTarefa = trim($_POST['idTarefa']);
    $dscTarefa = trim($_POST['dscTarefa']);
    $idSituacao = trim($_POST['idSituacao']);
    $dscConteudo = trim($_POST['dscConteudo']);

    // Query que efetua a exclusão
    $sqlAtualizarTarefa = "UPDATE tarefa SET dscTarefa = '" . utf8_decode($dscTarefa) . "', dscConteudo = '". utf8_decode($dscConteudo) ."' WHERE idTarefa = ".$idTarefa;
   
    // Verificação de status da deleção
    if (!(mysqli_query($con, $sqlAtualizarTarefa))) {
       echo "Error(Tarefa): " . $sqlIdTarefa . "<br>" . mysqli_error($con);
    }else{
        $sqlAtualizarTarefaSituacao = "UPDATE tarefasituacao SET idSituacao = " . $idSituacao . " WHERE idTarefa = ".$idTarefa.";";
        if (!(mysqli_query($con, $sqlAtualizarTarefaSituacao))) {
            echo "Error(Situacao): " . $sqlAtualizarTarefaSituacao . "<br>" . mysqli_error($con);
         }
    }
    
    // Fecha conexão com o BD  
    mysqli_close($con);
?>