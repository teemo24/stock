<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])):
    $data = $db->selectWhere("entrees","*","where id = ".$_GET['id'])[0];
    if(empty($data)) { header('Location: '.URI.'achats'); exit(); } 

    $code_article = $data['code_article'];
    $n_entree = $data['n_entree'];
    $designation = $db->execute("SELECT designation FROM articles WHERE code_article = '$code_article'")->fetch_all(MYSQLI_ASSOC);
    if(!empty($designation))$designation = $designation[0]['designation'];else $designation = "";
    $quantity = $db->execute("SELECT SUM(quantity) as n FROM quantity WHERE code_article = '$code_article' AND n_entree = '$n_entree'")->fetch_all(MYSQLI_ASSOC);
    if(!empty($quantity)) $quantity = $quantity[0]['n'];else $quantity = 0;
endif;
?>
<?php 
$pageTitle = "Achats";
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
            <i>Entrées</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Entrée : <?=$data['n_entree']?></i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Achat réference : <?=$data['id']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table id="table-create-achats">
                            
                            <tr class="form-group">
                                <td class="label">
                                    <label>Code article</label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="code" value="<?=$data['code_article']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Designation <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="designation" value="<?=$designation?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>N° Entrée <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="n_entree" placeholder="" 
                                    value="<?=$data['n_entree']?>" disabled>
                                </td>
                            </tr>
                            
                            <tr class="form-group">
                                <td class="label">
                                    <label>TVA<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" name="tva" value="<?=$data['tva']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fournisseur<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <?php $fournisseur = getifset($db->selectWhere("societe","*","where id = ".$data['id_fournisseurs'])[0]['nom']); ?>
                                    <input  type="text" name="designation" value="<?=$fournisseur?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Numéro du facture<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="n_facture_fournisseur" value="<?=$data['n_facture_fournisseur']?>" disabled>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table>
                            
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix achat<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" name="prix" value="<?=$data['prix_achat']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Quantité <sup>*</sup></label>
                                </td>
                                <td class="input">
                                  <input  type="number" name="quantity" value="<?=$quantity?>" disabled>   
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                   <a href="<?=URI."achats"?>" class="btn btn-primary btn-save">Retour</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php 
                    if(isset($success)):
                        if($success):
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-success">Nouveau article a ete inserée avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur d'insertion nouveau article !</div>
                            </div>
                    <?php 
                        endif;
                    endif;
                    ?>
                </div>
            </form>
        </div>
    </div>
</main>
    

<?php include "footer.php"; ?>
