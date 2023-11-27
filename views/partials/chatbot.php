<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://kit.fontawesome.com/e390cab89c.css">
<script src="https://kit.fontawesome.com/e390cab89c.js" crossorigin="anonymous"></script>
</head>
<body>

<button class="open-button-chat" onclick="openForm()" style="width: 100px; height: 50px;"><i class="fa-solid fa-comment"></i> </button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <a href="javascript:void(0)" class="closbtn-chat" onclick="closeForm()">&times;</a>  
    

    <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/683afdc7-5bda-44ae-9ff8-3090b259a312">
</iframe>
      
  
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>