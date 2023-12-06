<?php

session_start();

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

function session(string $session=null)
{
  return (isset($_SESSION[$session])) ? $_SESSION[$session] : $_SESSION;
}

function csrf() 
{
  $randon = uniqid().time();
  sessionCreate('token', $randon);

  echo "<input type='hidden' name='token' id='token' value='$randon'/>";
}

function env($env) 
{
  $fileExist = file_get_contents('.env', true);
  $keyAccess = explode("\n", $fileExist);

  $access = [];

  foreach ($keyAccess as $v) 
  {
    list($key, $val) = explode('=', $v);

    $access[$key] = $val;
  }

  return $access[$env];
}

function sweetalert() 
{

  if (isset($_SESSION['fail']))
  {
    echo "<script>
            swal.fire({
              title: '".$_SESSION['fail']."',
              icon: 'warning',
              confirmButtonColor: '#ff0000',
              confirmButtonText: 'Fechar'
            });
          </script>";

    unset($_SESSION['fail']);

  } 
  else if (isset($_SESSION['success'])) 
  {
    echo "<script>
            swal.fire({
              title: '".$_SESSION['success']."',
              icon: 'success',
              confirmButtonColor: '#51d28c',
              confirmButtonText: 'Fechar'
            });
          </script>";

    unset($_SESSION['success']);

  }
}

function getApi($request) 
{

  $url = env('BASE_URL').$request;
  $token_access = env('TOKEN_ACCESS');

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
          function getApiJs() {
            return {$data}
          }
        </script>";

  return json_decode($response, true);
}
