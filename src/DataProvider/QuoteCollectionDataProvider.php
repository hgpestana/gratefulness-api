<?php

namespace Gratefulness\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Paginator;
use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Doctrine\ORM\Query\QueryException;
use Gratefulness\Entity\Quote;
use Gratefulness\Manager\QuoteManager;

final class QuoteCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /** @var QuoteManager */
    private $manager;

    /**
     * QuoteCollectionDataProvider constructor.
     *
     * @param QuoteManager $manager
     */
    public function __construct(QuoteManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Checks if the collection provider supports the class
     *
     * @param string      $resourceClass
     * @param string|null $operationName
     * @param array       $context
     *
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []) : bool
    {
        return Quote::class === $resourceClass;
    }

    /**
     * Returns a paginated collection of approved quotes
     *
     * @param string      $resourceClass
     * @param string|null $operationName
     * @param array       $context
     *
     * @return Paginator
     * @throws QueryException
     */
    public function getCollection(string $resourceClass,
                                  string $operationName = null,
                                  array $context = []) : Paginator
    {
        $page = 1;
        if ( array_key_exists('filters', $context) && array_key_exists('page', $context['filters']) ) {
            $page = (int)$context[ 'filters' ][ 'page' ];
        }
        return $this->manager->getApprovedQuotesPaginates($page);
    }
}