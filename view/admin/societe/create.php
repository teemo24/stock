<?php
$fiche_id = time();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    extract($_POST);	 	 	 	
    $sql = "INSERT INTO societe (id, nom,email, adresse,fax, tel, matricule, etablissement, n_rc, type) VALUES ($id,'$nom','$email','$adresse','$fax','$tel','$matricule','$etablissement','$n_rc','$type')";
    if($db->execute($sql)) $success = true;

endif;
?>
<?php 
$pageTitle = "Societe create";
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
            <i>Nouveau fiche</i>     
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Création de fiche</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <input type="hidden" name="id" value="<?=$fiche_id?>">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Nom societe</label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="nom" value="">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Email</label>
                                </td>
                                <td class="input">
                                    <input required  type="email" name="email" value="">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Type</label>
                                </td>
                                <td class="input">
                                    <select name="type">
                                        
                                            <option value="fournisseur">Fournisseur</option>
                                            <option value="client">Client</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Téléphone</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="tel" value="">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fax</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="fax" value="">  
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
                                        <input type="text" name="matricule" value="">  
                                    </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Adresse</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="adresse" value="">  
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Etablissement</label>
                                </td>
                                <td class="input">
                                    <select name="etablissement">
                                        
                                            <option value="privee">Privé</option>
                                            <option value="etatique">Etatique</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Numéro RC</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="n_rc" value="">  
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="content-title"> </div>
                    <div class="content-title">
                        <h3>Contacts</h3>
                    </div>
        
                    <table class="form-table" data-id="<?=$fiche_id?>">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Specialite</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr class="form-group">
                                <td  class="input"> 
                                    <input type="text" id="nom" placeholder="Nom et prenom">
                                </td>
                                <td  class="input"> 
                                    <input type="text" id="tel" placeholder="Téléphone">
                                </td>
                                <td  class="input"> 
                                    <input type="text" id="fax" placeholder="Fax">
                                </td>
                                <td  class="input"> 
                                    <input type="email" id="email" placeholder="Email">
                                </td>
                                <td  class="input"> 
                                    <select id="sex" style="width: 128px;">
                                        <option value="1"> Homme</option>
                                        <option value="0"> Femme</option>
                                    </select>
                                </td>
                                <td  class="input"> 
                                    <input type="text" id="spe" placeholder="Specialite">
                                </td>
                                <td class="actions actions-btn-personnel">
                                    <a class="btn btn-success btn-personnel save">
                                        <i class="fa fa-save"></i>
                                    </a>
                                    <a class="btn btn-primary btn-personnel reset">
                                        <i class="fa fa-retweet"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
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
                        if($success) header('Location: '.URI.'societe?success&type='.$type);
                    endif;
                    ?>
                </div>
            </form>
        </div>
    </div>
    
</main>
    

<?php include "footer.php"; ?>
<script>
$(document).ready(function(){
    $('.reset').on('click',function(){
        $(this).parents('tr').find('#nom').val('');
        $(this).parents('tr').find('#email').val('');
        $(this).parents('tr').find('#tel').val('');
        $(this).parents('tr').find('#fax').val('');
        $(this).parents('tr').find('#sex').val('');
        $(this).parents('tr').find('#spe').val('');
    })
    $(document).on('click','.delete',function(){

        let id = $(this).data('id');
        let tr = $(this).parents('tr');

        $.post('<?=URI?>personnel/delete',{id:id},function(d){
            tr.fadeOut(); 
        });

    })

// var = let : pour définir un variable 
// $ = selecteur du jquery pour utiliser un element dans le document

    $('.save').on('click',function(){
        // event se déclenche quant en clique sur le boutton de class "save"

        let tbody = $(this).parents('tbody');
        let id = $(this).parents('table').data('id');
        let nom = $(this).parents('tr').find('#nom').val();
        let email = $(this).parents('tr').find('#email').val();
        let tel = $(this).parents('tr').find('#tel').val();
        let fax = $(this).parents('tr').find('#fax').val();
        let sex = $(this).parents('tr').find('#sex').val();
        let spe = $(this).parents('tr').find('#spe').val();

        // Ajax : envoyer les données par methode post vers personnel/create
        $.post('<?=URI?>personnel/create',{id:id,nom:nom,email:email,tel:tel,fax:fax,sex:sex,spe:spe},function(html_code){
        // d est la valeur obtenue après le traitement de requete
            tbody.prepend(html_code);
        // html_code c'est un code html de balise tr
        // on va inserer html_code dans le code html de tbody avec la methode prepend
        });
        $(this).parents('tr').find('#nom').val('');
        $(this).parents('tr').find('#email').val('');
        $(this).parents('tr').find('#tel').val('');
        $(this).parents('tr').find('#fax').val('');
        $(this).parents('tr').find('#sex').val('');
        $(this).parents('tr').find('#spe').val('');
        
    })
})

// # ===> id
// . ===> class
// attribute ==> []
// --------------
// selector 

</script>