<?php

$chaine = 'abcdefghijklmnopqrstuvwxyz';
//$offset = 3;

function cesar($chaine){
  $tableau = str_split($chaine);
  foreach ($tableau as $value) {
    $numLettre = ord($value);
    if (($numLettre >= 97 && $numLettre < 120) || ($numLettre >= 65 && $numLettre < 88)) {
      $numLettre += 3/*$offset*/;
      $value = chr($numLettre);
      echo "$value";
    }
    elseif (($numLettre >= 120 && $numLettre < 123) || ($numLettre >= 88 && $numLettre < 91)) {
    $numLettre -= (26 - 3/*$offset*/);
      $value = chr($numLettre);
      echo "$value";
    }
    else {
      $value = chr($numLettre);
      echo "$value";
    }
  }
}
cesar($chaine);
