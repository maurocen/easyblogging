<?php

    $u_name = $_POST['u_name'];
    $u_pass = $_POST['u_pass'];
    
    require_once('Spyc.php');
    
    $database = Spyc::YAMLload('hash.yaml');
    
    if (hash('sha512', $database[$u_name]['salt'].$u_pass) == $database[$u_name]['hash']) {
        session_start();
        $_SESSION['name'] = $u_name;
        $_SESSION['name'] = $u_name;
        $_SESSION['login']=true;
        header('Location: index.php');
        exit;
    }
    else {
        $_SESSION['login']=false;
        header('Location: index.php');     
    }
    
    
?>