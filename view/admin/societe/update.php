<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])):
    extract($_POST);
    $sql = "UPDATE societe SET nom = '$nom', email = '$email', adresse = '$adresse', tel = '$tel', fax = '$fax', matricule = '$matricule', etablissement = '$etablissement', n_rc = '$n_rc', type = '$type'  WHERE id =  $id ";
    if($db->execute($sql)) header('Location: '.URI.'societe?success&type='.$type);
    
endif;
if(isset($_GET['id']) || isset($_POST['id'])):
    $id = getifset($_GET['id'],getifset($_POST['id']));
    $data = $db->selectWhere("societe","*","where id = ".$id)[0];
   
endif;

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
            <i>Fiche : <?=$data['id']?></i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Fiche Societe N° : <?=$data['id']?></h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <input type="text" name="id" value="<?=$data['id']?>" hidden>
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Nom societe</label>
                                </td>
                                <td class="input">
                                    <input    type="text" name="nom" value="<?=$data['nom']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input   type="email" name="email" value="<?=$data['email']?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Type</label>
                                </td>
                                <td class="input">
                                    <select name="type"  >
                                        
                                            <option value="fournisseur" <?=$data['type']=="fournisseur"?"selected":""?>>Fournisseur</option>
                                            <option value="client" <?=$data['type']=="client"?"selected":""?>>Client</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Téléphone</label>
                                </td>
                                <td class="input">
                                     <input  type="text" name="tel" value="<?=$data['tel']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fax</label>
                                </td>
                                <td class="input">
                                     <input  type="text" name="fax" value="<?=$data['fax']?>">  
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
                                        <input  type="text" name="matricule" value="<?=$data['matricule']?>">  
                                    </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Adresse</label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="adresse" value="<?=$data['adresse']?>">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Etablissement</label>
                                </td>
                                <td class="input">
                                    <select  name="etablissement">
                                        
                                            <option value="privee" <?=$data['etablissement']=="privee"?"selected":""?>>Privé</option>
                                            <option value="etatique" <?=$data['etablissement']=="etatique"?"selected":""?>>Etatique</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Numéro RC</label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="n_rc" value="<?=$data['n_rc']?>">  
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
                    
                </div>
            </form>
        </div>
    </div>
</main>
    

<?php include "footer.php"; ?>