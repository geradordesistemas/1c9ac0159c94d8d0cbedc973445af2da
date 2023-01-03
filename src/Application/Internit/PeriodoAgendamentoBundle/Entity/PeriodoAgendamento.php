<?php

namespace App\Application\Internit\PeriodoAgendamentoBundle\Entity;

use App\Application\Internit\PeriodoAgendamentoBundle\Repository\PeriodoAgendamentoRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'periodo_agendamento')]
#[ORM\Entity(repositoryClass: PeriodoAgendamentoRepository::class)]
#[UniqueEntity('id')]
class PeriodoAgendamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'periodo', type: 'string', unique: false, nullable: false)]
    private string $periodo;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPeriodo(): string
    {
        return $this->periodo;
    }

    public function setPeriodo(string $periodo): void
    {
        $this->periodo = $periodo;
    }

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }


}