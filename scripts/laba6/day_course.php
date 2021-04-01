<?php


$currDate= date("d.M.Y");
echo getCourseBlock($currDate);

function getCourseBlock($date){

   $block='<div class="day_course">';
   $block.="<h1>$date</h1>";

   $block.="</div>";
   return $block;
}

function getCourseArr($date){

    $ch = curl_init("https://belarusbank.by/api/kursExchange");
    $fp = fopen("example_homepage.txt", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    if(curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }
    curl_close($ch);
    fclose($fp);


}