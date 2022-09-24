<?php 
$pageTitle = "Catalogue";
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
                <a href="catalogue/article/create" class="btn btn-primary">Ajouter</a>
            <?php endif;?>
        </div>
    </div>
    <div class="content">
            <?php if(isset($_GET['success'])): ?>
                    <div class="form-table col-sm-12 mt-2">
                        <div class="alert alert-success">Nouveau article a ete inserée avec succes !</div>
                    </div>
            <?php endif; ?>
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Code article</th>
                        <th>Designation</th>
                        <th>Quantité</th>
                        <th>PU HT</th>
                        <th>Categorie</th>
                        <th>Emplacement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $samirat = $db->selectAll("articles");
                    foreach($samirat as $samira):
                        $code_article = $samira['code_article'];
                        $quantity = $db->execute("SELECT SUM(quantity) as n FROM quantity WHERE code_article = '$code_article'")->fetch_all(MYSQLI_ASSOC);
                        if(!empty($quantity)) $quantity = $quantity[0]['n'];else $quantity = 0;
                        $category = getifset($db->selectWhere("categories","*","where id = ".$samira['id_category'])[0]['title']);
                        $emplacement = getifset($db->selectWhere("emplacements","*","where id = ".$samira['id_emplacement'])[0]['title']);
                ?>
                    <tr>
                        <td>
                            <a href="catalogue/article/show?id=<?=$samira["id"]?>">
                                <?=$samira["code_article"]?>
                            </a>
                        </td>
                        <td><?=$samira["designation"]?></td>
                        <td><?=$quantity?></td>
                        <td><?=$samira["prix_achat"]?></td>
                        <td><?=$category?></td>
                        <td><?=$emplacement?></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="catalogue/article/show?id=<?=$samira["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-info" href="catalogue/article/details?id=<?=$samira["id"]?>">
                                <i class="fa fa-file"></i>
                            </a>
                            <?php if(!in_array(ROLE,array("consultant"))):?>
                            <a class="btn btn-warning" href="catalogue/article/update?id=<?=$samira["id"]?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <?php endif;?>
                            <?php 
                            // if(!in_array(ROLE,array("editor","consultant"))):

                                if(ROLE != "editor" && ROLE != "consultant"):
                                
                                ?>
                                <a class="btn btn-danger" onclick="javascript:if(confirm('Vous êtes sur de supprimer cet article?'))document.location.href='catalogue/article/delete?id=<?=$samira['id']?>'" href="#">
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
