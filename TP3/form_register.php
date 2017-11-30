<?php
    session_start();
    function checkReferer($path)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $ex = explode("/", $_SERVER['HTTP_REFERER']);
        }
        if (!isset($_SERVER['HTTP_REFERER']) || end($ex) != $path) {
            header ("Location:$path");
        }
    }
    function validateEmail($email){
        $exEmail = explode("@", $email);
        if (count($exEmail) != 2 || strlen($exEmail[0]) < 3 || strlen($exEmail[1]) < 3) {
            return false;
        }
        return true;
    }
    function validatePassword($password, &$errors){
        if (strlen($password) < 8)
            $errors['password'][] = "Password pas assez long";
        if (strtolower($password) == $password || strtoupper($password) == $password)
            $errors['password'][] = "Password doit contenir une minuscule et une majuscule";
        $num = [0,1,2,3,4,5,6,7,8,9];
        if (str_replace($num, '-', $password) == $password)
            $errors['password'][] = "Password doit contenir un chiffre";
        if (ctype_alnum($password))
            $errors['password'][] = "Password doit contenir un caractère spécial";
        if (isset($errors['password']) && count($errors['password']) > 0)
            return false;
        return true;
    }
    $errors = [];
    checkReferer('inscription.php');
    if (!empty($_POST) && isset($_POST['submit'])) {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            if (!validateEmail($_POST['email'])) {
                $errors['email'][] = "Erreur email invalide";
            }
        }else {
            $errors['email'][] = "Erreur email requis";
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            validatePassword($_POST['password'], $errors);
        }else {
            $errors['password'][] = "Erreur password requis";
        }
        if (count($errors) > 0) {
            $_SESSION["errors"] = $errors;
            header("Location:inscription.php");
        }
    }
