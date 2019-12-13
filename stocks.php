<html>
 <head>
  <title>Stocks</title>
   <?php include("scripts.php"); ?>
 </head>
    
 <body>

<?php 
     
    //If there is product in stock, sales are made
    session_start();
    $panelid= $_SESSION['panelid'];
    $numberofpanels=$_SESSION['numberofpanels'];

     include("database.php");
  
    $pcontent=mysqli_query($conn,"SELECT * FROM panelcontent WHERE panel_id=$panelid");
    
    $outofstock=0;

    while($content=mysqli_fetch_array($pcontent)){
        
        $number=$content['component_number'];
        $componentid=$content['component_id'];
        $number=$number*$numberofpanels;
              
        $stocks=mysqli_query($conn,"SELECT * FROM components WHERE componentId=$componentid");
        
        while($stock=mysqli_fetch_array($stocks)){
            
            $stock=$stock['stock'];
            
            if($stock<$number)
                $outofstock=$outofstock+1;
        }
    }

    if($outofstock>0)
        echo "<center><br><br><br><h4>Sales cannot be performed because stocks are not sufficient.</h4></center>";
    
    else{
        $pcontentt=mysqli_query($conn,"SELECT * FROM panelcontent WHERE panel_id=$panelid");
    
        while($contentt=mysqli_fetch_array($pcontentt)){
        
            $numberr=$contentt['component_number'];
            $componentidd=$contentt['component_id'];
            $numberr=$numberr*$numberofpanels;

            $stockss=mysqli_query($conn,"SELECT * FROM components WHERE componentId=$componentid");

            while($stck=mysqli_fetch_array($stockss)){
            
                $stocknum=$stck['stock'];
                $stocknum=$stocknum-$numberr;
                $stockreduce=mysqli_query($conn,"UPDATE components SET stock=$stocknum WHERE componentId=$componentidd");
            }
        }
            echo "<center><br><br><br><h4>$numberofpanels Panels Sold</h4></center>";
    }

    header("Refresh: 5; url=http://localhost/envest/homepage.php");
    
?>
    </body>
</html>