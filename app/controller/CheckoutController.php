<?php

require_once 'ApiController.php';

class CheckoutController extends ApiController
{
  public function __construct()
  {
    $data = request();
    $data['client'] = ToolServices::sessionServices();

    $create = ApiController::createSale($data);
  }
}

new CheckoutController;