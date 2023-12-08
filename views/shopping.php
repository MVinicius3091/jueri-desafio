
<?php if (!auth()): ?>
  <?php redirect('/login?buy=false') ?>
<?php endif; ?> 

<div class="row border py-4 min-vh-100 justify-content-center">

  <div class="col-10 mb-2 shoppin-cart-list">
  </div>

  <div class="col-10  purchase">
    <h4>
      Valor da compra: <span id="total-purchase"></span>
    </h4>
  </div>

  <div class="col-10 mt-4 text-center">

    <a href="/shop" class="btn btn-primary m-2" type="button">
      Continuar comprando
    </a>

    <button type="button" class="btn btn-success m-2 btn-finish">
      Finalizar compra
    </button>

    <button type="button" class="btn btn-danger m-2 btn-clear-cart">
      Limpar carrinho
    </button>

    <a href="/purchases" class="btn btn-secondary m-2" type="button">
      Ver compras
    </a>
  </div>

</div>

<?php push('scripts', '<script src="./views/assets/js/shopping.js"></script>') ?>