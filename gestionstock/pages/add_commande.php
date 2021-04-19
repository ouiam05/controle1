<?php include("../mylibrary/connection.php"); 

$drcpt=ExecuteReader($cnx,"select * from commande");
$size=$drcpt->rowCount();
$idCmd;
$idF;
$idP;
$qte;
$d=strtotime("tomorrow");
$dateCmd= date("Y-m-d", $d);
    if(isset($_POST) && count($_POST)>0)
    {
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
        if(isset($_POST['qte']))
        {
            $qte=$_POST['qte'];
        }
        
        if(!empty($_POST['BTN'])){
            if($_POST['BTN']=="Ajouter")
            {
                $req1="insert into commande values('$idCmd','$idF','$idP','$dateCmd');";
                ExecuteNonQuery($cnx,$req1);
                $req1="insert into detail_commande values('$idCmd','$idF','$idP','$qte');";
                ExecuteNonQuery($cnx,$req1);
                header("Location:cslt_commande.php");  
            }
        }
}
$drF=ExecuteReader($cnx,"select idF,nameF from fournisseur;");
$drP=ExecuteReader($cnx,"select idP,libelle from produit;");

?>
 
<?php include("../mylibrary/pageheader.php"); ?>
<link rel="stylesheet" href="../css/update_page.css">
<link rel="stylesheet" href="../css/animationUpdate.css">
<link rel="stylesheet" href="../css/formAdd_updt.css">
<link rel="stylesheet" href="../css/closePages.css">
<link rel="stylesheet" href="../css/style.css">
<section class="top-image">
            <div class="koulchi">
            <form id="frm1" class="formCreate" method="POST" action="<?= $_SERVER['PHP_SELF'];?>" >
                    <div class="componentFRMC"> 
                        <label>idCmd: </label>
                        <input type='text' name='idCmd'>
                    </div>
                    <div class="componentFRMC"> 
                        <label>Fournisseur: </label>
                        <select name="idF" >
                            <?php while($ouiam=$drF->fetch()){ ?>
                            <option value='<?php echo($ouiam['idF']); ?>'><?php echo($ouiam['nameF']); ?></option>
                            <?php }$drF->closeCursor();?>
                        </select>    
                    </div>

                    <div class="componentFRMC">
                        <label>Produit : </label>
                        <select name="idP" >
                            <?php while($ouiam=$drP->fetch()){ ?>
                            <option value='<?php echo($ouiam['idP']); ?>'><?php echo($ouiam['libelle']); ?></option>
                            <?php }$drP->closeCursor();?>
                        </select>   
                    </div>
                    <div class="componentFRMC">
                        <label>qte : </label>
                        <input type="text" name='qte'>
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Ajouter' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>
            </div>
            </section>
          <?php include("../mylibrary/pagefooter.php"); ?>
          <script src="../js/update_page.js"></script>
            