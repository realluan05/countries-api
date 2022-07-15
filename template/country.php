<?php
$id = $_GET['ccn3'];
$endpoint = 'https://restcountries.com/v3.1/alpha/'.$id.'';
$country = json_decode(file_get_contents($endpoint));
?>

<?php foreach($country as $c): ?>
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
            <a href="../index.php" class="button">
                Back
            </a>

            <section class="wrapper-country">
                <div class="image-country">
                    <figure>
                        <img src="<?= $c->flags->svg ?>" alt="<?= $c->name->common ?>" loading="lazy" />
                    </figure>
                </div>
                <div class="info-country">
                    <h1><?= $c->name->common ?></h1>

                    <ul class="list">
                        <?php foreach($c->name->nativeName as $native) { ?>
                            <li>
                                <p><strong>Native Name: </strong> <?= $native->common ?></p>
                            </li>
                            <?php break; ?>
                        <?php } ?>
                        <li><p><strong>Population: </strong><?= number_format($c->population) ?></p></li>
                        <li><p><strong>Region: </strong><?= $c->region ?></p></li>
                        <li><p><strong>Sub Region: </strong><?= $c->subregion ?></p></li>
                        <li><p><strong>Capital: </strong><?= $c->capital[0] ?></p></li>
                        <li><p><strong>Top Level Domain: </strong><?= $c->tld[0] ?></p></li>
                        <?php foreach($c->currencies as $currency) { ?>
                            <li>
                                <p><strong>Currencies: </strong> <?= $currency->name ?></p>
                            </li>
                        <?php } ?>
                        <li>
                            <p>
                                <strong>Languages: </strong>
                                <?php foreach($c->languages as $idx => $lang) {
                                    echo $lang . ', ';
                                } ?>
                            </p>
                        </li>
                    </ul>

                    <div class="border-countries">
                        <strong>Border Countries:</strong>

                        <ul>
                            <?php foreach($c->borders as $border) { ?>
                                <li>
                                    <span><?= $border ?></span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </sec>
        </div>
    </main>

    <?php require_once './footer.php' ?>
</body>
</html>
<?php endforeach; ?>