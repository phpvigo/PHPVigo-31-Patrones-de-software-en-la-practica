<?php

declare (strict_types=1);

namespace App\Application;

abstract class AndCompositeSpecification implements Specification
{
    /**
     * @var Specification[]
     */
    protected $specifications = [];

    public function isSatisfiedBy($candidate) : bool
    {
        foreach ($this->specifications AS $specification) {
            if ($specification->isSatisfiedBy($candidate) === false) {
                return false;
            }
        }
        return true;
    }

    public function andIsSatisfiedBy(Specification $specification) : self
    {
        $this->specifications[] = $specification;
        return $this;
    }
}