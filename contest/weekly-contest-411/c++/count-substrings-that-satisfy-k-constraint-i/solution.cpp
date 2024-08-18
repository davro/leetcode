class Solution {
public:
    int countKConstraintSubstrings(string s, int k) {
        int n = s.length();
        int count = 0;

        // Iterate over all possible substrings
        for (int start = 0; start < n; ++start) {
            int count0 = 0, count1 = 0;
            for (int end = start; end < n; ++end) {
                // Count '0' and '1' in the current substring
                if (s[end] == '0') count0++;
                else count1++;

                // Check if the substring satisfies the k-constraint
                if (count0 <= k || count1 <= k) {
                    count++;
                }
            }
        }

        return count;
    }
};

