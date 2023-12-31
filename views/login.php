
<?php if (!auth()): ?>

  <?php if (request('buy')): ?>
    <h3 class="w-50 text-center fw-bolde m-auto">
      Faça o login pra continuar!!
    </h3>
  <?php endif; ?>

  <div class="row my-4 justify-content-center align-items-center">

    <div class="card justify-content-center shadow" style="width: 350px; height: 400px;">

      <div class="text-center my-4">
        <img src="../views/assets/images/logo.png" alt="">
      </div>

      <form action="app/controller/LoginController.php" method="post">

        <?php csrf(); ?>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="<?php old('email') ?>">
          <label for="floatingInput">
            Email
          </label>
        </div>

        <div class="mt-3 text-center">
          <button class="btn btn-outline-danger px-4 " type="submit" >
            Entrar
          </button>

          <a href="/register" class="btn btn-outline-dark px-4 " type="button" >
            Cadastrar-se
          </a>
        </div>
      </form>

    </div>

  </div>

  <?php push('scripts', '<script src="../views/assets/js/register.js"></script>') ?>

<?php else: ?>

  <div class="row justify-content-center" style="height: 30rem;">

    <div class="col-10 text-center">
      <h2>
        Já está autenticado!!!
      </h2>
    </div>

    <div class="col-10 text-center">
      <img src="../views/assets/images/authenticated.png" alt="Ícone de autentificação" width="200px">
    </div>

  </div>

<?php endif; ?>
<?php push('scripts', '<script>loading()</script>');
