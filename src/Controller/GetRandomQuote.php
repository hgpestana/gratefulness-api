<?php


namespace Gratefulness\Controller;


use Gratefulness\Entity\Quote;
use Gratefulness\Repository\QuoteRepository;

class GetRandomQuote
{

    /** @var QuoteRepository */
    private $quoteRepository;

    /**
     * GetRandomQuote constructor.
     *
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param string $language
     *
     * @return Quote[]
     */
    public function __invoke(string $language) : array
    {
        $result = [];

        $quotes = $this->quoteRepository->findBy([ 'language' => $language, 'approved' => true ]);
        if ( !empty($quotes) ) {
            $result[] = $quotes[ array_rand($quotes, 1) ];
        }
        return $result;
    }
}