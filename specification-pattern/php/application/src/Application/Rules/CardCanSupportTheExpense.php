<?php

namespace App\Application\Rules;

use App\Application\AndCompositeSpecification;

class CardCanSupportTheExpense extends AndCompositeSpecification
{
    public function __construct(float $amount)
    {
        $this->andIsSatisfiedBy(new CardCanHasEnoughCredit($amount))
            ->andIsSatisfiedBy(new CardIsActive())
            ->andIsSatisfiedBy(new CardOwnerHasNotRisk())
            ->andIsSatisfiedBy(new CardOwnerIsActive());
    }
}