<?php



function gerarLoginEstudante($string){
    mb_internal_encoding("UTF-8");
    $string = strtolower($string);
    $pos_primeiro = strpos($string, " ");
    $pos_segundo = strrpos($string, " ") + 1;
    $num = mt_rand(1111, 9999);
    
    $primeiro_nome = mb_substr($string, 0, $pos_primeiro);
    $ultimo_nome = mb_substr($string, $pos_segundo, $pos_segundo);
    return $primeiro_nome . "." . $ultimo_nome . $num . "@grily.art";
}
function checkRm($rm, $rms){
    if (count($rms) > 0){
      $rm = $rm;
      $check = in_array($rm, $rms);
      while ($check === true) {
        $rm = mt_rand(11111, 99999);
        $check = in_array($rm, $rms);
        if (!$check) {
          break;
        }
      }
    }
    return $rm;
  }
