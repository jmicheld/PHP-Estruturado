<?php
    /**
    *Autor: Jean Michel Deschamps
    *Data: 12/05/2020
    *Descrição: Arquivo para edição de tarefas
    */

    // Arquivo de conexão padrão com o bd
    include_once("../includes/connection.php");

    // Recebe variável enviada    
    $idTarefa = trim($_POST['idTarefa']);

    // Query que efetua a exclusão
    $sqlTarefa = "SELECT tarefa.idTarefa
                        ,tarefa.dscTarefa
                        ,tarefa.dscConteudo
                        ,tarefasituacao.idSituacao
                        ,situacao.dscSituacao
                    FROM tarefa
                    JOIN tarefasituacao
                      ON tarefa.idTarefa = tarefasituacao.idTarefa
                    JOIN situacao
                      ON tarefasituacao.idSituacao = situacao.idSituacao WHERE tarefa.idTarefa = ".$idTarefa;
   
    // Verificação de status da deleção
    $rsTarefa = mysqli_query($con, $sqlTarefa);
    $tarefa = mysqli_fetch_assoc($rsTarefa);

    // Query de consultas de status    
    $sqlSituacao = "SELECT idSituacao, dscSituacao FROM situacao;";
    $rsSituacao = mysqli_query($con, $sqlSituacao);
    
?>
    <!-- Exibição das informações da tarefa selecionada -->
    <div class="container" id="divForm" name="divForm">
        <div class="row justify-center">
            <div class="col-12">                
                <div>
                    <input type="hidden" id="hdnIdTarefa" name="hdnIdTarefa" value="<?php echo($tarefa["idTarefa"]); ?>" >
                    <br>
                    <b>Tarefa:</b>
                    <input id="txtDscTarefaUpdate" name="txtDscTarefaUpdate" type="text" class="form-control" value="<?php echo(utf8_encode($tarefa['dscTarefa'])); ?>" >
                    <br>
                    <b>Status:</b>
                    <br>
                    <select class="custom-select" id="slcSituacaoUpdate" name="slcSituacaoUpdate">
                        <option value="0" selected>Selecione...</option>
                        <?php while($situacao = $rsSituacao->fetch_array()) { ?>                                
                            <option value="<?php echo $situacao['idSituacao']; ?>" 
                            <?php
                                if($tarefa['idSituacao'] == $situacao['idSituacao']){
                                    echo " selected ";
                                }
                            ?>
                            ><?php echo utf8_encode($situacao['dscSituacao']); ?></option> 
                        <?php } ?>
                    </select>
                    <br><br>
                    <b>Descri&ccedil;&atilde;o:</b>
                    <input id="txtDscConteudoUpdate" name="txtDscConteudoUpdate" type="text" value="<?php echo(utf8_encode($tarefa['dscConteudo'])); ?>" class="form-control" aria-describedby="basic-addon2">
                    <br>
                </div>
            </div>
        </div>
    </div>

<?php
    // Fecha conexão com o BD  
    mysqli_close($con);
?>    