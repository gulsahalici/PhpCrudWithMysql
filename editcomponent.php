<html>
<head>
<title>Edit Component</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
</head>
<body>

<?php 

    include("database.php");
    
    $edit = mysqli_query($conn,"SELECT * FROM components WHERE componentId=".(int)$_GET['id']);
    $editing=mysqli_fetch_assoc($edit);

?>

<div class="container">
<center>    
<div class="col-md-8">
    
    <h4>Edit Component</h4>
    
    <form action="" method="post" >
    
        <table class="table">    
            <tr>
                <td>Component Name</td>
                <td><input type="text" name="componentname" class="form-control" value="<?php echo $editing['componentName']; ?>"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" name="stock" class="form-control" value="<?php echo $editing['stock']; ?>" ></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" class="form-control" value="<?php echo $editing['price']; ?>" ></td>
            </tr>        
            <tr>
                <td>Currency</td>
                <td>
                    <select style="width:145px;" name="currency"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                        <option class="dropdown-item"  value="<?php echo $editing['currency']; ?>"><?php echo $editing['currency']; ?></option>
                        <option class="dropdown-item"  value="TRY">TRY</option>
                        <option class="dropdown-item" value="USD">USD</option>
                        <option class="dropdown-item" value="EUR">EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary"  type="submit" value="Edit Component" name="edit"></td>
            </tr>
        </table>

    </form>


    <?php 
    //Edit component in DB
    if (isset($_POST['edit'])) { 

        $componentname = $_POST['componentname']; 
        $stock = $_POST['stock'];
        $price=$_POST['price'];
        $currency=$_POST['currency'];

        if ($componentname!="" && $stock!="" && $price!="" && $currency!="") { 

            $edit="UPDATE components SET componentName='$componentname', stock='$stock', price='$price', currency='$currency' WHERE componentId=".$_GET['id'];

            mysqli_query($conn,$edit); 

            echo "<script type='text/javascript'>alert('Component Updated Succesfully.');</script>";
            
            header("location:homepage.php"); 

        }
        else{
            echo "<script type='text/javascript'>alert('Please Fill In All Fields!');</script>";
        }

    }

    ?>
    
    </div>    
</center>
</div>
</body>
</html>