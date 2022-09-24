<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    if($db->delete($id, "entrees")) {
        header('Location: '.URI.'catalogue');
        exit();
    }
endif;
?>