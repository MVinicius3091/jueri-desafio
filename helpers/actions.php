<?php

require_once 'bootstrap.php';

function sessionCreate(string $key, string $session)
{
  $_SESSION[$key] = $session;
}

function getSession(string $key) 
{
  $session = '';

  if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
    $session = $_SESSION[$key]; 
    unset($_SESSION[$key]);

    echo $session;
  }

}

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
  if (!isset($_SESSION['token_auth']) || $_SESSION['token_auth'] == '') 
  {
    return false;
  } 

  return true;
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
  if (auth()) return;
  
  echo (isset($_SESSION[$name])) ? $_SESSION[$name] : '';
}

