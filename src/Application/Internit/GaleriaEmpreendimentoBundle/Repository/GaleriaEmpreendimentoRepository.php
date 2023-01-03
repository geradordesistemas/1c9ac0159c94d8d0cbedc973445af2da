<?php

namespace App\Application\Internit\GaleriaEmpreendimentoBundle\Repository;

use App\Application\Internit\GaleriaEmpreendimentoBundle\Entity\GaleriaEmpreendimento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GaleriaEmpreendimento>
 *
 * @method GaleriaEmpreendimento|null find($id, $lockMode = null, $lockVersion = null)
 * @method GaleriaEmpreendimento|null findOneBy(array $criteria, array $orderBy = null)
 * @method GaleriaEmpreendimento[]    findAll()
 * @method GaleriaEmpreendimento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GaleriaEmpreendimentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GaleriaEmpreendimento::class);
    }


}