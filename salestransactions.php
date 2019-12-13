<html>
 <head>
  <title>Sales Transactions</title>
    <?php include("scripts.php"); ?>
 </head>
    
 <body>

<?php include("database.php"); ?>
          
<br><br>
     
<div class="container ">
<center>
<div class="row">
<div class="col-md-10">
    
    <h4>Sales Information</h4><br>
    
    <form action="" method="post" >
         
        <?php    $panelid=0;
            $numberofpanels=0;?>
        
           <table class="table">    
            <tr>
                <td>Company To Sell</td>
                <td><input type="text" name="companytosell" class="form-control" ></td>
            </tr>        
            <tr>
                <td>Panel</td>
                <td>
                    <select name="panel" data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php    
                         $panels=mysqli_query($conn,"SELECT * FROM panels");

                         while($panel=mysqli_fetch_array($panels)){
                             $panelid= $panel['panelId'];
                             $panelname = $panel['panelName'];
                         ?>
                
                        <option class="dropdown-item"  value="<?php echo $panelid ?>"><?php echo $panelname ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
           <tr>
                <td>Number of Panels</td>
                <td><input type="number" name="numberofpanels" class="form-control" ></td>
            </tr> 
            <tr>
                <td></td>
                <td><input class="btn btn-primary" style="width:200px;" type="submit" value="Sell" name="sell"></td>
            </tr>
        </table>
        
    </form>
     
    <?php
    //Sales unit price and total sales amount calculation
    if(isset($_POST['sell']))
    {
?>
    <form method="post" action="stocks.php" >
    <?php
        session_start();
        $companytosell=$_POST['companytosell'];
        $panelid=$_POST['panel'];
        $numberofpanels=$_POST['numberofpanels'];
        $_SESSION['panelid']=$panelid;
        $_SESSION['numberofpanels']=$numberofpanels;
        
        if($companytosell==null || $panelid==0 || $numberofpanels==null){
        
            $companytosell="";
            $numberofpanels=0;
            
            echo "<script type='text/javascript'>alert('Please fill in all fields!');</script>";
          ?>   <script type="text/javascript">
            window.location.assign("http://localhost/envest/salestransactions.php")
            </script> <?php
        }
       else{
    
            $panels=mysqli_query($conn,"SELECT * FROM panels WHERE panelId=$panelid");
    
            while ($panel=mysqli_fetch_assoc($panels)){
            
            $panelname = $panel['panelName'];
            $prifitmargin=$panel['profitMargin'];
            $cost=0;
            $panelcontent=mysqli_query($conn,"SELECT * FROM panelcontent P, components C WHERE P.panel_id=$panelid and P.component_id=C.componentId");
            
            while($content=mysqli_fetch_array($panelcontent)){
            
                $componentname=$content['componentName'];
                $price=$content['price'];
                $number=$content['component_number'];
                $currency=$content['currency'];
                
                if($currency=="USD")
                    $price=$price*5.4;
                
                if($currency=="EUR")
                    $price=$price*6.51;
                
                $cost=$cost+$price*$number;
            }
                $cost=$cost+$cost*$prifitmargin/100;
                $total=$cost*$numberofpanels;    
                
                echo "<hr/><br><label>$companytosell</label>";
                echo "<br><br><label>$panelname ( $numberofpanels Pieces ) </label>";
                echo "<br><br>Unit Sales Price : <label >$cost  ₺ </label>";
                echo "<br><br>Total Sales Price : <label >$total  ₺ </label>";
         
        ?> 
        
        <br><input name="confirmsale" class="btn btn-success" type="submit" value="Confirm Sale" style="height:45px; width:600px; margin-top:50px";>
        
    </form>    
<?php
            
            }   
       }     
    }
?>
    
    
    
    
    
    
    </div>
    </div>
    </center>
     </div>
    </body>
</html>