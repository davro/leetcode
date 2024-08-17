<?php

use PHPUnit\Framework\TestCase;
use Leetcode\Solution;

class SolutionTest extends TestCase
{
    public function testLongestPalindrome()
    {
        $solution = new Solution();

        // Test case 1: "babad"
        $result = $solution->longestPalindrome("babad");
        $this->assertTrue($result === "bab" || $result === "aba", "Failed on input 'babad'");

        // Test case 2: "cbbd"
        $result = $solution->longestPalindrome("cbbd");
        $this->assertEquals("bb", $result, "Failed on input 'cbbd'");

        // Test case 3: Single character
        $result = $solution->longestPalindrome("a");
        $this->assertEquals("a", $result, "Failed on input 'a'");

        // Test case 4: Empty string
        $result = $solution->longestPalindrome("");
        $this->assertEquals("", $result, "Failed on input ''");

        // Test case 5: Palindrome of even length
        $result = $solution->longestPalindrome("abccba");
        $this->assertEquals("abccba", $result, "Failed on input 'abccba'");

        // Test case 6: Palindrome of odd length
        $result = $solution->longestPalindrome("racecar");
        $this->assertEquals("racecar", $result, "Failed on input 'racecar'");

        // Test case 7: Long string with no palindrome longer than 1
        $result = $solution->longestPalindrome("abcd");
        $this->assertTrue(in_array($result, ["a", "b", "c", "d"]), "Failed on input 'abcd'");
    }
}

