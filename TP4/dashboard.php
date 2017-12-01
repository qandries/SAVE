<?php
/**
* Fonction de check login
*
* @param string $login
* @param string $password
* @return bool
*/
function checkLogin($login, $password){
    //$filename = 'users.csv';
    //$hash = password_hash($password, PASSWORD_BCRYPT);
    $res = file_get_contents('users.csv');
    if ($res != false){
        $resArray = explode(',', $res);
        var_dump($resArray);
        //$password = "\"" . $password . "\" ";
        $hash = password_verify($password, $resArray[1]);
        var_dump($hash);
        var_dump($password);
    if (($resArray[0] == "\"" . $login . "\"") /*&& $hash*/) {
            return true;
        }
        return false;
    }
    return false;
}
/**
* Fonction de comparaison password
*
* @param string $password
* @return bool
*/
function comparePassword($password){
    //$filename = 'users.csv';
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $res = file_get_contents('users.csv');
    if ($res != false){
        $resArray = explode(',', $res);
        if ($resArray[1] == $hash) {
            return true;
        }
    }
    return false;
}
/**
* Fonction de comparaison login
*
* @param string $login
* @return bool
*/
function compareLogin($login){
    //$filename = 'users.csv';
    $res = file_get_contents('users.csv');
    if ($res != false){
        $resArray = explode(',', $res);
        if ($resArray[0] == $login) {
            return true;
        }
    }
    return false;
}

function checkError($data){
    $errors = [];
    if(isset($data['login']) && !empty($data['login'])) {
        $res = compareLogin($data['login']);
        if (!$res)
            $errors['login'][] = "Erreur login invalide";
    } else {
        $errors['login'][] = "Erreur login requis";
    }
    if(isset($data['password2']) && !empty($data['password2'])) {
        $res = comparePassword($data['password2']);
        if (!$res)
            $errors['password2'][] = "Erreur password invalide";
    } else {
        $errors['password2'][] = "Erreur password requis";
    }
    return $errors;
}
