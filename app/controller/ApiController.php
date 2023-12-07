<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../services/ToolServices.php';

class ApiController extends ToolServices
{

  public static function createClient(array $data)
  {

    $body = [
      "fisico" => [
        "nome" => $data['nome'],
        "rg" => $data['rg'],
        "cpf" => $data['cpf'],
        "fk_genero_id" => $data['fk_genero_id'],
        "email" => $data['email'],
        "data_nascimento" => $data['data_nascimento']
      ],
      "cep" => $data['cep'], 
      "logradouro" => $data['logradouro'], 
      "bairro" => $data['bairro'], 
      "cidade" => $data['cidade'], 
      "numero" => $data['numero'], 
      "uf" => $data['uf'], 
      "telefone_1" => $data['telefone'], 
    ];

    $response = getApiServices('api/v1/'.env('CLIENT_PARAM').'/cliente', $body);

    $data = json_decode($response, true);

    if (array_key_exists('fisico', $data)) 
    {
      return true;
    
    } else {

      return $data;

    } 
  }

  public static function checkclient(string|int $client)
  {
    $idx = 1;
    $a = 0;
    $matchClient = [];

    while ($a <= $idx) 
    {
      $clients = self::getClients($a++);

      foreach ($clients as $c)
      {
        if ($c['email'] == $client){

          $matchClient['client'] = [
            'nome' => $c['nome'],
            'email' => $c['email'],
            'cpf' => $c['cpf'],
          ];

        } else 
        {
          $idx++;
        }
      }

      $a++;
    }
    
    if (count($matchClient) == 0) {
      return false;
    }
    
    $tokenAuth = uniqid().time();
    $matchClient['client']['token_auth'] = $tokenAuth;
    
    return $matchClient['client'];

  }

  public static function getClients(string|int $page)
  {

    $response = getApiServices('api/v1/'.env('CLIENT_PARAM').'/cliente?page='.$page);
    $data = json_decode($response, true);

    $fisico = [];
    
    foreach ($data['data'] as $v) 
    {
      if ($v['fisico'] != null)
      {
        $fisico[] = [
          'nome' => $v['fisico']['nome'],
          'email' => $v['fisico']['email'],
          'cpf' => $v['fisico']['cpf'],
        ] ;

      } 
    }

    return $fisico;
  }
}