 <?php 

if ($_GET) 
{

include("database.php"); 
    
if ($delete=mysqli_query($conn,"DELETE FROM components WHERE componentId=".(int)$_GET['id'])) 
{   
  
    ?>   <script type="text/javascript">
            window.location.assign("http://localhost/envest/homepage.php")
            </script>
    <?php   

}
}

?>