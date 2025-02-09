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

    public function testGetWAndEvenTitlesShouldReturnArray(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getWAndEvenTitles($movies->getUniqueTitles());
        $this->assertIsArray($titles);
    }

    public function testGetWAndEvenTitlesShouldReturnWElements(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getWAndEvenTitles($movies->getUniqueTitles());
        $selectedTitles = [];
        foreach ($titles as $title) {
            if (str_starts_with($title, 'W')) {
                $selectedTitles[] = $title;
            }
        }
        $this->assertGreaterThan(0, count($selectedTitles));
    }

    public function testGetWAndEvenTitlesShouldReturnEvenElements(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getWAndEvenTitles($movies->getUniqueTitles());
        $selectedTitles = [];
        foreach ($titles as $title) {
            $titleTmp = str_replace(Recommendations::TRANSLIT_FROM, Recommendations::TRANSLIT_TO, $title);
            if (strlen($titleTmp) % 2 === 0) {
                $selectedTitles[] = $title;
            }
        }
        $this->assertGreaterThan(0, count($selectedTitles));
    }

    public function testGetWAndEvenTitlesShouldReturnUniqueElements(): void
    {
        $movies = new Movies();
        $recommendations = new Recommendations();
        $titles = $recommendations->getWAndEvenTitles($movies->getUniqueTitles());
        $isUnique = count($titles) === count(array_unique($titles));
        $this->assertTrue($isUnique);
    }
}
