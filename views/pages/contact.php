<!DOCTYPE html>
<html>
<head>
    <title>Email Sender</title>
</head>
<body>

<form method="post" action="send_email.php">
    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject"><br>
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>