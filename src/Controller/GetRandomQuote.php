<?php


namespace Gratefulness\Controller;


use Gratefulness\Entity\Quote;
use Gratefulness\Manager\QuoteManager;

class GetRandomQuote
{

    /** @var QuoteManager */
    private $manager;

    /**
     * GetRandomQuote constructor.
     *
     * @param QuoteManager $manager
     */
    public function __construct(QuoteManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param string $language
     *
     * @return Quote[]
     */
    public function __invoke(string $language) : array
    {
        return $this->manager->getRandomQuotes($language, 1);
    }
}