<?php

namespace App\Application\Internit\DiaSemanaBundle\Entity;

use App\Application\Internit\DiaSemanaBundle\Repository\DiaSemanaRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'dia_semana')]
#[ORM\Entity(repositoryClass: DiaSemanaRepository::class)]
#[UniqueEntity('id')]
#[UniqueEntity('dia')]
#[UniqueEntity('diaSemana')]
class DiaSemana
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'dia', type: 'integer', unique: true, nullable: false)]
    private int $dia;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'diaSemana', type: 'string', unique: true, nullable: false)]
    private string $diaSemana;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDia(): int
    {
        return $this->dia;
    }

    public function setDia(int $dia): void
    {
        $this->dia = $dia;
    }

    public function getDiasemana(): string
    {
        return $this->diaSemana;
    }

    public function setDiasemana(string $diaSemana): void
    {
        $this->diaSemana = $diaSemana;
    }


}