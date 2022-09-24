<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    if(isset($_FILES['file'])):
            
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_error = $_FILES['file']['error'];
            $file_type = $_FILES['file']['type'];
            $name = explode('.', $file_name)[0];
            $name = str_replace(' ','',$name);
            $file_ext = explode('.', $file_name)[1];
            $file_act_ext = strtolower($file_ext);
            $allowed = ['xlsx','xls','png','jpg','jpeg','doc', 'docx','ppt', 'pptx','txt','pdf'];
            
        
            if(in_array($file_act_ext, $allowed) ){
                
                $new_file_name = "DOC_".time();
                $file_des = UPLOADS .'/'. $new_file_name.'.'.$file_act_ext;
    
                if(move_uploaded_file($file_tmp, $file_des)){
                    extract($_POST);
                    $sql = "INSERT INTO offre ( titre, id_fournisseur, validite_offre, file,id_demande) VALUES ('$title','$id_fournisseur','$validite_offre','$new_file_name.$file_act_ext','$id_demande' )";
                    echo $sql;
                    if($db->execute($sql)) {
                        header('Location: '.URI.'offre?success');
                        $success = true;
                    }
                }
            }
        endif;   
endif;

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
            <i>Offre</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Ajouter un offre</i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Nouvelle offre</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100" enctype="multipart/form-data">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Demande de prix numéro <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="id_demande" value="">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Objet <sup></sup></label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="title">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fournisseur <sup></sup></label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="id_fournisseur">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Validité offre <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input  type="number" name="validite_offre">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">Fichier</label>
                                </td>
                                <td class="input">
                                    <input required type="file" name="file">
                                </td>
                            </tr>
                            
                            
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table></table>
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
                                <div class="alert alert-success">Nouvelle offre a ete inserée avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur d'insertion une offre !</div>
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
