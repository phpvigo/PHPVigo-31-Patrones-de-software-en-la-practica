<?php

declare(strict_types=1);

namespace NumberConverter\Observer;

use NumberConverter\Subject\NumberSubject;

abstract class NumberObserver implements \SplObserver
{
    public function __construct(NumberSubject $numberSubject)
    {
        $numberSubject->attach($this);
    }

    public function update(\SplSubject $subject): void
    {
        if ($subject instanceof NumberSubject) {
            $this->doUpdate($subject);
        }
    }

    abstract public function doUpdate(NumberSubject $integerSubject): void;
}
