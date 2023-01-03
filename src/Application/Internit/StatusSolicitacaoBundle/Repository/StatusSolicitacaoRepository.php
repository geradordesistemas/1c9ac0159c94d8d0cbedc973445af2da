<?php

namespace App\Application\Internit\StatusSolicitacaoBundle\Repository;

use App\Application\Internit\StatusSolicitacaoBundle\Entity\StatusSolicitacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatusSolicitacao>
 *
 * @method StatusSolicitacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusSolicitacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusSolicitacao[]    findAll()
 * @method StatusSolicitacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusSolicitacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusSolicitacao::class);
    }


}