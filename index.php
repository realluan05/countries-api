<?php require './Class/Countries.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript" defer></script>
    <script src="./js/dark-mode.js" type="text/javascript" defer></script>

    <title>REST Countries API</title>
</head>
<body>
    <?php
    $c = new Countries();

    $c->setUrl('https://restcountries.com/v3.1/all');
    //$countries = $c->getListCountries();
    $regions = $c->getRegions();

    //foreach ($countries as $country) {
    //    echo $country->name->common . '<br />';
    //}
    ?>

    <header class="header">
        <div class="container">
            <h1>Where in the world?</h1>
            <button>
                Dark Mode
            </button>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <section class="search-countries">
                <input placeholder="Search for a country" type="search" name="search" id="search" />

                <select name="filter" id="filter">
                    <option disabled selected>Filter by Region</option>
                    <?php foreach($regions as $code => $region) { ?>
                        <option value="<?= $code ?>"><?= $region ?></option>
                    <?php } ?>
                </select>
            </section>

            <section class="countries">

            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <strong>Developed by <a href="#">Luan Henrique</a></strong>
            <nav class="social">
                <ul>
                    <li>
                        <a href="#">GitHub</a>
                    </li>
                    <li>
                        <a href="#">Linkedin</a>
                    </li>
                    <li>
                        <a href="#">Instagram</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>