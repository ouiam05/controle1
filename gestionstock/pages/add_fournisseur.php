<?php include("../mylibrary/connection.php"); 

$idF;
$nameF;
$tele;
$email;

    if(isset($_POST) && count($_POST)>0)
    {
        if(isset($_POST['idF']))
        {
            $idF=$_POST['idF'];
        }
        if(isset($_POST['nameF']))
        {
            $nameF=$_POST['nameF'];
        }
        if(isset($_POST['tele']))
        {
            $tele=$_POST['tele'];
        }
        if(isset($_POST['email']))
        {
            $email=$_POST['email'];
        }
        
        if(!empty($_POST['BTN'])){
            if($_POST['BTN']=="Ajouter")
            {
                $req1="insert into fournisseur values('$idF','$nameF','$tele','$email');";
                ExecuteNonQuery($cnx,$req1);
                header("Location:cslt_fournisseur.php");  
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
                        <label>idF : </label>
                        <input type='text' name='idF'>
                    </div>
                    <div class="componentFRMC"> 
                        <label>Name : </label>
                        <input type='text' name='nameF'>
                    </div>

                    <div class="componentFRMC"> 
                        <label>telephone : </label>
                        <input type='text' name='tele'>    
                    </div>

                    <div class="componentFRMC">
                        <label>Email : </label>
                        <input type= 'text' name='email'>
                    </div>

                    <div class="div_button">
                        <input class="button" id="btnAdd" type="submit" value='Ajouter' name='BTN'>
                        <input class="button" id="btnVider" type="reset" value='Vider'>
                    </div>
                </form>            

            </div>
            </section>
          <?php include("../mylibrary/pagefooter.php"); ?>
            