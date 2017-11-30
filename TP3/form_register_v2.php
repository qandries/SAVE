<?php
/**
* Fonction de sauvegarde Utilisateur
*
* @param string $email
* @param string $password
* @return bool
*/
function saveUser($email, $password){
    $filename = 'users.csv';
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $data = '"' . $email . '","' . $hash . '"' . "\r\n";
    $res = file_put_contents($filename, $data, FILE_APPEND);
    if ($res != false)
        return true;
    return false;
}

/**
* Fonction d'affichage des erreurs
*
* @param array $errors
* @return string
*/


function displayErrors($errors){
    if(count($errors) > 1){
        $render = "<ul>";
        foreach ($errors as $error) {
            $render .= "<li>$error</li>";
        }
        $render .= "</ul>";
    }   else {
        $render = $errors[0];
    }
    $render = "<div class='invalid-feedback'>$render</div>";
    return $render;
}

    function checkReferer($path) {
        if(isset($_SERVER['HTTP_REFERER'])) {
            $ex = explode("/", $_SERVER['HTTP_REFERER']);
        }
        if(!isset($_SERVER['HTTP_REFERER']) ||
        end($ex) != $path) {
            header("Location:$path");
        }
    }
    function validateEmail($email){
        $exEmail = explode("@", $email);
        if(count($exEmail) != 2 ||
        strlen($exEmail[0]) < 3 ||
        strlen($exEmail[1]) < 3 ){
            return false;
        }
        return true;
    }
    function validatePassword($password, &$errors){
        if(strlen($password) < 8)
            $errors['password'][] = "Password pas assez long";
        if(strtolower($password) == $password ||
        strtoupper($password) == $password)
            $errors['password'][] = "Password doit contenir une Minuscule et Majuscule";
        $num = [1,2,3,4,5,6,7,8,9,0];
        if(str_replace($num, '-', $password) == $password)
            $errors['password'][] = "Password doit contenir un chiffre";
        if(ctype_alnum($password))
            $errors['password'][] = "Password doit contenier un caractère spécial";
        if(isset($errors['password']) && count($errors['password']) > 0)
            return false;
        return true;
    }
    function checkForm($data){
        $errors = [];
        if(isset($data['email']) && !empty($data['email'])) {
            if(!validateEmail($data['email'])){
                $errors['email'][] = "Erreur email invalide";
            }
        } else {
            $errors['email'][] = "Erreur email requis";
        }
        if(isset($data['password']) && !empty($data['password'])) {
            validatePassword($data['password'], $errors);
        } else {
            $errors['password'][] = "Erreur password requis";
        }
        return $errors;
    }
