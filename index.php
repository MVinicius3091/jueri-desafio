<?php 
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  require_once 'bootstrap.php';
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jueri</title>

   <!-- WEB ICON -->
   <link rel="shortcut icon" href="../views/assets/images/jueri-logo.png" type="image/x-icon" sizes="16x16">

   <!-- FONTAWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400&display=swap" rel="stylesheet">

  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="../views/assets/bootstrap/css/bootstrap.min.css">

  <!-- SWEETALERT -->
  <link rel="stylesheet" href="../views/assets/sweetalert2/css/sweetalert2.min.css" type="text/css">
  <!-- SWEETALERT -->
  <script src="../views/assets/sweetalert2/js/sweetalert2.min.js"></script>

  <!-- STYLES CSS -->
  <link rel="stylesheet" href="../views/assets/css/styles.css" type="text/css">

  <!-- MEDIA QUERIES -->
  <link rel="stylesheet" href="../views/assets/css/media-queries.css" type="text/css">

</head>
<body>

  <header>

    <nav class="navbar navbar-expand-lg bg-danger shadow">

      <div class="container-fluid">

        <div>

          <img src="../views/assets/images/jueri-logo.png" alt="Logo da Jueri semijoias" class="w-100 rounded-circle" width="90px" height="90px">

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

          <ul class="navbar-nav align-items-center" >

            <li class="nav-item h-link">
              <a class="nav-link text-light fs-5 h-active" aria-current="page" href="/dashboard">
                Principal
              </a>
            </li>

            <li class="nav-item h-link">

              <a class="nav-link text-light fs-5" href="/shop">
                Loja
              </a>
              
            </li>

            <li class="nav-item h-link">

              <a class="nav-link text-light fs-5" href="/login">
                Login
              </a>

            </li>

            <li class="nav-item mt-3 ms-3">

              <form class="d-flex position-relative" role="search">

                <input class="form-control me-2 search-header" type="search" placeholder="Digite aqui..." aria-label="Search">
                <button class="btn btn-outline-light" type="button">
                  Buscar
                </button>

              </form>

            </li>

          </ul>

        </div>

      </div>

    </nav>

  </header>

  <main class="container p-2 my-2">

    <?php require_once pages(); ?>
  
    <?php sweetalert(); ?>

  </main>

  <footer class="container-fluid bg-danger">

    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-3">

      <div class="col mt-2 d-flex flex-column">

        <h3 class="text-light">
          Redes sociais
        </h3>

        <a href="javascript:void(0)" class="my-2 text-decoration-none text-light hover w-50">

          <i class="fa-brands fa-facebook fa-2xl"></i>
          <span>Facebook</span>
        </a>
        
        <a href="javascript:void(0)" class="my-2 text-decoration-none text-light hover w-50">
          
          <i class="fa-brands fa-instagram fa-2x"></i>
          <span>Instagram</span>
          
        </a>
        
        <a href="javascript:void(0)" class="my-2 text-decoration-none text-light hover w-50">
          
          <i class="fa-brands fa-linkedin fa-2xl"></i>
          <span>Linkedin</span>

        </a>

      </div>

      <div class="col mt-2">

        <ul class="nav justify-content-between align-items-start flex-column">
          <h3 class="text-light">
            Informações
          </h3>

          <li class="nav-item fs-5">
            <a href="" class="nav-link text-light p-0 m-0 hover">
              Saiba mais
            </a>
          </li>
          
          <li class="nav-item fs-5">
            <a href="" class="nav-link text-light p-0 m-0 hover">
              Localização
            </a>
          </li>
          
          <li class="nav-item fs-5">
            <a href="" class="nav-link text-light p-0 m-0 hover">
              Perguntas frequentes
            </a>
          </li>
          
        </ul>

      </div>

      <div class="col mt-2">

        <div class="row">

          <div class="col ">
            
            <div class="text-light">
              <h3 class="m-0 p-0">
                Contato
              </h3>

              <p class="p-0">
                <div>
                  <i class="fa-solid fa-phone-flip"></i>
                  (43) 33322-4422
                </div>

                <div class="d-flex align-items-center">

                  <i class="fa-solid fa-envelope"></i>
                  <a href="" class="nav-link text-light ms-2 hover">
                    testedeemail@com.br
                  </a>
                  
                </div>

                <div>
                  <p>
                    cnpj: 11.323.323/0001-3
                  </p>
                </div>

              </p>
              
            </div>
            
          </div>

          <div class="col">
            <img src="../views/assets/images/logo.png" alt="Logo da jueri semijoias" width="120px" height="70px">
          </div>

      </div>

    </div>

  </footer>

  <!-- BOOTSTRAP -->
  <script src="../views/assets/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- JQUERY -->
  <script src="../views/assets/jquery/jqueryslim.min.js"></script>

  <!-- JQUERY MASK CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="./views/assets/js/index.js"></script>
  <?php stack('scripts'); ?>
</body>
</html>