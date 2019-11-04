<?php

class Solution2
{

    /**
     * @param String $s
     *
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $arrS    = array_keys(array_flip(str_split($s)));
        $uniqueS = implode('', $arrS);

        if (strstr($s, $uniqueS)) {
            return strlen($uniqueS);
        }

        $length    = strlen($s);
        $uniqueLen = strlen($uniqueS);

        for ($i = $uniqueLen; $i > 0; $i--) {
            $start = 0;
            while (($start + $i) <= $length) {
                $chance = substr($s, $start, $i);
                if ($this->isUnique($chance)) {
                    return strlen($chance);
                }

                $start++;
            }
        }

        return 0;
    }

    /**
     * @param string $string
     *
     * @return bool
     */
    private function isUnique(string $string)
    {
        return strlen($string) === strlen(implode(array_keys(array_flip(str_split($string)))));
    }
}