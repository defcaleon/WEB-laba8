<?php

    session_start();
    if($_SESSION["code"] == $_POST["captcha"]) {

        $mess = substr(htmlspecialchars(trim($_POST['msg'])), 0, 1000000);
        mail($_POST["list1"], 'Feedback', $mess, 'From: nikitkaspamer@gmail.com');

        //var_dump( mail($_POST["list1"],"feedback",$mess,'From: mamkinspamer@mail.ru'));

        echo "<br>
        <strong>Thank you for your feedback!</strong>";
    }else{
        echo '<p>You entered an incorrect Captcha.</p>';
    }