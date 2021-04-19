<?php include("../mylibrary/connection.php"); 

$idP;
$libelle;
$prix;
$etatP;

if(isset($_GET['idP']))
    {
        $idP=$_GET['idP'];
        if(!empty($idP)){
            $dr_mod=ExecuteReader($cnx,"select * from produit where idP='$idP'");
            $data=$dr_mod->fetchAll();
            $idP=$data[0]['idP'];
            $libelle=$data[0]['libelle'];
            $prix=$data[0]['prix'];
            $etatP=$data[0]['etatP'];
        }
    }

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
            if($_POST['BTN']=="Modifier")
            {
                $req1="update produit set libelle='$libelle',prix='$prix',etatP='$etatP' where idP='$idP';";
                ExecuteNonQuery($cnx,$req1);
                header("Location:cslt_produit.php");  
            }
        }
}

?>
<?php include("../mylibrary/pageheader.php"); ?>
<link rel="stylesheet" href="../css/update_page.css">
<link rel="stylesheet" href="../css/animationUpdate.css">
<link rel="stylesheet" href="../css/formAdd_updt.css">
<link rel="stylesheet" href="../css/style.css">

<section class="top-image">
            <div class="koulchi">
            <form id="frm1" class="formCreate" method="POST" action="<?= $_SERVER['PHP_SELF'];?>" >

                    <div class="componentFRMC"> 
                        <label>id : </label>
                        <input type='text' name='idP' readonly value="<?php echo($idP); ?>">
                    </div>
                    <div class="componentFRMC"> 
                        <label>libelle : </label>
                        <input type='text' name='libelle' value="<?php echo($libelle); ?>">
                    </div>

                    <div class="componentFRMC"> 
                        <label>prix : </label>
                        <input type='text' name='prix' value="<?php echo($prix); ?>">    
                    </div>
                    <div class="componentFRMC">
                    <label>etat : </label>
                        <select name="etatP" id="cd">
                        <option value="y">disponible</option>
                        <option value="N">no disponible </option>
                        </select>             
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Modifier' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>
            
            </div>
            </section>
            <script>
                document.getElementById("cd").option.value="<?php echo($etatP ); ?>";      
        </script>
          <?php include("../mylibrary/pagefooter.php"); ?>
          
            