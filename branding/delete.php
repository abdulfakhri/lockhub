<?php
require_once ('../includes/db.php');
if(isset($_POST['brand']))
{
    $db = new DBController();
    $conn = $db->connect();
    try{
        mysqli_query($conn,'DELETE FROM pass_notes where id='.$_POST['brand'].'');
        echo "Deleted Successfully";
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>