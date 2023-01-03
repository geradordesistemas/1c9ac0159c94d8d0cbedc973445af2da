<?php

namespace App\Application\Internit\ProfissaoBundle\Repository;

use App\Application\Internit\ProfissaoBundle\Entity\Profissao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Profissao>
 *
 * @method Profissao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profissao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profissao[]    findAll()
 * @method Profissao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfissaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profissao::class);
    }


}