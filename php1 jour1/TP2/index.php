<?php session_start() ?>
<form action="" method="post" >
  <input name="start" type="submit" value="start">
  <input name="stop" type="submit" value="stop">
</form>

<?php
ini_set('date.timezone', 'UTC');
/*
<?php session_start(); ?>
<form action="" method="POST">
  <input type="submit" name="button" value="Start">
  <input type="submit" name="button" value="Stop">
</form>
<?php
ini_set('date.timezone', 'UTC');
if ($_POST['button'] == 'Stop' && $_SESSION['stop'] == true){
  unset($_SESSION);
  session_destroy();
}
elseif ($_POST['button'] == 'Stop' && $_SESSION['stop'] == false){
  $_SESSION['chrono'][1] = time();
  $_SESSION['stop'] = true;
}
if($_POST['button'] == 'Start'){
  $_SESSION['stop'] = false;
  $_SESSION['chrono'][0] = time();
}

$chrono = $_SESSION['chrono']
if(isset($chrono[0]) && isset(*chrono[1])){
  $diff = $chrono[1] - $chrono[0];
  $renderDiff = date("H:i:s", $diff);

  $render = "";
  foreach ($chrono as $time) {
    $render .= "<li>" . date("H:i:s", $time + 3600) . "</li>";
  }
}
if(isset($renderDiff)){
  echo $renderDiff;
}
echo "<ul>$render</ul>";

*/
if ($_POST['start']) {
  $start = date('H:i:s');
  $start_time = time();
  echo $start .'<br>';
}
if ($_POST['stop']) {
  $stop_time = time();
  $timeChrono = $start_time - $stop_time;
  $stop = date('H:i:s');
  echo $stop .'<br>';
  echo date("H:i:s", $timeChrono);
}
