<?php

// https://leetcode.com/problems/two-sum/solutions/5590941/two-sum/

namespace TwoSum;

class TwoSum {
    public function twoSum(array $nums, int $target): array {
        $hashMap = [];
        
        foreach ($nums as $index => $num) {
            $complement = $target - $num;
            
            if (array_key_exists($complement, $hashMap)) {
                return [$hashMap[$complement], $index];
            }
            
            $hashMap[$num] = $index;
        }
        
        return [];
    }
}

