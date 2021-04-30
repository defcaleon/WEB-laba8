<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <script src="refresh.js"></script>
</head>

<body>

<form method='POST' action='logic.php'>

    <h1>Feedback Form</h1>

    <label>First Name</label><br>
    <input type='text' name='name'>

    <br><br>

    <label>Choose from the list<label><br>
            <select name="list1" required>
                <option>nikitka.parmon@mail.ru</option>
                <option>nikita.vrunishka@gmail.com</option>
            </select>

            <br><br>

            <label>Message:</label><br>
            <textarea name='msg'></textarea>

            <br><br>



            <div class="elem-group">
                <label for="captcha">Please Enter the Captcha Text</label>
                <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
                <br>
                <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
            </div>

            <br><br>
            <input type='submit' value='Enter your feedback'>

</form>

</body>
</html>