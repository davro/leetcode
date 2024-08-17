<?php

namespace Leetcode;

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        // If numRows is 1, the zigzag conversion is just the original string
        if ($numRows == 1) {
            return $s;
        }

        // Initialize an array to hold strings for each row
        $rows = array_fill(0, min($numRows, strlen($s)), '');

        $currentRow = 0;
        $goingDown = false;

        // Traverse the string character by character
        for ($i = 0; $i < strlen($s); $i++) {
            $rows[$currentRow] .= $s[$i];

            // If we're at the top or bottom row, reverse the direction
            if ($currentRow == 0 || $currentRow == $numRows - 1) {
                $goingDown = !$goingDown;
            }

            // Move up or down the rows
            $currentRow += $goingDown ? 1 : -1;
        }

        // Join all rows to form the final result
        $result = '';
        foreach ($rows as $row) {
            $result .= $row;
        }

        return $result;
    }
}

