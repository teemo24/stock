<?php 
$pageTitle = "Categorie";
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
                 <a href="categories/create" class="btn btn-primary">Ajouter</a>
            <?php endif;?>
        </div>
    </div>
    <div class="content">
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectAll("categories");
                    if(!empty($rows)){
                    foreach($rows as $row):
                        
                ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["title"]?></td>
                        <td> <?=$row["description"]?> </td>
                        <td class="actions">
                            <a class="btn btn-primary" href="categories/show?id=<?=$row["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if(!in_array(ROLE,array("consultant"))):?>
                                <a class="btn btn-warning" href="categories/update?id=<?=$row["id"]?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            <?php endif;?>

                            <?php if(!in_array(ROLE,array("editor","consultant"))):?>
                                <a class="btn btn-danger verifier" data-page="categories" data-id="<?=$row['id']?>"  href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                            <?php endif;?>

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
