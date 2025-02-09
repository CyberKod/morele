<?php

declare(strict_types = 1);

namespace App;

use Throwable;

class Recommendations
{
    public const TITLES_QTY = 3;
    public const TRANSLIT_FROM = ['ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ź', 'ż'];
    public const TRANSLIT_TO = ['a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z'];
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

    /**
     * @param array $titles
     * @return array
     */
    public function getWAndEvenTitles(array $titles): array
    {
        try {
            $selectedTitles = [];
            foreach ($titles as $title) {
                $titleTmp = str_replace(self::TRANSLIT_FROM, self::TRANSLIT_TO, $title);
                if (str_starts_with($title, 'W') && strlen($titleTmp) % 2 === 0) {
                    $selectedTitles[] = $title;
                }
            }

            return $selectedTitles;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return [self::ERROR_MSG];
        }
    }

    /**
     * @param array $titles
     * @return array
     */
    public function getMoreThanOneWordTitles(array $titles): array
    {
        try {
            $selectedTitles = [];
            foreach ($titles as $title) {
                $titleArr = explode(" ", $title);
                if (count($titleArr) > 1) {
                    $selectedTitles[] = $title;
                }
            }

            return $selectedTitles;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return [self::ERROR_MSG];
        }
    }
}
