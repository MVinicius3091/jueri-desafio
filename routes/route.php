<?php

require_once 'bootstrap.php';

function requestRouter(string $route) 
{

  $queryString = null;

  if (str_contains($route, '?')) {
    $query = explode('?', $route);
    $queryString = $query[1];
    $route = $query[0];

  }

  $routes = [
    '/login' => 'views/login'.'?'.$queryString,
    '/register' => 'views/register',
    '/shopping-cart' => 'views/shopping',
    '/purchases' => 'views/purchases',
    '/' => 'views/dashboard',
    '/dashboard' => 'views'.$route.'?'.$queryString,
    '/shop' => 'views'.$route.'?'.$queryString,
    '/controller/ApiController' => $route.'?'.$queryString,
    '/logout' => 'app/controller/LogoutController',
  ];

  $file = '';
  
  if (key_exists($route, $routes)) {
    $file = $routes[$route] . '.php';

    if (str_contains($file, '?')) {
      $exp = explode('?', $file);
      $file = $exp[0] . '.php';
    }
  }

  return ($file || file_exists($file)) ? $file : 'error404.php';
}