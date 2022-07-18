<?php
require 'Class/Countries.php';

$c = new Countries();

$c->setUrl('https://restcountries.com/v3.1/');

$countries = $c->getListCountries();
$regions = $c->getRegions();
?>

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
                        <a href="country.php?ccn3=<?= $value->ccn3 ?>">
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