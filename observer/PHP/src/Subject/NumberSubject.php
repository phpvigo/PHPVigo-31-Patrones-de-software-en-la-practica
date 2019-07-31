<?php

declare(strict_types=1);

namespace NumberConverter\Subject;

class NumberSubject implements \SplSubject
{
    private $observers;
    private $state;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function setState(int $state): void
    {
        $this->state = $state;
        echo 'Number: '.$state.PHP_EOL;
        $this->notify();
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
