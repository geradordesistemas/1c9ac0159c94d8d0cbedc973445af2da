<?php

namespace App\Application\Internit\AndamentoSolicitacaoBundle\Repository;

use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AndamentoSolicitacao>
 *
 * @method AndamentoSolicitacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method AndamentoSolicitacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method AndamentoSolicitacao[]    findAll()
 * @method AndamentoSolicitacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AndamentoSolicitacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AndamentoSolicitacao::class);
    }


}