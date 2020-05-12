<?php
    /**
    * Autor: Jean Michel Deschamps
    * Data: 11/05/2020
    * Descrição: Arquivo de listagem padrão das tarefas
    */
    
    include_once("includes/header.php");

    // Query de consultas de status    
    $sqlSituacao = "SELECT idSituacao, dscSituacao FROM situacao;";
    $result = mysqli_query($con, $sqlSituacao);
    
?> 
    <!-- Listagem das Tarefas -->
    <form id="frmTarefas" name="frmTarefas" method="POST">
        <div class="container" id="divForm" name="divForm">
            <div class="row justify-center">
                <div class="col-12">
                    
                    <div>
                        <h4 style="margin-top: 15px;">Descri&ccedil;&atilde;o Tarefas</h4>
                        <br>
                        Tarefa:
                        <input id="txtDscTarefa" name="txtDscTarefa" type="text" class="form-control" style="width:50%;" placeholder="Nome da Tarefa..." aria-label="Add an item" aria-describedby="basic-addon2">
                        <br>
                        Descrição:
                        <input id="txtDscConteudo" name="txtDscConteudo" type="text" style="width:50%;" class="form-control" placeholder="Descrição..." aria-label="Add an item" aria-describedby="basic-addon2">
                        <br>
                        Status:
                        <br>
                        <select class="custom-select" id="slcSituacao" name="slcSituacao" style="width:50%;">
                            <option value="0" selected>Selecione...</option>
                            <?php while($rsSituacao = $result->fetch_array()) { ?>                                
                                <option value="<?php echo $rsSituacao['idSituacao']; ?>"><?php echo utf8_encode($rsSituacao['dscSituacao']); ?></option> 
                            <?php } ?>
                        </select>
                        <br> <br>
                        <button type="button" class="btn btn-success" onclick="validaForm();">Adicionar</button>
                    </div>
                </div>
                <div id="divListaTarefas"></div>
            </div>
        </div>

        <!-- Modal para Edição de Tarefas -->
        <div class="modal fade" id="telaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="telaModalLabel">Edi&ccedil;&atilde;o de Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="conteudoTarefa" name="conteudoTarefa"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="atualizaTarefa();">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Ajustar(Retirar este botão e colocar a ação no íncone, verificar o problema que está ocorrendo no ícone) / POG -->
        <div style="display: none;">
            <button type="button" class="btn btn-primary" id="btnModal" id="btnModal" data-toggle="modal" data-target="#telaModal"></button>
        </div>
    </form>
 <?php
    // Rodapé padrão do projeto
    include_once("includes/footer.php");
 ?>
    <script>
        // Função para exibir a lista com as tarefas cadastradas
        // Esta chamada poderia ser colocada tbm no document ready no js, onLoad da página, enfim existem várias outras formas de chamar a função
        carregaListaTarefa();
    </script>