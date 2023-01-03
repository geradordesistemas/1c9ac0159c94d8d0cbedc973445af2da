<?php

namespace App\Application\Internit\TipoSolicitacaoBundle\Repository;

use App\Application\Internit\TipoSolicitacaoBundle\Entity\TipoSolicitacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoSolicitacao>
 *
 * @method TipoSolicitacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoSolicitacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoSolicitacao[]    findAll()
 * @method TipoSolicitacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoSolicitacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoSolicitacao::class);
    }


}