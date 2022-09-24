<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    
    if($db->delete($id, "categories")) {
        header('Location: '.URI.'categories');
        exit();
    }
        
endif;
?>