<?php

date_default_timezone_set('Asia/Makassar');
$jam=date('H:i:s') ;
$jam=date('H:i:s' , strtotime($jam));

$jambuka = date('H:i:s' , strtotime("15:00:00"));
$jammenu = date('H:i:s' , strtotime("23:0:00"));
$jamtutup = date('H:i:s' , strtotime("23:59:59"));

if (($jam >= $jambuka) && ($jam <= $jammenu)) {
  echo '<h3 class="badge badge-light" > OPEN </h3>' ;
}
elseif  (($jam >= $jammenu) && ($jam <= $jamtutup)) {
  echo '<h3 class="badge badge-light"  > CLOSE ORDER </h3>' ;
}
else {
  echo '<h3 class="badge badge-light"  > CLOSE </h3>' ;
}
?> 


