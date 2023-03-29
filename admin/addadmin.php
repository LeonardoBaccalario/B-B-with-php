<!DOCTYPE html>
<html lang="en" data-theme="fantasy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <title>Add admin</title>
</head>
<body>
    <?php
        include '../component/login-check-admin.php';
        include '../component/navbar.php';
        include '../component/db-connection.php';
        setcookie('link-admin', '../admin/addadmin.php', time() + 3600, "/"); // 1 hour
    ?>
    <h1>Aggiungi amministratore</h1>
</body>
</html>