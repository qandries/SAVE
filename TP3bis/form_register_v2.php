<?php

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
