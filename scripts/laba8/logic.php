<?php

    session_start();
    //var_dump($_POST);
    //var_dump($_SESSION["code"] );
    //echo "</br>";
    //var_dump($_POST["captcha_challenge"] );
    if($_SESSION["code"] == $_POST["captcha_challenge"]) {

        $mess = substr(htmlspecialchars(trim($_POST['msg'])), 0, 1000000);
        mail($_POST["list1"], 'Feedback', $mess, 'From: nikitkaspamer@gmail.com');

        //var_dump( mail($_POST["list1"],"feedback",$mess,'From: mamkinspamer@mail.ru'));

        echo "<br>
        <strong>Thank you for your feedback!</strong>";
    }else{
        echo '<p>You entered an incorrect Captcha.</p>';
    }