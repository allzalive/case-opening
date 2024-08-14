<?php
// api/open-case.php

header('Content-Type: application/json');

// List of items with their probabilities
$items = array(
    array("item_name" => "Rare Item 1", "rarity" => "Rare", "value" => 150.0 ,"color" => "text-info"),
    array("item_name" => "Common Item 1", "rarity" => "Common", "value" => 2.5 ,"color" => "text-secondary"),
    array("item_name" => "Legendary Item 1", "rarity" => "Legendary", "value" => 500.0 ,"color" => "text-warning"),
    array("item_name" => "Epic Item 1", "rarity" => "Epic", "value" => 75.0 ,"color" => "text-success")
);

// Probabilities for each item
$probabilities = array(0.1, 0.6, 0.05, 0.25);

// Generate a random value and select an item based on the probabilities
$random = mt_rand() / mt_getrandmax();
$cumulative_probability = 0;
foreach ($items as $index => $item) {
    $cumulative_probability += $probabilities[$index];
    if ($random <= $cumulative_probability) {
        $selected_item = $item;
        break;
    }
}

// Return the result of opening the case
echo json_encode(array(
    "item_name" => $selected_item["item_name"],
    "rarity" => $selected_item["rarity"],
    "value" => $selected_item["value"],
    "color" => $selected_item["color"],
));
?>
