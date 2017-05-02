<?php

$debug = true;

if($debug){
  $pdo = new PDO(
  'mysql:host=127.0.0.1;dbname=heladeria;charset=utf8',
  'root',
  ''
  );
}
else{
   $pdo = new PDO(
    'mysql:host=127.0.0.1;dbname=uejpedu_heladeria;charset=utf8',
    'uejpedu_hotel',
    'hotel123090'
  );
}