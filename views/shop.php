
<div class="nav">

  <div class="d-flex form-product" role="search">
    <input class="form-control me-2 search-product" type="search" placeholder="Buscar produto..." aria-label="Search">
    <button class="btn btn-outline-primary btn-search" type="button">
      Buscar
    </button>
  </div>

</div>

<div class="row row-cols-2 row-cols-sm-2 row-cols-md-10 justify-content-center shop-products">

  <?php foreach($API_REQUEST as $k => $v): ?>
    
    <div class="card col m-2 shadow" style="width: 18rem;">

      <img src="<?= $v['imagem'] ??'../views/assets/images/empty-photo-1.png' ?>" class="card-img-top" alt="Imagem do produto" >

      <div class="card-body d-flex flex-column justify-content-between">
        <input type="hidden" name="id" value="<?= $v['id'] ?>">
        <h5 class="card-title">
          <?= $v['descricao'] ?>
        </h5>

        <p class="card-text">
          cód: <?= $v['codigo_barras'] ?>
        </p>

        <p class="card-text">
          disponível: <?= $v['quantidade'] ?>
        </p>

        <p class="card-text">
          Preço: R$ <?= number_format($v['tipo_preco'] , 2, ',', '.') ?>
        </p>

        <a href="#" class="btn btn-primary text-center d-block">
          Comprar
        </a>

      </div>

    </div>

  <?php endforeach; ?>

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

</div>

<?php push('script-shop', '<script src="./views/assets/js/shop.js"></script>') ?>