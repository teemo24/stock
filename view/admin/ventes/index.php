<?php 
$pageTitle = "Sorties";
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
                <a href="ventes/create" class="btn btn-primary">Ajouter</a>
            <?php endif;?>
        </div>
    </div>
    <div class="content">
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>N° Sortie</th>
                        <th>Code article</th>
                        <th>Designation</th>
                        <th>Client</th>
                        <th>Quantité</th>
                        <th>PU Vente</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectAll("sorties");
                    if(!empty($rows)){
                    foreach($rows as $row):
                        $code_article = $row['code_article'];
                        $n_sortie = $row['n_sortie'];
                        $client = getifset($db->selectWhere("societe","*","where id = ".$row['destinataire'])[0]['nom']);
                        $designation = getifset($db->selectWhere("articles","*","where code_article = '$code_article'")[0]['designation']);

                       
                ?>
                    <tr>
                        <td><?=$row["date_sortie"]?></td>
                        <td><?=$row["n_sortie"]?></td>
                        <td> <?=$row["code_article"]?> </td>
                        <td><?=$designation?></td>
                        <td><?=$client?></td>
                        <td><?=$row["quantite"]?></td>
                        <td><?=$row["prix_achat"]*(($row['marge']/100)+1)?></td>
                        <td><?=$row["quantite"]*$row["prix_achat"]*(($row['marge']/100)+1)?></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="ventes/show?id=<?=$row["id"]?>">
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
