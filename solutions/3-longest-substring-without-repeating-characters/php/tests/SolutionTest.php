<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Leetcode\Solution;

class SolutionTest extends TestCase {
    public function testLengthOfLongestSubstring() {
        // Test cases
        $this->assertEquals(3, Solution::lengthOfLongestSubstring("abcabcbb"));
        $this->assertEquals(1, Solution::lengthOfLongestSubstring("bbbbb"));
        $this->assertEquals(3, Solution::lengthOfLongestSubstring("pwwkew"));
        $this->assertEquals(0, Solution::lengthOfLongestSubstring("")); // Empty string
        $this->assertEquals(2, Solution::lengthOfLongestSubstring("aab"));
        $this->assertEquals(4, Solution::lengthOfLongestSubstring("abcdabc"));
        $this->assertEquals(5, Solution::lengthOfLongestSubstring("tmmzuxt"));
    }
}

