#include <stdio.h>
#include <stdlib.h>

#define HASH_SIZE 10000

// Define the hash table entry
typedef struct {
    int key;
    int value;
} HashEntry;

// Define the hash table
typedef struct {
    HashEntry *entries[HASH_SIZE];
} HashTable;

// Create a hash table
HashTable* createHashTable() {
    HashTable *table = malloc(sizeof(HashTable));
    for (int i = 0; i < HASH_SIZE; i++) {
        table->entries[i] = NULL;
    }
    return table;
}

// Hash function
int hash(int key) {
    return abs(key) % HASH_SIZE;
}

// Insert into hash table
void insert(HashTable *table, int key, int value) {
    int index = hash(key);
    HashEntry *entry = malloc(sizeof(HashEntry));
    entry->key = key;
    entry->value = value;
    table->entries[index] = entry;
}

// Search in hash table
int search(HashTable *table, int key) {
    int index = hash(key);
    HashEntry *entry = table->entries[index];
    if (entry && entry->key == key) {
        return entry->value;
    }
    return -1; // Not found
}

// Free hash table memory
void freeHashTable(HashTable *table) {
    for (int i = 0; i < HASH_SIZE; i++) {
        if (table->entries[i]) {
            free(table->entries[i]);
        }
    }
    free(table);
}

// Two Sum function
int* twoSum(int* nums, int numsSize, int target, int* returnSize) {
    HashTable *table = createHashTable();
    int *result = malloc(2 * sizeof(int));
    *returnSize = 2;

    for (int i = 0; i < numsSize; i++) {
        int complement = target - nums[i];
        int index = search(table, complement);
        if (index != -1) {
            result[0] = index;
            result[1] = i;
            freeHashTable(table);
            return result;
        }
        insert(table, nums[i], i);
    }

    freeHashTable(table);
    free(result);
    *returnSize = 0;
    return NULL; // No solution
}

int main() {
    int nums[] = {2, 7, 11, 15};
    int target = 9;
    int returnSize;
    int *result = twoSum(nums, sizeof(nums) / sizeof(nums[0]), target, &returnSize);

    if (result) {
        printf("Indices: [%d, %d]\n", result[0], result[1]);
        free(result);
    } else {
        printf("No solution found.\n");
    }

    return 0;
}

