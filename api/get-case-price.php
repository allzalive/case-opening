<?php
// get-case-price.php

header('Content-Type: application/json');

// Simulate case prices (can be fetched from a database)
$case_prices = array(
    "new_town_case" => 0.35
);

// Return the price of the "new_town_case"
echo json_encode(array("price" => $case_prices["new_town_case"]));
?>
