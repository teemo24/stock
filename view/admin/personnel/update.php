<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])):
    $success = false;
    extract($_POST);
    $pass = "";
    if(!empty($password)){
        $password = md5($password);
        $pass = ", password = '$password'";
    }
    $sql = "UPDATE users SET username = '$username', role = '$role', status = '$status', email = '$email' $pass WHERE id =  $id ";
    if($db->execute($sql)) $success = true;
endif;
if(isset($_GET['id']) || isset($_POST['id'])):
    $id = getifset($_GET['id'],getifset($_POST['id']));
    $data = $db->selectWhere("users","*","where id = ".$id)[0];
    if(empty($data)) {
        header('Location: '.URI.'users');
        exit();
    }
  endif;
?>
<?php 
$pageTitle = "User"; 
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
            <i>Fiche : <?=$data['id']?></i>     
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Mettre à jour l'utilisateur  : <?=$data['id']?></h3>
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
                                    <input required  type="text" name="username" value="<?=$data['username']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="email" value="<?=$data['email']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Role</label>
                                </td>
                                <td class="input">
                                    <select name="role">
                                        <?php foreach(ROLES as $option): ?>
                                            <option value="<?=$option?>" <?=$data['role']==$option?'selected':''?>><?=$option?></option>
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
                                        <option value="on" <?=$data['status']=='on'?'selected':''?>>On</option>
                                        <option value="off" <?=$data['status']=='off'?'selected':''?>>Off</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Mot de passe</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="password" value="" placeholder="Laissez ce champ vide">
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
                                <div class="alert alert-success">L'utilisateur a ete modifié avec succes !</div>
                            </div>
                    <?php 
                        else:
                    ?>
                            <div class="form-table col-sm-12 mt-2">
                                <div class="alert alert-danger">Erreur de mise à jour d'utilisateur !</div>
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
