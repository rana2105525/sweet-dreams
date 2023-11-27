<!DOCTYPE html>
<html>
    <head>
        <title>Sent successfully</title>
        <meta charset="UTF-8"/>
        <link rel="icon" href="../../public/images/sweet dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="public/css/send.css" />
    </head>
    
<?php
    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__."/vendor/autoload.php";

    $name=$_POST["name"];
    $message=$_POST["message"];

  
        $base_url="https://6gy1yr.api.infobip.com";
        $api_key="991292cae438dd6529124142c0930953-11b26991-5f38-4c14-8766-12a01a3fede3";

        $configuration = new Configuration(host:$base_url, apiKey:$api_key);
        $api = new SmsApi(config:$configuration);
        $destination = new SmsDestination(to:"00-20-1004222194");
        $message = new SmsTextualMessage(
            destinations:[$destination],
            text:$message,
            from:"$name"
        );
        $request = new SmsAdvancedTextualRequest(messages:[$message]);
        $response = $api->sendSmsMessage($request);
  
    echo "<h1>message sent successfully</h1>";

?>
<?php include 'views/partials/footer.php'; ?>
</html>