<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".././css/addProduct.css" />
    <link rel="icon" href="../../imgs/Sweet Dreams logo-01.png"type="image/icon type" />
    
  </head>
<body>
    
<section class="container">
      <form action="#" class="form">
        <div id="title"><h2>Add a new product</h2></div>
        <div class="input-box">
            <label for ="name">Product Title</label>
            <input type="text" id="name" placeholder="Enter product's title" required />
        </div>

        <div class="input-box">
            <label for="price" >Product price</label>
            <input type="number" step="any" id ="price" placeholder="Enter product's price" required />
        </div>

        <div class="input-box">
            <label for ="description">Product description</label>
            <input type="text" id="description" placeholder="Enter product's descriptioon" required />
        </div> 

        <div class="input-box">
            <label for="image">Product image</label>
            <input type="file" id="image" accept =".png,.jpg" required />
        </div>
        

        <button>Submit</button>
      </form>
    </section>

  </body>
</html>