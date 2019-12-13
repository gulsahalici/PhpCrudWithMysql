<html>
 <head>
     <title>Panels</title>
    <?php include("scripts.php"); ?>
 </head>
    
 <body>

<?php include("database.php"); ?>
    
<br><br>
<div class="container ">
<center>    

<div class="row">
<div class="col-md-12">
    <h4>PANELS</h4>  
    <br>
    <form action="addpanel.php">
    <input class="addCF btn btn-secondary" style="widt:300px;"  type="submit" value="Add New Panel" name="addcomp">
    </form>
        <br>
    
        <?php
        //Panels table's datas
    
        $panels=mysqli_query($conn,"SELECT * FROM panels");
    
        while ($panel=mysqli_fetch_assoc($panels)){  
            
        $panelCost=0;
        $panelid=$panel['panelId'];
        $panelname = $panel['panelName'];
        $profitmargin=$panel['profitMargin'];
            
        $panelcontent=mysqli_query($conn,"SELECT * FROM panelcontent P, components K WHERE P.panel_id=$panelid and P.component_id=K.componentId");
        ?>
        <h5><?php echo $panelname; ?> Content</h5>  
        
    <table class="table" id="panel"> 
        <tr>
            <td>Component Name</td>
            <td>Component Number</td>
        </tr>
        <br>
    <?php       
            $cmpnum=0;
        while($content=mysqli_fetch_array($panelcontent)){
            
            $componentname=$content['componentName'];
            $number=$content['component_number'];
            $price=$content['price'];
            $currency=$content['currency'];
            
            if($currency=="USD")
                $price=$price*5.4;
            
            if($currency=="EUR")
                $price=$price*6.2;
            
                $panelCost=$panelCost+$price*$number;
                $cmpnum=$cmpnum+1;
                echo "<tr>
                <td>$componentname</td>
                <td>$number</td>
                </tr>";
            }
            ?>
        <tr>
                <td>PANEL COST = <?php echo $panelCost ?> ₺</td>
                <td><a href="editpanel.php?id=<?php echo $panelid; ?>&&cmpnum=<?php echo $cmpnum; ?>" class="btn btn-primary" style="width:80px;">Edit</a></td>
        </tr>
        <tr>
                <td>PANEL PROFIT MARGIN = % <?php echo $profitmargin ?></td>
                <td><a href="deletepanel.php?id=<?php echo $panelid; ?>" class="btn btn-danger"  onclick="return window.confirm('Are you sure delete this panel?');">Delete</a></td>
                </tr>
       </table><?php
        }
    ?>
            

  
</div>    
</div>
            </center>
        </div>



    </body>
</html>


