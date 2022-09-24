<?php 
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
            <i class="fa fa-home"></i> <i style="font-size: 12px;" class="fa fa-chevron-right"></i> <i><?=$pageTitle?></i>  
        </div>
        <div class="actions">
            <?php if(!in_array(ROLE,array("consultant"))):?>
                <a href="offre/create" class="btn btn-primary">Ajouter</a>
            <?php endif;?>
        </div>
    </div>
    <div class="content">
            <?php if(isset($_GET['success'])): ?>
                    <div class="form-table col-sm-12 mt-2">
                        <div class="alert alert-success">Nouveau offre a ete inserée avec succes !</div>
                    </div>
            <?php endif; ?>
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Fournisseur</th>
                        <th>Validité offre</th>
                        <th>Fichier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectAll("offre");
                    foreach($rows as $row):
                       
                ?>
                    <tr>
                        <td>
                            <a href="offre/show?id=<?=$row["id"]?>">
                                <?=$row["id"]?>
                            </a>
                        </td>
                        <td><?=$row["titre"]?></td>
                        <td><?=$row["date"]?></td>
                        <td><?=$row["id_fournisseur"]?></td>
                        <td><?=$row["validite_offre"]?></td>
                        <td><a href="<?=URI.UPLOADS.'/'.$row["file"]?>" target="_blank"> Voir fichier</a></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="offre/show?id=<?=$row["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-info" href="offre/details?id=<?=$row["id"]?>">
                                <i class="fa fa-file"></i>
                            </a>
                            <?php if(!in_array(ROLE,array("consultant"))):?>
                            <a class="btn btn-warning" href="offre/update?id=<?=$row["id"]?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <?php endif;?>
                            <?php 
                            // if(!in_array(ROLE,array("editor","consultant"))):

                                if(ROLE != "editor" && ROLE != "consultant"):
                                
                                ?>
                                <a class="btn btn-danger" onclick="javascript:if(confirm('Vous êtes sur de supprimer cet article?'))document.location.href='offre/delete?id=<?=$row['id']?>'" href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
    

<?php include "footer.php"; ?>
