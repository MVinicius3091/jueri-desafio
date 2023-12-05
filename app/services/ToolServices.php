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

function old()
{
  foreach (request() as $key => $value) {
    ToolServices::sessionCreate($key, $value);
  }
}

function clearOldSession() {

  foreach (request() as $key => $value) {

    if ($key == 'token') continue;
    unset($_SESSION[$key]);
  }
}

function getApiJs($request) 
{

  $url = "https://jueri.com.br/sis/".$request;
  $token_access = "j93R7fYDWNxY3Kza5qwSFAtyRv7w1xBWG9b1YUrZ9bd2fbb3";

  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-type: application/json',
      'Authorization: Bearer '.$token_access,
  ]);

  $response = curl_exec($curl);

  if (curl_errno($curl)) {
      die('Erro na requisição: ' . curl_error($curl));
  }

  curl_close($curl);

  $data = json_decode($response, true);

  return $data;
}
