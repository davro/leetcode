<?php

class Solution
{
    private $dp;
    private $result;

    /**
     * @param String $s
     * @return String[][]
     */
    public function partition($s) {
        $this->result = [];
        $currentPartition = [];
        $n = strlen($s);
        $this->dp = array_fill(0, $n, array_fill(0, $n, false));

        // Precompute palindromes
        for ($end = 0; $end < $n; $end++) {
            for ($start = 0; $start <= $end; $start++) {
                if ($s[$start] == $s[$end] && ($end - $start <= 2 || $this->dp[$start + 1][$end - 1])) {
                    $this->dp[$start][$end] = true;
                }
            }
        }

        $this->backtrack($s, 0, $currentPartition);
        return $this->result;
}

    private function backtrack($s, $start, &$currentPartition) {
        if ($start == strlen($s)) {
            $this->result[] = $currentPartition;
            return;
        }

        for ($end = $start; $end < strlen($s); $end++) {
            if ($this->dp[$start][$end]) {
                $currentPartition[] = substr($s, $start, $end - $start + 1);
                $this->backtrack($s, $end + 1, $currentPartition);
                array_pop($currentPartition);
            }
        }
    }
}

// Example usage:
$solution = new Solution();
$s = "aab";
//$s = "aaaabbccc";
print_r($solution->partition($s));

