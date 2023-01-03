<?php

namespace App\Application\Internit\UnidadeClienteBundle\Repository;

use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UnidadeCliente>
 *
 * @method UnidadeCliente|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnidadeCliente|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnidadeCliente[]    findAll()
 * @method UnidadeCliente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnidadeClienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnidadeCliente::class);
    }


}