<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])):
  $data = $db->selectWhere("societe","*","where id = ".$_GET['id'])[0];
  if(empty($data)) { header('Location: '.URI); exit(); } 
endif;
?>
<?php 
$pageTitle = $data['nom'];
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
            <i>Societe</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <!-- <i>Fiche : <?=$data['id']?></i>   -->
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Fiche societe</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                  
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Nom societe</label>
                                </td>
                                <td class="input">
                                    <input readonly   type="text" name="nom" value="<?=$data['nom']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input readonly  type="email" name="email" value="<?=$data['email']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Type</label>
                                </td>
                                <td class="input">
                                     <input readonly type="text" name="type" value="<?=$data['type']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Téléphone</label>
                                </td>
                                <td class="input">
                                     <input readonly type="text" name="tel" value="<?=$data['tel']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fax</label>
                                </td>
                                <td class="input">
                                     <input readonly type="text" name="fax" value="<?=$data['fax']?>">  
                                </td>
                            </tr>
                           
                            
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table>
                            <tr class="form-group">
                                    <td class="label">
                                        <label>Matricule fiscale</label>
                                    </td>
                                    <td class="input">
                                        <input readonly type="text" name="matricule" value="<?=$data['matricule']?>">  
                                    </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Adresse</label>
                                </td>
                                <td class="input">
                                    <input readonly type="text" name="adresse" value="<?=$data['adresse']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Etablissement</label>
                                </td>
                                <td class="input">
                                    <input readonly type="text" name="etablissement" value="<?=$data['etablissement']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Numéro RC</label>
                                </td>
                                <td class="input">
                                    <input readonly type="text" name="n_rc" value="<?=$data['n_rc']?>">  
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="content-title"> </div>
                    <div class="content-title">
                        <h3>Contacts</h3>
                    </div>
        
                    <table class="form-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Specialite</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $rows = $db->selectWhere("personnel","*"," where id_societe = ".$_GET['id']);
                        foreach($rows as $row):
                        ?>
                           <tr class="form-group">
                                <td  class="input"> 
                                    <input readonly type="text" name="nom" placeholder="Nom et prenom" value="<?=$row['nom']?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" name="tel" placeholder="Téléphone" value="<?=$row['tel']?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" name="fax" placeholder="Fax" value="<?=$row['fax']?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="email" name="email" placeholder="Email" value="<?=$row['email']?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" name="sex" placeholder="Sex" value="<?=$row['sex']?"Homme":"Femme"?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" name="spe" placeholder="Specialite" value="<?=$row['specialite']?>">
                                </td>
                            </tr>
                         <?php endforeach;?> 
                        </tbody>
                    </table>
        
                    <div class="form-table col-sm-12 my-5">
                        <table>
                            <tr>
                                <td>
                                    <a href='<?=URI."societe?type=".$data['type']?>' class="btn btn-primary btn-save">Retour</a>
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
