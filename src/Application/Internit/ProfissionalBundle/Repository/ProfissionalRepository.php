<?php

namespace App\Application\Internit\ProfissionalBundle\Repository;

use App\Application\Internit\ProfissionalBundle\Entity\Profissional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Profissional>
 *
 * @method Profissional|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profissional|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profissional[]    findAll()
 * @method Profissional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfissionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profissional::class);
    }


}