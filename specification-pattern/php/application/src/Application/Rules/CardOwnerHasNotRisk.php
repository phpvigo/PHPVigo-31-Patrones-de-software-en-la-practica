<?php

declare (strict_types=1);

namespace App\Application\Rules;

use App\Application\Specification;
use App\Entity\Card;

class CardOwnerHasNotRisk implements Specification
{
    /**
     * @param $candidate Card
     * @return bool
     */
    public function isSatisfiedBy($candidate) : bool
    {
        return !$candidate->getOwner()->isRisk();
    }
}