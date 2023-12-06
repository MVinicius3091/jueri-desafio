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

}