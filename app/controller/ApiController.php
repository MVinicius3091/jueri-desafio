<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once '../services/ToolServices.php';

class ApiController extends ToolServices
{
  public function __construct()
  {
    
    $apiResponse = getApiJs('api/v1/904/produto');
   
  }
}

new ApiController;