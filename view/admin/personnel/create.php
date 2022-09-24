<?php

if($_SERVER['REQUEST_METHOD'] == "POST"):
    $success = false;
    extract($_POST); 	 	 	 	
    $sql = "INSERT INTO personnel (nom,tel,fax,email,id_societe,specialite,sex) 
    VALUES ('$nom','$tel','$fax','$email','$id','$spe','$sex')";
    if($db->execute($sql)) $success = true;
    if($success):
        $id = $db->insert_id();
?>
                            <tr class="form-group">
                                <td  class="input"> 
                                    <input readonly type="text" id="nom" placeholder="Nom et prenom" value="<?=$nom?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" id="tel" placeholder="Téléphone" value="<?=$tel?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" id="fax" placeholder="Fax" value="<?=$fax?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="email" id="email" placeholder="Email" value="<?=$email?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" id="sex" placeholder="Sex" value="<?=$sex?"Homme":"Femme"?>">
                                </td>
                                <td  class="input"> 
                                    <input readonly type="text" id="spe" placeholder="Specialite" value="<?=$spe?>">
                                </td>
                                <td class="actions actions-btn-personnel">
                                    <a  data-id="<?=$id?>" class="btn btn-danger btn-personnel delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
<?php        
    endif;

endif;
?>