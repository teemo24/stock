<?php
if(isset($_GET['id'])):
    $id = getifset($_GET['id']);
    
    if($db->delete($id, "emplacements")) {
        header('Location: '.URI.'emplacements');
        exit();
    }
        
endif;
?>