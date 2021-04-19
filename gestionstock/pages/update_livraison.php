<?php include("../mylibrary/connection.php"); 

$idliv;
$idCmd;
$idF;
$idP;
$adresseLiv;
$prixLiv;
if(isset($_GET['idliv']) && isset($_GET['idCmd']) && isset($_GET['idF']) && isset($_GET['idP']))
    {
        $idliv=$_GET['idliv'];
        $idCmd=$_GET['idCmd'];
        $idF=$_GET['idF'];
        $idP=$_GET['idP'];
        if(!empty($idliv) && !empty($idCmd) && !empty($idF) && !empty($idP)){
            $dr_mod=ExecuteReader($cnx,"select * from livraison where idliv='$idliv'");
            $dr_mod2=ExecuteReader($cnx,"select * from detail_livraison where idliv='$idliv'");
            $data=$dr_mod->fetchAll();
            $idliv=$data[0]['idliv'];
            $idCmd=$data[0]['idCmd'];
            $idF=$data[0]['idF'];
            $idP=$data[0]['idP'];
            $data2=$dr_mod2->fetchAll();
            $adresseLiv=$data2[0]['adresseLiv'];
            $prixLiv=$data2[0]['prixLiv'];
        }
    }

    if(isset($_POST) && count($_POST)>0)
    {
        if(isset($_POST['idliv']))
        {
            $idliv=$_POST['idliv'];
        }
        if(isset($_POST['idCmd']))
        {
            $idCmd=$_POST['idCmd'];
        }
        if(isset($_POST['idF']))
        {
            $idF=$_POST['idF'];
        }
        if(isset($_POST['idP']))
        {
            $idP=$_POST['idP'];
        }
        if(isset($_POST['adresseLiv']))
        {
            $adresseLiv=$_POST['adresseLiv'];
        }
        if(isset($_POST['prixLiv']))
        {
            $prixLiv=$_POST['prixLiv'];
        }
        
        if(!empty($_POST['BTN'])){
            if($_POST['BTN']=="Modifier")
            {
                $req1="update detail_livraison set prixLiv=$prixLiv,adresseLiv='$adresseLiv' where idliv='$idliv' and idCmd='$idCmd' and idF='$idF' and idP='$idP';";
                ExecuteNonQuery($cnx,$req1);
                header("Location:cslt_livraison.php");  
            }
        }
}

?>
<?php include("../mylibrary/pageheader.php"); ?>
<link rel="stylesheet" href="../css/update_page.css">
<link rel="stylesheet" href="../css/formAdd_updt.css">
<link rel="stylesheet" href="../css/style.css">
<section class="top-image">
            <div class="koulchi">
                    <form id="frm1" class="formCreate" method="POST" action="<?= $_SERVER['PHP_SELF'];?>" >

                    <div class="componentFRMC" style="display: none;"> 
                        <label>Livraison : </label>
                        <input value="<?php echo($idliv);?>" type= 'text' name='idliv' id="idF" readonly>
                    </div>

                    <div class="componentFRMC"> 
                        <label>Commande : </label>
                        <input value="<?php echo($idCmd);?>" type= 'text' name='idCmd' id="idF" readonly>
                    </div>

                    <div class="componentFRMC"> 
                        <label>Fournisseur : </label>
                        <input value="<?php echo($idF);?>" type= 'text' name='idF' id="idF" readonly>
                    </div>
                    <div class="componentFRMC"> 
                        <label>Produit : </label>
                        <input value="<?php echo($idP);?>" type= 'text' name='idP' id="idF" readonly>
                    </div>

                    <div class="componentFRMC"> 
                        <label>Adresse : </label>
                        <input style="background-color: transparent;" value="<?php echo($adresseLiv);?>" type= 'text' name='adresseLiv' id="idF" required>
                    </div>

                    <div class="componentFRMC"> 
                        <label>prix : </label>
                        <input style="background-color: transparent;" type="text" value="<?php echo($prixLiv);?>"  name='prixLiv' required>
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Modifier' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>
            </div>
            </section>
          <?php include("../mylibrary/pagefooter.php"); ?>
            