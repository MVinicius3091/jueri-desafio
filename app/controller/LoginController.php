<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../services/ToolServices.php';
require_once '../model/LoginModel.php';

class LoginController extends ToolServices 
{

  public function __construct()
  {
    $token = ToolServices::getSession('token');

    if (request('token') != $token) {
      old();
      redirect('/');
    } else {
      clearOldSession();
    }

    $find = LoginModel::find([['email' => request('email')], ['password' => request('password')]]);
    dump($find);

  }

}

new LoginController;