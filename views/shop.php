
<div class="nav justify-content-lg-between justify-content-md-between justify-content-sm-center justify-content-center">

  <div class="d-flex form-product" role="search">
    <input class="form-control me-2 search-product" type="search" placeholder="Buscar produto..." aria-label="Search">
    <button class="btn btn-outline-primary btn-search" type="button">
      Buscar
    </button>
  </div>

  <?php if (auth()): ?>
    <div class="d-flex align-items-center mt-sm-2">
      <h4 class="p-0 m-0 text-truncate" style="max-width: 350px;">Bem-vindo, 
        <?= ucfirst(session('nome')) ?>
      </h4>

      <div class="ms-4 d-flex align-items-center justify-content-center">

        <div class="border rounded-circle p-1 mx-3">

          <a href="/shopping-cart" class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver carrinho">

            <img src="../views/assets/images/cart.png" alt="Ícone do carrinho de compras" width="40px">

            <span class="quantity-product position-absolute bg-danger rounded-circle text-center text-light p-2 d-inline-flex justify-content-center align-items-center" style="width: 25px; height: 25px; right: -14px; top: -22px;">0</span>

          </a>

        </div>

        <form action="../app/controller/LogoutController.php" method="post" class="overflow-hidden m-0 p-0 ms-3" style="height: 50px;">

          <button type="submit" class="border rounded-circle px-3 h-100" style="background: transparent;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sair">
            <i class="fa-solid fa-right-from-bracket fa-xl"></i>
          </button>

        </form>
      </div>
    </div>

    <?php else: ?>

      <div>
        <h4>Bem-vindo, Clinte</h4>
      </div>

  <?php endif; ?>

</div>

<div class="text-center shop-products">

  <?php foreach($API_REQUEST as $k => $v): ?>
    
    <div class="card m-2 shadow align-items-center" style="width: 20rem; height: 28rem;">

      <img src="<?= $v['imagem'] ??'../views/assets/images/empty-photo-1.png' ?>" class="card-img-top mt-2" alt="Imagem do produto" style="width: 10rem;">

      <div class="card-body d-flex flex-column justify-content-between w-100">
        <input type="hidden" name="id" value="<?= $v['id'] ?>">

        <h5 class="card-title">
          <?= $v['descricao'] ?>
        </h5>

        <p class="card-text text-start">
          cód: <?= $v['codigo_barras'] ?>
        </p>

        <p class="card-text text-start">
          disponível: <?= $v['quantidade'] ?>
        </p>

        <p class="card-text text-start">
          Preço: R$ <?= number_format($v['tipo_preco'] , 2, ',', '.') ?>
        </p>

        <div class="border w-100 d-block">

          <?php if (auth()): ?>

            <a href="javascript:void(0)" class="btn btn-primary text-center d-block btn-buy">
              Comprar
            </a>

          <?php else: ?>

            <a href="/login?buy=false" class="btn btn-primary text-center d-block ">
              Comprar
            </a>

          <?php endif; ?>

        </div>

      </div>

    </div>

  <?php endforeach; ?>

</div>

<nav class="mt-2 w-100">

    <ul class="pagination justify-content-center">

      <li class="page-item">
        <a class="page-link page-previus" type="button">Anterior</a>
      </li>

      <li class="page-item">
        <a class="page-link page-current active" href="?page=1">1</a>
      </li>

      <li class="page-item">
        <a class="page-link page-current" href="?page=2">2</a>
      </li>

      <li class="page-item">
        <a class="page-link page-current" href="?page=3">3</a>
      </li>

      <li class="page-item">
        <a class="page-link page-current" href="?page=4">4</a>
      </li>

      <li class="page-item">
        <a class="page-link page-current" href="?page=5">5</a>
      </li>

      <li class="page-item">
        <a class="page-link page-next" type="button">Próxima</a>
      </li>

    </ul>

  </nav>

<?php push('scripts', '<script src="./views/assets/js/shop.js"></script>') ?>
<?php islogged() ?>
