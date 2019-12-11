 <?php 

if ($_GET) 
{

include("database.php"); 
    
if ($delete=mysqli_query($conn,"DELETE FROM components WHERE componentId=".(int)$_GET['id'])) 
{   
    header("location:homepage.php");
    

}
}

?>