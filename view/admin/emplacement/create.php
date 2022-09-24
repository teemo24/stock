<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    extract($_POST); 	 	 	 	
    $sql = "INSERT INTO emplacements (title) VALUES ('$title')";
    if($db->execute($sql)) $success = true;

endif;
?>
<?php 
$pageTitle = "Emplacements";
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
            <i>Emplacements</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Nouvelle place </i>     
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Création du place</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <input type="hidden" name="id" value="<?=$data['id']?>"> 
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                    <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Titre</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="title" value="">
                                </td>
                            </tr>
                            
                            
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table>
                           
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
                                <div class="alert alert-success">Emplacement a ete ajoutée avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur de création du Emplacement !</div>
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
