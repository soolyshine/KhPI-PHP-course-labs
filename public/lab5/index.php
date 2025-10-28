<?php
interface AccountInterface {
    public function deposit($amount);
    public function withdraw($amount);
    public function getBalance();
}

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    public $balance;
    public $currency = "USD";

    function __construct($balance = 0){
        $this->balance = $balance;
    }

    function deposit($amount) {
        if ($amount < 0) {
            throw new Exception("Negative amount");
        } else {
            $this->balance += $amount;
        }
    }

    function withdraw($amount) {
        if ($this->balance - $amount >= self::MIN_BALANCE) {
            $this->balance -= $amount;
        } else {
            throw new Exception("Not enough money");
        }
    }

    function getBalance() {
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    static $interestRate = 0.05;

    function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}

try {
    $user1 = new BankAccount(10);
    $user1->deposit(20);
    $user1->withdraw(5);
    echo "BAlance user1: " . $user1->getBalance() . " USD\n";

    $user2 = new SavingsAccount(20);
    $user2->applyInterest();
    echo "Balance user2 afrter procents: " . $user2->getBalance() . " USD\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
