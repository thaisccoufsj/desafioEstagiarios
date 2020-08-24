# Controle de apontamentos

## Requisitos do servidor
PHP versão 7.2 ou superior, com as seguintes extensões instaladas: 

- [intl](http://php.net/manual/en/intl.requirements.php)

Adicionalmente, tenha certeza que as seguintes extensões estão habilitadas no seu PHP:

- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)

## Configuração do Banco de Dados
Restaurar o banco de dados (estagiarios.sql) e criar um usuário no banco de dados chamado 'solides' com senha 'solides123' e garantir os privilégios no banco restaurado.
SQL para garantir privilégios:
    GRANT ALL PRIVILEGES ON estagiarios.* TO 'solides'@'%';
    FLUSH PRIVILEGES;

## Levantamento do Servidor
Para iniciar o servidor basta acessar o diretório do projeto e rodar o comando : 'php spark serve'.
O sistema será então acessado pelo caminho : 'http://localhost:8080'

## Utilização
Após restaurar o banco de dados o sistema poderá ser acessado pelo usuário/senha: admin/admin .
Uma vez logado no sistema o usuário terá acesso ao menu que conterá as funcionalidades.

## Observações
O sistema somenta irá listar os apontamentos do usuário logado por segurança.
Nas listagens é possível acessar o item requerido clicando uma vez no id ou com duplo clique em qualquer informação dele.
Não é possível excluir uma pessoa que tenha apontamentos vinculados, senão a pessoa do apontamento ficaria inválida.
Como o sistema é para estagiários apontarem os horários de trabalho, não é possível informar um data futura.
Ao acessar um formulário de cadastro ou edição ao clicar no nome contido no título será feito um redirecionamento para a listagem.
