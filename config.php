<?php

  require_once("functions.php");
  
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL | E_STRICT );
  setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
  date_default_timezone_set("America/Sao_Paulo");
  
  spl_autoload_register(function($class_name){
    $filename = "classes". DIRECTORY_SEPARATOR . $class_name . ".php";
    if (file_exists($filename)) {
      require_once($filename);
  }
});

