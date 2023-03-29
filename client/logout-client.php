<?php
    setcookie('email', '', time() - 3600, '/');
    setcookie('password', '', time() - 3600, '/');
    setcookie('user-code', '', time() - 3600, '/');
    header("Location: index.php");
?>