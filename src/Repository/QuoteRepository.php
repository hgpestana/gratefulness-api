<?php

namespace Gratefulness\Repository;

use Gratefulness\Entity\Quote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @author Hélder Pestana <hgpestana@gmail.com>
 *
 * @method Quote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quote[]    findAll()
 * @method Quote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuoteRepository extends ServiceEntityRepository
{
    /**
     * QuoteRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Quote::class);
    }

    /**
     * Persists the object to the database.
     *
     * @param Quote $quote The object to be persisted
     * @param bool  $flush Should the connection be flushed after completion. Defaults to true
     *
     * @return Quote The object persisted
     *
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Quote $quote, $flush = true) : Quote
    {
        $this->_em->persist($quote);
        if ( true === $flush ) {
            $this->_em->flush();
        }

        return $quote;
    }

    /**
     * Deletes the object from the database.
     *
     * @param Quote $quote The object to be deleted
     * @param bool  $flush Should the connection be flushed after completion. Defaults to true
     *
     * @return bool If the object was deleted successfully
     *
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete(Quote $quote, $flush = true) : bool
    {
        $this->_em->remove($quote);

        if ( true === $flush ) {
            $this->_em->flush();
        }

        return true;
    }
}
