<?php

$timeToSave = time()+(60*60*24*365*10); // 10 years
$arrSize = count($_COOKIE);
$currDate = date('l jS \of F Y h:i:s A');;

setcookie($arrSize,$currDate,$timeToSave);
