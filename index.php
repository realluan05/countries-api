<?php require './Class/Countries.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css" type="text/css" />

<<<<<<< HEAD
    <!--
=======
    <script src="https://kit.fontawesome.com/2f41b6fafb.js" crossorigin="anonymous"></script>
>>>>>>> 11dcb6fc1321507cf9f0f721649ee1e3a100b30d
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript" defer></script>
    -->
    <script src="./js/dark-mode.js" type="text/javascript" defer></script>

    <title>REST Countries API</title>
</head>
<body>
    <?php
    $c = new Countries();

    $c->setUrl('https://restcountries.com/v3.1/');

    $countries = $c->getListCountries();
    $regions = $c->getRegions();
    ?>

    <header class="header">
        <div class="container">
            <section class="dark-mode">
                <h1>Where in the world?</h1>

                <input id="night-mode" class="lamp" type="checkbox" aria-label="night-mode" />
            </section>
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
                <?php foreach($countries as $country) { ?>
                    <a class="item" href="#">
                        <figure>
                            <img src="<?= $country->flags->png ?>" alt="<?= $country->name->common ?>" loading="lazy" />
                        </figure>
                        <div class="content">
                            <h2><?= $country->name->common ?></h2>
                            <ul>
                                <li><strong>Population: </strong><?= number_format($country->population) ?></li>
                                <li><strong>Region: </strong><?= $country->region ?></li>
                                <li><strong>Capital: </strong><?= $country->capital[0] ?></li>
                            </ul>
                        </div>
                    </a>
                <?php } ?>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <span class="copyright">Developed by <strong>Luan Henrique</strong></span>
            <nav class="social">
                <ul>
                    <li><a href="#" title="GitHub"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>