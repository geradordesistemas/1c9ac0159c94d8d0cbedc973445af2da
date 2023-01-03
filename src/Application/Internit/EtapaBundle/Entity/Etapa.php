<?php

namespace App\Application\Internit\EtapaBundle\Entity;

use App\Application\Internit\EtapaBundle\Repository\EtapaRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'etapa')]
#[ORM\Entity(repositoryClass: EtapaRepository::class)]
#[UniqueEntity('id')]
class Etapa
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'etapa', type: 'string', unique: false, nullable: false)]
    private string $etapa;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getEtapa(): string
    {
        return $this->etapa;
    }

    public function setEtapa(string $etapa): void
    {
        $this->etapa = $etapa;
    }


}