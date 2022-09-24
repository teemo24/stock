<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    $user_id = $_SESSION["user_id"];
    extract($_POST);
    $sql = "INSERT INTO articles (code_article,designation,prix_achat,serial, `description`,model,unity,observation,id_category,id_emplacement, add_by) VALUES ('$code','$designation','$prix','$serial','$description','$model','$unity','$observation','$category','$emplacement', $user_id )";
    // echo $sql;
    if($db->execute($sql)) {
        header('Location: '.URI.'catalogue?success');
        $success = true;
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
            <i>Ajouter un article</i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Nouveau article</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Code <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="code" placeholder="Code doit etre unique" 
                                    value="<?=strtoupper(substr(uniqid(),8))?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Designation <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="designation">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Serial <sup></sup></label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="serial">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Model <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="model">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Categorie</label>
                                </td>
                                <td class="input">
                                    <select name="category">
                                        <?php
                                        $categories = $db->selectAll("categories");
                                        foreach($categories as $categorie):
                                            echo "<option value='".$categorie['id']."' >".$categorie['title']."</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix</label>
                                </td>
                                <td class="input">
                                    <input type="number" name="prix" value="">
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
                                    <input required  type="text" name="unity">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Observation</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="observation">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Description</label>
                                </td>
                                <td class="input" style="height: 96px;">
                                    <input type="text" name="description" style="height: 80px;">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Emplacement</label>
                                </td>
                                <td class="input">
                                    <select name="emplacement">
                                        <?php
                                        $emplacements = $db->selectAll("emplacements");
                                        foreach($emplacements as $emplacement):
                                            echo "<option value='".$emplacement['id']."' >".$emplacement['title']."</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                    <button type="submit" name="create" class="btn btn-success btn-save">Enregistrer</button>
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
