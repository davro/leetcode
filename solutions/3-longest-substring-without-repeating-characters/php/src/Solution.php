<?php

/**
 * Leetcode Solution
 *
 * Doc comment long description must start with a capital letter
 *
 * @author  David Stevens <mail.davro@gmail.com>
 * @license https://www.gnu.org/licenses/lgpl-3.0.en.html LGPL Licence
 *
 */
namespace Leetcode;

/**
 * Solution
 *
 * The leetcode solution
 */
class Solution
{
    /**
     * The length of longest substring.
     *
     * @param String $s The string
     *
     * @return Integer
     */
    static function lengthOfLongestSubstring($s)
    {
        $n = strlen($s);
        $maxLength = 0;
	    $start = 0;
        $charIndexMap = [];

        for ($end = 0; $end < $n; $end++) {
            $char = $s[$end];

            // Check if the character is already in the map and is within the current window
            if (isset($charIndexMap[$char]) && $charIndexMap[$char] >= $start) {
                $start = $charIndexMap[$char] + 1;
            }

            // Update the character's index in the map.
            $charIndexMap[$char] = $end;

            // Calculate the length of the current window and update the max length
            $maxLength = max($maxLength, $end - $start + 1);
        }

        return $maxLength;
    }

// Test cases
//echo lengthOfLongestSubstring("abcabcbb") . PHP_EOL; // Output: 3
//echo lengthOfLongestSubstring("bbbbb") . PHP_EOL;    // Output: 1
//echo lengthOfLongestSubstring("pwwkew") . PHP_EOL;   // Output: 3

}

