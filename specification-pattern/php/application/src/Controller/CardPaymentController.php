<?php

declare (strict_types=1);

namespace App\Controller;

use App\Application\CardPayment\CardPaymentWithCompositeSpecification;
use App\Application\CardPayment\CardPaymentWithoutSpecification;
use App\Application\CardPayment\CardPaymentWithSpecification;
use App\Entity\Account;
use App\Entity\Card;
use App\Entity\Person;
use Symfony\Component\HttpFoundation\Response;

class CardPaymentController
{
    /**
     * @var Card
     */
    private $card;

    public function __construct()
    {
        $this->card = new Card(
            456345896435,
            true,
            new \DateTimeImmutable('2020-12-01 00:00:00'),
            new Person('87271048D','Nombre','Apellido'),
            new Account(),
            1000
        );
    }

    public function withoutSpecification() : Response
    {
        $result = (new CardPaymentWithoutSpecification())->execute($this->card, 100);
        return $this->processResponseAndReturn($result);
    }

    public function withSpecification() : Response
    {
        $result = (new CardPaymentWithSpecification())->execute($this->card, 100);
        return $this->processResponseAndReturn($result);
    }

    public function withCombinedSpecification() : Response
    {
        $result = (new CardPaymentWithCompositeSpecification())->execute($this->card, 100);
        return $this->processResponseAndReturn($result);
    }

    private function processResponseAndReturn(bool $result) : Response
    {
        $response = new Response();
        $response->setContent(json_encode(['result' => $result]));
        return $response;
    }
}