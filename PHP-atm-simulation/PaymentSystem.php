<?php
abstract class PaymentSystem
{
    protected $balance;
    protected $name;

    public function __construct($name, $initialBalance)
    {
        $this->name = $name;
        $this->balance = $initialBalance;
    }

    public function getBalance()
    {
        return $this->balance . " AZN";
    }

    public function getName()
    {
        return $this->name;
    }

    // Mədaxil (Balans artırmaq üçün balans limiti yoxdur)
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            return true;
        }
        return false;
    }

    // Məxaric (Pul çıxarmaq üçün balans kifayət etməlidir)
    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    abstract public function connect($type);
}