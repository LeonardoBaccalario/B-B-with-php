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
        setcookie('link', '../client/deleteprenotation.php', time() + 3600, "/"); // 1 hour
        include '../component/login-check.php';
        include '../component/navbar.php';
        include '../component/db-connection.php';
    ?>
    <h1 class="text-3xl text-primary font-bold text-center my-4">Le tue prenotazioni</h1>
    <div class="flex flex-col gap-y-4 items-center mb-4">
        <?php
            if(isset($_COOKIE['user-code'])){
                $GLOBALS['user-code'] = $_COOKIE['user-code'];
            }
            $prenotazioni = $mysqli->query("SELECT * FROM prenotazioni,camere WHERE prenotazioni.Cliente = ".$GLOBALS['user-code']." AND prenotazioni.Camera = camere.Numero");
            while($row = $prenotazioni->fetch_assoc()) {
                echo "<div class='card w-96 bg-primary text-primary-content'>";       
                echo "<div class='card-body'>";
                echo "<h2 class='card-title text-base-100'>Camera prenotata: ".$row['Descrizione']."</h2>";
                echo "<p class='text-base-100'>Data di arrivo: ".$row['DataArrivo']."</p>";
                echo "<p class='text-base-100'>Data di arrivo: ".$row['DataPartenza']."</p>";
                echo "<p class='text-base-100'>Numero posti: ".$row['Posti']."</p>";    
                echo "<div class='card-actions justify-end'>";
                echo "<form method='POST'><button type='submit' class='btn text-base-100' name='disdici' value=".$row['id'].">Disdici</button></form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            if(isset($_POST['disdici'])){
                $mysqli->query("DELETE FROM soggiorni WHERE Prenotazione = ".$_POST['disdici']);
                $mysqli->query("DELETE FROM prenotazioni WHERE prenotazioni.id = ".$_POST['disdici']);
                header("Refresh: 0");
            }
        ?>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>