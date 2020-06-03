<?php

class PwdGenerator{

  function randomPassword() {
    $l = 'abcdefghijklmnopqrstuvwxyz';
    $u = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $n = '1234567890';
    $l_pass = array();
    $u_pass = array();
    $n_pass = array();
    $lettersLength = strlen($l) - 1; 
    $numbersLength = strlen($n) - 1;
    $pwd = "";

    for ($i = 0; $i < 6; $i++) {
        $l_ind = rand(0, $lettersLength);
        $l_pass[] = $l[$l_ind];
    }
    for ($j = 0; $j < 6; $j++) {
        $u_ind = rand(0, $lettersLength);
        $u_pass[] = $u[$u_ind];
    }
    for ($k = 0; $k < 4; $k++) {
        $n_ind = rand(0, $numbersLength);
        $n_pass[] = $n[$n_ind];
    }

    $pwd= str_shuffle(implode($l_pass).implode($u_pass).implode($n_pass));

    return $pwd;
  }
}

?>



