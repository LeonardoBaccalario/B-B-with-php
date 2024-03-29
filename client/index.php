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
        include '../component/navbar.php';
    ?>
    <img src="https://source.unsplash.com/random/?bed&breakfast/123" alt="1" class="rounded-xl w-11/12 h-96 object-cover m-auto">
    <h1 class="text-center text-2xl mt-4 font-semibold">The best place to find your dream home</h1>
    <!-- images -->
    <div class="flex flex-wrap justify-center">
        <?php
            for($i = 0; $i < 27; $i++){
                echo '<img src="https://source.unsplash.com/random/?bed&breakfast/'.$i.'" alt="'.$i.'" class="h-60 w-60 object-cover rounded-xl m-4">';
            }
        ?>
    </div>
</body>
</html>