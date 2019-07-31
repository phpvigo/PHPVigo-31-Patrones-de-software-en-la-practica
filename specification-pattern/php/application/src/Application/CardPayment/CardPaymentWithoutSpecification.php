<?php

declare (strict_types=1);

namespace App\Application\CardPayment;

use App\Entity\Card;

class CardPaymentWithoutSpecification
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
        $now = new \DateTimeImmutable();
        return ($card->getCredit() - $amount > 0 || $card->getAccount()->getBalance() - $amount > 0) &&
            $card->isActive() && $now <= $card->getValidUntil() &&
            !$card->getOwner()->isRisk() &&
            $card->getOwner()->isActive();
    }
}