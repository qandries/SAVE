<?php
  require_once 'form_register_v2.php';
  if(!empty($_POST) && isset($_POST['submit'])){
    $errors = checkForm($_POST);
    var_dump($errors);
  }
  $hello = 'hello.txt';
  file_put_contents($hello, $data['text']);
?>
<form class="" action="" method="POST">
  <label for="email" >Email</label>
  <input id="email" type="text" name="email">
  <label for="password" >Password</label>
  <input id="password" type="password" name="password">
  <input type="submit" name="submit" value="Subscribe">
  <input type="text" name="data" value="">
</form>
