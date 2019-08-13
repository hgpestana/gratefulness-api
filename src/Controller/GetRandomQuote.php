<?php


namespace Gratefulness\Controller;


use Gratefulness\Entity\Quote;
use Gratefulness\Repository\QuoteRepository;

class GetRandomQuote
{

    /** @var QuoteRepository */
    private $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param string $language
     *
     * @return Quote
     */
    public function __invoke(string $language) : Quote
    {
        $quotes = $this->quoteRepository->findBy([ 'language' => $language ]);
        return $quotes[ array_rand($quotes, 1) ];
    }
}