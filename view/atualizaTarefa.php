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
    $vr_dscTarefa = trim($_POST['dscTarefa']);
    $vr_dscConteudo = trim($_POST['dscConteudo']);
    $vr_idSituacao = trim($_POST['idSituacao']);

    // Query que efetua a exclusão
    $sqlExcluirTarefa = "UPDATE tarefa SET dscTarefa = " . $vr_dscTarefa . ",dscConteudo = ".$vr_dscConteudo."WHERE idTarefa = ".$idTarefa;
   
    // Verificação de status da deleção
    if (!(mysqli_query($con, $sqlExcluirTarefa))) {
       echo "Error(Tarefa): " . $sqlIdTarefa . "<br>" . mysqli_error($con);
    }
    
    // Fecha conexão com o BD  
    mysqli_close($con);
?>