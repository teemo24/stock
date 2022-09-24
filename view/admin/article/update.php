<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])):
    $success = false;
    $user_id = $_SESSION["user_id"];
    extract($_POST);
    $sql = "UPDATE articles SET 
                                designation = '$designation', 
                                description = '$description',
                                model = '$model',
                                prix_achat = '$prix',
                                unity = '$unity',
                                observation = '$observation', 
                                add_by = $user_id
                            WHERE id =  $id
            ";
    if($db->execute($sql)) $success = true;
endif;
if(isset($_GET['id']) || isset($_POST['id'])):
    $id = getifset($_GET['id'],getifset($_POST['id']));
    $data = $db->selectWhere("articles","*","where id = ".$id)[0];
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
            <h3>Mettre à jour l'article  de réference : <?=$data['code_article']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <input type="hidden" name="id" value="<?=$data['id']?>"> 
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Code <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="code" placeholder="Code doit etre unique" 
                                    value="<?=$data['code_article']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Designation <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="designation" value="<?=$data['designation']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Model <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="model" value="<?=$data['model']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix</label>
                                </td>
                                <td class="input">
                                    <input type="number" name="prix" value="<?=$data['prix_achat']?>">
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
                                    <input required  type="text" name="unity" value="<?=$data['unity']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Observation</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="observation" value="<?=$data['observation']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Description</label>
                                </td>
                                <td class="input" style="height: 96px;">
                                    <input type="text" name="description" style="height: 80px;" value="<?=$data['description']?>">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                    <button type="submit" name="update" class="btn btn-success btn-save">Enregistrer</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php 
                    if(isset($success)):
                        if($success):
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-success">L'article a ete modifié avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur de mise à jour d'article !</div>
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
