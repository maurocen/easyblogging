<?php

    $u_name = $_POST['u_name']; // Getting the info provided in the
    $u_pass = $_POST['u_pass']; // user/pass combo box.
    
    require_once('Spyc.php');
    
    $database = Spyc::YAMLload('users.yaml'); // Getting the passwords.
    
    if (hash('sha512', $database[$u_name]['salt'].$u_pass) == $database[$u_name]['hash']) {
        session_start();                                        // 
        $_SESSION['name']   = $u_name;                          // If the combination is valid,
        $_SESSION['login']  = true;                             // start a new session and redirect.
        $_SESSION['role']   = $database[$u_name]['role'] ;      // Role of the session important for managing users and posts.
        header('Location: index.php');                          //
        exit;
    }
    else {
        $_SESSION['login']= false;      // If the combination is not valid, 
        header('Location: index.php');  // redirect home.
    }
    
    
?>