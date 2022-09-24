<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    $file_name = $db->selectWhere("offre","file","where id = $id")[0]['file'];
    if($db->delete($id, "offre")) {
        unlink(UPLOADS.'/'.$file_name);
        header('Location: '.URI.'offre');
        exit();
    }
endif;
?>