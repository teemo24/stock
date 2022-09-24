<?php
ob_start();
session_start();
require_once 'init.php';

if(ROLE == "superadmin"):
    include "controller/superadmin.php";  

elseif(ROLE == "admin"):
    include "controller/admin.php";  

elseif(ROLE == "editor"):
    include "controller/editor.php";  

elseif(ROLE == "consultant"):
    include "controller/consultant.php"; 

elseif(ROLE == "agent"):
    include "controller/agent.php";  

else:
    include "controller/public.php";

endif;

ob_end_flush();
