<html>
 <head>
  <title>Homepage</title>
 </head>
    
 <body>

<?php
    $conn = mysqli_connect("localhost", "root", "", "envestdb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
     
<center>
    <table>
    <tr>
        <td>COMPONENTS</td>
    </tr>
    <tr>
        <td>Component Name</td>
        <td>Stock</td>
        <td>Price</td>
        <td>Currency</td>
    </tr>
    
<?php    
    //Show components table
    
    $components=mysqli_query($conn,"SELECT * FROM components");
    
    while($component=mysqli_fetch_array($components)){
    
        $componentname = $component['componentName'];
        $stock= $component['stock'];
        $price=$component['price'];
        $currency=$component['currency'];
            
        echo "<tr>
            <td>$componentname</td>
            <td>$stock</td>
            <td>$price</td>
            <td>$currency</td>
            </tr>";         
    }
?>                 
</table>
</center>


</body>
</html>