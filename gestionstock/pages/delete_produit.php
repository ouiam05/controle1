<?php
require_once("../mylibrary/connection.php");
if(isset($_GET['idP']))
{
    $idP=$_GET['idP'];    
    if(!empty($idP)){
        ExecuteNonQuery($cnx,"delete from produit where idP = '$idP';");
        header("Location:cslt_produit.php");
    }
    else{
        ExecuteNonQuery($cnx,"delete from produit where idP = '';");
        header("Location:cslt_produit.php");
    }
}
?>