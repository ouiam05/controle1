<?php
require_once("../mylibrary/connection.php");
if(isset($_GET['idliv']) && isset($_GET['idCmd']) && isset($_GET['idF']) && isset($_GET['idP']))
{
    $idliv=$_GET['idliv']; 
    $idCmd=$_GET['idCmd'];  
    $idF=$_GET['idF'];  
    $idP=$_GET['idP'];  
       
    if(!empty($idliv)){
        ExecuteNonQuery($cnx,"delete from livraison where idliv='$idliv' and idCmd='$idCmd' and idF='$idF' and idP='$idP' ;");
        header("Location:cslt_livraison.php");
    }
    else{
        ExecuteNonQuery($cnx,"delete from livraison lv,detail_commande dcmd where idliv= '';");
        header("Location:cslt_livraison.php");
    }
}
?>