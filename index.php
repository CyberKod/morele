<?php

declare(strict_types = 1);

require "vendor/autoload.php";

use App\Movies;
use App\Recommendations;

$movies = new Movies();
$titles = $movies->getUniqueTitles();
if ($titles) {
    $recommendations = new Recommendations();

    echo 'Zwracane są 3 losowe tytuły:' . '<br>';
    foreach ($recommendations->getThreeRandomTitles($titles) as $recommendation) {
        echo $recommendation . '<br>';
    }

} else {
    echo 'Obecnie nie posiadamy żadnych rekomendacji.';
}
