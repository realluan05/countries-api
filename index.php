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

    $c->setUrl('https://restcountries.com/v3.1/');
    $regions = $c->getRegions();
    ?>

    <header class="header">
        <div class="container">
            <section class="dark-mode">
                <h1>Where in the world?</h1>
                <button>
                    Dark Mode
                </button>
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

            <?php
            function getHtmlCountry($img, $name, $pop, $reg, $cap, $link)
            {
                if ($img) {
                    return '
                        <a class="item" href="'.$link.'">
                            <figure>
                                <img src="./assets/images/countries/'.$img.'" alt="'.$name.'" loading="lazy" />
                            </figure>
                            <div class="content">
                                <h2>'.$name.'</h2>
                                <ul>
                                    <li><strong>Population: </strong>'.number_format($pop).'</li>
                                    <li><strong>Region: </strong>'.$reg.'</li>
                                    <li><strong>Capital: </strong>'.$cap.'</li>
                                </ul>
                            </div>
                        </a>
                    ';
                }
                return false;
            }
            ?>

            <section class="countries">
                <?php
                $c->setCountry('https://restcountries.com/v3.1/name/');

                $germany = $c->getInfoCountry('germany');
                $unitedStates = $c->getInfoCountry('usa');
                $brazil = $c->getInfoCountry('brazil');
                $iceland = $c->getInfoCountry('iceland');
                $argentina = $c->getInfoCountry('argentina');
                $france = $c->getInfoCountry('france');
                $southKorea = $c->getInfoCountry('kor');
                $spain = $c->getInfoCountry('spain');

                foreach ($germany as $deu) {
                    echo getHtmlCountry('germany.jpg', $deu->name->common, $deu->population, $deu->region, $deu->capital[0], '#');
                }
                foreach ($unitedStates as $usa) {
                    echo getHtmlCountry('united-states.jpg', $usa->name->common, $usa->population, $usa->region, $usa->capital[0], '#');
                }
                foreach ($brazil as $bra) {
                    echo getHtmlCountry('brazil.jpg', $bra->name->common, $bra->population, $bra->region, $bra->capital[0], '#');
                }
                foreach ($iceland as $isl) {
                    echo getHtmlCountry('iceland.jpg', $isl->name->common, $isl->population, $isl->region, $isl->capital[0], '#');
                }
                foreach ($argentina as $arg) {
                    echo getHtmlCountry('argentina.jpg', $arg->name->common, $arg->population, $arg->region, $arg->capital[0], '#');
                }
                foreach ($france as $fra) {
                    echo getHtmlCountry('france.png', $fra->name->common, $fra->population, $fra->region, $fra->capital[0], '#');
                }
                foreach ($southKorea as $kor) {
                    if ($kor->name->common == 'South Korea') {
                        echo getHtmlCountry('shout-korea.jpg', $kor->name->common, $kor->population, $kor->region, $kor->capital[0], '#');
                    }
                }
                foreach ($spain as $esp) {
                    echo getHtmlCountry('spain.jpg', $esp->name->common, $esp->population, $esp->region, $esp->capital[0], '#');
                }
                ?>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <span>Developed by <strong>Luan Henrique</strong></span>
            <nav class="social">
                <ul>
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>