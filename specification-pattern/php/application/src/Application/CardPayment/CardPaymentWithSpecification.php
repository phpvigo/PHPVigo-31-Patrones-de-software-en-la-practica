<?php

declare (strict_types=1);

namespace App\Application\CardPayment;

use App\Application\Rules\CardCanHasEnoughCredit;
use App\Application\Rules\CardIsActive;
use App\Application\Rules\CardOwnerHasNotRisk;
use App\Application\Rules\CardOwnerIsActive;
use App\Entity\Card;

class CardPaymentWithSpecification
{
    public function execute(Card $card, float $amount) : bool
    {
        if (!$this->cardCanSupportTheExpense($card, $amount)) {
            return false;
        }

        return $card->supportTheExpense($amount);
    }

    private function cardCanSupportTheExpense(Card $card, float $amount) : bool
    {
        $cardCanHasEnoughCredit = new CardCanHasEnoughCredit($amount);
        $cardIsActive = new CardIsActive();
        $cardOwnerHasNotRisk = new CardOwnerHasNotRisk();
        $cardOwnerIsActive = new CardOwnerIsActive();

        return $cardCanHasEnoughCredit->isSatisfiedBy($card) &&
            $cardIsActive->isSatisfiedBy($card) &&
            $cardOwnerHasNotRisk->isSatisfiedBy($card) &&
            $cardOwnerIsActive->isSatisfiedBy($card);
    }
}