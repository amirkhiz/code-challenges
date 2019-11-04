<?php

class Solution1
{

    private $numpad = [
        2 => ['a', 'b', 'c'],
        3 => ['d', 'e', 'f'],
        4 => ['g', 'h', 'i'],
        5 => ['j', 'k', 'l'],
        6 => ['m', 'n', 'o'],
        7 => ['p', 'q', 'r', 's'],
        8 => ['t', 'u', 'v'],
        9 => ['w', 'x', 'y', 'z'],
    ];

    /**
     * @param String $digits
     *
     * @return String[]
     * @throws Exception
     */
    function letterCombinations($digits)
    {
        $digit        = substr($digits, 0, 1);
        $restOfDigits = substr($digits, 1);

        if ( ! isset($this->numpad[$digit])) {
            return [];
        }

        if (empty($restOfDigits)) {
            $com = $this->numpad[$digit];
        } else {
            $com = $this->letterCombinations($restOfDigits);

            $temp = [];
            foreach ($this->numpad[$digit] as $char) {
                foreach ($com as $c) {
                    $temp[] = $char . $c;
                }
            }

            $com = $temp;
        }

        return $com;
    }
}
