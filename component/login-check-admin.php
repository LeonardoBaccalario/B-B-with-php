<?php
    include '../component/db-connection.php';
    try{
        if(isset($_COOKIE['email-admin'])) {
            $email = $_COOKIE['email-admin'];
            $password = $_COOKIE['password-admin'];
            $result = $mysqli->query("SELECT email, password FROM admin WHERE email = '$email'")->fetch_assoc();
            if ($password != $result['password']) {
                header("Location: ../admin/login.php");
            }
        }else if (isset($_POST['login-admin'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $mysqli->query("SELECT * FROM admin WHERE email = '$email'")->fetch_assoc();
            if (password_verify($password, $result['password'])) {
                setcookie('email-admin', $email, time() + 86400, "/"); // 86400 = 1 day
                setcookie('password-admin', $result['password'], time() + 86400, "/"); // 86400 = 1 day
                setcookie('admin-code', $result['codice'], time() + 86400, "/"); // 86400 = 1 day
                $GLOBALS['admin-code'] = $result['codice'];
            }else{
                header("Location: ../admin/login.php");
            }
        }else{
            setcookie('email-admin', '', time() - 3600, "/"); // 86400 = 1 day
            setcookie('password-admin', '', time() - 3600, "/"); // 86400 = 1 day
            setcookie('admin-code', '', time() - 3600, "/"); // 86400 = 1 day
            $GLOBALS['admin-code'] = "";
            header("Location: ../admin/login.php");
        }
    }catch(Exception $e){
        setcookie('email', '', time() - 3600, "/"); // 86400 = 1 day
        setcookie('password', '', time() - 3600, "/"); // 86400 = 1 day
        setcookie('admin-code', '', time() - 3600, "/"); // 86400 = 1 day
        $GLOBALS['admin-code'] = "";
        header("Location: ../admin/login.php");
    }        
?>