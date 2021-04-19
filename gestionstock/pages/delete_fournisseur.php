<?php
require_once("../mylibrary/connection.php");
if(isset($_GET['idF']))
{
    $idF=$_GET['idF'];    
    if(!empty($idF)){
        ExecuteNonQuery($cnx,"delete from fournisseur where idF = '$idF';");
        header("Location:cslt_fournisseur.php");
    }
    else{
        ExecuteNonQuery($cnx,"delete from fournisseur where idF = '';");
        header("Location:cslt_fournisseur.php");
    }
}
?>