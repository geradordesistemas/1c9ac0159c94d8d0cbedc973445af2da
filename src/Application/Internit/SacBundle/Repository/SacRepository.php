<?php

namespace App\Application\Internit\SacBundle\Repository;

use App\Application\Internit\SacBundle\Entity\Sac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sac>
 *
 * @method Sac|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sac|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sac[]    findAll()
 * @method Sac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sac::class);
    }


}