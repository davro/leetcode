<?php
use PHPUnit\Framework\TestCase;
use TwoSum\TwoSum;


class TwoSumTest extends TestCase {
    public function testTwoSum() {
        $twoSum = new TwoSum();

        // Test case 1
        $result = $twoSum->twoSum([2, 7, 11, 15], 9);
        $this->assertEqualsCanonicalizing([0, 1], $result);

        // Test case 2
        $result = $twoSum->twoSum([3, 2, 4], 6);
        $this->assertEqualsCanonicalizing([1, 2], $result);

        // Test case 3
        $result = $twoSum->twoSum([3, 3], 6);
        $this->assertEqualsCanonicalizing([0, 1], $result);
    }
}

