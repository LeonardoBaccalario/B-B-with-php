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
    <div class=" flex flex-col items-center gap-y-8 mt-10">
        <div>
            <div class="normal-case text-4xl text-primary font-bold">Bacca Bed & Breakfast</div>
            <div class="text-center mt-2">Create an account</div>
            <div class="text-center">or <a href="login.php" class="text-blue-500">Signin</a></div>
        </div>
    
        <form method="post" action="index.php" class="flex flex-col gap-y-4 mt-auto w-1/3">
            <input class="input input-ghost text-center h-10 " placeholder="nome" type="text" name="nome" id="nome" required>
            <input class="input input-ghost text-center h-10 " placeholder="cognome" type="text" name="cognome" id="cognome" required>
            <input class="input input-ghost text-center h-10 " placeholder="indirizzo" type="text" name="indirizzo" id="indirizzo" required>
            <input class="input input-ghost text-center h-10 " placeholder="telefono" type="text" name="telefono" id="telefono" required>
            <input class="input input-ghost text-center h-10 " placeholder="email" type="email" name="email" id="email" required>
            <input class="input input-ghost text-center h-10" placeholder="password" type="password" name="password" id="password" required>
            <input class="btn mb-2 text-white rounded-full hover:bg-primary hover:border-primary h-10" type="submit" name="signup" value="Signup">
        </form>
    </div>
</body>
</html>