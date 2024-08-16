<?php

use PHPUnit\Framework\TestCase;
use Leetcode\Solution;

class SolutionTest extends TestCase
{
    public function testFindMedianSortedArrays()
    {
        $solution = new Solution();

        // Test case 1
        $nums1 = [1, 3];
        $nums2 = [2];
        $expected = 2.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 2
        $nums1 = [1, 2];
        $nums2 = [3, 4];
        $expected = 2.50000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 3 - both arrays have one element
        $nums1 = [0];
        $nums2 = [0];
        $expected = 0.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 4 - one array is empty
        $nums1 = [];
        $nums2 = [1];
        $expected = 1.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 5 - arrays with negative and positive numbers
        $nums1 = [-1, 1];
        $nums2 = [-2, 2];
        $expected = 0.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 6 - larger arrays
        $nums1 = [1, 3, 8, 9, 15];
        $nums2 = [7, 11, 18, 19, 21, 25];
        $expected = 11.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));

        // Test case 7 - repeated elements
        $nums1 = [1, 2, 2];
        $nums2 = [2, 2, 3];
        $expected = 2.00000;
        $this->assertEquals($expected, $solution->findMedianSortedArrays($nums1, $nums2));
    }
}

