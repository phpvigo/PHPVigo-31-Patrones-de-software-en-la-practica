<?php

declare (strict_types=1);

namespace App\Application;

abstract class OrCompositeSpecification implements Specification
{
    /**
     * @var Specification[]
     */
    private $specifications = [];

    public function isSatisfiedBy($candidate) : bool
    {
        foreach ($this->specifications AS $specification) {
            if ($specification->isSatisfiedBy($candidate) === true) {
                return true;
            }
        }
        return false;
    }

    public function orIsSatisfiedBy(Specification $specification) : self
    {
        $this->specifications[] = $specification;
        return $this;
    }
}