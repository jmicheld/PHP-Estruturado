<?php
    /**
    *Autor: Jean Michel Deschamps
    *Data: 12/05/2020
    *Descrição: Arquivo para exclusão de tarefas
    */

    // Arquivo de conexão padrão com o bd
    include_once("../includes/connection.php");
  
    // Recebe variável enviada    
    $idTarefa = trim($_POST['idTarefa']);

    // Query que efetua a exclusão
    $sqlExcluirTarefa = "DELETE FROM tarefa WHERE idTarefa = ".$idTarefa;
   
    // Verificação de status da deleção
    if (!(mysqli_query($con, $sqlExcluirTarefa))) {
       echo "Error(Tarefa): " . $sqlIdTarefa . "<br>" . mysqli_error($con);
    }
    
    // Fecha conexão com o BD  
    mysqli_close($con);
?>