<?php

    switch($_GET['op']){
        case 'a':
            header('location:alta.php');
            break;
        case 'b':
            header('location:borrar.php?id='.$_GET['id']);
            break;
        case 'm':
            header('location:modificar.php?id='.$_GET['id']);
            break;
            
    }

?>