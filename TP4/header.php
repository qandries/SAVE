<!DOCTYPE html>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="" method="POST">
        <div class="form-group mr-auto">
            <label for="login" >Login</label>
            <input
            name="login"
            type="text"
            class="form-control <?php if (isset($errors['login'])) { echo 'is-invalid';} ?>"
            id="login"
            placeholder="Enter login"
            value="<?php if(isset($_POST['login'])) { echo $_POST['login'];} ?>"
            >
        </div>
        <div class="form-group mr-auto">
            <label for="password2" >Password</label>
            <input
            type="password"
            name="password2"
            class="form-control <?php if(isset($errors['password2'])){ echo 'is-invalid';}?>"
            id="password2"
            placeholder="Password">
            <?php if (isset($errors['password2'])) { echo checkError($errors['password2']); } ?>
        </div>
        <input type="submit" name="submit2" value="Sign in">
    </form>
  </div>
</nav>
</header>
