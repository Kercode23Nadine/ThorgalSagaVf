<?php

if (isset($_SESSION['email'])) {  
   
    session_destroy();
    $_SESSION['msg'] = 'Session détruite !';
    } else {
        $_SESSION['msg'] = 'Erreur : impossible de détruire la session !';
    }
header ("Location: ?action=home");   
exit;

?>




