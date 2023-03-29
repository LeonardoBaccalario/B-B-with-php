<?php
    setcookie('email-admin', '', time() - 3600, '/');
    setcookie('password-admin', '', time() - 3600, '/');
    setcookie('admin-code', '', time() - 3600, '/');
    header("Location: ../client/index.php");
?>