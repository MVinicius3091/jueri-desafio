
<div class="row justify-content-center align-items-center mb-3">

  <div class="card justify-content-center shadow">

    <div class="text-center my-4">
      <img src="../views/assets/images/logo.png" alt="">
    </div>

    <form action="app/controller/RegisterController.php" method="post">

      <?php csrf(); ?>

      <div class="d-flex justify-content-between">

        <div class="w-50 me-1">

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nome" id="floatingInput" placeholder="default" value="<?php old('nome') ?>" required>
            <label for="floatingInput">
              Nome
            </label>
            <p class="text-danger"><?php getSession('error.nome'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="<?php old('email') ?>" required>
            <label for="floatingInput">
              Email
            </label>
            <p class="text-danger"><?php getSession('error.email'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="data_nascimento" id="floatingInput" placeholder="default" value="<?php old('data_nascimento') ?>" required>
            <label for="floatingInput">
              Data de nascimento
            </label>
            <p class="text-danger"><?php getSession('error.data_nascimento'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="rg" id="floatingInput" placeholder="default" value="<?php old('rg') ?>" required>
            <label for="floatingInput">
              Documento de identidade(RG)
            </label>
            <p class="text-danger"><?php getSession('error.rg'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cpf" id="floatingInput" placeholder="default" value="<?php old('cpf') ?>" required>
            <label for="floatingInput">
              Cpf
            </label>

            <p class="text-danger"><?php getSession('error.cpf'); ?></p>
          </div>

          <div class="d-flex my-2">

            <div class="form-check form-switch">
              <input class="form-check-input" name="fk_genero_id" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
              <label class="form-check-label" for="flexSwitchCheckDefault">
                Masculino
              </label>
            
            </div>

            <div class="form-check form-switch ms-4">
              <input class="form-check-input" name="fk_genero_id" type="checkbox" role="switch" id="flexSwitchCheckDefault2" value="2">
              <label class="form-check-label" for="flexSwitchCheckDefault2">
                Feminino
              </label>
            </div>

          </div>
          
        </div>

        <div class="w-50">

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cep" id="floatingInput" placeholder="default" value="<?php old('cep') ?>" required>
            <label for="floatingInput">
              Cep
            </label>
            <p class="text-danger"><?php getSession('error.cep'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="logradouro" id="floatingInput" placeholder="default" value="<?php old('logradouro') ?>" required>
            <label for="floatingInput">
              Logradouro
            </label>
            <p class="text-danger"><?php getSession('error.logradouro'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="numero" id="floatingInput" placeholder="default" value="<?php old('numero') ?>" required>
            <label for="floatingInput">
              Nº
            </label>
            <p class="text-danger"><?php getSession('error.numero'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bairro" id="floatingInput" placeholder="default" value="<?php old('bairro') ?>" required>
            <label for="floatingInput">
              Bairro
            </label>
            <p class="text-danger"><?php getSession('error.bairro'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cidade" id="floatingInput" placeholder="default" value="<?php old('cidade') ?>" required>
            <label for="floatingInput">
              Cidade
            </label>
            <p class="text-danger"><?php getSession('error.cidade'); ?></p>
          </div>
          
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="uf" id="floatingInput" placeholder="default" value="<?php old('uf') ?>" required>
            <label for="floatingInput">
              UF
            </label>
            <p class="text-danger"><?php getSession('error.uf'); ?></p>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefone" id="floatingInput" placeholder="default" value="<?php old('telefone') ?>" required>
            <label for="floatingInput">
              Telefone
            </label>
            <p class="text-danger"><?php getSession('error.telefone_1'); ?></p>
          </div>

        </div>

      </div>

      <div class="mt-3 text-center">

        <a href="/login" class="btn btn-outline-danger px-4 " type="button" >
          Já estou cadastrado
        </a>

        <button class="btn btn-outline-dark px-4 " type="submit" >
          Cadastrar
        </button>

      </div>

    </form>

  </div>

</div>

<?php push('scripts', '<script src="../views/assets/js/register.js"></script>') ?>