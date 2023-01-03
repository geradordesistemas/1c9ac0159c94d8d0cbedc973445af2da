<?php

namespace App\Application\Internit\PerguntaFrequenteBundle\Repository;

use App\Application\Internit\PerguntaFrequenteBundle\Entity\PerguntaFrequente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PerguntaFrequente>
 *
 * @method PerguntaFrequente|null find($id, $lockMode = null, $lockVersion = null)
 * @method PerguntaFrequente|null findOneBy(array $criteria, array $orderBy = null)
 * @method PerguntaFrequente[]    findAll()
 * @method PerguntaFrequente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PerguntaFrequenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PerguntaFrequente::class);
    }


}