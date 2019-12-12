 <?php 

if ($_GET) 
{

include("database.php"); 
    
    
    $deletec=mysqli_query($conn,"DELETE FROM  panelcontent WHERE panel_id=".(int)$_GET['id']);
    $deletep=mysqli_query($conn,"DELETE FROM panels WHERE panelId=".(int)$_GET['id']);
  
    ?>   <script type="text/javascript">
            window.location.assign("http://localhost/envest/panels.php")
            </script>
    <?php   


}

?>