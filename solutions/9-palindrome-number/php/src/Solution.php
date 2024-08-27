<?php

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        // Negative numbers are not palindromes
        if ($x < 0) {
            return false;
        }

        // Initialize variables
        $original = $x;
        $reversed = 0;

        // Reverse the integer
        while ($x > 0) {
            $reversed = $reversed * 10 + $x % 10;
            $x = intval($x / 10);
        }

        // Check if the original number is equal to the reversed number
        return $original == $reversed;
    }
}

// Example usage:
//$solution = new Solution();
//echo $solution->isPalindrome(121) ? 'true' : 'false';  // Output: true
//echo $solution->isPalindrome(-121) ? 'true' : 'false'; // Output: false
//echo $solution->isPalindrome(10) ? 'true' : 'false';   // Output: false
