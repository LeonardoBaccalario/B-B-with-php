<!DOCTYPE html>
<html lang="en" data-theme="fantasy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <title>Home</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="flex flex-col w-1/3 m-auto items-center gap-y-2 mt-2">
        <form method="POST" class="flex flex-col gap-y-2">
            <input type="date" placeholder="Data arrivo" name="dataArrivo">
            <input type="date" placeholder="Data partenza" name="dataPartenza">
            <input type="submit" class="btn text-white rounded-full" value="Prenota">
        </form>
    </div>
</body>
</html>