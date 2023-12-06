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
    
    if (request('token') != $token) {
      old();
      redirect('/login');
    } else {
      clearOldSession();
    }

    $te = ApiController::create(['teste'=>'teste']);

  }

}

new LoginController;