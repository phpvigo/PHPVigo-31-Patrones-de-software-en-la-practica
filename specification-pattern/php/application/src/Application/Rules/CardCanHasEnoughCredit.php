<?php

declare (strict_types=1);

namespace App\Application\Rules;

use App\Application\Specification;
use App\Entity\Card;

class CardCanHasEnoughCredit implements Specification
{
    /**
     * @var float
     */
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param $candidate Card
     * @return bool
     */
    public function isSatisfiedBy($candidate) : bool
    {
        return $candidate->getCredit() - $this->amount > 0 || $candidate->getAccount()->getBalance() - $this->amount > 0;
    }

}