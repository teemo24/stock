<?php 
$pageTitle = "Entrées";
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
                <a href="achats/create" class="btn btn-primary">Ajouter</a>
            <?php endif;?>
        </div>
    </div>
    <div class="content">
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>N° Entree</th>
                        <th>Code article</th>
                        <th>Designation</th>
                        <th>Fournisseur</th>
                        <th>Quantité</th>
                        <th>PU HT</th>
                        <th>TVA</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectAll("entrees");
                    if(!empty($rows)){
                    foreach($rows as $row):
                        $code_article = $row['code_article'];
                        $n_entree = $row['n_entree'];
                        $designation = $db->execute("SELECT designation FROM articles WHERE code_article = '$code_article'")->fetch_all(MYSQLI_ASSOC);
                        if(!empty($designation))$designation = $designation[0]['designation'];else $designation = "";
                        
                        $fournisseur = getifset($db->selectWhere("societe","*","where id = ".$row['id_fournisseurs'])[0]['nom']);
                ?>
                    <tr>
                        <td><?=$row["date_entree"]?></td>
                        <td><?=$row["n_entree"]?></td>
                        <td> <?=$row["code_article"]?> </td>
                        <td><?=$designation?></td>
                        <td><?=$fournisseur?></td>
                        <td> <?=$row["quantity"]?> </td>
                        <td><?=$row["prix_achat"]?></td>
                        <td><?=$row["tva"]?></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="achats/show?id=<?=$row["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            
                            <!-- <a class="btn btn-info" href="achats/details?id=<?=$row["id"]?>">
                                <i class="fa fa-file"></i>
                            </a>
                            <a class="btn btn-warning" href="achats/update?id=<?=$row["id"]?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-danger" href="achats/delete?id=<?=$row["id"]?>">
                                <i class="fa fa-trash"></i>
                            </a> -->
                        </td>
                    </tr>
                <?php
                endforeach;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
    

<?php include "footer.php"; ?>
