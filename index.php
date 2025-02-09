<?php

declare(strict_types = 1);

require "vendor/autoload.php";

use App\Movies;

$movies = new Movies();
$titles = $movies->getUniqueTitles();
if ($titles) {
    foreach ($titles as $title) {
        echo $title . "\n";
    }
} else {
    echo 'Obecnie nie posiadamy żadnych rekomendacji.';
}