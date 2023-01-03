<?php

namespace App\Application\Internit\SolicitacaoBundle\Repository;

use App\Application\Internit\SolicitacaoBundle\Entity\Solicitacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Solicitacao>
 *
 * @method Solicitacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Solicitacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Solicitacao[]    findAll()
 * @method Solicitacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Solicitacao::class);
    }


}