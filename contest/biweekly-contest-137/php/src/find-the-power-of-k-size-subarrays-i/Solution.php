<?php
#
# Find the Power of K-Size Subarrays I
# https://leetcode.com/contest/biweekly-contest-137/problems/find-the-power-of-k-size-subarrays-i/
#
class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function resultsArray($nums, $k) {
        $n = count($nums);
        $results = [];

        for ($i = 0; $i <= $n - $k; $i++) {
            $subarray = array_slice($nums, $i, $k);
            $isSortedAndConsecutive = true;

            // Check if the subarray is sorted and consecutive
            for ($j = 1; $j < $k; $j++) {
                if ($subarray[$j] !== $subarray[$j - 1] + 1) {
                    $isSortedAndConsecutive = false;
                    break;
                }
            }

            if ($isSortedAndConsecutive) {
                $results[] = max($subarray);
            } else {
                $results[] = -1;
            }
        }

        return $results;
    }
}
