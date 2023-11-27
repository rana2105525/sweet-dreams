<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <meta charset="UTF-8"/>
        <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="public/css/contact.css" />
    </head>
    <body>
   
    <h1>Contact us</h1>
        <form method="post" action="send.php">
            <div class="send">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">

            <label for="message">Message: </label>
            <textarea name="message" id="message"></textarea>
<div class="send_btn">
            <button>send</button>
</div>
</div>
</form>
<?php include 'views/partials/footer.php'; ?>

</body>
    </html>