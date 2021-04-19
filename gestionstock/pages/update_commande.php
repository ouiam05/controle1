<?php include("../mylibrary/connection.php"); 

$idCmd;
$idF;
$idP;
$dateCmd;
$qte;

if(isset($_GET['idCmd']) && isset($_GET['idF']) && isset($_GET['idP']))
    {
        $idCmd=$_GET['idCmd'];    
        $idF=$_GET['idF'];
        $idP=$_GET['idP'];
        if(!empty($idCmd)){
            $dr_mod=ExecuteReader($cnx,"select * from commande where idCmd='$idCmd'" );
            $dr_mod1=ExecuteReader($cnx,"select qte from detail_commande where idCmd='$idCmd'" );
            $data=$dr_mod->fetchAll();
            $data1=$dr_mod1->fetchAll();
            $idCmd=$data[0]['idCmd'];
            $idF=$data[0]['idF'];
            $idP=$data[0]['idP'];
            $dateCmd=$data[0]['dateCmd'];
            $qte=$data1[0]['qte'];
        }
    }

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
        if(isset($_POST['dateCmd']))
        {
            $dateCmd=$_POST['dateCmd'];
        }
        if(isset($_POST['qte']))
        {
            $qte=$_POST['qte'];
        }
        
        if(!empty($_POST['BTN'])){
            if($_POST['BTN']=="Modifier")
            {
                $req1="update commande set dateCmd='$dateCmd' where idCmd='$idCmd' and idF='$idF' and idP='$idP' ;";
                ExecuteNonQuery($cnx,$req1);
                $req2="update detail_commande set qte='$qte' where idCmd='$idCmd' and idF='$idF' and idP='$idP' ;";
                ExecuteNonQuery($cnx,$req2);             
                header("Location:cslt_commande.php");  
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
                        <label>id : </label>
                        <input type='text' name='idCmd' readonly value="<?php echo($idCmd); ?>">
                    </div>
                    <div class="componentFRMC"> 
                        <label>idF : </label>
                        <input type='text' name='idF' readonly value="<?php echo($idF); ?>">
                    </div>

                    <div class="componentFRMC"> 
                        <label>idP : </label>
                        <input type='text' name='idP'  readonly value="<?php echo($idP); ?>">    
                    </div>
                    <div class="componentFRMC"> 
                        <label>dateCmd : </label>
                        <input type="date" id=dt name='dateCmd' value="<?php echo($dateCmd); ?>">   
                    </div>

                    <div class="componentFRMC">
                        <label>qte : </label>
                        <input type= 'text' name='qte' value="<?php echo($qte); ?>">
                    </div>
                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Modifier' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>

            </div>
            </section>
            <script>
                document.getElementById("dt").value="<?php echo($dateCmd); ?>";      
        </script>
          <?php include("../mylibrary/pagefooter.php"); ?>
            