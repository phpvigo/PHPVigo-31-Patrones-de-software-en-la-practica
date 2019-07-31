<?php

declare (strict_types=1);

namespace App\Application\Rules;

use App\Application\Specification;
use App\Entity\Card;

class CardIsActive implements Specification
{
    /**
     * @param $candidate Card
     * @return bool
     */
    public function isSatisfiedBy($candidate) : bool
    {
        $now = null;

        try {
            $now = new \DateTimeImmutable();
        } catch (\Exception $e) {
            return false;
        }

        return $candidate->isActive() && $now <= $candidate->getValidUntil();
    }
}