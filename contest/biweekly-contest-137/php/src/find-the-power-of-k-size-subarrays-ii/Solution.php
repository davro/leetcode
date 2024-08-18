<?php
//
// https://leetcode.com/contest/biweekly-contest-137/problems/find-the-power-of-k-size-subarrays-ii/description/
//
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function resultsArray($nums, $k) {
        $n = count($nums);
        $result = [];

        for ($i = 0; $i <= $n - $k; $i++) {
            $isConsecutive = true;
            for ($j = $i; $j < $i + $k - 1; $j++) {
                if ($nums[$j + 1] != $nums[$j] + 1) {
                    $isConsecutive = false;
                    break;
                }
            }

            if ($isConsecutive) {
                $result[] = max(array_slice($nums, $i, $k));
            } else {
                $result[] = -1;
            }
        }

        return $result;
    }
}

