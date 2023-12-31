<?php

require_once 'ApiController.php';

class RegisterController extends ApiController
{
  public function __construct()
  {
    $token = ToolServices::getSession('token');
    
    if (request('token') != $token) 
    {
      clearOldSession();
      oldServices();

      ToolServices::sessionCreate('fail', 'Erro ao cadastrar!');
      ToolServices::redirect('/register');
      return;

    } 

    $response = ApiController::createClient(request());

    if (gettype($response) != 'array')
    {
      clearOldSession();
      ToolServices::sessionCreate('success', 'Cadastrado com sucesso!');
      ToolServices::redirect('/register');
      return;
    }
 
    ToolServices::sessionCreate('fail', 'Erro ao cadastrar!');
    ToolServices::getErrors($response['errors']);
    oldServices();
    ToolServices::redirect('/register');
    return;
  }
}

new RegisterController;