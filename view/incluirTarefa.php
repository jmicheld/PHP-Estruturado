<?php
    /**
    *Autor: Jean Michel Deschamps
    *Data: 12/05/2020
    *Descrição: Arquivo para inclusão de tarefas
    */

    // Arquivo de conexão padrão com o bd
    include_once("../includes/connection.php");

    // Recebe variáveis enviadas
    $vr_dscTarefa   = trim($_POST['dscTarefa']);
    $vr_dscConteudo = trim($_POST['dscConteudo']);
    $vr_idSituacao  = trim($_POST['idSituacao']);

    // Query de inclusão
    $sqlInsertTarefa = "INSERT INTO tarefa(dscTarefa, dscConteudo) VALUES('".utf8_decode($vr_dscTarefa)."', '".utf8_decode($vr_dscConteudo)."');";
   
    // Efetua a execução da query e verifica de houve algum errro
    if (mysqli_query($con, $sqlInsertTarefa)) {
        // Pega o ID inserido
        $idTarefa = mysqli_insert_id($con);

        // Insere o status da tarefa
        $sqlInsertTarefaSituacao = "INSERT INTO tarefasituacao(idSituacao, idTarefa, dtRegistro) VALUES('".$vr_idSituacao."', '".$idTarefa."', NOW());";
        if (!(mysqli_query($con, $sqlInsertTarefaSituacao))) {
            echo "Error(Situacao): " . $sqlInsertTarefaSituacao . "<br>" . mysqli_error($con);
        }
      } else {
        echo "Error(Tarefa): " . $sqlInsertTarefa . "<br>" . mysqli_error($con);
      }
    
    // Fecha conexão com o BD  
    mysqli_close($con);

?>