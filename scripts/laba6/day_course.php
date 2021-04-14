<?php


$currDate = date("Y-n-j");
$yesterdayDate=date('Y-n-j', strtotime($currDate. " - 1 day"));

$arr = getCourseArr($yesterdayDate);
echo getCourseBlock($yesterdayDate, $arr);

$arr = getCourseArr($currDate);
echo getCourseBlock($currDate, $arr);



function getCourseBlock($date, $course)
{

    $block = '<div class="day_course">';
    $block .= "<h1>$date</h1>";
    $block .= getCourseBlockFromCourseArr($course, 4);
    $block .= getCourseBlockFromCourseArr($course, 5);
    $block .= getCourseBlockFromCourseArr($course, 16);
    $block .= "</div>";
    return $block;
}

function getCourseArr($date)
{

    $url = "https://www.nbrb.by/api/exrates/rates?ondate=" . $date . "&periodicity=0";
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


    $out = curl_exec($curl);
    if (curl_error($curl)) {
        return null;
    }

    curl_close($curl);
    $out = json_decode($out);
    return $out;

}

function getCourseBlockFromCourseArr($course, $i)
{
    $block = '<div class="Currency_block">';
    $currencyName = $course[$i]->Cur_Abbreviation;
    $currencyVal = $course[$i]->Cur_OfficialRate;
    $block .= "<p>$currencyName  $currencyVal  </p>";

    $block .= "</div>";
    return $block;
}