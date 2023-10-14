<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addAdmin.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png"type="image/icon type" />
    
  </head>
<body>
    
<section class="container">
      <form action="#" class="form">
        <div id="title"><h2>Add a new admin</h2></div>
        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" id ="name" name="name" placeholder="Enter admin's name" />
        </div>

        <div class="input-box">
            <label for="number">Phone Number</label>
            <input type="number" id="number" name="number" placeholder="Enter admin's number" />
        </div>

        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter admin's email" />
        </div> 

        <div class="input-box">
            <label for ="pass" >Password</label>
            <input type="password" id ="pass" name="pass" placeholder="Enter your password" />
        </div>
        
        <div class="input-box">
            <label for ="gender" >Gender</label>
        </div> 
        <div class ="row">
        <span class ="column">
          <input type="radio" name="gender" id="male" value="male">
          <label for ="male" >Male</label>
        </span>
        <span class ="column">
          <input type="radio" name="gender" id="female" value="female">
          <label for ="female" >Female</label>
        </span>
        </div>

        <button type ="submit">Add Admin</button>
      </form>
    </section>

  </body>
</html>