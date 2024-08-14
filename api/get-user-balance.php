<?php
// get-user-balance.php

header('Content-Type: application/json');

// Simulate user balance (can be fetched from a database)
$user_balance = 12973.27;

// Return the user balance
echo json_encode(array("balance" => $user_balance));
?>
