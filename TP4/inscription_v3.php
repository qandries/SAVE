<?php
  require_once 'form_register_v3.php';
  if(!empty($_POST) && isset($_POST['submit'])){
    $errors = checkForm($_POST);
    if (count($errors) == 0) {
        $res = saveUser($_POST['email'], $_POST['password']);
        if($res)
            echo "Inscription reçus";
    }
  }
?>
<form class="" action="" method="POST">
    <div class="form-group">
        <label for="email" >Email</label>
        <input
        name="email"
        type="text"
        class="form-control <?php if (isset($errors['email'])) { echo 'is-invalid';} ?>"
        id="email"
        placeholder="Enter email"
        value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"
        >
        <?php if(isset($errors[email])) { echo displayErrors($errors['email']); } ?>
    </div>
    <div class="form-group">
        <label for="password" >Password</label>
        <input type="password" name="password" class="form-control <?php if(isset($errors['password'])){ echo 'is-invalid';}?>" id="password" placeholder="Password">
        <?php if (isset($errors['password'])) { echo displayErrors($errors['password']); } ?>
    </div>
    <input type="submit" name="submit" value="Subscribe">
</form>
