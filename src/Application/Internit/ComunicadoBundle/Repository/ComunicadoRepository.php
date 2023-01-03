<?php

namespace App\Application\Internit\ComunicadoBundle\Repository;

use App\Application\Internit\ComunicadoBundle\Entity\Comunicado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comunicado>
 *
 * @method Comunicado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comunicado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comunicado[]    findAll()
 * @method Comunicado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComunicadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comunicado::class);
    }


}