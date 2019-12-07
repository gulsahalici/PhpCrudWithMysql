<div class="col-md-10">
    <h4>Components</h4>
         <table class="table">
             <thead>
                 <tr>
                     <th scope="col">Component Name</th>
                     <th scope="col">Stock</th>
                     <th scope="col">Price</th>
                     <th scope="col">Currency</th>
                     <th></th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 <?php    
                 //Show components table
    
                 $components=mysqli_query($conn,"SELECT * FROM components");
    
                 while($component=mysqli_fetch_array($components)){
                    
                     ?><form name="form1" method="post" action=""><?php
                     
                     $componentid= $component['componentId'];
                     $componentname = $component['componentName'];
                     $stock= $component['stock'];
                     $price=$component['price'];
                     $currency=$component['currency'];
                 ?>
                 <tr>
                     <td><?php echo $componentname ?></td>
                     <td><?php echo $stock ?></td>
                     <td><?php echo $price ?></td>
                     <td><?php echo $currency ?></td>
                     <td><a href="editcomponent.php?id=<?php echo $componentid; ?>" class="btn btn-primary" style="width:80px;">Edit</a></td>
                     <td><a href="deletecomponent.php?id=<?php echo $componentid; ?>" class="btn btn-danger">Delete</a></td>
                 </tr> 
                 </form><?php         
                 }
                 ?>  
             </tbody>
         </table>   
    </div>