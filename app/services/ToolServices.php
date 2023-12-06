<?php

session_start();

class ToolServices 
{

  public static function sessionCreate(string $key, string $session)
  {
    $_SESSION[$key] = $session;
  }

  public static function getSession(string $key)
  {
    $session = '';

    if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
      $session = $_SESSION[$key]; 
      unset($_SESSION[$key]);

      return $session; 
    }
  }

  public static function getErrors($errors)
  {
    
    $arrErrors = [];

    foreach ($errors as $k => $v)
    {
      $arrErrors[str_replace('fisico.', '', $k)] = str_replace('fisico.', '', $v[0]);
    }

    foreach ($arrErrors as $ek => $ev)
    {
      self::sessionCreate('error.'.$ek, $ev);
    }

  }
}

function dump(mixed $dump)
{
  var_dump($dump);
}

function dd(mixed $dump) 
{
  var_dump($dump);die;
}

function request(string $request=null) 
{
  if (isset($_REQUEST[$request]) || $_REQUEST) {

    if (! empty($_REQUEST[$request])) {

      return $_REQUEST[$request];

    } else {

      return $_REQUEST;
    }
  }
}

function redirect(string $route) 
{
  header('Location:'.$route);
}

function oldServices()
{
  foreach (request() as $key => $value) {
    ToolServices::sessionCreate($key, $value);
  }
}

function clearOldSession() 
{
  foreach (request() as $key => $value) {
    unset($_SESSION[$key], $_SESSION['fail']);
  }
}

function env($env) 
{
  $fileExist = file_get_contents('../../.env', true);

  $keyAccess = explode("\n", $fileExist);

  $access = [];

  foreach ($keyAccess as $v) 
  {
    list($key, $val) = explode('=', $v);

    $access[$key] = $val;
  }

  return $access[$env];
}

function getApiServices($request, $body=null) 
{

  $url = env('BASE_URL').$request;
  $token_access = env('TOKEN_ACCESS');

  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-type: application/json',
      'Authorization: Bearer '.$token_access,
      'Accept: application/json'
  ]);

  if ($body) {
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
  }

  $response = curl_exec($curl);

  if (curl_errno($curl)) {
      die('Erro na requisição: ' . curl_error($curl));
  }

  curl_close($curl);

  return $response;
}
