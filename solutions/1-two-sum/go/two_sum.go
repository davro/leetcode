// two_sum.go
package main

import "fmt"

// TwoSum function finds the indices of two numbers that add up to the target.
func TwoSum(nums []int, target int) []int {
    hashMap := make(map[int]int)

    for i, num := range nums {
        complement := target - num

        if index, found := hashMap[complement]; found {
            return []int{index, i}
        }

        hashMap[num] = i
    }

    return nil
}

func main() {
    nums := []int{2, 7, 11, 15}
    target := 9
    result := TwoSum(nums, target)
    fmt.Println(result) // Output: [0, 1]
}

