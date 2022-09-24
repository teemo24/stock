<?php
if(isset($_POST['id'])):
    $id = getifset($_POST['id']);
        if($db->delete($id, "personnel")) {
            echo "deleted!";
        }
endif;
?>