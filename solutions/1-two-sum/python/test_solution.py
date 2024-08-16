import unittest
from Solution import Solution 

class TestSolution(unittest.TestCase):

    def setUp(self):
        self.sol = Solution()

    def test_twoSum(self):
        # Test case 1
        nums = [2, 7, 11, 15]
        target = 9
        expected = [0, 1]
        result = self.sol.twoSum(nums, target)
        self.assertEqual(result, expected)

        # Test case 2
        nums = [3, 2, 4]
        target = 6
        expected = [1, 2]
        result = self.sol.twoSum(nums, target)
        self.assertEqual(result, expected)

        # Test case 3
        nums = [3, 3]
        target = 6
        expected = [0, 1]
        result = self.sol.twoSum(nums, target)
        self.assertEqual(result, expected)

    def test_no_solution(self):
        nums = [1, 2, 3]
        target = 7
        expected = []
        result = self.sol.twoSum(nums, target)
        self.assertEqual(result, expected)

if __name__ == '__main__':
    unittest.main()

