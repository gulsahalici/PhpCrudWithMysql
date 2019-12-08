<html>
 <head>
  <title>Homepage</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
 </head>
    
 <body>

<?php include("database.php"); ?>
          
<br><br>
     
<div class="container ">
<center>
<div class="row">
<div class="col-md-10">
    
    <h4>Add Component</h4>
    
    <form action="" method="post" >
    
        <table class="table">    
            <tr>
                <td>Component Name</td>
                <td><input type="text" name="componentname" class="form-control" ></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" name="stock" class="form-control" ></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" class="form-control" ></td>
            </tr>        
            <tr>
                <td>Currency</td>
                <td>
                    <select style="width:145px;" name="currency"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <option class="dropdown-item"  value="">Select Currency</option>
                        <option class="dropdown-item"  value="TRY">TRY</option>
                        <option class="dropdown-item" value="USD">USD</option>
                        <option class="dropdown-item" value="EUR">EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary"  type="submit" value="Add Component" name="add"></td>
            </tr>
        </table>

    </form>
    
    <?php include("addcomponent.php"); ?>
    
</div>    
   
<div class="col-md-2">
        
    <a href="panels.php" class="btn btn-secondary" style="width:200px;">Show Panels</a>
    
</div> 
</div>
    <?php include("components.php"); ?>
    
            </center>
        </div>
    </body>
</html>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>