<?php

require_once 'bootstrap.php';

function dump(mixed $dump)  
{
  var_dump($dump);
}

function route(string $route) 
{
  $path = explode('.', $route);
  $path = $path[1].'/'.ucfirst($path[0]).ucfirst($path[1]);

  $file = requestRouter($path);

  echo $file?? false;
}


function auth() 
{
  
  if (!session('auth') || session('auth') == '') 
  {
    redirect('/');
  } 
}

function request($request=null) {

  return (isset($_REQUEST[$request])) ? $_REQUEST[$request] : $_REQUEST;
}

function requestType(string $type): bool 
{

  if (isset($_SERVER['REQUEST_METHOD']) 
    && $_SERVER['REQUEST_METHOD'] == strtoupper($type)) 
  {
    return true;
  }

  return false;
}

function redirect(string $route)
{
  header('Location:'.$route);
}

function old(string $name) 
{
  echo session($name);
}

