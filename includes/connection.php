<?php
    /**
    Autor: Jean Michel Deschamps
    Data: 11/05/2020
    Descrição: Arquivo de conexão com banco de dados MYSQL.
    */

# Dados de conexão padrão server, user, pass e bd
$con = mysqli_connect('localhost', 'root', '','testesupero');

#Verificação de conxão com BD
if (!$con) {
    die('Não foi possível conectar: ' . mysql_error());
}
#Fecha conexão com bd
#mysqli_close($link);

?>
