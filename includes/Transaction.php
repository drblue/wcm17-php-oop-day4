<?php

class Transaction {
	protected $amount;
	protected $date;
	protected $description;

	public function __construct(int $amount, $date, string $description) {
		$this->amount = $amount;
		$this->date = $date;
		$this->description = $description;
	}

	public function getAmount() {
		return $this->amount;
	}

	public function getDate() {
		return $this->date;
	}

	public function getDescription() {
		return $this->description;
	}
}
