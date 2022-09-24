<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    $user_id = $_SESSION["user_id"];
    extract($_POST);
    
    if(isset($quantite)){
        $sql = "INSERT INTO quantity (code_article,n_sortie, quantity, add_by) VALUES ('$code_article','$n_sortie',-$quantite, $user_id )";
        // echo $sql;
        $db->execute($sql);
    }elseif(isset($serial_list)){
        $serial_list = preg_split('/\r\n|\r|\n/', $serial_list);
        $quantite = sizeof($serial_list);
        foreach($serial_list as $serial){
            if(empty($serial))continue;
            $sql = "INSERT INTO quantity (code_article,n_sortie, quantity,serial, add_by) VALUES ('$code_article','$n_sortie',-1,'$serial', $user_id )";
            $db->execute($sql);
        }
    }
    $sql = "INSERT INTO sorties (code_article,n_sortie, quantite,destinataire,n_bl,n_facture,marge,prix_achat,prix_vente, add_by) VALUES ('$code_article','$n_sortie','$quantite','$destinataire','','$n_facture','$marge','$prix_achat','$prix_vente', $user_id )";
    if($db->execute($sql)) $success = true;


endif;
?>
<?php 
$pageTitle = "Sorties | Create";
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
            <i>Sorties</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Ajouter</i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Nouveau sortie</h3>
        </div>
        <div class="content-body">
            <form action="" method="post" class="w-100">
                <div class="row container-fluid">
                    <div class="form-table col-sm-12 col-md-6">
                        <table id="table-create-achats">
                            <tr class="form-group">
                                <td class="label">
                                    <label>Recherche par code</label>
                                </td>
                                <td class="input">
                                    <input type="text" name="search" placeholder="Recherche..." 
                                    value="">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Code article selectionné <sup>*</sup></label>
                                </td>
                                <td id="code-select" class="input">
                                    <select name="code_article"> </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Designation <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input  type="text" name="designation">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>N° Sortie <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="n_sortie" placeholder="" 
                                    value="<?='S'.date('ymd')?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Client<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <select required name="destinataire">
                                        <?php
                                        $clients = $db->selectWhere("societe","*","where type = 'client' ");
                                        foreach($clients as $client):
                                            echo "<option value='".$client['id']."' >".$client['nom']."</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Numéro du facture<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="n_facture">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-table col-sm-12  col-md-6">
                        <table>
                            
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix achat<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" name="prix_achat">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Prix vente<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" name="prix_vente">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Marge<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" step="0.1" name="marge">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Quantité <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    
                                    <div class="qt-radio">
                                        <span>
                                            Par lot
                                        </span>
                                        <input type="radio" name="select_qt" value="lot" checked>
                                    </div>
                                    <div class="qt-radio">
                                        <span>
                                            Manuelle
                                        </span>
                                        <input type="radio" name="select_qt" value="manuelle">
                                    </div>
                                </td>
                            </tr>
                            <tr id="last-tr">
                            <td></td> <td> <input  type="number" name="quantite" placeholder="Quantité par lot"> </td>
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
<script>
$(document).ready(function(){
/* BEGIN - Quantité par lot ou manuelle */
    let tr_lot = ` <td></td> <td> <input  type="number" name="quantite" placeholder="Quantité par lot"> </td>`;
    let tr_manuelle = ` <td></td> <td> <textarea name="serial_list" placeholder="QTe par défaut 1 pour chaque ligne"></textarea> </td>`;

    $('input[name=select_qt]').on('change',function(){
        if($(this).val()=="lot"){
            $('#last-tr').html(tr_lot)
        }
        else if($(this).val()=="manuelle"){
            $('#last-tr').html(tr_manuelle)
        }
    });

/* END - Quantité par lot ou manuelle */
    
    $.get('ajax/code?code=',function(data){ $('select[name=code_article]').html(data); });
    $.get('ajax/designation?code=',function(data){ $('input[name=designation]').val(data); });
    $('input[name=search]').on('keyup',function(){
        let value = $(this).val();
        $.get('ajax/code?code='+value,function(data){ 
            $('select[name=code_article]').html(data); 
        });
        $.get('ajax/designation?code='+value,function(data){ $('input[name=designation]').val(data); });
    });
    $('select[name=code_article]').on('change',function(){
        let des = $('select[name=code_article] option:selected').data('designation');
        $('input[name=designation]').val(des);
    });
});
</script>