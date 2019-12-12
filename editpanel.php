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
     <div class="container ">
<center>    

<div class="row">
<div class="col-md-12">
    <form method="post" >
     <?php
        include("database.php");
    
        $panels=mysqli_query($conn,"SELECT * FROM panels WHERE panelId=".(int)$_GET['id']);
    
        while ($panel=mysqli_fetch_assoc($panels)){  
            
        $panelid=$panel['panelId'];
        $panelname = $panel['panelName'];
        $profitmargin=$panel['profitMargin'];
            
        $panelcontent=mysqli_query($conn,"SELECT * FROM panelcontent P, components K WHERE P.panel_id=$panelid and P.component_id=K.componentId");
        ?>
        
        
    <table class="table" id="panel"> 
          <tr>
            <td>Panel Name</td>
            <td >Panel Profit Margin ( % )</td>
        </tr>
         <tr>
            <td><input type="text" name="panelName" class="form-control" value="<?php echo $panelname; ?>"></td>
            <td ><input type="number" name="profitMargin" class="form-control" value="<?php echo $profitmargin; ?>" > </td>
        </tr>
       <tr>
            <td>Components Name</td>
            <td >Components Number</td>
        </tr>
        <br>
    <?php       
            $q=1;
            $x="drpdwn";
            $y="cmp";
        while($content=mysqli_fetch_array($panelcontent)){
            
            $componentname=$content['componentName'];
            $number=$content['component_number'];
            $price=$content['price'];
            $currency=$content['currency'];
            ?>
                <tr>
                <td><select name="<?php echo $x.$q;?>" data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php    
                         //Show components
                         $components=mysqli_query($conn,"SELECT * FROM components");

                         while($component=mysqli_fetch_array($components)){
                             $componentid= $component['componentId'];
                             $componentName = $component['componentName'];
                         ?>
                
                        <option class="dropdown-item" <?php if($componentName==$componentname) echo"selected='selected'";?>  value="<?php echo $componentid ?>"><?php echo $componentName ?></option>
                        <?php } ?>
                    </select></td>
                <td><input type="number"name="<?php echo $y.$q;?>" class="form-control" value="<?php echo $number ?>" ></td>
                    
                <?php
                             $q=$q+1;
            }
        
            ?>
        
     
       </table>
    
        <?php
        }
        ?>
    <input class="btn btn-primary" style="widt:300px;"  type="submit" value="Save Changes" name="edit" >
    </form>
    
    
    </div>
    </div>
         </center>
     </div>
       </body>
</html>

<?php 
//Edit panel and components of panel to DB
if (isset($_POST['edit'])) { 

    $panelname = $_POST['panelName']; 
    $profitMargin=$_POST['profitMargin'];
    $panelid=$_GET['id'];
    $num=$_GET['cmpnum'];
    
    if ($panelname!="" && $profitMargin!="") {
        
        $dolu=0;
        $a=0;
        $t=1;
        $z="cmp";
        $m="drpdwn";
        
        while($a<$num){
            if($_POST[$z.$t]!="")
                $dolu=$dolu+1;
            $a=$a+1;
            $t=$t+1;
        }
        
        $a=0;
        $t=1;
        
    if($dolu==$num){
        
        $editpanel=mysqli_query($conn,"UPDATE panels SET panelName='$panelname', profitMargin='$profitMargin' WHERE panelId=$panelid");
        
        $pcid=mysqli_query($conn,"SELECT pc_id from panelcontent WHERE panel_id=$panelid");
        while($pcidd=mysqli_fetch_array($pcid)){
            $pc_id=$pcidd['pc_id'];
            break;
        }
        
        while($a<$num){
            
            $pc_id=$pc_id+$a;
            $componentid= $_POST[$m.$t]; 
            $componentnumber=$_POST[$z.$t];
        
            $editcontent=mysqli_query($conn,"UPDATE panelcontent SET component_id='$componentid', component_number='$componentnumber' WHERE panel_id=$panelid and pc_id=$pc_id");
            $a=$a+1;
            $t=$t+1;
        }
        
        echo "<script type='text/javascript'>alert('Panel Succesfully Updated.');</script>";
       ?>   <script type="text/javascript">
            window.location.assign("http://localhost/envest/panels.php")
            </script>
    <?php
    }
        else{
                    echo "<script type='text/javascript'>alert('Please Fill In All Fields!');</script>";
        }
        
    }
    else{
                    echo "<script type='text/javascript'>alert('Please Fill In All Fields!');</script>";
    }
}
            
?>

