<?php require './Class/Countries.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css" type="text/css" />

    <script src="https://kit.fontawesome.com/2f41b6fafb.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript" defer></script>
    <script src="./js/script.js" type="text/javascript" defer></script>

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

                <div class="btn-dark-mode">
                    <i class="fa-solid fa-moon"></i>
                    <label for="night-mode">Dark Mode</label>
                    <input id="night-mode" class="lamp" type="checkbox" aria-label="night-mode" />
                </div>
            </section>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <section class="search-countries">
                <div class="wrapper-search">
                    <input placeholder="Search for a country..." type="search" name="search" id="search" />
                </div>

                <select name="filter" id="filter">
                    <option value="-1" disabled selected>Filter by Region</option>
                    <?php foreach($regions as $code => $region) { ?>
                        <option value="<?= $code ?>"><?= $region ?></option>
                    <?php } ?>
                </select>
            </section>

            <section class="countries">
                <ul id="list-countries">
                    <?php foreach($countries as $key => $value) { ?>
                        <li class="item" id="n-produto-<?= $key ?>">
                            <a href="#">
                                <figure>
                                    <img src="<?= $value->flags->png ?>" alt="<?= $value->name->common ?>" loading="lazy" />
                                </figure>
                                <div class="content">
                                    <strong class="name"><?= $value->name->common ?></strong>
                                    <ul>
                                        <li><p><strong>Population: </strong><?= number_format($value->population) ?></p></li>
                                        <li><p><strong>Region: </strong><?= $value->region ?></p></li>
                                        <li><p><strong>Capital: </strong><?= $value->capital[0] ?></p></li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <button class="to-top"><i class="fa-solid fa-angle-up"></i></button>
            <span class="copyright">Developed by <strong>Luan Henrique</strong></span>
            <nav class="social">
                <ul>
                    <li><a href="https://github.com/realluan05" target="_blank" rel="noopener" title="GitHub"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/luan-henrique-3166251a2/" target="_blank" rel="noopener" title="Linkedin"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="https://www.instagram.com/realluan05/" target="_blank" rel="noopener" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>