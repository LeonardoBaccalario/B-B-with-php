<!DOCTYPE html>
<html lang="en" data-theme="fantasy">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <title>Prenotations</title>
</head>
<body>
    <?php
        include '../component/login-check.php';
        include '../component/navbar.php';
        include '../component/db-connection.php';
        setcookie('link', '../client/seeprenotations.php', time() + 3600, "/"); // 1 hour
    ?>

    <div class="flex flex-col w-1/3 m-auto items-center">
        <table class="text-center border-black border-2">
            <tr class="text-primary border-2 border-black">
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data arrivo</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data partenza</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Camera</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Descrizione</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Posti</th>
            </tr>
            <?php
                if(isset($_COOKIE['user-code'])){
                    $GLOBALS['user-code'] = $_COOKIE['user-code'];
                }
                $prenotazioni = $mysqli->query("SELECT * FROM prenotazioni,camere WHERE prenotazioni.Cliente = ".$GLOBALS['user-code']." AND prenotazioni.Camera = camere.Numero");
                while($row = $prenotazioni->fetch_assoc()) {
                    echo "<tr class='row'>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataArrivo']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataPartenza']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Camera']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Descrizione']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Posti']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>