<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])):
  $data = $db->selectWhere("users","*","where id = ".$_GET['id'])[0];
  if(empty($data)) { header('Location: '.URI.'users'); exit(); } 
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
            <h3>Fiche d'utilisateur N° : <?=$data['id']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Username</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="username" value="<?=$data['username']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="email" value="<?=$data['email']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Role</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="role" value="<?=$data['role']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Date d'ajoute</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="date" value="<?=$data['date']?>" disabled>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Status</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="status"value="<?=$data['status']?>" disabled>
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
                                    <a href="<?=URI."users"?>" class="btn btn-primary btn-save">Retour</a>
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
