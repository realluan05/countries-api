<?php
$id = $_GET['ccn3'];
$endpoint = 'https://restcountries.com/v3.1/alpha/'.$id.'';
$country = json_decode(file_get_contents($endpoint));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/page/country.css" type="text/css" />

    <script src="https://kit.fontawesome.com/2f41b6fafb.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript" defer></script>
    <script src="../js/geral.js" type="text/javascript" defer></script>
    <script src="../js/dark-mode.js" type="text/javascript" defer></script>
    <script src="../js/filters.js" type="text/javascript" defer></script>

    <title><?= $c->name->common ?></title>
</head>
<body>
    <?php require_once './header.php' ?>

    <main class="main">
        <div class="container">

        </div>
    </main>

    <?php require_once './footer.php' ?>
</body>
</html>