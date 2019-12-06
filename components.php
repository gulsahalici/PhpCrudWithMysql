<div class="col-md-10">
    <h4>Components</h4>
         <table class="table">
             <thead>
                 <tr>
                     <th scope="col">Component Name</th>
                     <th scope="col">Stock</th>
                     <th scope="col">Price</th>
                     <th scope="col">Currency</th>
                 </tr>
             </thead>
             <tbody>
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
             </tbody>
         </table>   
    </div>