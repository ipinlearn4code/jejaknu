<?php

if (! function_exists('word_limiter')) {
    /**
     * Limit the number of words in a string.
     *
     * @param string  $str    The string to limit
     * @param int     $limit  The number of words to return
     * @param string  $endChar The ending character (defaults to '…')
     * @return string
     */
    function word_limiter(string $str, int $limit = 100, string $endChar = '…'): string
    {
        if (trim($str) === '') {
            return $str;
        }
        
        $words = preg_split('/\s+/', $str);

        if (count($words) <= $limit) {
            return $str;
        }

        return implode(' ', array_slice($words, 0, $limit)) . $endChar;
    }
}
