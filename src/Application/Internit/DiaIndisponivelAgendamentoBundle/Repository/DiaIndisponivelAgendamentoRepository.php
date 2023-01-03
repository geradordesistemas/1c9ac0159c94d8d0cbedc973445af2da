<?php

namespace App\Application\Internit\DiaIndisponivelAgendamentoBundle\Repository;

use App\Application\Internit\DiaIndisponivelAgendamentoBundle\Entity\DiaIndisponivelAgendamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiaIndisponivelAgendamento>
 *
 * @method DiaIndisponivelAgendamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiaIndisponivelAgendamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiaIndisponivelAgendamento[]    findAll()
 * @method DiaIndisponivelAgendamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiaIndisponivelAgendamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiaIndisponivelAgendamento::class);
    }


}