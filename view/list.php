<?php
    /**
    Autor: Jean Michel Deschamps
    Data: 11/05/2020
    Descrição: Arquivo de listagem padrão das tarefas
    */
    
    include_once("includes/header.php");

    # Query de consultas de tarefas    
    $sql = "SELECT * FROM tarefas;";
    $result = mysqli_query($con,$sql);
    
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
                        <input id="txtTarefa" name="txtTarefa" type="text" class="form-control" style="width:50%;" placeholder="Nome da Tarefa..." aria-label="Add an item" aria-describedby="basic-addon2">
                        <br>
                        Descrição:
                        <input id="txtDescricao" name="txtDescricao" type="text" style="height: 150px; width:50%;" class="form-control" placeholder="Descrição..." aria-label="Add an item" aria-describedby="basic-addon2">
                        <br>
                        Status:
                        <br>
                        <select class="custom-select" id="slcStatus" name="slcStatus" style="width:50%;">
                            <option value="0" selected>Selecione...</option>
                            <option value="1">Em Andamento</option> 
                            <option value="2">Em Teste</option> 
                            <option value="3">Concluído</option> 
                        </select>
                        <br> <br>
                        <button type="button" class="btn btn-success" onclick="validaForm();">Adicionar</button>
                    </div>
                </div>

                <div class="col-12" style="margin-top: 50px;">
                    <table class="table table-striped" id="tblTarefas" name="tblTarefas">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="telaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="telaModalLabel">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="conteudoTarefa" name="conteudoTarefa">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
        <div style="display: none;">
            <button type="button" class="btn btn-primary" id="btnModal" id="btnModal" data-toggle="modal" data-target="#telaModal"></button>
        </div>
    </form>
 <?php
    include_once("includes/footer.php");
 ?>