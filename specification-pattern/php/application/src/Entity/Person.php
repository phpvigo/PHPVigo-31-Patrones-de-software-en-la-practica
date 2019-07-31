<?php

declare (strict_types=1);

namespace App\Entity;

class Person
{
    /**
     * @var string
     */
    private $nif;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var boolean
     */
    private $risk;

    /**
     * @var boolean
     */
    private $active;

    public function __construct(string $nif, string $name, string $surname)
    {
        $this->nif = $nif;
        $this->name = $name;
        $this->surname = $surname;
        $this->risk = false;
        $this->active = true;
    }

    public function isActive() : bool
    {
        return $this->active;
    }

    public function setActive(bool $active) : void
    {
        $this->active = $active;
    }

    public function getNif(): string
    {
        return $this->nif;
    }

    public function setNif(string $nif): void
    {
        $this->nif = $nif;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function isRisk(): bool
    {
        return $this->risk;
    }

    public function setRisk(bool $risk): void
    {
        $this->risk = $risk;
    }
}