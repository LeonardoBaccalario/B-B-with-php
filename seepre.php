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
    <div class="navbar bg-base-300 rounded-b-2xl mb-2">
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

    <div class="flex flex-col w-1/3 m-auto items-center">
        <?php 
            $mysqli = mysqli_connect("127.0.0.1", "root", "", "db_bed_and_breakfast");
        ?>
        <form action="" method="post" class="flex flex-col">
            <select name='users' class="select mb-2">
                <option value="" disabled selected>Insert user</option>
                <?php
                    $user = $mysqli->query("SELECT * FROM clienti");
                    while($row = $user->fetch_assoc()) {
                        echo "<option value=".$row['Codice'].">".$row['Nome']." ".$row['Cognome']."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Visualizza prenotazioni" class="btn mb-2 text-white rounded-full hover:bg-primary hover:border-primary">
        </form>
        <table class="text-center border-black border-2">
            <tr class="text-primary border-2 border-black">
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data arrivo</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data partenza</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Camera</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Descrizione</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Posti</th>
            </tr>
            <?php
                if(isset($_POST['users'])){
                    $prenotazioni = $mysqli->query("SELECT * FROM prenotazioni,camere WHERE Cliente = ".$_POST['users']." AND prenotazioni.Camera = camere.Numero");
                    while($row = $prenotazioni->fetch_assoc()) {
                        echo "<tr class='row'>";
                        echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataArrivo']."</td>";
                        echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataPartenza']."</td>";
                        echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Camera']."</td>";
                        echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Descrizione']."</td>";
                        echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Posti']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>