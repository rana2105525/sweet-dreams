<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="reg.css" />
  </head>
  
  <body>
    
    <section class="container">
    <img src="imgs/Sweet Dreams logo-01.png" alt="logo" >
      <form action="#" class="form">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" required />
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" placeholder="Enter your password" required />
          </div>

        <div class="input-box">
            <label>Confirm password</label>
            <input type="password" placeholder="Confirm your password" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" placeholder="Enter birth date" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
           
          </div>
        </div>
       
        <button>Submit</button>
      </form>
    </section>
  </body>
</html>