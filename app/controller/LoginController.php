<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'ApiController.php';

class LoginController extends ApiController 
{

  public function __construct()
  {
    $token = ToolServices::getSession('token');
    
    if (request('token') != $token) 
    {
      clearOldSession();
      oldServices();

      ToolServices::sessionCreate('fail', 'Erro ao efetuar o login');
      ToolServices::redirect('/login');
    } 

    $client = ApiController::checkclient(request('email'));

    if (!$client) {
      oldServices();
      ToolServices::sessionCreate('fail', 'Usuário não encontrado!');
      ToolServices::redirect('/login');
      return;
    }

    clearOldSession();

    foreach($client as $k => $c)
    {
      ToolServices::sessionCreate($k, $c);
    }

    ToolServices::sessionCreate('logged', 'Login efetuado com sucesso!');
    ToolServices::redirect('/shop');
  }

}

new LoginController;