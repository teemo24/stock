<?php 
$pageTitle = "Users";
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
            <a href="users/create" class="btn btn-primary">Ajouter</a>
        </div>
    </div>
    <div class="content">
        <div class="content-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Date d'ajoute</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rows = $db->selectAll("users");
                    if(!empty($rows)){
                    foreach($rows as $row):
                        
                ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["username"]?></td>
                        <td> <?=$row["role"]?> </td>
                        <td><?=$row["date"]?></td>
                        <td><?=$row["status"]?></td>
                        <td class="actions">
                            <a class="btn btn-primary" href="users/show?id=<?=$row["id"]?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="users/update?id=<?=$row["id"]?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-danger verifier" data-page="users" data-id="<?=$row['id']?>"  href="#">
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
