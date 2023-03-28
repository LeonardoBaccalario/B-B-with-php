<?php
    try{
        if(isset($_COOKIE['email'])) {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $result = $mysqli->query("SELECT Email, Password FROM clienti WHERE email = '$email'")->fetch_assoc();
            if ($password != $result['Password']) {
                header("Location: ../login.php");
            }
        }else if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $mysqli->query("SELECT * FROM clienti WHERE email = '$email'")->fetch_assoc();
            if (password_verify($password, $result['Password'])) {
                setcookie('email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('password', $result['Password'], time() + (86400 * 30), "/"); // 86400 = 1 day
            }else{
                header("Location: ../login.php");
            }
        }else if (isset($_POST['signup'])){
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $indirizzo = $_POST['indirizzo'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $result = $mysqli->query("INSERT INTO clienti (`Cognome`, `Nome`, `Indirizzo`, `Telefono`, `Email`, `Password`) VALUES ('$cognome', '$nome', '$indirizzo', '$telefono', '$email', '$password')");
            if ($result) {
                setcookie('email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('password', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
        }else{
            setcookie('email', '', time() - 3600, "/"); // 86400 = 1 day
            setcookie('password', '', time() - 3600, "/"); // 86400 = 1 day
            header("Location: ../login.php");
        }
    }catch(Exception $e){
        setcookie('email', '', time() - 3600, "/"); // 86400 = 1 day
        setcookie('password', '', time() - 3600, "/"); // 86400 = 1 day
        header("Location: ../login.php");
    }        
?>