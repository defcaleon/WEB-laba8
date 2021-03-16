<?php
    header("Content-Type: text/html; charset=utf-8");
    $myStr=trim($_POST["text"]);
    try {
    	
    	if($myStr==null){
    		throw new Exception('empty text');
    	}
        $myStr = preg_replace('/\s+/', ' ', $myStr);
    	$strArr= explode(" ",$myStr);
    	output($strArr);

    }
    catch (Exception $e) {
    	echo $e->getMessage();
    }


    function output(&$arr){
        echo "<p>";
        foreach ($arr as $item){
            if(abbreviation($item)){
                echo "<span style=\"color:red\" >$item</span> ";
            }elseif (firstLetInWord($item)){
                echo "<span style=\"color:green\" >$item</span> ";
            }elseif (isNumber($item)){
                echo "<u>$item</u> ";
            }else{
                echo "$item ";
            }
        }


        echo "</p><br/>";
    }

    //return true if word start with big letter
    function firstLetInWord($str){
        if($str==null||strlen($str)==0){
            return false;
        }elseif(ctype_upper($str[0])){
            return true;
        }else{
            return  false;
        }

    }

    //return true if the word is abbreviation
    function abbreviation($str){
        $isMatched = preg_match('/[A-Z].*[A-Z]/', $str, $matches);
        if($isMatched!==0){
            return true;

        }else{
            return  false;

        }
    }
    //return true if the word is number
    function isNumber($str){
        $isMatched = preg_match('/^[0-9]*$/', $str, $matches);
        if($isMatched!==0){
            return true;
        }else{
            $isMatched = preg_match('/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/', $str, $matches);
            if($isMatched!==0){
                return true;
            }else {
                return false;
            }
        }
    }

