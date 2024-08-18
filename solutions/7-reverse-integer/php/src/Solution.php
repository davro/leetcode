<?php

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $INT_MIN = -2147483648; // -2^31        UNUSED
        $INT_MAX = 2147483647;  // 2^31 - 1

        $result = 0;
        $sign = $x < 0 ? -1 : 1;
        $x = abs($x);

        while ($x != 0) {
            $pop = $x % 10;
            $x = intval($x / 10);

            // Check for overflow before it happens
            if ($result > ($INT_MAX - $pop) / 10) {
                return 0;
            }

            $result = $result * 10 + $pop; // Construct the reversed number
        }

        return $result * $sign;
    }
}

