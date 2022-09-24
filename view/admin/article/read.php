<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])):
  $data = $db->selectWhere("articles","*","where id = ".$_GET['id'])[0];
// $data = $db->execute("SELECT * FROM articles WHERE id = ".$_GET['id'])->fetch_all(MYSQLI_ASSOC)[0];
  if(empty($data)) {
      header('Location: '.URI.'catalogue');
      exit();
    } 
endif;
?>
<?php 
$pageTitle = "Catalogue";
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
            <i>Catalogue</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Article : <?=$data['designation']?></i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Article réference : <?=$data['code_article']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Code article</label>
                                </td>
                                <td class="input">
                                    <input readonly  type="text" name="code" placeholder="Code doit etre unique" 
                                    value="<?=$data['code_article']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Designation </label>
                                </td>
                                <td class="input">
                                    <input readonly  type="text" name="designation" value="<?=$data['designation']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Model </label>
                                </td>
                                <td class="input">
                                    <input readonly  type="text" name="model" value="<?=$data['model']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Categorie </label>
                                </td>
                                <?php $category = $db->selectWhere("categories","*","where id = ".$data['id_category'])[0]['title']; ?>
                                <td class="input">
                                    <input readonly  type="text" name="model" value="<?=$category?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix</label>
                                </td>
                                <td class="input">
                                    <input readonly type="number" name="prix" value="<?=$data['prix_achat']?>" disabled>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table>
                           
                            <tr class="form-group">
                                <td class="label">
                                    <label>Unité <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input readonly   type="text" name="unity" value="<?=$data['unity']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Observation</label>
                                </td>
                                <td class="input">
                                    <input readonly type="text" name="observation"value="<?=$data['observation']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Description</label>
                                </td>
                                <td class="input" style="height: 96px;">
                                    <input readonly type="text" name="description" style="height: 80px;" value="<?=$data['description']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Emplacement </label>
                                </td>
                                <?php $emplacement = $db->selectWhere("emplacements","*","where id = ".$data['id_emplacement'])[0]['title']; ?>
                                <td class="input">
                                    <input readonly  type="text" name="emplacement" value="<?=$emplacement?>" disabled>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                    <a href="<?=URI."catalogue"?>" class="btn btn-primary btn-save">Retour</a>
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
