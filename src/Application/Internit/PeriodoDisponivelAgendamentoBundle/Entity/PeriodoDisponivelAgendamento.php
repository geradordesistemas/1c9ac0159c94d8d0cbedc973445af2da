<?php

namespace App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Entity;

use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Repository\PeriodoDisponivelAgendamentoRepository;
use App\Application\Internit\DiaSemanaBundle\Entity\DiaSemana;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'periodo_disponivel_agendamento')]
#[ORM\Entity(repositoryClass: PeriodoDisponivelAgendamentoRepository::class)]
#[UniqueEntity('id')]
class PeriodoDisponivelAgendamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'quatidadeAgendamentos', type: 'integer', unique: false, nullable: false)]
    private int $quatidadeAgendamentos;

    #[ORM\Column(name: 'disponivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $disponivel = null;

    #[ORM\ManyToOne(targetEntity: DiaSemana::class)]
    #[ORM\JoinColumn(name: 'diaSemana_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private DiaSemana|null $diaSemana = null;

    #[ORM\ManyToOne(targetEntity: PeriodoAgendamento::class)]
    #[ORM\JoinColumn(name: 'periodoAgendamento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private PeriodoAgendamento|null $periodoAgendamento = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuatidadeagendamentos(): int
    {
        return $this->quatidadeAgendamentos;
    }

    public function setQuatidadeagendamentos(int $quatidadeAgendamentos): void
    {
        $this->quatidadeAgendamentos = $quatidadeAgendamentos;
    }

    public function getDisponivel(): ?bool
    {
        return $this->disponivel;
    }

    public function setDisponivel(?bool $disponivel): void
    {
        $this->disponivel = $disponivel;
    }

    public function getDiaSemana(): ?DiaSemana
    {
        return $this->diaSemana;
    }

    public function setDiaSemana(?DiaSemana $diaSemana): void
    {
        $this->diaSemana = $diaSemana;
    }


    public function getPeriodoAgendamento(): ?PeriodoAgendamento
    {
        return $this->periodoAgendamento;
    }

    public function setPeriodoAgendamento(?PeriodoAgendamento $periodoAgendamento): void
    {
        $this->periodoAgendamento = $periodoAgendamento;
    }



}