# Teste JS Supero

Versão das tecnologias para rodar o projeto:

PHP 7.3
Apache 2.4
MySQL 5.7 

Obs: Instalando o WAMP na versão default é só colocar o projeto dentro da pasta www ou apontar o httpd-vhosts.conf para o diretório do projeto;

A estrutura de banco de dados está dentro da pasta "bd" do projeto;

=================
Futuras Melhorias
=================

- Criar tela incial do projeto e efutar login;
- Cadastro de usuários e setores;
- Níveis de permissão;
- Verificação de segurança no métodos POST e GET;
- Criar adm para cadastro de situação;
- Utilizar HTML5 ou usar efeitos em CSS para os campos obrigatórios(somente questão de estética);
- Efetuar verificação do tamanho dos campos, verificar se o maxlength da tela está igual aos campos no BD;
- Verificação de tipagem de dados antes de envio por AJAX para não ocorrer erro nos comandos SQL;
- Ao invés de utilizar os comandos SQL diretamente no código se for mantido de forma estruturada utilizar stored procedures, código fica mais limpo e organizado
- Corrigir POG na função infoTarefa(), retirar a seguinte ação -> $("#btnModal").click();, colocar o click no ícone;
- Ajustar o input de descrição, colocar um textarea;
- Adicionar tela com os logs te alteração;
- Colocar campo de data;