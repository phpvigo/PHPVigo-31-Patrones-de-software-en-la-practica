<?php

declare (strict_types=1);

namespace App\Application\CardPayment;

use App\Application\Rules\CardCanSupportTheExpense;
use App\Entity\Card;

class CardPaymentWithCompositeSpecification
{
    public function execute(Card $card, float $amount): bool
    {
        if ((new CardCanSupportTheExpense($amount))->isSatisfiedBy($card) === false) {
            return false;
        }

        return $card->supportTheExpense($amount);
    }
}