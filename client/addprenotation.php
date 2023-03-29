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
        include '../component/login-check.php';
        include '../component/navbar.php';
        include '../component/db-connection.php';
        setcookie('link', '../client/addprenotation.php', time() + 3600, "/"); // 1 hour
    ?>

    <div class="flex flex-col w-1/3 m-auto items-center gap-y-4 mt-2">
        <form method="POST" class="flex flex-col gap-y-4">
            <input type="date" class="input w-full max-w-xs" placeholder="Data arrivo" name="dataArrivo">
            <input type="date" class="input w-full max-w-xs" placeholder="Data partenza" name="dataPartenza">
            <select class="select w-full max-w-xs text-lg" name="camera">
                <option value="" selected disabled hidden>Camera - Posti</option>
                <?php
                    $result = $mysqli->query("SELECT * FROM camere");
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['Numero']."'>".$row['Descrizione']." - ".$row['Posti']."</option>";
                    }
                ?>
            </select>
            <select class="select w-full max-w-xs text-lg" name="documento">
                <option value="" selected disabled hidden>Documento</option>
                <option value="CI">Carta d'identità</option>
                <option value="Passaporto">Passaporto</option>
                <option value="Patente">Patente</option>
            </select>
            <input type="submit" class="btn text-white rounded-full" value="Prenota" name="prenota">
        </form>
    </div>

    <?php
        try{
            if(isset($_POST['prenota'])){
                if(isset($_COOKIE['user-code'])){
                    $GLOBALS['user-code'] = $_COOKIE['user-code'];
                }
                $dataArrivo = $_POST['dataArrivo'];
                $dataPartenza = $_POST['dataPartenza'];
                $codiceCliente = $GLOBALS['user-code'];
                $codiceCamera = $_POST['camera'];
                $documento = $_POST['documento'];
                $mysqli->query("INSERT INTO prenotazioni (DataArrivo, DataPartenza, Cliente, Camera) VALUES ('$dataArrivo', '$dataPartenza', '$codiceCliente', '$codiceCamera')");
                $id = $mysqli->query("SELECT max(id) FROM prenotazioni")->fetch_assoc();
                $id = $id['max(id)'];
                $mysqli->query("INSERT INTO soggiorni (Prenotazione, Cliente, Documento) VALUES ('$id','$codiceCliente','$documento')");
                echo "<h1 class='text-center text-2xl font-bold mt-4'>Prenotazione effettuata con successo</h1>";
            }
        }catch(Exception $e) {
            echo "<h1 class='text-center text-2xl font-bold mt-4'>Errore nella prenotazione</h1>";
        }
    ?>
</body>
</html>