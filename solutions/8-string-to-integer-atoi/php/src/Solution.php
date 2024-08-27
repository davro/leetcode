<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $s = ltrim($s);

        if (empty($s)) {
            return 0;
        }

        $sign = 1;
        $startIndex = 0;
        if ($s[0] == '-' || $s[0] == '+') {
            $sign = ($s[0] == '-') ? -1 : 1;
            $startIndex++;
        }
        $result = 0;
        $maxInt = 2**31 - 1;
        $minInt = -2**31;
        for ($i = $startIndex; $i < strlen($s); $i++) {
            if (!is_numeric($s[$i])) {
                break;
            }
            $result = $result * 10 + ($s[$i] - '0');

            if ($sign * $result > $maxInt) {
                return $maxInt;
            }
            if ($sign * $result < $minInt) {
                return $minInt;
            }
        }
        return $sign * $result;
    }
}

