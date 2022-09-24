<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    if($id != '1')
        if($db->delete($id, "users")) {
            header('Location: '.URI.'users');
            exit();
        }
endif;
?>