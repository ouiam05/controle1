<?php
require_once("../mylibrary/connection.php");
if(isset($_GET['idCmd']) && isset($_GET['idF']) && isset($_GET['idP']))
{
    $idCmd=$_GET['idCmd'];    
    $idF=$_GET['idF'];
    $idP=$_GET['idP'];
    if(!empty($idCmd)){
        ExecuteNonQuery($cnx,"delete from commande where idCmd = '$idCmd' and idF = '$idF'and idP = '$idP';");
        header("Location:cslt_commande.php");
    }
    else{
        ExecuteNonQuery($cnx,"delete from commande where idCmd = '';");
        header("Location:cslt_commande.php");
    }
}
?>
