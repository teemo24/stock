<?php 
$type = getifset($_GET['type']);
if(empty($type)) header('Location : '.URI);
$pageTitle = $type;
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
            <a href="societe/create" class="btn btn-primary">Ajouter</a>
        </div>
    </div>
    <div class="content">
            <?php if(isset($_GET['success'])&&isset($_GET['type'])): ?>
                    <div class="form-table col-sm-12 mt-2">
                        <div class="alert alert-success"> <?=$_GET['type']?> a ete a jour avec succes !</div>
                    </div>
            <?php endif; ?>
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Fax</th>
                        <th>Etablissement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectWhere("societe","*"," WHERE type = '$type' ");
                    if(!empty($rows)){
                    foreach($rows as $row):
                        
                ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["nom"]?></td>
                        <td> <?=$row["email"]?> </td>
                        <td><?=$row["tel"]?></td>
                        <td><?=$row["fax"]?></td>
                        <td><?=$row["etablissement"]?></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="societe/show?id=<?=$row["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="societe/update?id=<?=$row["id"]?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-danger verifier" data-page="societe" data-id="<?=$row['id']?>"  href="#">
                                <i class="fa fa-trash"></i>
                            </a>
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
