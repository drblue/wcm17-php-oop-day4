<?php

require("Transaction.php");

class Account {
	protected $accountNumber;
	protected $balance;
	protected $owner;
	protected $transactions = [];

	public function __construct(string $accountNumber, int $balance = 0, string $owner = "") {
		$this->accountNumber = $accountNumber;
		$this->balance = $balance;
		$this->owner = $owner;
	}

	public function withdraw(int $amount, $date = null, $description = "") {
		if ($this->balance < $amount) {
			return false;
		}

		$this->balance = $this->balance - $amount;
		$transaction = new Transaction(-$amount, $date, $description);
		array_push($this->transactions, $transaction);

		return true;
	}
	
	public function deposit(int $amount, $date = null, $description = "") {
		if ($amount <= 0) {
			return false;
		}
		$this->balance = $this->balance + $amount;
		$transaction = new Transaction($amount, $date, $description);
		array_push($this->transactions, $transaction);

		return true;
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
