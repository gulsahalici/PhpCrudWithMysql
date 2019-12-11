<html>
 <head>
     <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
 </head>
    
 <body>

<?php include("database.php"); ?>
    
<br><br>
<div class="container ">
<center>    

<div class="row">
<div class="col-md-12">
    
    <h4>Add Panel</h4>
    <form action="panels.php" method="post">
    
        <table class="table" id="panel">    
            <tr>
                <td>Panel Name</td>
                <td><input type="text" name="panelname" class="form-control" ></td>
            </tr>
            <tr>
                <td>Profit Margin</td>
                <td><input type="number" name="profitMargin" class="form-control" ></td>
            </tr>
            <tr style="align:center;">
                <td>Components Of Panel</td>
                <td>Number of Component</td>
            </tr>
            <tr>
            <td>        
                    <select name="drpdwn1" data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php    
                         //Show components
                         $components=mysqli_query($conn,"SELECT * FROM components");

                         while($component=mysqli_fetch_array($components)){
                             $componentid= $component['componentId'];
                             $componentname = $component['componentName'];
                         ?>
                
                        <option class="dropdown-item"  value="<?php echo $componentid ?>"><?php echo $componentname ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="number" class="form-control" name="cmpnumber1" ></td>
                <td></td>
            </tr>           
            <tr>
                <td></td>
            </tr>
        </table>

                    <input class="btn btn-primary"  type="submit" value="Add Panel" name="addpanel">
    </form>
    <input class="addCF btn btn-secondary" style="widt:300px;"  type="submit" value="Add Component To The Panel" name="addcomp">
</div>    
</div>
            </center>
        </div>


<script type="text/javascript">
 //New components add button
$(document).ready(function(){
    var cnt = 2;
   $(".addCF").click(function(){
      $("#panel").append('<tr><td><select name="drpdwn'+cnt+'" data-style="bg-white rounded-pill px-4 py-3 shadow-sm " name="currency"  class="btn dropdown-toggle w-100"> <?php $components=mysqli_query($conn,"SELECT * FROM components"); while($component=mysqli_fetch_array($components)){$componentid= $component['componentId'];$componentname = $component['componentName'];?><option value="<?php echo $componentid ?>"><?php echo $componentname ?></option><?php } ?></select><td><input type="number" name="cmpnumber'+cnt+'" class="form-control" ></td></td><td><input class="remCF btn btn-danger" type="submit" value="Delete"></td></tr>');
      cnt++;
       
   });
    
 
    $("#panel").on('click','.remCF',function(){
      if (confirm("Are you sure delete this component?"))
        {
        $(this).parent().parent().remove();
      }
    });  
   
});
    
</script>


    </body>
</html>


<?php 
//Add panel and components of panel to DB
if (isset($_POST['addpanel'])) { 

    $panelname = $_POST['panelname']; 
    $profitMargin=$_POST['profitMargin'];
    $compnumber=$_POST['cmpnumber1'];
    
    if ($panelname!="" && $profitMargin!="" && $compnumber!="") { 
    
     $addpanel="INSERT INTO panels (panelName, profitMargin) VALUES ('$panelname','$profitMargin')";
    
      mysqli_query($conn,$addpanel); 
      $panelid=mysqli_insert_id($conn);

    $q=1;
    $x="drpdwn";
    $y="cmpnumber";
        for($q=1; $q<100; $q++){
        if((isset($_POST[$x.$q])!=null) && ($_POST[$y.$q]!=null) ){
        $componentid= $_POST[$x.$q]; 
        $componentnumber=$_POST[$y.$q];
    
        $addcontent="INSERT INTO panelcontent (panel_id, component_id,component_number) VALUES ('$panelid','$componentid','$componentnumber')";   
        
        mysqli_query($conn,$addcontent); 
        $q=$q+1;
        }
        }
        echo "<script type='text/javascript'>alert('Panel Added.');</script>";
        // header('Location:http://localhost/envest/panels.php');
        
    }

else{
        echo "<script type='text/javascript'>alert('Please Fill In All Fields!');</script>";
    }
    
    
}

?>