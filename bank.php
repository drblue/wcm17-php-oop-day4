<?php

require("includes/Account.php");

/**
 * Johans konto
 */
$johans = new Account("1234-56,789,012-3", 125, "Johan Nordström");

// McVegan & Co
$success = $johans->withdraw(49, "2018-02-19", "McVegan & Co");
if ($success) {
	echo "Köp genomfört.";
} else {
	echo "<strong>TÄCKNING SAKNAS PÅ KONTOT!!</strong>";
}

// Lön
$success = $johans->deposit(15000, "2018-02-25", "Lön");
if ($success) {
	echo "Insättning genomförd.";
} else {
	echo "<strong>NÅGOT GICK FEL VID INSÄTTNINGEN!!</strong>";
}

// Raspberry Pi 3
$johans->withdraw(349, "2018-02-19", "m.nu Raspberry Pi 3");


/**
 * Pelles konto
 */
$pelles = new Account("4321-65,987,210-4", 50, "Pelle Persson");
$pelles->deposit(2250, "2018-02-15", "CSN");
$pelles->withdraw(500, "2018-02-17");

$accounts = [$johans, $pelles];

foreach ($accounts as $account) {
	echo "<h1>{$account->getAccountNumber()}</h1>";
	echo "<h2>{$account->getOwner()}</h2>";

	$transactions = $account->getTransactions();
	foreach ($transactions as $transaction) {
		echo "<p>";
		echo "Datum: {$transaction->getDate()}<br>";
		echo "Text: {$transaction->getDescription()}<br>";
		echo "Belopp: {$transaction->getAmount()}";
		echo "</p>";
	}

	echo "<h3>Saldo: {$account->getBalance()}</h3>";
}
