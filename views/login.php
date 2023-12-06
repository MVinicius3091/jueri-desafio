
<div class="row vh-100 justify-content-center align-items-center">

  <div class="card justify-content-center shadow" style="width: 350px; height: 400px;">

    <div class="text-center my-4">
      <img src="../views/assets/images/logo.png" alt="">
    </div>

    <form action="app/controller/LoginController.php" method="post">

      <?php csrf(); ?>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="<?php old('email')??'' ?>">
        <label for="floatingInput">
          Email
        </label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">
          Senha
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