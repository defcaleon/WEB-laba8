<?php

echo "<h1>Пользователь был на сайте</h1>";
foreach ($_COOKIE as $key => $value){
    echo $key."|".$value;
    echo "</br>";
}