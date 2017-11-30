<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['errors'])){
                echo "<ul>";
                foreach ($_SESSION['errors'] as $key => $errors) {
                    echo "<li> <strong>$key</strong><ul>";
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul></li>";
                }
                echo "</ul>";
            }
        ?>
        <form class="" action="form_register.php" method="post">
            <label for="email">Email</label>
            <input id="email" type="text" name="email">
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
            <input type="submit" name="submit" value="Inscription">
        </form>
    </body>
</html>
