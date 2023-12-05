<?php

require_once 'bootstrap.php';

function pages() 
{
  $request = $_SERVER['REQUEST_URI'];
  $length = strlen($_SERVER['REQUEST_URI']); 

  if ($request[$length-1] == '/' && $request != '/') {
    $request = rtrim($request,'/');
  }

  $file = requestRouter($request);

  return $file;
}
