<?php include("../mylibrary/connection.php"); 
$txt_src="";
$dr=ExecuteReader($cnx,"select * from commande");
$sizeServices=$dr->rowCount();

$num_per_page=03;


	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}

	$start_from=($page-1)*03;
	$sql="select * from commande limit $start_from,$num_per_page";
	$dr_affiche=ExecuteReader($cnx,$sql);

if(isset($_GET) && count($_GET)>0)
{
    if(isset($_GET['txt_src']))
    {
        $txt_src=$_GET['txt_src'];
    }
    if(isset($_GET['btn'])){
        {
            if($_GET['btn']=="Rechercher")
            {
                $dr_affiche = ExecuteReader($cnx,"select * from commande where idCmd = '$txt_src'");
                $sizeServices=$dr_affiche->rowCount();
            }
        }
    }
}
?>
<link rel="stylesheet" href="../css/paginationS.css">
<link rel="stylesheet" href="../css/formAdd_updt.css">
<link rel="stylesheet" href="../css/style.css">
<?php include("../mylibrary/pageheader.php"); ?>
<section class="top-image">
            <div class="koulchi">
                <div>
                     <div class="titlepg">
                        <h1>Commande</h1>
                     </div>
                   <form id="frm1" class="formSearch" method="GET" action="<?= $_SERVER['PHP_SELF'];?>">
                    <div class="primary-button">
                    <input class="inputChercher" type="text" placeholder="tappez name"name="txt_src"> &ensp;&ensp;&ensp;
                    <input type="submit" class="button" value="Rechercher" name="btn"> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <a id="btnNew" class="btnNew" href="add_fournisseur.php">New</a>
                    </div>
                    </form>
                </div><br><br><br>
                <div class="tableDyalna">
                <table  class='MyDG'>
                <thead><tr>
                    <th>idCmd</th> 
                    <th>idF</th>
                    <th>idP</th>
                    <th>dateCmd</th>
                    <th>Action</th>
                    </tr></thead>
                    <tbody>
                    <?php while($xtr=$dr_affiche->fetch()){?>
                    <tr><td><?php echo($xtr['idCmd']); ?></td>
                    <td><?php echo($xtr['idF']); ?></td>
                    <td><?php echo($xtr['idP']); ?></td>
                    <td><?php echo($xtr['dateCmd']); ?></td>
                    <td><a href="delete_commande.php?idCmd=<?php echo($xtr['idCmd']); ?>&idF=<?php echo($xtr['idF']); ?>&idP=<?php echo($xtr['idP']); ?>" onclick="return confirm('veuillez vraiment suprimer <?php echo($xtr['idCmd']); ?>');" value="<?php echo($xtr['idCmd']); ?>"><i class='far fa-trash-alt'></i></a> | <a href="update_commande.php?idCmd=<?php echo($xtr['idCmd']); ?>&idF=<?php echo($xtr['idF']); ?>&idP=<?php echo($xtr['idP']); ?>" value="<?php echo($xtr['idCmd']); ?>"><i class='fas fa-edit'></i></a></td>
                    <?php }$dr_affiche->closeCursor(); ?>
                    </tbody>
                </table>
                </div>
                <div class="pagination">
                <?php 
                    $sql="select * from commande";
                    $dr_affiche=ExecuteReader($cnx,$sql);
                    $total_records=$dr_affiche->rowCount();
                    $total_pages=ceil($total_records/$num_per_page);
                    for($i=1;$i<=$total_pages;$i++)
                    {
                        echo "<a class='btnchercher' id='pgBtn' href='cslt_commande.php?page=".$i."'>".$i."</a>" ;
                    }
                    ?>
                </div>
            </div>
            </section>

          <?php include("../mylibrary/pagefooter.php"); ?>