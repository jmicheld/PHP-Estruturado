<?php
    /**
    *Autor: Jean Michel Deschamps
    *Data: 12/05/2020
    *Descrição: Arquivo para listagem de tarefas
    */

    // Arquivo de conexão padrão com o bd
    include_once("../includes/connection.php");
    
    // Query de consultas de status    
    $sqlTarefa = "SELECT tarefa.idTarefa
                        ,tarefa.dscTarefa
                        ,tarefasituacao.idSituacao
                        ,situacao.dscSituacao
                    FROM tarefa
                    JOIN tarefasituacao
                    ON tarefa.idTarefa = tarefasituacao.idTarefa
                    JOIN situacao
                    ON tarefasituacao.idSituacao = situacao.idSituacao;";
    $result = mysqli_query($con, $sqlTarefa);
?>

<!-- Tabela para exibição dos resultados das tarefas -->
<div class="col-12" style="margin-top: 50px; width: 100%;">
    <table class="table table-striped" id="tblTarefas" name="tblTarefas">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Situa&ccedil;&atilde;o</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php while($tarefa = $result->fetch_array()) { ?>                                
            <tr id="tr<?php echo($tarefa['idTarefa']); ?>">
                <td><?php echo($tarefa['idTarefa']); ?></td>
                <td><?php echo(utf8_encode($tarefa['dscTarefa'])); ?></td>
                <td><?php echo(utf8_encode($tarefa['dscSituacao'])); ?></td>
                <td><img src="images/add.jpg" onClick="infoTarefa(<?php echo($tarefa['idTarefa']); ?>);" style="cursor: pointer;" /></td>
                <td><svg class="bi bi-x-octagon-fill" style="cursor: pointer;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0011.107 0H4.893a.5.5 0 00-.353.146L.146 4.54A.5.5 0 000 4.893v6.214a.5.5 0 00.146.353l4.394 4.394a.5.5 0 00.353.146h6.214a.5.5 0 00.353-.146l4.394-4.394a.5.5 0 00.146-.353V4.893a.5.5 0 00-.146-.353L11.46.146zm.394 4.708a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd" onclick="removeTarefa(<?php echo($tarefa['idTarefa']); ?>);" />';
                    </svg>
                </td>
            </tr>
        <?php } ?>                   
        </tbody>
    </table>
</div>