<?php


namespace Gratefulness\Manager;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Paginator;
use Doctrine\ORM\Query\QueryException;
use Gratefulness\Entity\Quote;
use Gratefulness\Repository\QuoteRepository;

class QuoteManager
{
    /** @var QuoteRepository */
    private $repository;

    public function __construct(QuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Returns an array with random quotes for the selected language. The total amount of quotes returned corresponds
     * to the specified quantity
     *
     * @param string $language
     * @param int    $quantity
     *
     * @return array
     */
    public function getRandomQuotes(string $language, int $quantity) : array
    {
        $result = [];
        $quotes = $this->repository->findBy([ 'language' => $language, 'approved' => true ]);
        if ( !empty($quotes) ) {
            $result[] = $quotes[ array_rand($quotes, $quantity) ];
        }

        return $result;
    }

    /**
     * Returns a list of paginated quotes
     *
     * @param int $page
     *
     * @return Paginator
     * @throws QueryException
     */
    public function getApprovedQuotesPaginates(int $page = 1) : Paginator
    {
        return $this->repository->findApprovedQuotesPaginated($page);
    }

    /**
     * Returns a collection of approved quotes
     *
     * @return Quote[]|array
     */
    public function getApprovedQuotes() : array
    {
        return $this->repository->findBy([
            'approved' => true,
        ]);
    }
}