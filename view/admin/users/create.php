<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    extract($_POST);
    $password = md5($password);	 	 	 	 	
    $sql = "INSERT INTO users (username,password, role,status, email) VALUES ('$username','$password','$role','$status','$email')";
    if($db->execute($sql)) $success = true;

endif;
?>
<?php 
$pageTitle = "User create";
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
            <i>Utilisateurs</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Nouveau utilisateur</i>     
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Création d'utilisateur</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <input type="hidden" name="id" value="<?=$data['id']?>"> 
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                    <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Username</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="username" value="user<?=rand()?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="email" value="">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Role</label>
                                </td>
                                <td class="input">
                                    <select name="role">
                                        <?php foreach(ROLES as $option): ?>
                                            <option value="<?=$option?>"><?=$option?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Status</label>
                                </td>
                                <td class="input">
                                <select name="status">
                                        <option value="on" >On</option>
                                        <option value="off">Off</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Mot de passe</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="password" value="123456">
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
                                <div class="alert alert-success">L'utilisateur a ete ajoutée avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur de création d'utilisateur !</div>
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
