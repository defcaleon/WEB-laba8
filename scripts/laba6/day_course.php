<?php


$currDate= date("Y-n-j");

$arr = getCourseArr($currDate);

//echo getCourseBlock($currDate);

function getCourseBlock($date,$course){

   $block='<div class="day_course">';
   $block.="<h1>$date</h1>";
   require("test.php");

   $block.="</div>";
   return $block;
}

function getCourseArr($date){

    $url="https://www.nbrb.by/api/exrates/rates?ondate=".$date."&periodicity=0";
    $curl = curl_init($url);

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);


    $out=curl_exec($curl);
    if(curl_error($curl)) {
        return null;
    }

    curl_close($curl);
    $out=json_decode($out);
    return $out;

}