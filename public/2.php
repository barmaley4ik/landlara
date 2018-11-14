<!DOCTYPE html>
<html>
  <head>
    <style>
div {
  display: inline-block;
  top: 0px;
  left: 0px;
  bottom: 0px;
  right: 0px;
  position: absolute;
}
iframe {
  -webkit-transform: scaleX(-1) rotate(2deg);
}
    </style>
  </head>
  <body>

<?php 
phpinfo();
$a = 222355;
$b = 16;
function filt_price($number) {
  $last_number = substr($number, -1);
  if ($last_number != 0) {    
    if ($last_number < 5) {
      $last_number = 5;
      $new_number = substr_replace($number, $last_number, -1);
      return $new_number;
    } elseif ($last_number > 5) {
      $number = $number + 10;
      $last_number = 0;
      $new_number = substr_replace($number, $last_number, -1);
      return $new_number;
    } else {
      return $number;
    }
  }
  return $number;
}

$filt = filt_price($a);
echo $a;
echo '<br>';
echo $filt;

?>
  </body>
</html>