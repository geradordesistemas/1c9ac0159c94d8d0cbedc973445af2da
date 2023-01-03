<?php

namespace App\Application\Internit\EtapaAcompanhamentoBundle\Repository;

use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtapaAcompanhamento>
 *
 * @method EtapaAcompanhamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapaAcompanhamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapaAcompanhamento[]    findAll()
 * @method EtapaAcompanhamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapaAcompanhamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapaAcompanhamento::class);
    }


}