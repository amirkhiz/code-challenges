<?php

/**
 * Class Solution3
 * @url https://leetcode.com/problems/subsets/
 */
class Solution3
{
    /**
     * @param Integer[] $nums
     *
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $result[] = [$nums[0]];
        $temp     = $nums;
        unset($temp[0]);

        foreach ($temp as $num) {
            $tempResult = [];
            foreach ($result as $res) {
                $tempResult[] = array_merge($res, [$num]);
            }
            $result   = array_merge($result, $tempResult);
            $result[] = [$num];
        }
        $result[] = [];

        return $result;
    }
}

$solution = new Solution3();
print_r($solution->subsets([1, 2, 3]));