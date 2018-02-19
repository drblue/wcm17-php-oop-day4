<?php

require("Transaction.php");

class Account {
	protected $accountNumber;
	protected $balance;
	protected $owner;
	protected $transactions = [];

	public function __construct($accountNumber, $balance = 0, $owner = "") {
		$this->accountNumber = $accountNumber;
		$this->balance = $balance;
		$this->owner = $owner;
	}

	public function withdraw($amount, $date = null, $description = "") {
		if ($this->balance < $amount) {
			return false;
		}

		$this->balance = $this->balance - $amount;
		$transaction = new Transaction(-$amount, $date, $description);
		array_push($this->transactions, $transaction);

		return true;
	}
	
	public function deposit($amount, $date = null, $description = "") {
		$this->balance = $this->balance + $amount;
		$transaction = new Transaction($amount, $date, $description);
		array_push($this->transactions, $transaction);
	}

	public function getAccountNumber() {
		return $this->accountNumber;
	}

	public function getBalance() {
		return $this->balance;
	}

	public function getOwner() {
		return $this->owner;
	}

	public function getTransactions() {
		return $this->transactions;
	}
}
