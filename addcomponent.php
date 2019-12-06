
<?php 
//Add component to DB
if (isset($_POST['add'])) { 

    $componentname = $_POST['componentname']; 
    $stock = $_POST['stock'];
    $price=$_POST['price'];
    $currency=$_POST['currency'];
    
    if ($componentname!="" && $stock!="" && $price!="" && $currency!="") { 
        
        $add="INSERT INTO components (componentName, stock, price, currency) VALUES ('$componentname','$stock','$price','$currency')";
       
        mysqli_query($conn,$add); 
            
        echo "<script type='text/javascript'>alert('Component Added.');</script>";

    }
    else{
        echo "<script type='text/javascript'>alert('Please Fill In All Fields!');</script>";
    }

}

?>