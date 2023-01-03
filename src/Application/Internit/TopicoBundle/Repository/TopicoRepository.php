<?php

namespace App\Application\Internit\TopicoBundle\Repository;

use App\Application\Internit\TopicoBundle\Entity\Topico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Topico>
 *
 * @method Topico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Topico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Topico[]    findAll()
 * @method Topico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TopicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Topico::class);
    }


}