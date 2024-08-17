<?php

namespace Leetcode;

class Solution {
    public function longestPalindrome($s) {
        $n = strlen($s);
        if ($n == 0) return "";

        $start = 0;
        $maxLength = 1;

        for ($i = 0; $i < $n; $i++) {
            // Case 1: Odd length palindromes, center is at i
            $len1 = $this->expandAroundCenter($s, $i, $i);
            // Case 2: Even length palindromes, center is between i and i+1
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);

            // Find the maximum length
            $len = max($len1, $len2);

            // Update start and maxLength if a longer palindrome is found
            if ($len > $maxLength) {
                $start = $i - (int)(($len - 1) / 2);
                $maxLength = $len;
            }
        }

        return substr($s, $start, $maxLength);
    }

    private function expandAroundCenter($s, $left, $right) {
        while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
            $left--;
            $right++;
        }
        return $right - $left - 1;
    }
}

