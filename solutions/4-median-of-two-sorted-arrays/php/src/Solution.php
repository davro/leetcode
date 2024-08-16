<?php

namespace Leetcode;

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    public function findMedianSortedArrays($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);

        // Ensure that $nums1 is the smaller array
        if ($m > $n) {
            return $this->findMedianSortedArrays($nums2, $nums1);
        }

        $imin = 0;
        $imax = $m;
        $half_len = intval(($m + $n + 1) / 2);

        while ($imin <= $imax) {
            $i = intval(($imin + $imax) / 2);
            $j = $half_len - $i;

            if ($i < $m && $nums2[$j-1] > $nums1[$i]) {
                $imin = $i + 1; // i is too small
            } elseif ($i > 0 && $nums1[$i-1] > $nums2[$j]) {
                $imax = $i - 1; // i is too big
            } else {
                // i is perfect
                $max_of_left = 0;
                if ($i == 0) {
                    $max_of_left = $nums2[$j-1];
                } elseif ($j == 0) {
                    $max_of_left = $nums1[$i-1];
                } else {
                    $max_of_left = max($nums1[$i-1], $nums2[$j-1]);
                }

                if (($m + $n) % 2 == 1) {
                    return $max_of_left; // Odd number of elements
                }

                $min_of_right = 0;
                if ($i == $m) {
                    $min_of_right = $nums2[$j];
                } elseif ($j == $n) {
                    $min_of_right = $nums1[$i];
                } else {
                    $min_of_right = min($nums1[$i], $nums2[$j]);
                }

                return ($max_of_left + $min_of_right) / 2.0; // Even number of elements
            }
        }

        return 0.0;
    }
}

