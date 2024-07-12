<?php
function findPair($nums, $target) {
    $pair = array(); // Initialize an empty associative array to store seen numbers
    
    foreach ($nums as $num) {
        $required_num = $target - $num; // Calculate the number needed to form the pair
        
        if (isset($pair[$required_num])) {
            echo "Pair found (" . $num . ", " . $required_num . ")\n";
            return;
        }
        
        $pair[$num] = true; // Store the current number in the pair array
    }
    
    echo "Pair not found.\n";
}

// Example usage:
$nums1 = array(8, 7, 2, 5, 3, 1);
$target1 = 10;
findPair($nums1, $target1); // Output: Pair found (8, 2) or Pair found (7, 3)

$nums2 = array(5, 2, 6, 8, 1, 9);
$target2 = 12;
findPair($nums2, $target2); // Output: Pair not found.

$nums3 = array(8, 7, 2, 5, 3, 1);
$target3 = 15;
findPair($nums3, $target3); // Output: Pair found (7, 8)
