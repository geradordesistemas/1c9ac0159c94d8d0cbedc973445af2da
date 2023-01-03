<?php

namespace App\Application\Internit\TipoClienteBundle\Repository;

use App\Application\Internit\TipoClienteBundle\Entity\TipoCliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoCliente>
 *
 * @method TipoCliente|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCliente|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCliente[]    findAll()
 * @method TipoCliente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoClienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoCliente::class);
    }


}