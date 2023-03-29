<!DOCTYPE html>
<html lang="en" data-theme="fantasy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <title>login</title>
</head>
<body>
    <?php
        setcookie('email-admin', '', time() - 3600, "/"); // 86400 = 1 giorno
        setcookie('password-admin', '', time() - 3600, "/");
        setcookie('admin-code', '', time() - 3600, "/");
        setcookie('link-admin', '../admin/seeprenotations.php', time() + 3600, "/");
        if(!isset($_COOKIE['link-admin'])){
            header('Refresh: 0');
        }
    ?>
    <div class=" flex flex-col items-center gap-y-8 mt-10">
        <div>
            <div class="normal-case text-4xl text-primary font-bold"><a href="../client/index.php">Bacca Bed & Breakfast</a></div>
            <div class="text-center mt-2">Sign in the restricted area</div>
        </div>
    
        <form method="post" action="<?php echo $_COOKIE['link-admin'] ?>" class="flex flex-col gap-y-4 mt-auto w-1/3">
            <input class="input input-ghost text-center h-10 " placeholder="email" type="email" name="email" id="email" required>
            <input class="input input-ghost text-center h-10" placeholder="password" type="password" name="password" id="password" required>
            <input class="btn mb-2 text-white rounded-full hover:bg-primary hover:border-primary h-10" type="submit" name="login-admin" value="Login">
        </form>
    </div>
</body>
</html>