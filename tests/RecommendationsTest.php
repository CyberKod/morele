<?php

namespace App\Tests;

use App\Movies;
use App\Recommendations;
use PHPUnit\Framework\TestCase;

class RecommendationsTest extends TestCase
{
    public function testGetThreeRandomTitlesShouldReturnArray(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getThreeRandomTitles($movies->getUniqueTitles());
        $this->assertIsArray($titles);
    }

    public function testGetThreeRandomTitlesShouldHasThreeElements(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getThreeRandomTitles($movies->getUniqueTitles());
        $this->assertCount(Recommendations::TITLES_QTY, $titles);
    }

    public function testGetThreeRandomTitlesShouldReturnUniqueElements(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getThreeRandomTitles($movies->getUniqueTitles());
        $isUnique = count($titles) === count(array_unique($titles));
        $this->assertTrue($isUnique);
    }
}
