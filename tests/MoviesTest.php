<?php

namespace App\Tests;

use App\Movies;
use PHPUnit\Framework\TestCase;

class MoviesTest extends TestCase
{
    public function testGetUniqueTitlesShouldReturnArray(): void
    {
        $movies = new Movies();
        $titles = $movies->getUniqueTitles();
        $this->assertIsArray($titles);
    }

    public function testGetUniqueTitlesShouldReturnUniqueElements(): void
    {
        $movies = new Movies();
        $titles = $movies->getUniqueTitles();
        $isUnique = count($titles) === count(array_unique($titles));
        $this->assertTrue($isUnique);
    }

    public function testGetMoviesShouldReturnArray(): void
    {
        $movies = new Movies();
        $titles = $movies->getMovies();
        $this->assertIsArray($titles);
    }
}
