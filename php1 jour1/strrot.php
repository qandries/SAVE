<form action="" method="POST">
  <input name="word" type="text">
  <input name="offset" type="text">
  <input type="submit">
</form>
<?php
$word = $_POST['word'];
$offset = $_POST['offset'];
$alpha = 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz';
$length = strlen($word);
$str= '';
for ($i=0; $i < $length; $i++) {
  $char = $word[$i];
  $pos = strpos($alpha, $char);
  $posOffset = $pos + $offset;
  $str = $str . $alpha[$posOffset];
}
echo $str;
