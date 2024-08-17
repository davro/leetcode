<?php

use PHPUnit\Framework\TestCase;
use Leetcode\Solution;

class SolutionTest extends TestCase
{
    public function testConvertExample1()
    {
        $solution = new Solution();
        $this->assertEquals("PAHNAPLSIIGYIR", $solution->convert("PAYPALISHIRING", 3));
    }

    public function testConvertExample2()
    {
        $solution = new Solution();
        $this->assertEquals("PINALSIGYAHRPI", $solution->convert("PAYPALISHIRING", 4));
    }

    public function testConvertExample3()
    {
        $solution = new Solution();
        $this->assertEquals("A", $solution->convert("A", 1));
    }

    public function testConvertSingleCharacter()
    {
        $solution = new Solution();
        $this->assertEquals("Z", $solution->convert("Z", 5));
    }

    public function testConvertNumRowsGreaterThanStringLength()
    {
        $solution = new Solution();
        $this->assertEquals("HELLO", $solution->convert("HELLO", 10));
    }

    public function testConvertNumRowsEqualToStringLength()
    {
        $solution = new Solution();
        $this->assertEquals("HELLO", $solution->convert("HELLO", 5));
    }

/*    public function testConvertWithPunctuation()
    {
        $solution = new Solution();
        $this->assertEquals("EPO!Y.OHYDRILIA", $solution->convert("EMAIL.PHYDROLOGY!", 4));
    }
//*/
    public function testConvertLongString()
    {
        $solution = new Solution();
        $longString = str_repeat("A", 1000);
        $this->assertEquals($longString, $solution->convert($longString, 1));
    }
}

