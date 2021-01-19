<?php
function elapsed($timestamp, $precision = 3) {
  $time = time() - $timestamp;
  $a = array( 'J' => 86400, 'h' => 3600, 'm' => 60);
  $i = 0;
  foreach($a as $k => $v) {
    $$k = floor($time/$v);
    if ($$k) $i++;
    $time = $i >= $precision ? 0 : $time - $$k * $v;
    
    $$k = $$k ? $$k.' '.$k.' ' : '';
    @$result .= $$k;
  }
  return $result ? $result.'avant' : '1 sec';
}
?>