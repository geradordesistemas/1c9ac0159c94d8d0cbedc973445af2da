<?php

namespace App\Application\Internit\PeriodoAgendamentoBundle\Repository;

use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeriodoAgendamento>
 *
 * @method PeriodoAgendamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodoAgendamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodoAgendamento[]    findAll()
 * @method PeriodoAgendamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodoAgendamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodoAgendamento::class);
    }


}