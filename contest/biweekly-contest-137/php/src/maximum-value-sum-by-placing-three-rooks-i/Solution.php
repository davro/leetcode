<?php
//
// https://leetcode.com/contest/biweekly-contest-137/problems/maximum-value-sum-by-placing-three-rooks-i/description/
//
class Solution {

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function maximumValueSum($board) {
        $m = count($board);      // Number of rows
        $n = count($board[0]);   // Number of columns
        $maxSum = PHP_INT_MIN;

        // Loop over all possible combinations of rows and columns for placing the rooks
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                for ($k = $i + 1; $k < $m; $k++) {
                    for ($l = 0; $l < $n; $l++) {
                        if ($l == $j) continue;  // Skip if column is the same
                        for ($p = $k + 1; $p < $m; $p++) {
                            for ($q = 0; $q < $n; $q++) {
                                if ($q == $j || $q == $l) continue;  // Skip if column is the same
                                // Calculate the sum of the selected cells
                                $sum = $board[$i][$j] + $board[$k][$l] + $board[$p][$q];
                                // Update max sum if this sum is greater
                                $maxSum = max($maxSum, $sum);
                            }
                        }
                    }
                }
            }
        }

        return $maxSum;
    }
}

