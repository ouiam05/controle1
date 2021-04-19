<?php include("../mylibrary/connection.php");


$dr_cmd_combo=ExecuteReader($cnx,"select distinct dcmd.idCmd,four.idF,four.nameF,pr.libelle from detail_commande dcmd,commande cmd,fournisseur four,produit pr where dcmd.idCmd=cmd.idCmd and cmd.idF=four.idF and cmd.idP=pr.idP");
$dr_four_combo=ExecuteReader($cnx,"select distinct four.idF,four.nameF from detail_commande dcmd,commande cmd,fournisseur four where dcmd.idCmd=cmd.idCmd and cmd.idF=four.idF");
$dr_Prod_combo=ExecuteReader($cnx,"select distinct pr.idP,pr.libelle from detail_commande dcmd,commande cmd,produit pr where dcmd.idCmd=cmd.idCmd and cmd.idP=pr.idP");

$drcpt=ExecuteReader($cnx,"select * from livraison");
$size=$drcpt->rowCount();
$idliv;
$idCmd;
$idF;
$idP;
$d=strtotime("tomorrow");
$dateLiv= date("Y-m-d ", $d);

$adresseLiv;
$prixLiv;

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
            if($_POST['BTN']=="Ajouter")
            {
                $req1="insert into livraison values('$idliv','$idCmd','$idF','$idP','$dateLiv');";
                ExecuteNonQuery($cnx,$req1);
                $req2="insert into detail_livraison values('$idliv','$idCmd','$idF','$idP','$adresseLiv',$prixLiv);";
                ExecuteNonQuery($cnx,$req2);
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
                   <div class="componentFRMC"> 
                        <label>idLiv : </label>
                        <input type= 'text' name='idliv' id="idliv">
                    </div>
                    <div class="componentFRMC"> 
                        <label>commande : </label>
                        <select name="idCmd" id="sel1" required>
                        <option id="" value="">--Select commande--</option>
                        <?php while($combo1=$dr_cmd_combo->fetch()){?>
                        <option id="<?php echo($combo1['idF']);?>" value="<?php echo($combo1['idCmd']);?>"><?php echo($combo1['nameF']); ?> - <?php echo($combo1['libelle']); ?> - <p id="ff" style="display: none;"><?php echo($combo1['idF']);?></p></option>
                        <?php }$dr_cmd_combo->closeCursor(); ?>
                        </select>
                    </div>
                    <div class="componentFRMC"> 
                        <label>Fournisseur : </label>
                        <input type= 'text' name='idF' id="idF" readonly>
                    </div>

                    <div class="componentFRMC">
                        <label>Produit : </label>
                        <select name="idP" id="sel2" required>
                        <option  value="">--Select Produit--</option>
                        <?php while($combo3=$dr_Prod_combo->fetch()){?>
                        <option value="<?php echo($combo3['idP']); ?>"><?php echo($combo3['libelle']); ?></option>
                        <?php }$dr_Prod_combo->closeCursor(); ?>
                    </select>
                    </div>

                    <div class="componentFRMC"> 
                        <label>Adresse : </label>
                        <input type="text" name="adresseLiv"  required>
                    </div>
                    <div class="componentFRMC"> 
                        <label>prix : </label>
                        <input type="text"  name='prixLiv' required>
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Ajouter' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>
            </div>
            </section>
          <?php include("../mylibrary/pagefooter.php"); ?>
          <script>
$("#sel1").change(function() {
  var x = $(this).children(":selected").attr("id");
  document.getElementById("idF").value=x;
});
</script>
          

            