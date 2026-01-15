<?php
// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: January 16, 2026
class Account
{
    public int $number;
    public string $type;
    protected float $balance;

    public function __construct($number, $type, $balance)
    {
        $this->number = $number;
        $this->type = $type;
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
?>