<?php

namespace App\Application\Internit\DiaIndisponivelAgendamentoBundle\Entity;

use App\Application\Internit\DiaIndisponivelAgendamentoBundle\Repository\DiaIndisponivelAgendamentoRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'dia_indisponivel_agendamento')]
#[ORM\Entity(repositoryClass: DiaIndisponivelAgendamentoRepository::class)]
#[UniqueEntity('id')]
class DiaIndisponivelAgendamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'data', type: 'date', unique: false, nullable: false)]
    private DateTime $data;

    #[ORM\Column(name: 'descricao', type: 'string', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'feriado', type: 'boolean', unique: false, nullable: true)]
    private ?bool $feriado = null;

    #[ORM\Column(name: 'indisponivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $indisponivel = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getFeriado(): ?bool
    {
        return $this->feriado;
    }

    public function setFeriado(?bool $feriado): void
    {
        $this->feriado = $feriado;
    }

    public function getIndisponivel(): ?bool
    {
        return $this->indisponivel;
    }

    public function setIndisponivel(?bool $indisponivel): void
    {
        $this->indisponivel = $indisponivel;
    }


}