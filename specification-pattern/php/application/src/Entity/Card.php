<?php

namespace App\Entity;

class Card
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var \DateTimeImmutable
     */
    private $validUntil;

    /**
     * @var Person
     */
    private $owner;

    /**
     * @var float
     */
    private $credit;

    /**
     * @var Account
     */
    private $account;

    public function __construct(int $number, bool $active, \DateTimeImmutable $validUntil, Person $owner, Account $account, float $credit)
    {
        $this->number = $number;
        $this->active = $active;
        $this->validUntil = $validUntil;
        $this->owner = $owner;
        $this->account = $account;
        $this->credit = $credit;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getValidUntil(): \DateTimeImmutable
    {
        return $this->validUntil;
    }

    /**
     * @return Person
     */
    public function getOwner(): Person
    {
        return $this->owner;
    }

    /**
     * @return float
     */
    public function getCredit(): float
    {
        return $this->credit;
    }

    /**
     * @param float $credit
     */
    public function setCredit(float $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    public function supportTheExpense(float $amount) : bool
    {
        return true;
    }
}