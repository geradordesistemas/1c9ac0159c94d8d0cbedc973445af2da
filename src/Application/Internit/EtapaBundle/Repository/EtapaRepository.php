<?php

namespace App\Application\Internit\EtapaBundle\Repository;

use App\Application\Internit\EtapaBundle\Entity\Etapa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etapa>
 *
 * @method Etapa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etapa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etapa[]    findAll()
 * @method Etapa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etapa::class);
    }


}