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
    <div class="navbar bg-base-300 rounded-b-2xl">
        <div class="flex-1">
            <a href="index.html" class="btn btn-ghost normal-case text-2xl text-primary font-bold">Bed & Breakfast</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li tabindex="0" class="flex justify-center">
                    <a>
                        Clienti
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                    </a>
                    <ul class="bg-base-300 rounded-b-2xl" style="border-top-left-radius: unset;border-top-right-radius: unset">
                        <li><a href="seepre.php">Prenotazioni</a></li>
                        <li><a href="addpre.php">Prenotare B&B</a></li>
                        <li><a href="deletepre.php">Disdire B&B</a></li>
                    </ul>
                </li>
                <li tabindex="0" class="flex justify-center">
                        <a>
                            Admin
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                        </a>
                    <ul class="bg-base-300 rounded-b-2xl" style="border-top-left-radius: unset;border-top-right-radius: unset">
                        <li><a href="seepreadmin.php">Prenotazioni</a></li>
                        <li><a href="addresidence.php">Soggiorni</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <h1>Cancellare prenotazioni</h1>
</body>
</html>