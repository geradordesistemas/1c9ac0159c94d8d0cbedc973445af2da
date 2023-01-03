<?php

namespace App\Application\Internit\AcompanhamentoBundle\Repository;

use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Acompanhamento>
 *
 * @method Acompanhamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Acompanhamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Acompanhamento[]    findAll()
 * @method Acompanhamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcompanhamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acompanhamento::class);
    }


}