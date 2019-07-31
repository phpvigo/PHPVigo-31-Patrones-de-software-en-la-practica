<?php

declare (strict_types=1);

namespace App\Application;

interface Specification
{
    public function isSatisfiedBy($candidate) : bool;
}