<?php include("../mylibrary/connection.php"); 

$drcpt=ExecuteReader($cnx,"select * from produit");
$size=$drcpt->rowCount();
$sizeF=$size+1;
$signePage="F";
$idF=$signePage.$sizeF;
$idP;
$libelle;
$prix;
$etatP;

    if(isset($_POST) && count($_POST)>0)
    {
        if(isset($_POST['idP']))
        {
            $idP=$_POST['idP'];
        }
        if(isset($_POST['libelle']))
        {
            $libelle=$_POST['libelle'];
        }
        if(isset($_POST['prix']))
        {
            $prix=$_POST['prix'];
        }
        if(isset($_POST['etatP']))
        {
            if($_POST["etatP"]=="y")
            {
                $etatP="y";
            }
            if($_POST["etatP"]=="N")
            {
                $etatP="N";
            }
        }
        
        if(!empty($_POST['BTN'])){
            if($_POST['BTN']=="Ajouter")
            {
                $req1="insert into produit values('$idP','$libelle','$prix','$etatP');";
                ExecuteNonQuery($cnx,$req1);
                header("Location:cslt_produit.php");  
            }
        }
}
$dr=ExecuteReader($cnx,"select etatP from produit;");
?>
 
<?php include("../mylibrary/pageheader.php"); ?>
<link rel="stylesheet" href="../css/update_page.css">
<link rel="stylesheet" href="../css/formAdd_updt.css">
<link rel="stylesheet" href="../css/closePages.css">
<section class="top-image">
            <div class="koulchi">
            <form id="frm1" class="formCreate" method="POST" action="<?= $_SERVER['PHP_SELF'];?>" >
                    <div class="componentFRMC"> 
                        <label>id prd: </label>
                        <input type='text' name='idP'>
                    </div>

                    <div class="componentFRMC"> 
                        <label>libelle : </label>
                        <input type='text' name='libelle'>    
                    </div>

                    <div class="componentFRMC">
                        <label>prix : </label>
                        <input type= 'text' name='prix'>
                    </div>
                    <div class="componentFRMC">
                        <label>etat : </label>
                        <select name="etatP">
                        <option value="y">disponible</option>
                        <option value="N">no disponible </option>
                        </select>
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Ajouter' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>

            </div>
            </section>
          <?php include("../mylibrary/pagefooter.php"); ?>
            