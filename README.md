# CLEANIC

Come and get CLEANed from your diseases!

## Estrutura do projeto

<p align="left">
  <img src="https://github.com/theffc/cleanic/blob/master/resources/images/docs/project-structure.png?raw=true"     alt="Project Structure"/>
</p>

### config:

Aqui serão guardados arquivos de configuração, variáveis default, etc.

* Exemplo: Ip de conexão com o banco ficaria guardado aqui.

### old:

Arquivos antigos, pegar eles como referência do que já foi feito.

### public:

Arquivos que serão servidos para o browser do usuário. Aqui definimos os caminhos de acesso à aplicação.

* Exemplos: 
  * Acessar cleanic.com.br/admin/ nos retornará o index.php que está definido dentro da pasta.
  * Acessar cleanic.com.br/api/user/login.php ativará o serviço de login.
  * Acessar cleanic.com.br/ executará o index.php default, e o mesmo decidirá para onde redirecionar o usuário.
  
### resources

Recursos aleatórios... Imagens, documentação do sistema, etc.

### src

Arquivos de desenvolvimento. Separei as pastas por funcionalidade, ou seja, a pasta user/ só conterá arquivos relacionados ao mesmo.

* Exemplo:
  * user.php representa o modelo (regras de negocio).
  * user-controller.php representa o controle (integração da exibição com o modelo).
  * user-service.php representa os serviços atrelados ao usuário. (lógica do login ficaria aqui por exemplo, de forma que o public só chame os métodos).
  
### templates

Arquivos de template (php + html). Separei as pastas em components (footer, header, etc) e em pages (home, admin, etc), de forma que fique facil de importar layouts diferentes.

### tests

Arquivos de teste...

