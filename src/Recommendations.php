<?php

declare(strict_types = 1);

namespace App;

use Throwable;

class Recommendations
{
    public const TITLES_QTY = 3;
    private const ERROR_MSG = 'Przepraszamy, obecnie mamy problem z wyświetleniem tego elementu.';

    /**
     * @param array $titles
     * @return array
     */
    public function getThreeRandomTitles(array $titles): array
    {
        try {
            $selectedTitles = [];
            $titleIds = array_rand($titles, self::TITLES_QTY);
            foreach ($titleIds as $titleId) {
                $selectedTitles[] = $titles[$titleId];
            }

            return $selectedTitles;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return [self::ERROR_MSG];
        }
    }

}
