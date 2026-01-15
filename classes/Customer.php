<?php
// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: January 16, 2026
class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
    public array $accounts;

    public function __construct($forename, $surname, $email, $password, $accounts)
    {
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->accounts = $accounts;
    }

    public function getFullName(): string
    {
        return ($this->forename . ' ' . $this->surname);
    }
}
?>