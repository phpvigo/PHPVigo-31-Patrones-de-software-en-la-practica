<?php


namespace App\Entity;


class Account
{
    /**
     * @var float
     */
    private $balance;


    public function getBalance() : float
    {
        return $this->balance;
    }
}