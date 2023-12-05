<?php

function sessioCreate(string $key, string $session)
{
  $_SESSION[$key] = $session;
}

function getSession(string $key) 
{
  $session = '';

  if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
    $session = $_SESSION[$key]; 
    unset($_SESSION[$key]);

    return $session;
  }

}

function push($key, $push)
{
  $_SESSION[$key] = $push;

}

function stack($key) 
{
  $stack = '';

  if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
    $stack = $_SESSION[$key]; 
    unset($_SESSION[$key]);

    echo $stack;
  }
}

function session(string $session)
{
  return (isset($_SESSION[$session])) ?? false;
}

function csrf() 
{
  $randon = uniqid().time();
  sessioCreate('token', $randon);

  echo "<input type='hidden' name='token' id='token' value='$randon'/>";
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

  $data = json_encode($response);

  echo "<script>
          function getApi() {
            return {$data}
          }
        </script>";

  return json_decode($response, true);
}
