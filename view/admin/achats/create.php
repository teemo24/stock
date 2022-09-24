<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create'])):
    $success = false;
    $user_id = $_SESSION["user_id"];
    extract($_POST);     	 	 	 	 	 	 	 	
    
    if(isset($quantity)){
        $sql = "INSERT INTO quantity (code_article,n_entree, quantity, add_by) VALUES ('$code','$n_entree','$quantity', $user_id )";
        $db->execute($sql);
    }elseif(isset($serial_list)){
        $serial_list = preg_split('/\r\n|\r|\n/', $serial_list);
        $quantity = sizeof($serial_list);
        foreach($serial_list as $serial){
            if(empty($serial))continue;
            $sql = "INSERT INTO quantity (code_article,n_entree,serial, add_by) VALUES ('$code','$n_entree','$serial', $user_id )";
            $db->execute($sql);
        }
    }
    $sql = "INSERT INTO entrees (code_article,n_entree, prix_achat,tva,quantity,id_fournisseurs,n_facture_fournisseur, add_by) VALUES ('$code','$n_entree','$prix','$tva','$quantity','$id_fournisseurs','$n_facture_fournisseur', $user_id )";  
    if($db->execute($sql)) $success = true;

    $db->execute("UPDATE articles SET prix_achat = '$prix' WHERE code_article = '$code' ");


endif;
?>
<?php 
$pageTitle = "Entrées | Create";
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
            <i>Entrées</i>  
            <i style="font-size: 12px;" class="fa fa-chevron-right"></i> 
            <i>Ajouter</i>  
        </div>
        <!-- <div class="actions">
            
        </div> -->
    </div>
    <div class="content">
        <div class="content-title">
            <h3>Nouveau entrée</h3>
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
                                    <select name="code"> </select>
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
                                    <label>N° Entrée <sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="text" name="n_entree" placeholder="" 
                                    value="<?='E'.date('ymd')?>">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>TVA<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <input required  type="number" name="tva">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td class="label">
                                    <label>Fournisseur<sup>*</sup></label>
                                </td>
                                <td class="input">
                                    <select required name="id_fournisseurs">
                                        <?php
                                        $fournisseurs = $db->selectWhere("societe","*","where type = 'fournisseur' ");
                                        foreach($fournisseurs as $fournisseur):
                                            echo "<option value='".$fournisseur['id']."' >".$fournisseur['nom']."</option>";
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
                                    <input required  type="text" name="n_facture_fournisseur">
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
                                    <input required  type="number" name="prix">
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
                            <td></td> <td> <input  type="number" name="quantity" placeholder="Quantité par lot"> </td>
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
    let tr_lot = ` <td></td> <td> <input  type="number" name="quantity" placeholder="Quantité par lot"> </td>`;
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
    
// BEGIN -  Recherche 
    $.get('ajax/code?code=',function(data){ $('select[name=code]').html(data); });
    $.get('ajax/designation?code=',function(data){ $('input[name=designation]').val(data); });

    $('input[name=search]').on('keyup',function(){
        let value = $(this).val();
        $.get('ajax/code?code='+value,function(data){ 
            $('select[name=code]').html(data); 
        });
        $.get('ajax/designation?code='+value,function(data){ $('input[name=designation]').val(data); });
    });
    $('select[name=code]').on('change',function(){
        let des = $('select[name=code] option:selected').data('designation');
        $('input[name=designation]').val(des);
    });
// End - Recherche

});
</script>