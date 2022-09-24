<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    $type = $db->selectWhere("societe","*","where id = $id")[0]['type'];
    if($db->delete($id, "societe")) {
        header('Location: '.URI.'societe?type='.$type);
        exit();
    }
endif;
?>