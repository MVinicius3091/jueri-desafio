<?php

require_once 'helpers/pages.php';
require_once 'helpers/actions.php';
require_once 'helpers/tools.php';
require_once 'routes/route.php';

$API_REQUEST = [];

$offset = (!empty(request('page')) || request('page')) ? request('page') : '1';

if (route('/shop')) 
{
  $api = getApi('api/v1/'.env('CLIENT_PARAM').'/produto?page='.$offset);

  foreach ($api['data'] as $apik => $apiv) {

    $API_REQUEST[] = [
      'id' => $apiv['id'],
      'descricao' => $apiv['descricao'],
      'imagem' => $apiv['imagem'],
      'codigo_barras' => $apiv['codigo_barras'],
      'quantidade' => $apiv['quantidade'],
      'tipo_preco' => array_key_exists(0, $apiv['tipo_preco']) ? $apiv['tipo_preco'][0]['preco']: 0,
    ];
  } 
}


