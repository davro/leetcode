<?php

class Solution
{
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxPoints($points) {

        $n = count($points);
        if ($n < 2) return $n;

        $maxPoints = 1;

        for ($i = 0; $i < $n; $i++) {
            $slopes = [];
            $duplicate = 0;
            $vertical = 0;

            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) continue;
                $x1 = $points[$i][0];
                $y1 = $points[$i][1];
                $x2 = $points[$j][0];
                $y2 = $points[$j][1];

                if ($x1 == $x2 && $y1 == $y2) {
                    $duplicate++;
                } elseif ($x1 == $x2) {
                    $vertical++;
                } else {
                    $dx = $x2 - $x1;
                    $dy = $y2 - $y1;
                    $g = $this->gcd($dx, $dy);
                    $dx /= $g;
                    $dy /= $g;

                    $slope = $dy . '/' . $dx;
                    if (isset($slopes[$slope])) {
                        $slopes[$slope]++;
                    } else {
                        $slopes[$slope] = 1;
                    }
                }
            }

            $currentMax = $vertical;
            foreach ($slopes as $count) {
                if ($count > $currentMax) {
                    $currentMax = $count;
                }
            }

            $maxPoints = max($maxPoints, $currentMax + $duplicate + 1);
        }

        return $maxPoints;
    }

    function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return abs($a);
    }
}

// Example usage:
$points1 = [[1, 1], [2, 2], [3, 3]];
$points2 = [[1, 1], [3, 2], [5, 3], [4, 1], [2, 3], [1, 4]];

echo maxPoints($points1); // Output: 3
echo "\n";
echo maxPoints($points2); // Output: 4

