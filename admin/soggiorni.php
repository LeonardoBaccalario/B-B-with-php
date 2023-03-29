<?php ob_start(); ?>
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
    <?php
        setcookie('link-admin', '../admin/soggiorni.php', time() + 3600, "/"); // 1 hour
        include '../component/login-check-admin.php';
        include '../component/navbar.php';
        include '../component/db-connection.php';
    ?>

    <div class="flex flex-col w-1/3 m-auto items-center">
        <table class="text-center border-black border-2">
            <tr class="text-primary border-2 border-black">
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">ID prenotazione</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Descrizione</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Posti</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data Arrivo</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Data Partenza</th>
                <th class="border-2 border-black hover:bg-primary hover:text-white p-2">Documento</th>
            </tr>
            <?php
                $prenotazioni = $mysqli->query("SELECT * FROM camere,prenotazioni,soggiorni WHERE soggiorni.Prenotazione = prenotazioni.id AND prenotazioni.Camera = camere.Numero");
                while($row = $prenotazioni->fetch_assoc()) {
                    echo "<tr class='row'>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Prenotazione']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Descrizione']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Posti']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataArrivo']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['DataPartenza']."</td>";
                    echo "<td class='border-2 border-black hover:bg-primary hover:text-white'>".$row['Documento']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

    <h1 class="text-3xl text-primary font-bold text-center my-4">Aggiorna un documento</h1>

    <div class="flex flex-col w-1/2 m-auto items-center">
        <form method="post" class="flex flex-col gap-x-4 w-full items-center">
            <div class="flex flex-row gap-x-4">
                <select class="select w-1/2 max-w-xs text-lg" name="cambio-documento" >
                    <option value="" selected disabled hidden>Seleziona id</option>
                    <?php
                        $result = $mysqli->query("SELECT * FROM prenotazioni");
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['id']."</option>";
                        }
                    ?>
                </select>
                <select class="select w-1/2 max-w-xs text-lg" name="documento">
                    <option value="" selected disabled hidden>Documento</option>
                    <option value="CI">Carta d'identità</option>
                    <option value="Passaporto">Passaporto</option>
                    <option value="Patente">Patente</option>
                </select>
            </div>
            <input type="submit" class="btn text-white rounded-full mt-4 w-1/2" value="aggiorna" name="aggiorna">
        </form>
    </div>

    <?php
        if(isset($_POST['aggiorna'])) {
            $id = $_POST['cambio-documento'];
            $documento = $_POST['documento'];
            $mysqli->query("UPDATE soggiorni SET Documento = '$documento' WHERE Prenotazione = '$id'");
            header("Refresh: 0");
        }
    ?>
</body>
</html>
<?php ob_end_flush(); ?>