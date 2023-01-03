<?php

namespace App\Application\Internit\DepartamentoBundle\Repository;

use App\Application\Internit\DepartamentoBundle\Entity\Departamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Departamento>
 *
 * @method Departamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Departamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Departamento[]    findAll()
 * @method Departamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Departamento::class);
    }


}