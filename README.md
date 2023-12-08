
<div style="background: #fff; text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/logo.png" />
</div>

<h1 style="text-align: center;">
  Desafio Jueri Semijoias
</h1>

<a href="#instructions" style="margin: 5px 0;">
  Ver instruções
</a>

<h3>
  - Layout do projeto
</h3>

<p>
  - Página principal
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/gif/dashboard.gif" />
</div>

<hr>

<p>
  - Login
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/page-login.png" />
</div>

<hr>

<p>
  - Cliente logado 
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/login-auth.png" />
</div>

<hr>

<p>
  - Cadastro de clientes 
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/register.png" />
</div>

<hr>

<p>
  - Erro ao cadastrar um cliente preservando os campos preenchidos
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/register-error-alert.png" />
</div>

<hr>

<p>
  - Erros genéricos ao tentar cadastrar informações inválidas preservando os campos preenchidos
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/register-erros-log.png" />
</div>

<hr>

<p>
  - CEP com autocomplete dos campos via api <code>viacep api</code> 
  <a href="https://viacep.com.br/">viacep.com.br</a>
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cep-autocomplete.png" />
</div>

<hr>

<p>
  - Cliente cadastrado com sucesso
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/register-success.png" />
</div>

<hr>

<p>
  - Loja sem autentificação
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/gif/shop.gif" />
</div>

<hr>

<p>
  - Loja com autentificação
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/gif/shop-auth.gif" />
</div>

<hr>

<p>
  - Selecione o produto para adicionar no carrinho
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/product-select.png" />
</div>

<hr>

<p>
  - Mensagem de alerta do produto adicionado ao carrinho.
  Biblioteca: <code>sweetalert</code>  
  <a href="https://sweetalert2.github.io/#examples">
  Sweetalert.io
  </a>
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/product-add.png" />
</div>

<hr>

<p>
  - Filtro de produtos
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/gif/search-product.gif" />
</div>

<hr>

<p>
  - Carrinho de compras vazio
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cart-empty.png" />
</div>

<hr>

<p>
  - Carrinho de compras
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cart.png" />
</div>

<hr>

<p>
  - Remover um produto do carrinho
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cart-remove-item.png" />
</div>

<hr>

<p>
  - Remover todos os produtos do carrinho
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cart-remove-all.png" />
</div>

<hr>

<p>
  - Compra efetuado com sucesso
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/cart-finish.png" />
</div>

<hr>

<p>
  - Ver minhas compras
</p>

<div style=" text-align: center; border-radius: 5px; margin: 10px 0;">
  <img src="./views/assets/images/readme/pages/shopping.png" />
</div>

<hr>

<h1 id="instructions">
  Instruções 
</h1>


<h3>
  Docker
</h3>

<p>
  Para iniciar o projeto com docker, certifique-se de que tenha o docker instalado na sua máquina. Caso contrário, você pode optar por instalá-lo visitando a página oficial <a href="https://docs.docker.com/engine/install/">docs.docker.com</a> e seguir o passo-a-passo da instalação conforme o seu sistema operacional
</p>

<h4>
  Comandos para iniciar o projeto com docker
</h4>

ver os containers em execução: `docker ps`

baixar a imagem e iniciar o projeto: `docker compose up -d --build`

depois disso, caso não ocorra nenhum erro, na porta `localhost:80` do seu navegador irá executar o projeto.

certifique-se de que a porta `:80` esteja disponível na sua máquina!

## Caso não queira usar o Docker para iniciar o projeto, siga o seguinte passo:

- Inicie o vscode no diretório raiz do projeto;

- Abra o terminal `Ctrl + j` e execute o comando: `php -S localhost:<porta>` substitua `<porta>` conforme preferir;

  - Dicas de portas: `8080`, `8800`, `8000`, `5000`...

***OBS: é preciso ter o php intalado na sua máquina. Para saber disso digite no terminal o comando: `php -v`

## .env

- Antes de começar a usar o sistema, crie um arquivo `.env` com as variáveis de ambiente para que as requisições com a api sejam bem sucedidas.

- Veja os exemplos das variáveis no arquivo `.env.example`

### Feito isso o projeto estará pronto para uso!!! 
