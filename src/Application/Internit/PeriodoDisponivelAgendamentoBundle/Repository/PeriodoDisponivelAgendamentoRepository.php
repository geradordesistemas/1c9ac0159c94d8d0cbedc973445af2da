<?php

namespace App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Repository;

use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Entity\PeriodoDisponivelAgendamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeriodoDisponivelAgendamento>
 *
 * @method PeriodoDisponivelAgendamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodoDisponivelAgendamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodoDisponivelAgendamento[]    findAll()
 * @method PeriodoDisponivelAgendamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodoDisponivelAgendamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodoDisponivelAgendamento::class);
    }


}