<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])):
  $data = $db->selectWhere("offre","*","where id = ".$_GET['id'])[0];
// $data = $db->execute("SELECT * FROM articles WHERE id = ".$_GET['id'])->fetch_all(MYSQLI_ASSOC)[0];
  if(empty($data)) {
      header('Location: '.URI.'offre');
      exit();
    } 
endif;
?>
<?php 
$pageTitle = "Offre";
include "header.php";
?>
<main>
    <div class="topbar-main">
        <div class="title">
            <!-- <h3>
                STUDENT
            </h3> -->
        </div>
        <div class="breadcrumbs"> 
            <i class="fa fa-tags"></i> 
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Offres</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Offre : <?=$data['id']?></i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Offre N° : <?=$data['id']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                               <tr class="form-group">
                                    <td class="label">
                                        <label>Demande de prix numéro <sup>*</sup></label>
                                    </td>
                                    <td class="input">
                                        <input required  type="text" name="id_demande" value="<?=$data['id_demande']?>">
                                    </td>
                                </tr>
                                <tr class="form-group">
                                    <td class="label">
                                        <label>Objet <sup></sup></label>
                                    </td>
                                    <td class="input">
                                        <input  type="text" name="title" value="<?=$data['titre']?>">
                                    </td>
                                </tr>
                                <tr class="form-group">
                                    <td class="label">
                                        <label>Fournisseur <sup></sup></label>
                                    </td>
                                    <td class="input">
                                        <input  type="text" name="id_fournisseur" value="<?=$data['id_fournisseur']?>">
                                    </td>
                                </tr>
                                <tr class="form-group">
                                    <td class="label">
                                        <label>Validité offre <sup>*</sup></label>
                                    </td>
                                    <td class="input">
                                        <input  type="number" name="validite_offre" value="<?=$data['validite_offre']?>">
                                    </td>
                                </tr>
                            
                            
                            
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6" style="text-align: center;">
                        <iframe src="<?=URI.UPLOADS.'/'.$data['file']?>" style="width:100%;height:320px"></iframe>
                    </div>
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                    <a href="<?=URI."offre"?>" class="btn btn-primary btn-save">Retour</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</main>
    

<?php include "footer.php"; ?>
