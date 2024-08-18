<?php
//
// https://leetcode.com/contest/biweekly-contest-137/problems/maximum-value-sum-by-placing-three-rooks-ii/description/
//
class Solution {
    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function maximumValueSum($board) {
        $m = count($board);
        $n = count($board[0]);
        $maxSum = PHP_INT_MIN;

        // Iterate through all combinations of three rows
        for ($i = 0; $i < $m - 2; $i++) {
            for ($j = $i + 1; $j < $m - 1; $j++) {
                for ($k = $j + 1; $k < $m; $k++) {
                    // Iterate through all combinations of three columns
                    for ($x = 0; $x < $n - 2; $x++) {
                        for ($y = $x + 1; $y < $n - 1; $y++) {
                            for ($z = $y + 1; $z < $n; $z++) {
                                // Calculate the sum for this combination of rows and columns
                                $currentSum = $board[$i][$x] + $board[$j][$y] + $board[$k][$z];
                                // Update the maximum sum
                                $maxSum = max($maxSum, $currentSum);
                            }
                        }
                    }
                }
            }
        }

        return $maxSum;
    }
}

