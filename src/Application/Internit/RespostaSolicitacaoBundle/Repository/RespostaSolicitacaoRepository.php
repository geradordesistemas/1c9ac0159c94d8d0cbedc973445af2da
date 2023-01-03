<?php

namespace App\Application\Internit\RespostaSolicitacaoBundle\Repository;

use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RespostaSolicitacao>
 *
 * @method RespostaSolicitacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespostaSolicitacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespostaSolicitacao[]    findAll()
 * @method RespostaSolicitacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespostaSolicitacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RespostaSolicitacao::class);
    }


}