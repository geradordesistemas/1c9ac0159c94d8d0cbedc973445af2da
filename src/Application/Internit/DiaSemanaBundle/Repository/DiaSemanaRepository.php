<?php

namespace App\Application\Internit\DiaSemanaBundle\Repository;

use App\Application\Internit\DiaSemanaBundle\Entity\DiaSemana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiaSemana>
 *
 * @method DiaSemana|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiaSemana|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiaSemana[]    findAll()
 * @method DiaSemana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiaSemanaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiaSemana::class);
    }


}